<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    //
    public function getProductDetail(Request $request)
    {
        if (!$request->query('q')) {
            return redirect()->back();
        }
        try {
            $decryptedProductID = Crypt::decrypt($request->query('q'));
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $product = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name as category_name')
            ->where('products.id', $decryptedProductID)
            ->first();

        $data = [
            'product' => $product
        ];

        return view('components.product.productDetail', $data);
    }
}
