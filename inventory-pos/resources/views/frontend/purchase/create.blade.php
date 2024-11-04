@extends('layouts.frontend_app')
@section('page-content')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" />
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Purchase Add</h4>
                    <h6>Add/Update Purchase</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('purchase.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="supplier">Supplier</label>
                                <select name="supplier_id" class="form-select form-control form-small select2">
                                    <option disabled selected="selected">Select Supplier</option>
                                    @foreach ($supplier as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="purchase_date">Purchase Date</label>
                                <input name="purchase_date" id="purchase_date" class="form-control" type="date">
                            </div>
                            <div class="col-md-4">
                                <label for="purchase_date">Invoice Number</label>
                                <input name="invoice_no" id="purchase_date" class="form-control" type="text">
                            </div>
                        </div>

                        <div id="purchase-items" class="mt-5">
                            <div class="purchase-item">
                                <div class="row">
                                    <h3 class="border-bottom mb-3"></h3>
                                    <div class="col-md-4 col-sm-1 col-lg-4">
                                        <label for="product_name_0">Product Name</label>
                                        <select name="items[0][product_id]" id="product_name_0"
                                            class="form-select form-control form-small select2">
                                            <option disabled selected="selected">Select Product</option>
                                            @foreach ($product as $item)
                                                <option value="{{ $item->id }}">{{ $item->Product_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-1 col-lg-4">
                                        <label for="quantity_0">Quantity</label>
                                        <input name="items[0][quantity]" id="quantity_0" class="form-control"
                                            type="number">
                                    </div>
                                    <div class="col-md-4 col-sm-1 col-lg-4">
                                        <label for="price_0">Price</label>
                                        <input name="items[0][price]" id="price_0" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary me-2" onclick="addPurchaseItem()">Add More
                            Items</button>
                        <button type="submit" class="btn btn-success me-2">Purchase</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert/dist/sweetalert.min.js') }}"></script>



    <script>
        let itemIndex = 1;

        function addPurchaseItem() {
            let newItem = document.createElement('div');
            newItem.className = 'purchase-item mb-3';

            newItem.innerHTML = `
        <div class="row">
            <h3 class="border-bottom mb-3"></h3>
            <div class="col-md-4 col-sm-1 col-lg-4">
                <label for="product_name_${itemIndex}">Product Name</label>
                <select name="items[${itemIndex}][product_id]" id="product_name_${itemIndex}" class="form-select form-control form-small select2">
                    <option disabled selected="selected">Select Product</option>
                    @foreach ($product as $item)
                        <option value="{{ $item->id }}">{{ $item->Product_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 col-sm-1 col-lg-4">
                <label for="quantity_${itemIndex}">Quantity</label>
                <input name="items[${itemIndex}][quantity]" id="quantity_${itemIndex}" class="form-control" type="text">
            </div>
            <div class="col-md-4 col-sm-1 col-lg-4">
                <label for="price_${itemIndex}">Price</label>
                <input name="items[${itemIndex}][price]" id="price_${itemIndex}" class="form-control" type="text">
            </div>
        </div>
    `;

            document.getElementById('purchase-items').appendChild(newItem);
            itemIndex++;

            // Reinitialize Select2 for new elements
            initializeSelect2();
        }

        function initializeSelect2() {
            $('.select2').select2({
                tags: true
            });
        }

        // Initialize Select2 for existing elements on page load
        $(document).ready(function() {
            initializeSelect2();
        });
    </script>
@endsection
