<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function view_category()
    {
        return view('view_category');
    }

    public function get_add_category()
    {
        return view('add_category');
    }

    public function add_category(Request $request)
    {
        $rules = Validator::make($request->all(), [
            'category' => ['required', 'unique', 'min:2']
        ]);

        $rules->validate();

        $category = new Category();
        $category->category = $request->category;

        $category->save();

        return redirect()->back();
    }

    public function get_edit_category()
    {
        return view('edit_category');
    }
}
