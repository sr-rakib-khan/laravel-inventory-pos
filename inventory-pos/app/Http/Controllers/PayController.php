<?php

namespace App\Http\Controllers;

use App\Models\Payhistory;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }


    function CreatePay($id)
    {
        $purchase_info = DB::table('purchases')->where('id', $id)->first();
        return view('frontend.pay.pay_supplier', compact('purchase_info'));
    }


    function PayStore(Request $request)
    {
        //update purchase table payment status
        $purchase = Purchase::find($request->purchase_id);
        $purchase->payment_status = 1;
        $purchase->save();

        // update supplier table total_due and total_pay
        $supplier = Supplier::find($request->supplier_id);
        $supplier->total_paid += $request->amount;
        $supplier->total_due -= $request->amount;
        $supplier->save();


        //inset data in payhistory table
        $pay = new Payhistory();
        $pay->suppllier_id = $request->supplier_id;
        $pay->purchase_id = $request->purchase_id;
        $pay->invoice_no = $request->invoice_no;
        $pay->pay_amount = $request->amount;
        $pay->date = date('d-m-Y', strtotime($request->date));

        $pay->save();

        $notification = array('message' => 'Pay Successfully', 'alert-type' => 'success');

        return redirect()->route('purchase.list')->with($notification);
    }
}
