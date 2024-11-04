<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class EmployeController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function CreteEmploye()
    {
        return view('frontend.employe.create');
    }
    function StoreEmploye(Request $request)
    {
        $employe = new Employe();
        $employe->name = $request->name;
        $employe->email = $request->email;
        $employe->phone = $request->phone;
        $employe->address = $request->address;
        $employe->nid_no = $request->nid_no;
        $employe->experience = $request->experience;
        $employe->salary = $request->salary;

        // for image 
        if ($request->photo) {
            $directory = public_path('files/employes/');
            $slug = uniqid();
            $manager = new ImageManager(new Driver());
            $photo = $request->photo;
            $photo_name = $slug . "." . $photo->getClientOriginalExtension();
            $photo_read = $manager->read($photo);
            $photo_resize = $photo_read->resize(300, 300)->save($directory . $photo_name);
            $employe->photo = $photo_name;
        }

        $employe->vacation = $request->vacation;
        $employe->city = $request->city;
        $employe->save();

        $notification = array('message' => 'Employe Added', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    function Index()
    {
        $employe = Employe::all();
        return view('frontend.employe.index', compact('employe'));
    }

    function EmployeDetails($id)
    {
        // $employe = Employe::where('id', $id)->first();
        $employe = DB::table('employes')->where('id', $id)->first();

        return view('frontend.employe.employe_details', compact('employe'));
    }

    function EmployeEdit($id)
    {
        $employe = Employe::where('id', $id)->first();
        return view('frontend.employe.edit', compact('employe'));
    }

    function EmployeUpdate(Request $request)
    {
        $employe = Employe::find($request->id);
        $employe->name = $request->name;
        $employe->email = $request->email;
        $employe->phone = $request->phone;
        $employe->address = $request->address;
        $employe->nid_no = $request->nid_no;
        $employe->experience = $request->experience;
        $employe->salary = $request->salary;
        $employe->vacation = $request->vacation;
        $employe->city = $request->city;

        if ($request->photo) {
            $directory = public_path('files/employes/');
            $old_photo = $directory . $request->old_photo;

            if (File::exists($old_photo)) {
                unlink($old_photo);
            }

            $directory = public_path('files/employes/');
            $slug = uniqid();
            $manager = new ImageManager(new Driver());
            $photo = $request->photo;
            $photo_name = $slug . "." . $photo->getClientOriginalExtension();
            $photo_read = $manager->read($photo);
            $photo_resize = $photo_read->resize(300, 300)->save($directory . $photo_name);
            $employe->photo = $photo_name;
        } else {
            $employe->photo = $request->old_photo;
        }

        $employe->save();

        $notification = array('message' => 'Employe Updated', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    function EmployeDelete($id)
    {
        $directory = public_path('files/employes/');
        $employe = Employe::find($id);
        $photo = $directory . $employe->photo;

        if (File::exists($employe->photo)) {
            unlink($photo);
        }
        $employe->delete();

        $notification = array('message' => 'Employe Deleted', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }
}
