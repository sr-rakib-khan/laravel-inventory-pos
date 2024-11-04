<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\Purchaseitem;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }


    function CreatePurchase()
    {
        $supplier = Supplier::where('status', 1)->get();
        $product = Product::all();
        return view('frontend.purchase.create', compact('supplier', 'product'));
    }


    //purchase store 

    function PurchaseStore(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer',
            'items.*.price' => 'required',
        ]);


        //insert data purchase and purchaseitems table
        $date = 0;

        if ($request->purchase_date) {
            $date = date('d-m-Y', strtotime($request->purchase_date));
        } else {
            $date = date('d-m-Y');
        }


        $purchase = Purchase::create([
            'total_amount' => 0,
            'supplier_id' => $request->supplier_id,
            'invoice_number' => $request->invoice_no,
            'purchase_date' => $date,
        ]);



        $totalAmount = 0;

        foreach ($request->items as $item) {
            $totalPrice = $item['quantity'] * $item['price'];
            $totalAmount += $totalPrice;


            PurchaseItem::create([
                'purchase_id' => $purchase->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'purchase_price' => $item['price'],
                'total_price' => $totalPrice,
            ]);
        }

        $purchase->update([
            'total_amount' => $totalAmount,
        ]);



        //update supplier info
        $supplier = Supplier::find($request->supplier_id);
        $supplier->total_purchase_amount += $totalAmount;
        $supplier->total_due += $totalAmount;
        $supplier->save();


        $notification = array('message' => 'Purchase Successfully', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    //purchaselist mehtod

    function PurchaseList()
    {
        $purchase = Purchase::with('supplier')->get();
        return view('frontend.purchase.purchase_list', compact('purchase'));
    }


    function PurchaseEdit($id)
    {
        $purchase = Purchase::with('purchaseitem')->find($id);
        $supplier = Supplier::all();
        $product = Product::all();

        return view('frontend.purchase.edit', compact('supplier', 'product', 'purchase'));
    }


    function PurchaseUpdate(Request $request)
    {
        // find supplier 
        $purchase = Purchase::find($request->id);

        $totalAmount = 0;

        if ($purchase) {
            // আপডেটের জন্য সমস্ত items সংগ্রহ করুন
            $items = $request->input('items'); // এখানে আপনার request থেকে items আসবে

            foreach ($items as $itemData) {

                $totalPrice = $itemData['quantity'] * $itemData['price'];
                $totalAmount += $totalPrice;
                // item_id থেকে সঠিক item নির্ধারণ করুন
                $item = $purchase->purchaseitem->find($itemData['item_id']);

                if ($item) {
                    // item এর ডাটা আপডেট করুন
                    $item->product_id = $itemData['product_id'];
                    $item->quantity = $itemData['quantity'];
                    $item->purchase_price = $itemData['price'];
                    $item->total_price = $totalPrice;
                    $item->save();
                }
            }
        }

        $purchase->supplier_id = $request->supplier_id;

        if ($request->purchase_date) {
            $purchase->purchase_date = date('d-m-Y', strtotime($request->purchase_date));
        } else {
            $purchase->purchase_date = date('d-m-Y');
        }

        $purchase->invoice_number = $request->invoice_no;
        $purchase->total_amount = $totalAmount;
        $purchase->save();


        $notification = array('message' => 'Purchase Updated', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    function PurchaseDelete($id)
    {


        // at first delete purchase item
        DB::table('purchaseitems')->where('purchase_id', $id)->delete();

        // then delete purchase
        DB::table('purchases')->where('id', $id)->delete();


        $notification = array('message' => 'Purchase Deleted', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    //purchase view details
    function PurchaseView($id)
    {
        $purchase = Purchase::with('purchaseitem')->find($id);
        return view('frontend.purchase.purchase_details', compact('purchase'));
    }
}
