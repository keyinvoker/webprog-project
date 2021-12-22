<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AdminCategoryController extends Controller
{
    //
    public function getCategories(){
        if (Auth::user()->role_id !=1){
            return response()->view('error.unauthorized401', [], 401);
        }
        
        $categories = Category::orderBy('created_at', 'asc')->get();

        $data = [
            'categories' => $categories
        ];

        return view('admin.category.categoryView', $data);
    }

    public function getUpdateCategoryPage(Request $request){
        if (Auth::user()->role_id !=1){
            return response()->view('error.unauthorized401', [], 401);
        }

        if (!$request->has('q')) {
            return redirect()->route('admin.categories');
        }

        try{
            $decryptedCategoryID = Crypt::decrypt($request->query('q'));
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $category = Category::find($decryptedCategoryID);

        $data = [
            'category' => $category
        ];

        return view('admin.category.editCategory', $data);
    }

    public function updateCategory(Request $request){
        if (Auth::user()->role_id !=1){
            return response()->view('error.unauthorized401', [], 401);
        }

        try{
            $decryptedCategoryID = Crypt::decrypt($request->categoryID);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $category = Category::find($decryptedCategoryID);

        $request->validate([
            'name' => 'required|min:2|unique:categories,name,' . $category->id,
        ]);

        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.categories');
    }

    public function deleteCategory(Request $request){
        if (Auth::user()->role_id !=1){
            return response()->view('error.unauthorized401', [], 401);
        }

        try{
            $decryptedCategoryID = Crypt::decrypt($request->categoryID);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $category = Category::find($decryptedCategoryID);
        $category->delete();

        return redirect()->route('admin.categories');
    }

    public function getAddCategoryPage(){
        if (Auth::user()->role_id !=1){
            return response()->view('error.unauthorized401', [], 401);
        }

        return view('admin.category.insertCategory');
    }

    public function addCategory(Request $request){
        if (Auth::user()->role_id !=1){
            return response()->view('error.unauthorized401', [], 401);
        }

        $request->validate([
            'name' => 'required|min:2|unique:categories,name',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.categories');
    }
}
