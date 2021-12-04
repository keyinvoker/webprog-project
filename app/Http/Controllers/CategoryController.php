<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function view_category()
    {
        return view('view_category');
    }

    public function add_category()
    {
        return view('add_category');
    }

    public function edit_category()
    {
        return view('edit_category');
    }
}
