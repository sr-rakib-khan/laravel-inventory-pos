@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Customer Details</h4>
                    <h6>Full details of a Customer</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="productdetails">
                                <ul class="product-bar">
                                    <li>
                                        <h4>Customer Name</h4>
                                        <h6>{{ $customer->name }}</h6>
                                    </li>
                                    <li>
                                        <h4>Customer Email</h4>
                                        <h6>{{ $customer->email }}</h6>
                                    </li>
                                    <li>
                                        <h4>Customer Phone</h4>
                                        <h6>{{ $customer->phone }}</h6>
                                    </li>
                                    <li>
                                        <h4>Customer City</h4>
                                        <h6>{{ $customer->city }}</h6>
                                    </li>
                                    <li>
                                        <h4>Customer Company Name</h4>
                                        <h6>{{ $customer->company_name }}</h6>
                                    </li>
                                    <li>
                                        <h4>Customer Bank Name</h4>
                                        <h6>{{ $customer->bank_name }}</h6>
                                    </li>
                                    <li>
                                        <h4>Customer Account Holder Name</h4>
                                        <h6>{{ $customer->account_holder }}</h6>
                                    </li>
                                    <li>
                                        <h4>Customer Account Number</h4>
                                        <h6>{{ $customer->account_no }}</h6>
                                    </li>
                                    <li>
                                        <h4>Customer Brance Name</h4>
                                        <h6>{{ $customer->brance_name }}</h6>
                                    </li>
                                    <li>
                                        <h4>Customer Routing Number</h4>
                                        <h6>{{ $customer->routing_no }}</h6>
                                    </li>
                                    <li>
                                        <h4>Status</h4>
                                        <h6>{{ $customer->status }}</h6>
                                    </li>
                                    <li>
                                        <h4>Customer Photo</h4>
                                        <h6><img src="{{ asset($customer->photo) }}" alt="img/"
                                                srcset=""></h6>
                                    </li>
                                    <li>
                                        <h4>Address</h4>
                                        <h6>{{ $customer->address }}</h6>
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
