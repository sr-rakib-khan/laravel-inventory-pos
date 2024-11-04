<?php

namespace App\Http\Controllers;

use App\Models\Companyinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SettingsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    // CompanyInfo method 
    function CompanyInfo()
    {
        $info = Companyinfo::find(1);
        return view('frontend.settings.company_info', compact('info'));
    }


    // company info update method 
    function CompanyInfoUpdate(Request $request)
    {
        $info = Companyinfo::find(1);

        $info->company_name = $request->company_name;
        $info->company_address = $request->company_address;
        $info->company_phone = $request->company_phone;
        $info->company_email = $request->company_email;
        $info->company_logo = $request->company_logo;



        // for photo 
        if ($request->company_logo) {
            if (File::exists($request->old_logo)) {
                unlink($request->old_logo);
            }
            $slug = uniqid();
            $manager = new ImageManager(new Driver());
            $photo = $request->company_logo;
            $photo_name = $slug . "." . $photo->getClientOriginalExtension();
            $photo_read = $manager->read($photo);
            $photo_resize = $photo_read->resize(200, 200)->save('files/logo/' . $photo_name);
            $info->company_logo = 'files/logo/' . $photo_name;
        } else {
            $info->company_logo = $request->old_logo;
        }

        $info->save();

        $notification = array('message' => 'Company Info Updated', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }
}
