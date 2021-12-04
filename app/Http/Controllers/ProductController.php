<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail_product()
    {
        return view('detail_product');
    }

    public function view_product()
    {
        return view('view_product');
    }

    public function add_product()
    {
        return view('add_product');
    }

    public function edit_product()
    {
        return view('edit_product');
    }
}
