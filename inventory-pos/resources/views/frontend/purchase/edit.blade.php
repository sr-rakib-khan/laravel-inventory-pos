@extends('layouts.frontend_app')
@section('page-content')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" />
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Purchase Edit</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('purchase.update') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{$purchase->id}}" name="id">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="supplier">Supplier</label>
                                <select name="supplier_id" class="form-select form-control form-small select2">
                                    @foreach ($supplier as $row)
                                        <option value="{{ $row->id }}"
                                            {{ $row->id == $purchase->supplier_id ? 'selected' : '' }}>{{ $row->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="purchase_date">Purchase Date</label>
                                <input name="purchase_date" id="purchase_date" class="form-control"
                                    value="{{ $purchase->purchase_date }}" type="date">
                            </div>
                            <div class="col-md-4">
                                <label for="purchase_date">Invoice Number</label>
                                <input name="invoice_no" value="{{ $purchase->invoice_number }}" id="purchase_date"
                                    class="form-control" type="text">
                            </div>
                        </div>

                        <div id="purchase-items" class="mt-5">
                            @foreach ($purchase->purchaseitem as $key => $item)
                            <input type="hidden" value="{{$item->id}}" name="items[0][item_id]">
                                <div class="purchase-item">
                                    <div class="row">
                                        <h3 class="border-bottom mb-3"></h3>
                                        <div class="col-md-4 col-sm-1 col-lg-4">
                                            <label for="product_name_0">Product Name</label>
                                            <select name="items[{{ $key }}][product_id]" id="product_name_0"
                                                class="form-select form-control form-small select2">
                                                @foreach ($product as $row)
                                                    <option value="{{ $row->id }}"
                                                        {{ $row->id == $item->product_id ? 'selected' : '' }}>
                                                        {{ $row->Product_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-1 col-lg-4">
                                            <label for="quantity_0">Quantity</label>
                                            <input value="{{ $item->quantity }}" name="items[0][quantity]" id="quantity_0"
                                                class="form-control" type="number">
                                        </div>
                                        <div class="col-md-4 col-sm-1 col-lg-4">
                                            <label for="price_0">Price</label>
                                            <input value="{{ $item->purchase_price }}" name="items[0][price]"
                                                id="price_0" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-success me-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
