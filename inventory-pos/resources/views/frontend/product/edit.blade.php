@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Product Edit</h4>
                    <h6>Update your product</h6>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('update.product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="old_photo" value="{{ $product->photo }}">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" value="{{ $product->Product_name }}" name="product_name" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control form-select">
                                        <option disabled selected>Choose Category</option>
                                        @foreach ($category as $row)
                                            <option @if ($product->category_id == $row->id) selected @endif
                                                value="{{ $row->id }}">{{ $row->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select name="brand_id" class="form-control form-select">
                                        <option disabled selected>Choose Brand</option>
                                        @foreach ($brand as $row)
                                            <option @if ($product->brand_id == $row->id) selected @endif
                                                value="{{ $row->id }}">{{ $row->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Unit</label>
                                    <select name="unit" class="form-control form-select">
                                        <option disabled selected>Choose Unit</option>
                                        @foreach ($unit as $row)
                                            <option @if ($product->unit == $row->unit) selected @endif
                                                value="{{ $row->unit }}">{{ $row->unit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Warehouse Location</label>
                                    <select name="warehouse" class="form-select form-control">
                                        <option disabled selected>Chose Warehouse</option>
                                        @foreach ($warehouse as $row)
                                            <option @if ($product->warehouse == $row->warehouse_name) selected @endif
                                                value="{{ $row->warehouse_name }}">{{ $row->warehouse_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Product Storage Spot</label>
                                    <select name="storage_spot" class="form-control form-select">
                                        <option disabled selected>Choose Storage</option>
                                        @foreach ($spot as $row)
                                            <option @if ($product->storage_spot == $row->spot) selected @endif
                                                value="{{ $row->spot }}">{{ $row->spot }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Minimum Qty</label>
                                    <input name="min_qty" value="{{ $product->min_qty }}" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input name="qty" value="{{ $product->qty }}" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Reorder Level</label>
                                    <input name="reorder_lavel" value="{{ $product->reorder_lavel }}" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Supplier Name</label>
                                    <select name="supplier" class="form-select form-control">
                                        <option disabled selected>Select Supplier</option>
                                        @foreach ($supplier as $item)
                                            <option @if ($product->supplier == $item->name) selected @endif
                                                value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Purchase Price</label>
                                    <input name="purchase_price" value="{{ $product->purchase_price }}" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Selling Price</label>
                                    <input name="selling_price" value="{{ $product->selling_price }}" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label> Status</label>
                                    <select name="status" class="form-select form-control">
                                        <option @if ($product->status == 1) selected @endif value="1">Avialble
                                        </option>
                                        <option @if ($product->status == 0) selected @endif value="0">Unavialble
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Product Image</label>
                                    <img width="60px" src="{{ asset($product->photo) }}" alt="">
                                    <div class="image-upload">
                                        <input name="photo" type="file" />
                                        <div class="image-uploads">
                                            <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img" />
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
