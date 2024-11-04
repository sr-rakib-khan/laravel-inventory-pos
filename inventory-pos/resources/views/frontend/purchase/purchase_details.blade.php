@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Purchase Details</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-sales-split">
                        <h2>Purchase Detail : SL0101</h2>
                    </div>
                    <div class="invoice-box table-height"
                        style="
            max-width: 1600px;
            width: 100%;
            overflow: auto;
            margin: 15px auto;
            padding: 0;
            font-size: 14px;
            line-height: 24px;
            color: #555;
          ">
                        <table cellpadding="0" cellspacing="0"
                            style="width: 100%; line-height: inherit; text-align: left: margin-bottom:50px">
                            <tbody>
                                <tr class="top">
                                    <td colspan="6" style="padding: 5px; vertical-align: top">
                                        <table style="width: 100%; line-height: inherit; text-align: left">
                                            <tbody>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <tr>
                                                            <td><strong>Suppllier</strong></td>
                                                            <td>{{ $purchase->supplier->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Purchase Date</strong></td>
                                                            <td>{{ $purchase->purchase_date }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Invoice No</strong></td>
                                                            <td>{{ $purchase->invoice_number }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Payment Status</strong></td>
                                                            @if ($purchase->payment_status == 0)
                                                                <td><span class="badges bg-lightred">Unpaid</span></td>
                                                            @else
                                                                <td><span class="badges bg-lightgreen">Paid</span></td>
                                                            @endif
                                                        </tr>
                                                    </div>
                                                </div>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr class="heading mt-3" style="background: #f3f2f7">
                                    <td
                                        style="
                    padding: 5px;
                    vertical-align: middle;
                    font-weight: 600;
                    color: #5e5873;
                    font-size: 14px;
                    padding: 10px;
                  ">
                                        Product Name
                                    </td>
                                    <td
                                        style="
                    padding: 5px;
                    vertical-align: middle;
                    font-weight: 600;
                    color: #5e5873;
                    font-size: 14px;
                    padding: 10px;
                  ">
                                        QTY
                                    </td>
                                    <td
                                        style="
                    padding: 5px;
                    vertical-align: middle;
                    font-weight: 600;
                    color: #5e5873;
                    font-size: 14px;
                    padding: 10px;
                  ">
                                        Price
                                    </td>
                                    <td
                                        style="
                    padding: 5px;
                    vertical-align: middle;
                    font-weight: 600;
                    color: #5e5873;
                    font-size: 14px;
                    padding: 10px;
                  ">
                                        Subtotal
                                    </td>
                                </tr>
                                @foreach ($purchase->purchaseitem as $item)
                                    <tr class="details" style="border-bottom: 1px solid #e9ecef">
                                        <td style="padding: 10px; vertical-align: top; display: flex; align-items: center">
                                            @php
                                                $product = DB::table('products')
                                                    ->where('id', $item->product_id)
                                                    ->first();
                                            @endphp
                                            {{ $product->Product_name }}
                                        </td>
                                        <td style="padding: 10px; vertical-align: top">{{ $item->quantity }}</td>
                                        <td style="padding: 10px; vertical-align: top">{{ $item->purchase_price }}</td>
                                        <td style="padding: 10px; vertical-align: top">{{ $item->total_price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6">
                            <div class="total-order w-100 max-widthauto m-auto mb-4">
                                <ul>
                                    <li class="total">
                                        <h4>Grand Total</h4>
                                        <h5>{{$purchase->total_amount}}</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
