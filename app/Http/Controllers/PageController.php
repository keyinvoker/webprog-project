<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $data = [
            'product' => Product::all()
        ];
        return view('home', $data);
    }
    public function login()
    {
        return view('auth/login');
    }
    public function register()
    {
        return view('auth/register');
    }


    public function cart()
    {
        return view('cart');
    }
    public function edit_cart()
    {
        return view('edit_cart');
    }

    public function history()
    {
        return view('history');
    }

    public function search()
    {
        return view('search');
    }
}
