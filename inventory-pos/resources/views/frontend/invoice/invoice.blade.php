@extends('layouts.frontend_app')
@section('page-content')

    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Sale Details</h4>
                    <h6>View sale details</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-sales-split">
                        <h2>Sale Detail : SL0101</h2>
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
                        <table cellpadding="0" cellspacing="0" style="width: 100%; line-height: inherit; text-align: left">
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
                                                                @if ($customer !== 0)
                                                                    {{ $customer->name }}
                                                                @else
                                                                    Walk-in Customer
                                                                @endif
                                                            </font>
                                                        </font><br />
                                                        <font style="vertical-align: inherit">
                                                            <font
                                                                style="vertical-align: inherit; font-size: 14px; color: #000; font-weight: 400">
                                                                <strong>Email:</strong>
                                                                <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                                    data-cfemail="3a4d5b565117535417594f494e55575f487a5f425b574a565f14595557">
                                                                    @if ($customer !== 0)
                                                                        {{ $customer->email }}
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
                                                                @if ($customer !== 0)
                                                                    {{ $customer->phone }}
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </font>
                                                        </font><br />
                                                        <font style="vertical-align: inherit">
                                                            <font
                                                                style="vertical-align: inherit; font-size: 14px; color: #000; font-weight: 400">
                                                                <strong>Address:</strong>
                                                                @if ($customer !== 0)
                                                                    {{ $customer->address }}
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
                                                                <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
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
                                    $items = Cart::getContent();
                                @endphp

                                @foreach ($items as $item)
                                    <tr class="details" style="border-bottom: 1px solid #e9ecef">
                                        <td style="padding: 10px; vertical-align: top; display: flex; align-items: center">
                                            {{ $item->name }}
                                        </td>
                                        <td style="padding: 10px; vertical-align: top">{{ $item->quantity }}</td>
                                        <td style="padding: 10px; vertical-align: top">{{ $item->price }}</td>
                                        <td style="padding: 10px; vertical-align: top">
                                            {{ $item->price * $item->quantity }}.00</td>
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
                                    @php
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

                                    @endphp
                                    <li>
                                        <h4>Tax <span class="text-danger">({{ $tax }}%)</span></h4>
                                        <h5>{{ $taxamount }}</h5>
                                    </li>
                                    <li>
                                        <h4>Discount <span class="text-danger">({{ $discount }}%)</span></h4>
                                        <h5>{{ $discountamount }}</h5>
                                    </li>
                                    <li class="total">
                                        <h4>Grand Total</h4>
                                        <h5>{{ $total }}</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('create.invoice') }}" method="post">
                        @csrf
                        <input type="hidden" name="customer_id"
                            value="@if ($customer !== 0) {{ $customer->id }}
                                                                @else
                                                                    0 @endif">
                        <div class="row mt-5">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Paying Amount</label>
                                    <input name="paying_amount" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Due</label>
                                    <input name="due" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Payment</label>
                                    <select name="payment" class="form-select form-control">
                                        <option disabled selected>Choose Payment</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Due">Due</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Create Invoice</button>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    {{-- ajax cdn link  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
