@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Supplier Details</h4>
                    <h6>Full details of a Supplier</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="productdetails">
                                <ul class="product-bar">
                                    <li>
                                        <h4>Supplier Name</h4>
                                        <h6>{{ $supplier->name }}</h6>
                                    </li>
                                    <li>
                                        <h4>Supplier Email</h4>
                                        <h6>{{ $supplier->email }}</h6>
                                    </li>
                                    <li>
                                        <h4>Supplier Phone</h4>
                                        <h6>{{ $supplier->phone }}</h6>
                                    </li>
                                    <li>
                                        <h4>Supplier City</h4>
                                        <h6>{{ $supplier->city }}</h6>
                                    </li>
                                    <li>
                                        <h4>Supplier Company Name</h4>
                                        <h6>{{ $supplier->company_name }}</h6>
                                    </li>
                                    <li>
                                        <h4>Supplier Bank Name</h4>
                                        <h6>{{ $supplier->bank_name }}</h6>
                                    </li>
                                    <li>
                                        <h4>Supplier Account Holder Name</h4>
                                        <h6>{{ $supplier->account_holder }}</h6>
                                    </li>
                                    <li>
                                        <h4>Supplier Account Number</h4>
                                        <h6>{{ $supplier->account_no }}</h6>
                                    </li>
                                    <li>
                                        <h4>Supplier Brance Name</h4>
                                        <h6>{{ $supplier->brance_name }}</h6>
                                    </li>
                                    <li>
                                        <h4>Supplier Routing Number</h4>
                                        <h6>{{ $supplier->routing_no }}</h6>
                                    </li>
                                    <li>
                                        <h4>Status</h4>
                                        <h6>{{ $supplier->status }}</h6>
                                    </li>
                                    <li>
                                        <h4>Supplier Photo</h4>
                                        <h6><img src="{{ asset($supplier->photo) }}" alt="img/"
                                                srcset=""></h6>
                                    </li>
                                    <li>
                                        <h4>Address</h4>
                                        <h6>{{ $supplier->address }}</h6>
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
