<?php

namespace App\Http\Controllers;

use App\Models\Cartinfo;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Invoiceitem;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SalesDetail;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Auth;

class PosController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }


    function PosIndex()
    {
        $categories = Category::where('status', 1)->get();
        $products = Product::with(['category'])->get();
        // $customer = Customer::where('status', 1)->get();
        return view('frontend.pos.pos_index', compact('categories', 'products'));
    }

    // cart add method 
    function AddtoCart($id)
    {
        $item = Product::find($id);

        $qty = 1;

        $cartcheck = Cart::get($id);

        if ($cartcheck) {
            Cart::update($id, array(
                'quantity' => 1,
            ));
            return response()->json('Cart Added');
        } else {
            Cart::add(array(
                'id' => $id,
                'name' => $item->Product_name,
                'price' => $item->selling_price,
                'quantity' => $qty,
                'attributes' => array(
                    'sku' => $item->sku,
                    'image' => $item->photo,
                    'tax' => 0,
                    'discount' => 0,
                    'shipping' => 0,
                )
            ));
            return response()->json('Cart Added');
        }
    }


    // cart update method 
    function QtyUpdate(Request $request)
    {
        $itemId = $request->input('item_id');
        $quantity = $request->input('quantity');

        if ($request->quantity < 1) {
            Cart::update($itemId, [
                'quantity' => [
                    'relative' => false,
                    'value' => 1
                ],
            ]);
            return response()->json('Cart Updated');
        } else {
            Cart::update($itemId, [
                'quantity' => [
                    'relative' => false,
                    'value' => $quantity
                ],
            ]);
            return response()->json('Cart Updated');
        }
    }


    // update tax 
    function TaxAdd(Request $request)
    {
        $items = Cart::getContent();

        foreach ($items as $item) {
            Cart::update($item->id, [
                'attributes' => array_merge($item->attributes->toArray(), [
                    'tax' => $request->tax,
                ])
            ]);
        }

        // return response()->json('Tax Added');
    }

    // update discount 
    function DiscountAdd(Request $request)
    {

        $items = Cart::getContent();

        foreach ($items as $item) {
            Cart::update($item->id, [
                'attributes' => array_merge($item->attributes->toArray(), [
                    'discount' => $request->discount,
                ])
            ]);
        }

        // return response()->json('Discount Added');
    }

    // cart delete method 
    function CartDelete($id)
    {
        Cart::remove($id);

        return response()->json('Removed Item');
    }


    //cart clear
    function CartClear()
    {
        Cart::clear();
        return response()->json('All Item Removed');
    }


    //check out function
    function Checkout(Request $request)
    {
        $id = $request->customer_id;
        $customer = 0;
        if ($id == 0) {
            $customer;
        } else {
            $customer = Customer::find($id);
        }


        return view('frontend.invoice.invoice', compact('customer'));
    }



    function CreateInvone(Request $request)
    {
        $validated = $request->validate([
            'paying_amount' => 'required',
        ]);
        $prefix = 'SNO';
        $suffix = str_pad(Sale::count() + 1, 4, '0', STR_PAD_LEFT);

        // Cart info 
        $tax = 0;
        $taxamount = 0;
        $discount = 0;
        $discountamount = 0;
        $cartItems = Cart::getContent();
        $firstItem = $cartItems->first();

        if ($firstItem) {
            $tax = $firstItem->attributes->tax ?? 0;
            $discount = $firstItem->attributes->discount ?? 0;

            $taxamount = Cart::getTotal() * ($tax / 100);
            $discountamount = Cart::getTotal() * ($discount / 100);

            // Initialize total with the cart total
            $total = Cart::getTotal();

            // Add tax if applicable
            if ($tax > 0) {
                $total += $taxamount;
            }

            // Add discount if applicable
            if ($discount > 0) {
                $total -= $discountamount;
            }
        } else {
            // Handle case when cart is empty
            $total = Cart::getTotal();
        }

        $sale = new Sale();
        $sale->customer_id = $request->customer_id;
        $sale->reference = $prefix . '-' . $suffix;
        $sale->payment = $request->payment;
        $sale->total = $total;
        $sale->paid = $request->paying_amount;
        $sale->due = $request->due;
        $sale->tax = $tax;
        $sale->discount = $discount;
        $sale->biller =  Auth::user()->name;
        $sale->date = date('d-m-Y');
        $sale->save();

        $sale_last_id = $sale->id;

        // insert sale details in salesdetails table 
        foreach ($cartItems  as $item) {
            $sale_details = new SalesDetail();

            $sale_details->sale_id = $sale_last_id;
            $sale_details->product_id = $item->id;
            $sale_details->qty = $item->quantity;
            $sale_details->price = $item->price;
            $sale_details->subtotal = $item->price * $item->quantity;
            $sale_details->tax = $tax;
            $sale_details->discount = $discount;
            $sale_details->total = $total;

            $sale_details->save();


            // product stock update 

            $product = Product::find($item->id);
            if ($product) {
                $product->qty -= $item->quantity;
                $product->save();
            }
        }


        //customer info 
        $customer_info = 0;

        if ($request->customer_id == 0) {
            $customer_info = 0;
        } else {
            $customer_info = Customer::find($request->customer_id);
        }


        //insert cart info in cartinfo table

        $cartinfo = new Cartinfo();
        $cartinfo->sale_id = $sale_last_id;
        $cartinfo->reference = $prefix . '-' . $suffix;
        $cartinfo->payment_status = $request->payment;
        $cartinfo->tax = $tax;
        $cartinfo->tax_amount = $taxamount;
        $cartinfo->discount = $discount;
        $cartinfo->discount_amount = $discountamount;
        if ($request->due) {
            $cartinfo->due = $request->due;
        } else {
            $cartinfo->due = 00;
        }
        $cartinfo->total =  $total;
        $cartinfo->save();


        //invoice and invoice item info for invoice print page 

        $invoice = new Invoice();
        $invoice->total_amount = $total;
        $invoice->save();



        $invoice->deletePreviousItems(); //delete previous items

        $invoice_id = $invoice->id;
        foreach ($cartItems  as $item) {
            $invoiceItem = new Invoiceitem();
            $invoiceItem->invoice_id = $invoice->id;
            $invoiceItem->product_name = $item->name;
            $invoiceItem->qty = $item->quantity;
            $invoiceItem->price = $item->price;
            $invoiceItem->subtotal = $item->quantity * $item->price;
            $invoiceItem->save();
        }


        // cart clear 
        Cart::clear();
        return view('frontend.invoice.print_invoice', compact('customer_info', 'invoice_id'));
    }
}
