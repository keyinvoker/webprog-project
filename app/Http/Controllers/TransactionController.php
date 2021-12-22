<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function getTransactions(Request $request)
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

        $transactions = Transaction::join('carts', 'carts.id', '=', 'transactions.cart_id')
            ->join('users', 'users.id', '=', 'carts.user_id')
            ->join('cart_details', 'cart_details.cart_id', '=', 'carts.id')
            ->join('products', 'products.id', '=', 'cart_details.product_id')
            ->select('transactions.*', 'cart_details.quantity', 'cart_details.price', 'products.name', 'products.picture as product_picture', 'cart_details.id as cart_detail_id')
            ->where('transactions.user_id', $decryptedUserID)
            ->orderBy('transactions.created_at', 'desc')    
            ->get();

        $sumCartPrice = array();
        foreach ($transactions as $transaction) {
            $sumCartPrice[$transaction->cart_id] = 0;
        }
        
        $showSumCartPriceStatus= array();
        foreach ($transactions as $transaction) {
            $showSumCartPriceStatus[$transaction->cart_detail_id] = false;
        }


        $cartIDTemp = 0;
        $cartDetailIDTemp = 0;
        $countTransaction = 0;  
        foreach ($transactions as $transaction) {
            $transaction->totalPrice = $transaction->quantity * $transaction->price;

            if($countTransaction== count($transactions)-1){
                $showSumCartPriceStatus[$transaction->cart_detail_id] = true;
            }
            if ($cartIDTemp ==0) {
                $cartIDTemp = $transaction->cart_id;
                $cartDetailIDTemp = $transaction->cart_detail_id;
            } else if ($cartIDTemp == $transaction->cart_id) {
                $cartDetailIDTemp = $transaction->cart_detail_id;
            }else if ($cartDetailIDTemp != $transaction->cart_detail_id) {
                $showSumCartPriceStatus[$cartDetailIDTemp] = true;
                $cartIDTemp = $transaction->cart_id;    
                $cartDetailIDTemp = $transaction->cart_detail_id;
            }
            
            $sumCartPrice[$transaction->cart_id] += $transaction->totalPrice;
            $countTransaction++;    
        }

        $message = ["YOULL GET YOUR TRANSACTION HISTORY WHEN YOU FIX THIS DAMN PAGE!", "I missed the part where thats my problem", "Gonna Cry?", "You shouldve thought of that earlier", "How'd that get in there?", "Good Riddance!", "Stings doesnt it?"];
        $randomMessage = $message[array_rand($message)];
       

        $data = [
            'transactions' => $transactions,
            'sumCartPrice' => $sumCartPrice,
            'showSumCartPriceStatus' => $showSumCartPriceStatus,
            'randomMessage' => $randomMessage
        ];

        return view('components.transaction.transactionHistory', $data);
    }
}
