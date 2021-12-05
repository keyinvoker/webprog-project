<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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


    public function get_add_product()
    {
        return view('add_product');
    }

    public function add_product(Request $request)
    {
        $rules = Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['required', 'min:50'],
            'price' => ['required', 'integer', 'min:1'],
            'category' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg']
        ]);

        $rules->validate();

        $file = $request->file('image');

        $imageName = time() . '.' . $file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $imageName);
        $imageName = 'images/' . $imageName;

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->image = $imageName;

        $product->save();

        return redirect()->back();
    }

    public function get_edit_product()
    {
        return view('edit_product');
    }
}
