@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Product Details</h4>
                    <h6>Full details of a product</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="productdetails">
                                <ul class="product-bar">
                                    <li>
                                        <h4><strong>Product name</strong></h4>
                                        <h6>{{ $product->Product_name }}</h6>
                                    </li>
                                    <li>
                                        <h4><strong>Category</strong></h4>
                                        <h6>{{ $product->category->category_name }}</h6>
                                    </li>
                                    <li>
                                        <h4><strong>Brand</strong></h4>
                                        <h6>{{ $product->brand->brand_name }}</h6>
                                    </li>
                                    <li>
                                        <h4><strong>Unit</strong></h4>
                                        <h6>{{ $product->unit }}</h6>
                                    </li>
                                    <li>
                                        <h4><strong>SKU</strong></h4>
                                        <h6>{{ $product->sku }}</h6>
                                    </li>
                                    <li>
                                        <h4><strong>Minimum Qty</strong></h4>
                                        <h6>{{ $product->min_qty }}</h6>
                                    </li>
                                    <li>
                                        <h4><strong>Quantity</strong></h4>
                                        <h6>{{ $product->qty }}</h6>
                                    </li>
                                    <li>
                                        <h4><strong>Purchase Price</strong></h4>
                                        <h6>{{ $product->purchase_price }}</h6>
                                    </li>
                                    <li>
                                        <h4><strong>Selling Price</strong></h4>
                                        <h6>{{ $product->selling_price }}</h6>
                                    </li>
                                    <li>
                                        <h4><strong>Status</strong></h4>
                                        @if ($product->status == 1)
                                            <h6>Available</h6>
                                        @else
                                            <h6>Unavailable</h6>
                                        @endif

                                    </li>
                                    <li>
                                        <h4><strong>Description</strong></h4>
                                        <h6>{{ $product->description }}</h6>
                                    </li>
                                    <li>
                                        <h4><strong>Supplier</strong></h4>
                                        <h6>{{ $product->supplier }}</h6>
                                    </li>
                                    <li>
                                        <h4><strong>Warehouse</strong></h4>
                                        <h6>{{ $product->warehouse }}</h6>
                                    </li>
                                    <li>
                                        <h4><strong>Storage Spot</strong></h4>
                                        <h6>{{ $product->storage_spot }}</h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="slider-product-details">
                                <div class="owl-carousel owl-theme product-slide">
                                    <div class="slider-product">
                                        <img width="300px" src="{{ asset($product->photo) }}" alt="img" />
                                        <h4>{{ $product->Product_name }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
