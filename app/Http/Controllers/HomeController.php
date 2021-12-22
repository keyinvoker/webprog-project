<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //  unused for now
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (request()->has('q')) {
            $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.name as category_name')
                ->where('products.name', 'LIKE', '%' . request()->q . '%')
                ->orWhere('categories.name', 'LIKE', '%' . request()->q . '%')
                ->paginate(6);
        } else {
            $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.name as category_name')
                ->paginate(6);
        }

        $message = ["YOULL GET YOUR PRODUCTS WHEN YOU FIX THIS DAMN PAGE!", "I missed the part where thats my problem", "Gonna Cry?", "You shouldve thought of that earlier", "How'd that get in there?", "Good Riddance!", "Stings doesnt it?"];
        $randomMessage = $message[array_rand($message)];

        $data = [
            'products' => $products,
            'randomMessage' => $randomMessage
        ];

        return view('home', $data);
    }
}
