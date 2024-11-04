<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;


class CustomerController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function Create()
    {
        return view('frontend.customer.create');
    }

    function AddCustomer(Request $request)
    {

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->company_name = $request->company_name;
        $customer->bank_name = $request->bank_name;
        $customer->account_holder = $request->account_holder;
        $customer->account_no = $request->account_number;
        $customer->brance_name = $request->brance_name;
        $customer->routing_no = $request->routing_no;
        $customer->status = $request->status;

        // for photo 
        if ($request->photo) {
            $slug = uniqid();
            $manager = new ImageManager(new Driver());
            $photo = $request->photo;
            $photo_name = $slug . "." . $photo->getClientOriginalExtension();
            $photo_read = $manager->read($photo);
            $photo_resize = $photo_read->resize(300, 300)->save('files/customer/' . $photo_name);
            $customer->photo = 'files/customer/' . $photo_name;
        }

        $customer->save();

        $notification = array('message' => 'Customer Added', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    function AddCustomerFromPos(Request $request)
    {

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->company_name = $request->company_name;
        $customer->bank_name = $request->bank_name;
        $customer->account_holder = $request->account_holder;
        $customer->account_no = $request->account_number;
        $customer->brance_name = $request->brance_name;
        $customer->routing_no = $request->routing_no;
        $customer->status = $request->status;

        // for photo 
        if ($request->photo) {
            $slug = uniqid();
            $manager = new ImageManager(new Driver());
            $photo = $request->photo;
            $photo_name = $slug . "." . $photo->getClientOriginalExtension();
            $photo_read = $manager->read($photo);
            $photo_resize = $photo_read->resize(300, 300)->save('files/customer/' . $photo_name);
            $customer->photo = 'files/customer/' . $photo_name;
        }

        $customer->save();
        return response()->json('Customer Added');
    }


    function CustomerList()
    {
        $customer = Customer::all();

        return view('frontend.customer.index', compact('customer'));
    }


    function CustomerDetails($id)
    {
        $customer = Customer::find($id);
        return view('frontend.customer.customer_details', compact('customer'));
    }


    function CustomerEdit($id)
    {
        $customer = Customer::find($id);
        return view('frontend.customer.edit', compact('customer'));
    }


    function CustomerUpdate(Request $request)
    {
        $customer = Customer::find($request->id);

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->company_name = $request->company_name;
        $customer->bank_name = $request->bank_name;
        $customer->account_holder = $request->account_holder;
        $customer->account_no = $request->account_number;
        $customer->brance_name = $request->brance_name;
        $customer->routing_no = $request->routing_no;
        $customer->status = $request->status;

        if ($request->photo) {
            if (File::exists($request->old_photo)) {
                unlink($request->old_photo);
            }

            $slug = uniqid();
            $manager = new ImageManager(new Driver());
            $photo = $request->photo;
            $photo_name = $slug . "." . $photo->getClientOriginalExtension();
            $photo_read = $manager->read($photo);
            $photo_resize = $photo_read->resize(300, 300)->save('files/customer/' . $photo_name);
            $customer->photo = 'files/customer/' . $photo_name;
        } else {
            $customer->photo = $request->old_photo;
        }

        $customer->save();

        $notification = array('message' => 'Customer Updated', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    function CustomerDelete($id)
    {
        $customer = Customer::find($id);

        if (File::exists($customer->photo)) {
            unlink($customer->photo);
        }

        $customer->delete();


        $notification = array('message' => 'Customer Deleted', 'alert-type' => 'error');

        return redirect()->back()->with($notification);
    }
}
