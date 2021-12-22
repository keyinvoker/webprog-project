<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use App\Models\Transaction;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        if (Auth::user()->role_id !=2){
            return response()->view('error.unauthorized401', [], 401);
        }

        $userID = Auth::user()->id;
        try {
            $decryptedProductID = Crypt::decrypt($request->productID);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        if ($request->quantity < 1) {
            Session::flash('message', "quantity invalid");
            return redirect()->back();
        }

        $product = Product::find($decryptedProductID);

        $availableCart = Cart::where('user_id', $userID)
            ->where('status', 'available')->first();

        if ($availableCart == null) {
            $newCart = new Cart();
            $newCart->user_id = $userID;
            $newCart->status = 'available';
            $newCart->save();

            $cartDetail = new CartDetail();
            $cartDetail->cart_id = $newCart->id;
            $cartDetail->product_id = $decryptedProductID;
            $cartDetail->quantity = $request->quantity;
            $cartDetail->price = $product->price;
            $cartDetail->save();
        } else {
            $cartProduct = CartDetail::where('cart_id', $availableCart->id)
                ->where('product_id', $decryptedProductID)->first();
            if ($cartProduct == null) {
                $cartDetail = new CartDetail();
                $cartDetail->cart_id = $availableCart->id;
                $cartDetail->product_id = $decryptedProductID;
                $cartDetail->quantity = $request->quantity;
                $cartDetail->price = $product->price;
                $cartDetail->save();
            } else {
                $cartProduct->quantity += $request->quantity;
                $cartProduct->price = $product->price;
                $cartProduct->save();
            }
        }
        return redirect(route('cart.detail',["q"=>Crypt::encrypt($userID)]));
    }

    public function getCartDetail(Request $request)
    {
        if (Auth::user()->role_id !=2){
            return response()->view('error.unauthorized401', [], 401);
        }

        if (!$request->query('q')) {
            return redirect()->back();
        }
        try {
            $decryptedUserID = Crypt::decrypt($request->query('q'));
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $availableCart = Cart::where('user_id', $decryptedUserID)
            ->where('status', 'available')->first();


        $message = ["YOULL GET YOUR CART WHEN YOU FIX THIS DAMN PAGE!", "I missed the part where thats my problem", "Gonna Cry?", "You shouldve thought of that earlier", "How'd that get in there?", "Good Riddance!", "Stings doesnt it?"];
        $randomMessage = $message[array_rand($message)];

        if ($availableCart == null) {
            $data = [
                'cartDetails' => $availableCart,
                'sumTotal' => 0,
                'nullStatus' => true,
                'randomMessage' => $randomMessage
            ];

            return view('components.cart.cartDetail', $data);
        }

        $cartDetails = CartDetail::join('products', 'cart_details.product_id', '=', 'products.id')
            ->join('carts', 'cart_details.cart_id', '=', 'carts.id')
            ->select('cart_details.*', 'products.name', 'products.price', 'products.picture')
            ->where('cart_details.cart_id', $availableCart->id)
            ->get();


        $sumTotal = 0;
        foreach ($cartDetails as $cartDetail) {
            $cartDetail->totalPrice = $cartDetail->quantity * $cartDetail->price;
            $sumTotal += $cartDetail->totalPrice;
        }



        $data = [
            'cartDetails' => $cartDetails,
            'sumTotal' => $sumTotal,
            'nullStatus' => false,
            'randomMessage' => $randomMessage
        ];


        return view('components.cart.cartDetail', $data);
    }

    public function deleteFromCart(Request $request)
    {
        if (Auth::user()->role_id !=2){
            return response()->view('error.unauthorized401', [], 401);
        }
        
        try {
            $decryptedCartDetailID = Crypt::decrypt($request->cartDetailID);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $cartDetail = CartDetail::find($decryptedCartDetailID);
        $cartDetail->delete();

        $countCartDetail = CartDetail::where('cart_id', $cartDetail->cart_id)->count();
        if ($countCartDetail == 0) {
            $cart = Cart::find($cartDetail->cart_id);
            $cart->delete();
        }

        $userID = Auth::user()->id;
        return redirect(route('cart.detail',["q"=>Crypt::encrypt($userID)]));
    }

    public function getCartDetailEdit(Request $request)
    {
        if (Auth::user()->role_id !=2){
            return response()->view('error.unauthorized401', [], 401);
        }

        if (!$request->query('q')) {
            return redirect()->back();
        }
        try {
            $decryptedCartDetailID = Crypt::decrypt($request->query('q'));
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $cartDetail = CartDetail::find($decryptedCartDetailID);

        $product = Product::find($cartDetail->product_id);

        $data = [
            'cartDetail' => $cartDetail,
            'product' => $product
        ];

        return view('components.cart.cartDetailEdit', $data);
    }

    public function editCartDetail(Request $request)
    {
        if (Auth::user()->role_id !=2){
            return response()->view('error.unauthorized401', [], 401);
        }

        try {
            $decryptedCartDetailID = Crypt::decrypt($request->cartDetailID);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $cartDetail = CartDetail::find($decryptedCartDetailID);

        if ($request->quantity < 1) {
            Session::flash('message', "quantity invalid");
            return redirect()->back();
        }

        $cartDetail->quantity += $request->quantity;
        $cartDetail->save();

        $userID = Auth::user()->id;
        return redirect(route('cart.detail',["q"=>Crypt::encrypt($userID)]));
    }

    public function checkout(Request $request)
    {
        if (Auth::user()->role_id !=2){
            return response()->view('error.unauthorized401', [], 401);
        }
        
        try {
            $decryptedCartID = Crypt::decrypt($request->cartID);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $cart = Cart::find($decryptedCartID);
        $cart->status = 'completed';
        $cart->save();

        $userID = Auth::user()->id;
        $transaction = new Transaction();
        $transaction->user_id = $userID;
        $transaction->cart_id = $decryptedCartID;
        $transaction->save();

        return redirect(route('transactions',["q"=>Crypt::encrypt($userID)]));
    }
}
