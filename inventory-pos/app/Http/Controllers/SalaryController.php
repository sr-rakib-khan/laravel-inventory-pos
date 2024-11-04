<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function CreateAdvancedSalary()
    {
        $employe = Employe::all();
        return view('frontend.salary.add_advanced_salary', compact('employe'));
    }

    function AddSAdvancedSalary(Request $request)
    {
        $employe = $request->employe_id;
        $month = $request->month;

        $advanced = DB::table('advanced_salaries')->where('employe_id', $employe)->where('month', $month)->first();

        if ($advanced === NULL) {
            $advanced_salary = array();
            $advanced_salary['employe_id'] = $request->employe_id;
            $advanced_salary['month'] = $request->month;
            $advanced_salary['year'] = $request->year;
            $advanced_salary['advanced_salary'] = $request->advanced_salary;
            $advanced_salary['description'] = $request->description;

            DB::table('advanced_salaries')->insert($advanced_salary);

            $notification = array('message' => 'Advanced salary Inserted', 'alert-type' => 'success');

            return redirect()->back()->with($notification);
        } else {
            $notification = array('message' => 'Oopss! Advanced paid in this month', 'alert-type' => 'error');

            return redirect()->back()->with($notification);
        }
    }

    function AllAdvancedSalary(Request $request)
    {

        $advanced_salary =  DB::table('employes')->join('advanced_salaries', 'employes.id', 'advanced_salaries.employe_id');

        if ($request->has('name') && !empty($request->name)) {
            $advanced_salary->where('employes.name', 'LIKE', '%' . $request->name . '%')->select('advanced_salaries.*', 'employes.name', 'employes.photo');
        }


        if ($request->has('month') && !empty($request->month)) {
            $advanced_salary->where('advanced_salaries.month', 'LIKE', '%' . $request->month . '%')->select('advanced_salaries.*', 'employes.name', 'employes.photo');
        }

        $result = $advanced_salary->get();

        if ($request->has('name') || $request->has('month')) {
            return response()->json($result);
        }


        return view('frontend.salary.all_advanced_salary', compact('result'));
    }



    function DetailsAdvancedSalary($id)
    {
        $advanced_salary = DB::table('employes')->join('advanced_salaries', 'employes.id', 'advanced_salaries.employe_id')->where('advanced_salaries.id', $id)->select('advanced_salaries.*', 'employes.name', 'employes.photo')->first();

        return view('frontend.salary.advanced_salary_details', compact('advanced_salary'));
    }


    function AdvancedSalaryEdit($id)
    {
        $advanced_salary = DB::table('employes')->join('advanced_salaries', 'employes.id', 'advanced_salaries.employe_id')->where('advanced_salaries.id', $id)->select('advanced_salaries.*', 'employes.name', 'employes.photo')->first();

        $employe = DB::table('employes')->get();

        return view('frontend.salary.edit_advanced_salary', compact('advanced_salary', 'employe'));
    }

    function AdvancedSalaryUpdate(Request $request)
    {
        $employe = $request->employe_id;
        $month = $request->month;

        $advanced = DB::table('advanced_salaries')->where('employe_id', $employe)->where('month', $month)->first();

        if ($advanced === NULL) {
            $advanced_salary = array();
            $advanced_salary['employe_id'] = $request->employe_id;
            $advanced_salary['month'] = $request->month;
            $advanced_salary['year'] = $request->year;
            $advanced_salary['advanced_salary'] = $request->advanced_salary;
            $advanced_salary['description'] = $request->description;

            DB::table('advanced_salaries')->where('id', $request->id)->update($advanced_salary);

            $notification = array('message' => 'Advanced salary Updated', 'alert-type' => 'success');

            return redirect()->back()->with($notification);
        } else {
            $notification = array('message' => 'Oopss! Advanced paid in this month', 'alert-type' => 'error');

            return redirect()->back()->with($notification);
        }
    }

    function AdvancedSalaryDelete($id)
    {
        DB::table('advanced_salaries')->where('id', $id)->delete();
        $notification = array('message' => 'Advanced salary Deleted', 'alert-type' => 'error');

        return redirect()->back()->with($notification);
    }


    // create pay salary mehtod 
    function PaySalary()
    {
        return view('frontend.salary.pay_salary');
    }
}
