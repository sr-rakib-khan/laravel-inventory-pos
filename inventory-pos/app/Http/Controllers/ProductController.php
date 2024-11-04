<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\StorageSpot;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }


    function ProductCreate()
    {
        $category = Category::where('status', 1)->get();
        $brand = Brand::all();
        $warehouse = Warehouse::where('status', 1)->get();
        $unit = Unit::where('status', 1)->get();
        $spot = StorageSpot::where('status', 1)->get();
        $supplier = Supplier::where('status', 1)->get();
        return view('frontend.product.create', compact('category', 'brand', 'warehouse', 'unit', 'spot', 'supplier'));
    }


    function StoreProduct(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'qty' => 'required',
            'purchase_price' => 'required',
            'selling_price' => 'required',
            'photo' => 'required',
        ]);

        $productName = $request->product_name;
        $prefix = strtoupper(substr($productName, 0, 3));
        $suffix = str_pad(Product::count() + 1, 4, '0', STR_PAD_LEFT);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->unit = $request->unit;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        $product->warehouse = $request->warehouse;
        $product->storage_spot = $request->storage_spot;
        $product->min_qty = $request->min_qty;
        $product->qty = $request->qty;
        $product->reorder_lavel = $request->reorder_lavel;
        $product->description = $request->description;
        $product->supplier = $request->supplier;
        $product->status = $request->status;
        $product->sku = $prefix . '-' . $suffix;


        //working for photo
        if ($request->photo) {
            $slug = uniqid();
            $manager = new ImageManager(new Driver());
            $photo = $request->photo;
            $photo_name = $slug . "." . $photo->getClientOriginalExtension();
            $photo_read = $manager->read($photo);
            $photo_resize = $photo_read->resize(300, 300)->save('files/product/' . $photo_name);
            $product->photo = 'files/product/' . $photo_name;
        }

        $product->save();

        $notification = array('message' => 'Product Added', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }

    function ProductList()
    {
        $products = Product::with('brand', 'category')->get();
        return view('frontend.product.index', compact('products'));
    }


    function ProductDetails($id)
    {
        $product = Product::with('brand', 'category')->find($id);

        return view('frontend.product.product_details', compact('product'));
    }


    function EditProduct($id)
    {
        $product = Product::with('category', 'brand')->find($id);
        $category = Category::where('status', 1)->get();
        $brand = Brand::all();
        $unit = Unit::where('status', 1)->get();
        $warehouse = Warehouse::where('status', 1)->get();
        $spot = StorageSpot::where('status', 1)->get();
        $supplier = Supplier::where('status', 1)->get();

        return view('frontend.product.edit', compact('product', 'category', 'brand', 'unit', 'warehouse', 'spot', 'supplier'));
    }


    function UpdateProduct(Request $request)
    {
        $productName = $request->product_name;
        $prefix = strtoupper(substr($productName, 0, 3));
        $suffix = str_pad(Product::count() + 1, 4, '0', STR_PAD_LEFT);

        $product = Product::find($request->id);

        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->unit = $request->unit;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        $product->warehouse = $request->warehouse;
        $product->storage_spot = $request->storage_spot;
        $product->min_qty = $request->min_qty;
        $product->qty = $request->qty;
        $product->reorder_lavel = $request->reorder_lavel;
        $product->description = $request->description;
        $product->supplier = $request->supplier;
        $product->status = $request->status;
        $product->sku = $prefix . '-' . $suffix;

        //working for photo
        if ($request->photo) {

            if (File::exists($request->old_photo)) {
                unlink($request->old_photo);
            }

            $slug = uniqid();
            $manager = new ImageManager(new Driver());
            $photo = $request->photo;
            $photo_name = $slug . "." . $photo->getClientOriginalExtension();
            $photo_read = $manager->read($photo);
            $photo_resize = $photo_read->resize(300, 300)->save('files/product/' . $photo_name);
            $product->photo = 'files/product/' . $photo_name;
        } else {
            $product->photo = $request->old_photo;
        }

        $product->save();

        $notification = array('message' => 'Product Updated', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    function DeleteProduct($id)
    {
        $product = Product::find($id);

        if (File::exists($product->photo)) {
            unlink($product->photo);
        }

        $product->delete();

        $notification = array('message' => 'Product Deleted', 'alert-type' => 'warning');

        return redirect()->back()->with($notification);
    }


    // import and export product from excel 

    function ImportProduct()
    {
        return view('frontend.product.import_product');
    }

    public function export()
    {
        return Excel::download(new ProductExport, 'products.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }


    public function import(Request $request)
    {
        $import =  Excel::import(new ProductImport, $request->file('improt_product'));

        if ($import) {

            $notification = array('message' => 'Product Imported', 'alert-type' => 'success');

            return redirect()->back()->with($notification);
        }
    }
}
