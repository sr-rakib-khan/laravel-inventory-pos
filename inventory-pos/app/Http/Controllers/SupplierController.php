<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function CreateSupplier()
    {
        return view('frontend.supplier.create');
    }

    function AddSupplier(Request $request)
    {

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->city = $request->city;
        $supplier->company_name = $request->company_name;
        $supplier->bank_name = $request->bank_name;
        $supplier->account_holder = $request->account_holder;
        $supplier->account_no = $request->account_number;
        $supplier->brance_name = $request->brance_name;
        $supplier->routing_no = $request->routing_no;
        $supplier->status = $request->status;


        // for image 
        if ($request->photo) {
            $slug = uniqid();
            $manager = new ImageManager(new Driver());
            $photo = $request->photo;
            $photo_name = $slug . "." . $photo->getClientOriginalExtension();
            $photo_read = $manager->read($photo);
            $photo_resize = $photo_read->resize(300, 300)->save('files/supplier/' . $photo_name);
            $supplier->photo = 'files/supplier/' . $photo_name;
        }

        $supplier->save();

        $notification = array('message' => 'Supplier Added', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }

    function SupplierList(Request $request)
    {
        if ($request->ajax()) {
            $supplier = "";
            $query = DB::table('suppliers');

            if ($request->city) {
                $query->where('suppliers.city', $request->city);
            }
            if ($request->bank_name) {
                $query->where('suppliers.bank_name', $request->bank_name);
            }
            $supplier = $query->get();

            return DataTables::of($supplier)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a class="me-3" href="' . route('supplier.details', [$row->id]) . '"> <img src="' . asset('assets/img/icons/eye.svg') . '" alt="img" /></a>

                    <a class="me-3" href="' . route('supplier.edit', [$row->id]) . '"> <img src="' . asset('assets/img/icons/edit.svg') . '" alt="img" /></a>

                    <a class="me-3 delete" href="' . route('supplier.delete', [$row->id]) . '"> <img src="' . asset('assets/img/icons/delete.svg') . '" alt="img" /></a>';

                    return $actionbtn;
                })->rawColumns(['action'])->make(true);
        }
        return view('frontend.supplier.index');
    }

    function SupplierDetails($id)
    {
        $supplier = Supplier::find($id);
        return view('frontend.supplier.supplier_details', compact('supplier'));
    }

    function SupplierEdit($id)
    {
        $supplier = Supplier::find($id);

        return view('frontend.supplier.edit', compact('supplier'));
    }


    function SupplierUpdate(Request $request)
    {
        $supplier = Supplier::find($request->id);
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->city = $request->city;
        $supplier->company_name = $request->company_name;
        $supplier->bank_name = $request->bank_name;
        $supplier->account_holder = $request->account_holder;
        $supplier->account_no = $request->account_number;
        $supplier->brance_name = $request->brance_name;
        $supplier->routing_no = $request->routing_no;
        $supplier->status = $request->status;


        // for image 
        if ($request->photo) {
            if (File::exists($request->old_photo)) {
                unlink($request->old_photo);
            }
            $slug = uniqid();
            $manager = new ImageManager(new Driver());
            $photo = $request->photo;
            $photo_name = $slug . "." . $photo->getClientOriginalExtension();
            $photo_read = $manager->read($photo);
            $photo_resize = $photo_read->resize(300, 300)->save('files/supplier/' . $photo_name);
            $supplier->photo = 'files/supplier/' . $photo_name;
        } else {
            $supplier->photo = $request->old_photo;
        }

        $supplier->save();

        $notification = array('message' => 'Supplier Updated', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    function SupplierDelete($id)
    {
        $supplier = Supplier::find($id);

        if (File::exists($supplier->photo)) {
            unlink($supplier->photo);
        }
        $supplier->delete();

        $notification = array('message' => 'Supplier Deleted', 'alert-type' => 'warning');

        return redirect()->back()->with($notification);
    }
}
