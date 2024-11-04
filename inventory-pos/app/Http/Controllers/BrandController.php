<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function BrandCreate()
    {
        return view('frontend.brand.create');
    }


    function StoreBrand(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands',
        ]);


        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->description = $request->description;

        // for photo 
        if ($request->photo) {
            $slug = uniqid();
            $manager = new ImageManager(new Driver());
            $photo = $request->photo;
            $photo_name = $slug . "." . $photo->getClientOriginalExtension();
            $photo_read = $manager->read($photo);
            $photo_resize = $photo_read->resize(200, 200)->save('files/brand/' . $photo_name);
            $brand->photo = 'files/brand/' . $photo_name;
        }
        $brand->save();

        $notification = array('message' => 'Brand Added', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    function BrandList()
    {
        $brand = Brand::all();
        return view('frontend.brand.brand_list', compact('brand'));
    }


    function BrandEdit($id)
    {
        $brand = Brand::find($id);

        return view('frontend.brand.edit', compact('brand'));
    }

    function UpdateBrand(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required',
        ]);


        $brand = Brand::find($request->id);

        $brand->brand_name = $request->brand_name;
        $brand->description = $request->description;

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
            $photo_resize = $photo_read->resize(200, 200)->save('files/brand/' . $photo_name);
            $brand->photo = 'files/brand/' . $photo_name;
        } else {
            $brand->photo = $request->old_photo;
        }
        $brand->save();

        $notification = array('message' => 'Brand Updated', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }

    function BrandDelete($id)
    {
        $brand = Brand::find($id);
        if (File::exists($brand->photo)) {
            unlink($brand->photo);
        }
        $brand->delete();

        $notification = array('message' => 'Brand Deleted', 'alert-type' => 'warning');

        return redirect()->back()->with($notification);
    }
}
