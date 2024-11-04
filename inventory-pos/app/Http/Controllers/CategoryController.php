<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function CategoryCreate()
    {
        return view('frontend.category.create');
    }


    function StoreCategory(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        $categoryName = $request->category_name;
        $prefix = strtoupper(substr($categoryName, 0, 3));
        $suffix = str_pad(Category::count() + 1, 4, '0', STR_PAD_LEFT);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->status = $request->status;
        $category->category_description = $request->description;
        $category->category_code = $prefix . '-' . $suffix;

        // for photo 
        if ($request->photo) {
            $directory = public_path('files/employes/');
            $slug = uniqid();
            $manager = new ImageManager(new Driver());
            $photo = $request->photo;
            $photo_name = $slug . "." . $photo->getClientOriginalExtension();
            $photo_read = $manager->read($photo);
            $photo_resize = $photo_read->resize(200, 200)->save('files/category/' . $photo_name);
            $category->photo = 'files/category/' . $photo_name;
        }
        $category->save();
        $notification = array('message' => 'Category Added', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    function CategoryList()
    {
        $category = Category::where('status', 1)->get();

        return view('frontend.category.category_list', compact('category'));
    }

    function CategoryEdit($id)
    {
        $category = Category::where('id', $id)->first();

        return view('frontend.category.edit', compact('category'));
    }

    function UpdateCategory(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required',
        ]);


        $category = Category::find($request->id);

        $category->category_name = $request->category_name;
        $category->status = $request->status;
        $category->category_description = $request->description;
        $category->category_code = $request->category_code;

        // for photo 
        if ($request->photo) {
            if (File::exists($request->old_photo)) {
                unlink($request->old_photo);
            }
            $slug = uniqid();
            $manager = new ImageManager(new Driver());
            $photo = $request->photo;
            $photo_name = $slug . "." . $photo->getClientOriginalExtension();
            $photo_read = $manager->read($photo);
            $photo_resize = $photo_read->resize(200, 200)->save('files/category/' . $photo_name);
            $category->photo = 'files/category/' . $photo_name;
        } else {
            $category->photo = $request->old_photo;
        }
        $category->save();

        $notification = array('message' => 'Category Updated', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }

    function CategoryDelete($id)
    {
        $category = Category::find($id);
        if (File::exists($category->photo)) {
            unlink($category->photo);
        }
        $category->delete();

        $notification = array('message' => 'Category Deleted', 'alert-type' => 'warning');

        return redirect()->back()->with($notification);
    }
}
