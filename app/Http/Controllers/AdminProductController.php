<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    //
    public function getProducts(){
        if (Auth::user()->role_id !=1){
            return response()->view('error.unauthorized401', [], 401);
        }
        if (request()->has('q')) {
            $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.name as category_name')
                ->where('products.name', 'LIKE', '%' . request()->q . '%')
                ->orWhere('categories.name', 'LIKE', '%' . request()->q . '%')
                ->orWhere('products.description', 'LIKE', '%' . request()->q . '%')
                ->orderBy('products.updated_at', 'desc')
                ->get();
        } else {
            $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.name as category_name')
                ->orderBy('products.updated_at', 'desc')
                ->get();
        }

        $data = [
            'products' => $products
        ];

        return view('admin.product.productView', $data);
    }

    public function getUpdateProductPage(Request $request){
        if (Auth::user()->role_id !=1){
            return response()->view('error.unauthorized401', [], 401);
        }

        if (!$request->has('q')) {
            return redirect()->route('admin.products');
        }

        try{
            $decryptedProductID = Crypt::decrypt($request->query('q'));
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $product = Product::find($decryptedProductID);
        $categories = Category::all();

        $data = [
            'product' => $product,
            'categories' => $categories
        ];

        return view('admin.product.editProduct', $data);
    }

    public function updateProduct(Request $request){
        if (Auth::user()->role_id !=1){
            return response()->view('error.unauthorized401', [], 401);
        }

        try{
            $decryptedProductID = Crypt::decrypt($request->productID);
        } catch (DecryptException $e) {
            return redirect()->back();
        }
        $product = Product::find($decryptedProductID);

        $flag = false;
        if ($request->hasFile('picture')) {

            $this->validate($request, [
                'picture' => 'required|image|mimes:jpg',
            ]);

            if ($request->file('picture')->getClientOriginalName() != $product->picture) {
                $flag = true;
                $picture = $request->file('picture');
            }
        } else {
            $picture = $product->picture;
        }
        
        $this->validate($request, [
            'name' => 'required|min:5|unique:products,name,' . $product->id,
            'description' => 'required|min:50',
            'price' => 'required|integer|min:1',
            'category' => 'required|integer',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category;
        if ($flag) {
            $product->picture = $picture->getClientOriginalName();
            Storage::putFileAs('public/products', $picture, $picture->getClientOriginalName());
        }
        $product->save();

        return redirect()->route('admin.products');
    }
    
    public function deleteProduct (Request $request){
        if (Auth::user()->role_id !=1){
            return response()->view('error.unauthorized401', [], 401);
        }

        try{
            $decryptedProductID = Crypt::decrypt($request->productID);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $product = Product::find($decryptedProductID);
        $product->delete();
        return redirect()->route('admin.products');
    }

    public function getAddProductPage(){
        if (Auth::user()->role_id !=1){
            return response()->view('error.unauthorized401', [], 401);
        }

        $categories = Category::all();

        $data = [
            'categories' => $categories
        ];

        return view('admin.product.insertProduct', $data);
    }

    public function addProduct(Request $request){
        if (Auth::user()->role_id !=1){
            return response()->view('error.unauthorized401', [], 401);
        }

        $product = new Product();

        $flag = false;
        if ($request->hasFile('picture')) {

            $this->validate($request, [
                'picture' => 'required|image|mimes:jpg',
            ]);

            $flag = true;
            $picture = $request->file('picture');
            $pictureName = $picture->getClientOriginalName();
        } else {
            $picture = asset('storage/products/' . 'default_product.jpg');
            $pictureName = 'default_product.jpg';
        }

     
        $this->validate($request, [
            'name' => 'required|min:5|unique:products,name',
            'description' => 'required|min:50',
            'price' => 'required|integer|min:1',
            'category' => 'required|integer',
        ]);


        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->picture = $pictureName;
        if ($flag) {
            Storage::putFileAs('public/products', $picture, $pictureName);
        }
        $product->save();

        return redirect()->route('admin.products');
    }
}
