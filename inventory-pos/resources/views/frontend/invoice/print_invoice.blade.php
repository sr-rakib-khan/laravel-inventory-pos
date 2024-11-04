@extends('layouts.frontend_app')
@section('page-content')
    <style type="text/css" media="print">
        .page-wrapper {
            display: none;
        }

        #printableArea {
            display: block;
        }
    </style>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                @php
                    $cartinfo = DB::table('cartinfos')->latest()->first();
                @endphp
                <div class="page-title">
                    <h4>Customer Invoice</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-sales-split">
                        <h2><strong>Sale Details: </strong>{{ $cartinfo->reference }}</h2>
                        <ul>
                            <li>
                                <a id="printbutton"><img src="{{ asset('assets/img/icons/printer.svg') }}"
                                        alt="img" /></a>
                            </li>
                        </ul>
                    </div>
                    <div id="printableArea">
                        <div class="invoice-box table-height"
                            style="max-width: 1600px;
                  width: 100%;
                  overflow: auto;
                  margin: 15px auto;
                  padding: 0;
                  font-size: 14px;
                  line-height: 24px;
                  color: #555;
                ">
                            <table cellpadding="0" cellspacing="0"
                                style="width: 100%; line-height: inherit; text-align: left">
                                <tbody>

                                    <tr class="top">
                                        <td colspan="6" style="padding: 5px; vertical-align: top">
                                            <table style="width: 100%; line-height: inherit; text-align: left">
                                                <tbody>
                                                    <tr>
                                                        <td
                                                            style="padding: 5px; vertical-align: top; text-align: left; padding-bottom: 20px">
                                                            <font style="vertical-align: inherit; margin-bottom: 25px">
                                                                <font
                                                                    style="
                                      vertical-align: inherit;
                                      font-size: 14px;
                                      color: #7367f0;
                                      font-weight: 600;
                                      line-height: 35px;
                                    ">
                                                                    Customer Info</font>
                                                            </font><br />
                                                            <font style="vertical-align: inherit">
                                                                <font
                                                                    style="vertical-align: inherit; font-size: 14px; color: #000; font-weight: 400">
                                                                    <strong>Name:</strong>
                                                                    @if ($customer_info !== 0)
                                                                        {{ $customer_info->name }}
                                                                    @else
                                                                        Walk-in Customer
                                                                    @endif
                                                                </font>
                                                            </font><br />
                                                            <font style="vertical-align: inherit">
                                                                <font
                                                                    style="vertical-align: inherit; font-size: 14px; color: #000; font-weight: 400">
                                                                    <strong>Email:</strong>
                                                                    <a href="/cdn-cgi/l/email-protection"
                                                                        class="__cf_email__"
                                                                        data-cfemail="3a4d5b565117535417594f494e55575f487a5f425b574a565f14595557">
                                                                        @if ($customer_info !== 0)
                                                                            {{ $customer_info->email }}
                                                                        @else
                                                                            N/A
                                                                        @endif
                                                                    </a>
                                                                </font>
                                                            </font><br />
                                                            <font style="vertical-align: inherit">
                                                                <font
                                                                    style="vertical-align: inherit; font-size: 14px; color: #000; font-weight: 400">
                                                                    <strong>Phone:</strong>
                                                                    @if ($customer_info !== 0)
                                                                        {{ $customer_info->phone }}
                                                                    @else
                                                                        N/A
                                                                    @endif
                                                                </font>
                                                            </font><br />
                                                            <font style="vertical-align: inherit">
                                                                <font
                                                                    style="vertical-align: inherit; font-size: 14px; color: #000; font-weight: 400">
                                                                    <strong>Address:</strong>
                                                                    @if ($customer_info !== 0)
                                                                        {{ $customer_info->address }}
                                                                    @else
                                                                        N/A
                                                                    @endif
                                                                </font>
                                                            </font><br />
                                                        </td>
                                                        <td
                                                            style="padding: 5px; vertical-align: top; text-align: left; padding-bottom: 20px">
                                                            <font style="vertical-align: inherit; margin-bottom: 25px">
                                                                <font
                                                                    style="
                                      vertical-align: inherit;
                                      font-size: 14px;
                                      color: #7367f0;
                                      font-weight: 600;
                                      line-height: 35px;
                                    ">
                                                                    Company Info</font>
                                                            </font><br />
                                                            <font style="vertical-align: inherit">
                                                                <font
                                                                    style="vertical-align: inherit; font-size: 14px; color: #000; font-weight: 400">
                                                                    S.R Traders
                                                                </font>
                                                            </font><br />
                                                            <font style="vertical-align: inherit">
                                                                <strong>Email:</strong>
                                                                <font
                                                                    style="vertical-align: inherit; font-size: 14px; color: #000; font-weight: 400">
                                                                    <a href="/cdn-cgi/l/email-protection"
                                                                        class="__cf_email__"
                                                                        data-cfemail="9ffefbf2f6f1dffae7fef2eff3fab1fcf0f2">srrakibkhan4@gmail.com</a>
                                                                </font>
                                                            </font><br />
                                                            <font style="vertical-align: inherit">
                                                                <strong>Phone:</strong>
                                                                <font
                                                                    style="vertical-align: inherit; font-size: 14px; color: #000; font-weight: 400">
                                                                    01749436376</font>
                                                            </font><br />
                                                            <font style="vertical-align: inherit">
                                                                <strong>Address:</strong>
                                                                <font
                                                                    style="vertical-align: inherit; font-size: 14px; color: #000; font-weight: 400">
                                                                    Baligram, Bakergonj, Barishal</font>
                                                            </font><br />
                                                        </td>

                                                        <td
                                                            style="padding: 5px; vertical-align: top; text-align: left; padding-bottom: 20px">
                                                            <font style="vertical-align: inherit; margin-bottom: 25px">
                                                                <font
                                                                    style="
                                                              vertical-align: inherit;
                                                              font-size: 14px;
                                                              color: #7367f0;
                                                              font-weight: 600;
                                                              line-height: 35px;
                                                            ">
                                                                    Invoice Info</font>
                                                            </font><br />
                                                            <font style="vertical-align: inherit">
                                                                <font
                                                                    style="vertical-align: inherit; font-size: 14px; color: #000; font-weight: 400">
                                                                    Reference
                                                                </font>
                                                            </font><br />
                                                            <font style="vertical-align: inherit">
                                                                <font
                                                                    style="vertical-align: inherit; font-size: 14px; color: #000; font-weight: 400">
                                                                    Payment Status</font>
                                                            </font><br />
                                                        </td>
                                                        <td
                                                            style="padding: 5px; vertical-align: top; text-align: right; padding-bottom: 20px">
                                                            <font style="vertical-align: inherit; margin-bottom: 25px">
                                                                <font
                                                                    style="
                                                              vertical-align: inherit;
                                                              font-size: 14px;
                                                              color: #7367f0;
                                                              font-weight: 600;
                                                              line-height: 35px;
                                                            ">
                                                                    &nbsp;</font>
                                                            </font><br />
                                                            <font style="vertical-align: inherit">
                                                                <font
                                                                    style="vertical-align: inherit; font-size: 14px; color: #000; font-weight: 400">
                                                                    {{ $cartinfo->reference }}
                                                                </font>
                                                            </font><br />
                                                            <font style="vertical-align: inherit">
                                                                <font
                                                                    style="vertical-align: inherit; font-size: 14px; color: #2e7d32; font-weight: 400">
                                                                    {{ $cartinfo->payment_status }}</font>
                                                            </font><br />
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr class="heading" style="background: #f3f2f7">
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
                                    @php
                                        $items = DB::table('invoiceitems')
                                            ->join('invoices', 'invoiceitems.invoice_id', 'invoices.id')
                                            ->where('invoiceitems.invoice_id', $invoice_id)
                                            ->get();
                                    @endphp

                                    @foreach ($items as $item)
                                        <tr class="details" style="border-bottom: 1px solid #e9ecef">
                                            <td
                                                style="padding: 10px; vertical-align: top; display: flex; align-items: center">
                                                {{ $item->product_name }}
                                            </td>
                                            <td style="padding: 10px; vertical-align: top">{{ $item->qty }}</td>
                                            <td style="padding: 10px; vertical-align: top">{{ $item->price }}</td>
                                            <td style="padding: 10px; vertical-align: top">
                                                {{ $item->price * $item->qty }}.00</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            </div>
                            <div id="count" class="col-lg-6">
                                <div class="total-order w-100 max-widthauto m-auto mb-4">
                                    <ul>
                                        <li>
                                            <h4>Tax <span class="text-danger">({{ $cartinfo->tax }}%)</span></h4>
                                            <h5>{{ $cartinfo->tax_amount }}</h5>
                                        </li>
                                        <li>
                                            <h4>Discount <span class="text-danger">({{ $cartinfo->discount }}%)</span></h4>
                                            <h5>{{ $cartinfo->discount_amount }}</h5>
                                        </li>
                                        <li>
                                            <h4>Due</h4>
                                            <h5>{{ $cartinfo->due }}</h5>
                                        </li>
                                        <li class="total">
                                            <h4>Grand Total</h4>
                                            <h5>{{ $cartinfo->total }}</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="signature">
                                        <p>______________________</p>
                                        <p>Customer Signature</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 text-right">
                                    <div class="signature">
                                        <p>______________________</p>
                                        <p>Author Signature</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- ajax cdn link  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        $(document).ready(function() {
            $('#printbutton').click(function() {
                var printContents = $('#printableArea').html();
                var originalContents = $('.page-wrapper').html();

                $('body').html(printContents);

                window.print();

                window.onafterprint = function() {
                    $('body').html(originalContents);
                };
            });
        });
    </script>
@endsection
