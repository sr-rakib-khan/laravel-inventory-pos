@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 col-sm-12 tabs_wrapper">
                    <div class="page-header">
                        <div class="page-title">
                            <h4>Categories</h4>
                            <h6>Manage your purchases</h6>
                        </div>
                    </div>
                    <ul class="tabs owl-carousel owl-theme owl-product border-0">
                        @foreach ($categories as $item)
                            <li class="{{ $item->id == 1 ? 'active' : '' }}" id="{{ $item->category_name }}">
                                <div class="product-details">
                                    <img src="{{ asset($item->photo) }}" alt="img" />
                                    <h6>{{ $item->category_name }}</h6>
                                </div>
                            </li>
                        @endforeach


                    </ul>
                    <div class="tabs_container">
                        @foreach ($categories as $item)
                            <div class="{{ $item->id == 1 ? 'tab_content active' : 'tab_content' }}"
                                data-tab="{{ $item->category_name }}">
                                <div class="row">
                                    @php
                                        $product = DB::table('products')
                                            ->join('categories', 'products.category_id', 'categories.id')
                                            ->join('brands', 'products.brand_id', 'brands.id')
                                            ->where('category_id', $item->id)
                                            ->select('products.*', 'categories.category_name', 'brands.brand_name')
                                            ->get();
                                    @endphp
                                    @foreach ($product as $item)
                                        <div class="col-lg-3 col-sm-6 d-flex">
                                            <a id="addcart" href="{{ route('add.cart', $item->id) }}">
                                                <div class="productset flex-fill">
                                                    <div class="productsetimg">
                                                        <img src="{{ asset($item->photo) }}" />
                                                        <h6>Qty: {{ $item->qty }}</h6>
                                                        <div class="check-product">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="productsetcontent">
                                                        <h5>{{ $item->category_name }}</h5>
                                                        <h6><strong class="text-secondary">Brand:
                                                            </strong>{{ $item->brand_name }}</h6>
                                                        <h4>{{ $item->Product_name }}</h4>
                                                        <h6>{{ $item->selling_price }}.00</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-list">
                        <div class="orderid">
                            <h4>Order List</h4>
                            <h5>Transaction id : #65565</h5>
                        </div>
                        <div class="actionproducts">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);" class="deletebg confirm-text"><img
                                            src="{{ asset('assets/img/icons/delete-2.svg') }}" alt="img" /></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"
                                        class="dropset">
                                        <img src="{{ asset('assets/img/icons/ellipise1.svg') }}" alt="img" />
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                        data-popper-placement="bottom-end">
                                        <li>
                                            <a href="#" class="dropdown-item">Action</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-item">Another Action</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-item">Something Elses</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="cart-item" class="card card-order">
                        <form action="{{ route('checkout') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal"
                                            data-bs-target="#addcustomermodal"><i class="fa fa-plus me-2"></i>Add
                                            Customer</a>
                                    </div>
                                    <div class="col-lg-12" id="customerlist">
                                        <div class="select-split">
                                            <div class="select-group w-100">
                                                <select name="customer_id" class="form-select">
                                                    @php
                                                        $customer = DB::table('customers')->where('status', 1)->get();
                                                    @endphp
                                                    <option value="0">Walk-in Customer</option>
                                                    @foreach ($customer as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="select-split">
                                            <div class="select-group w-100">
                                                <select class="select">
                                                    <option>Product</option>
                                                    <option>Barcode</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-end">
                                            <a class="btn btn-scanner-set"><img
                                                    src="{{ asset('assets/img/icons/scanner1.svg') }}" alt="img"
                                                    class="me-2" />Scan bardcode</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="split-card"></div>
                            <div class="card-body pt-0">
                                <div class="totalitem">
                                    <h4>Total items : {{ Cart::getTotalQuantity() }}</h4>
                                    <a id="cart-clear" href="{{ route('cart.clear') }}">Clear all</a>
                                </div>
                                <div id="cart-list" class="product-table">
                                    @php
                                        $items = Cart::getContent();
                                    @endphp

                                    @foreach ($items as $item)
                                        <ul class="product-lists">
                                            <li>
                                                <div class="productimg">
                                                    <div class="productimgs">
                                                        <img src="{{ asset($item->attributes['image']) }}"
                                                            alt="img" />
                                                    </div>
                                                    <div class="productcontet">
                                                        <h4>
                                                            {{ $item->name }}
                                                            <a href="javascript:void(0);" class="ms-2"
                                                                data-bs-toggle="modal" data-bs-target="#edit"><img
                                                                    src="{{ asset('assets/img/icons/edit-5.svg') }}"
                                                                    alt="img" /></a>
                                                        </h4>
                                                        <div class="productlinkset">
                                                            <h5>{{ $item->attributes['sku'] }}</h5>
                                                            <a style="margin-left: 5px;" id="removeitem"
                                                                class="confirm-text"
                                                                href="{{ route('delete.cart', $item->id) }}"><img
                                                                    src="{{ asset('assets/img/icons/delete-2.svg') }}"
                                                                    alt="img" /></a>
                                                        </div>
                                                        <div class="increment-decrement">
                                                            <div class="input-groups">
                                                                <input type="button" value="-"
                                                                    class="button-minus button" />

                                                                <input type="text" name="qty"
                                                                    value="{{ $item->quantity }}" class="quantity-field"
                                                                    data-item-id="{{ $item->id }}" />

                                                                <input type="button" value="+"
                                                                    class="button-plus button" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>{{ $item->price * $item->quantity }}.00</li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                            <div class="split-card"></div>
                            <div class="card-body pt-0 pb-2">
                                <div class="setvalue">
                                    <ul>
                                        <li>
                                            <h5>Subtotal</h5>
                                            <h6>{{ Cart::getSubTotal() }}</h6>
                                        </li>

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
                                            <h5>Tax(%)</h5>
                                            <input id="tax" value="{{ $tax }}"
                                                style="width: 25%; margin-left:30px" type="number">
                                            <h6>{{ $taxamount }}</h6>
                                        </li>
                                        <li>
                                            <h5>Discount(%)</h5>
                                            <input id="discount" value="{{ $discount }}" style="width: 25%"
                                                type="number">
                                            <h6>{{ $discountamount }}</h6>
                                        </li>
                                        <li class="total-value">
                                            <h5>Total</h5>
                                            <h6>{{ $total }}</h6>
                                        </li>
                                    </ul>
                                </div>
                                <button type="submit" class="btn btn-adds">Check Out</button>
                                <div class="btn-pos">
                                    <ul>
                                        <li>
                                            <a class="btn"><img src="{{ asset('assets/img/icons/pause1.svg') }}"
                                                    alt="img" class="me-1" />Hold</a>
                                        </li>
                                        <li>
                                            <a class="btn"><img src="{{ asset('assets/img/icons/edit-6.svg') }}"
                                                    alt="img" class="me-1" />Quotation</a>
                                        </li>
                                        <li>
                                            <a class="btn"><img src="{{ asset('') }}assets/img/icons/trash12.svg"
                                                    alt="img" class="me-1" />Void</a>
                                        </li>
                                        <li>
                                            <a class="btn"><img src="{{ asset('') }}assets/img/icons/wallet1.svg"
                                                    alt="img" class="me-1" />Payment</a>
                                        </li>
                                        <li>
                                            <a class="btn" data-bs-toggle="modal" data-bs-target="#recents"><img
                                                    src="{{ asset('') }}assets/img/icons/transcation.svg"
                                                    alt="img" class="me-1" /> Transaction</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="calculator" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Define Quantity</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="calculator-set">
                        <div class="calculatortotal">
                            <h4>0</h4>
                        </div>
                        <ul>
                            <li>
                                <a href="javascript:void(0);">1</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">2</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">3</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">4</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">5</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">6</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">7</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">8</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">9</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-closes"><img
                                        src="{{ asset('') }}assets/img/icons/close-circle.svg" alt="img" /></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">0</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-reverse"><img
                                        src="{{ asset('') }}assets/img/icons/reverse.svg" alt="img" /></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="holdsales" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hold order</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="hold-order">
                        <h2>4500.00</h2>
                    </div>
                    <div class="form-group">
                        <label>Order Reference</label>
                        <input type="text" />
                    </div>
                    <div class="para-set">
                        <p>
                            The current order will be set on hold. You can retreive this order from the pending order
                            button.
                            Providing a reference to it might help you to identify the order more quickly.
                        </p>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2">Submit</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Order</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="text" value="20" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Product Price</label>
                                <select class="select">
                                    <option>Exclusive</option>
                                    <option>Inclusive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label> Tax</label>
                                <div class="input-group">
                                    <input type="text" />
                                    <a class="scanner-set input-group-text"> % </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Discount Type</label>
                                <select class="select">
                                    <option>Fixed</option>
                                    <option>Percentage</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Discount</label>
                                <input type="text" value="20" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Sales Unit</label>
                                <select class="select">
                                    <option>Kilogram</option>
                                    <option>Grams</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2">Submit</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- add customer modal  --}}
    <div class="modal fade" id="addcustomermodal" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add a new customer</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addcustomerForm" action="{{ route('add.customerfrompos') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <input name="name" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" type="email" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Customer Status</label>
                                    <select class="select" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input name="address" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>City</label>
                                    <input name="city" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input name="company_name" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Bank Name</label>
                                    <input name="bank_name" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Account Holder</label>
                                    <input name="account_holder" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Account Number</label>
                                    <input name="account_number" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Branch Name</label>
                                    <input name="brance_name" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Routing Number</label>
                                    <input name="routing_no" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Photo</label>
                                    <div class="image-upload">
                                        <input type="file" name="photo" />
                                        <div class="image-uploads">
                                            <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img" />
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Deletion</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="delete-order">
                        <img src="{{ asset('') }}assets/img/icons/close-circle1.svg" alt="img" />
                    </div>
                    <div class="para-set text-center">
                        <p>
                            The current order will be deleted as no payment has been <br />
                            made so far.
                        </p>
                    </div>
                    <div class="col-lg-12 text-center">
                        <a class="btn btn-danger me-2">Yes</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">No</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="recents" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Recent Transactions</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tabs-sets">
                        <ul class="nav nav-tabs" id="myTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="purchase-tab" data-bs-toggle="tab"
                                    data-bs-target="#purchase" type="button" aria-controls="purchase"
                                    aria-selected="true" role="tab">
                                    Purchase
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment"
                                    type="button" aria-controls="payment" aria-selected="false" role="tab">
                                    Payment
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return"
                                    type="button" aria-controls="return" aria-selected="false" role="tab">
                                    Return
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="purchase" role="tabpanel"
                                aria-labelledby="purchase-tab">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a class="btn btn-searchset"><img
                                                    src="{{ asset('') }}assets/img/icons/search-white.svg"
                                                    alt="img" /></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                        src="{{ asset('') }}assets/img/icons/pdf.svg"
                                                        alt="img" /></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                                        src="{{ asset('') }}assets/img/icons/excel.svg"
                                                        alt="img" /></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                                        src="{{ asset('') }}assets/img/icons/printer.svg"
                                                        alt="img" /></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table datanew">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Reference</th>
                                                <th>Customer</th>
                                                <th>Amount</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/eye.svg"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/edit.svg"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/delete.svg"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/eye.svg"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/edit.svg"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/delete.svg"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/eye.svg"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/edit.svg"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/delete.svg"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/eye.svg"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/edit.svg"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/delete.svg"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/eye.svg"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/edit.svg"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/delete.svg"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/eye.svg"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/edit.svg"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/delete.svg"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/eye.svg"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/edit.svg"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('') }}assets/img/icons/delete.svg"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payment" role="tabpanel">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a class="btn btn-searchset"><img
                                                    src="{{ asset('') }}assets/img/icons/search-white.svg"
                                                    alt="img" /></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                        src="{{ asset('') }}assets/img/icons/pdf.svg"
                                                        alt="img" /></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                                        src="{{ asset('') }}assets/img/icons/excel.svg"
                                                        alt="img" /></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                                        src="{{ asset('') }}assets/img/icons/printer.svg"
                                                        alt="img" /></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table datanew">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Reference</th>
                                                <th>Customer</th>
                                                <th>Amount</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/eye.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/edit.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>0102</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/eye.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/edit.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>0103</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/eye.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/edit.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>0104</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/eye.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/edit.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>0105</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/eye.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/edit.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>0106</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/eye.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/edit.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>0107</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/eye.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/edit.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="return" role="tabpanel">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a class="btn btn-searchset"><img
                                                    src="{{ asset('assets/img/icons/search-white.svg') }}"
                                                    alt="img" /></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                        src="{{ asset('assets/img/icons/pdf.svg') }}"
                                                        alt="img" /></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                                        src="{{ asset('assets/img/icons/excel.svg') }}"
                                                        alt="img" /></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                                        src="{{ asset('assets/img/icons/printer.svg') }}"
                                                        alt="img" /></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table datanew">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Reference</th>
                                                <th>Customer</th>
                                                <th>Amount</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/eye.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/edit.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>0102</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/eye.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/edit.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>0103</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/eye.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/edit.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>0104</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/eye.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/edit.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>0105</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/eye.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/edit.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>0106</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/eye.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/edit.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07</td>
                                                <td>0107</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/eye.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/edit.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                            alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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

    {{-- add customer ajax code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#addcustomerForm').on('submit', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var actionUrl = $(this).attr('action');

                $.ajax({
                    url: actionUrl,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#addcustomerForm')[0].reset();
                        $('#addcustomermodal').modal('hide');
                        $('#customerlist').load(location.href + ' #customerlist');
                        toastr.success(response);
                    }
                });
            });
        });
    </script>

    {{-- add product into cart ajax code  --}}
    <script type="text/javascript">
        $(document).on('click', '#addcart', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'get',
                success: function(response) {
                    toastr.success(response);
                    $('#cart-item').load(location.href + ' #cart-item');
                }
            });
        });
    </script>

    {{-- remove product from cart ajax code  --}}
    <script type="text/javascript">
        $(document).on('click', '#removeitem', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'get',
                success: function(response) {
                    toastr.warning(response);
                    $('#cart-item').load(location.href + ' #cart-item');
                }
            });
        });
    </script>



    {{-- update product qty from cart ajax code  --}}

    <script type="text/javascript">
        $(document).ready(function() {
            // minus button click event
            $(document).on('click', '.button-minus', function() {
                var $quantityField = $(this).siblings('.quantity-field');
                var quantity = parseInt($quantityField.val(), 10);
                if (quantity > 1) {
                    $quantityField.val(quantity - 1);
                    updateCart($quantityField.data('item-id'), quantity - 1);
                }
            });

            // plus button click event
            $(document).on('click', '.button-plus', function() {
                var $quantityField = $(this).siblings('.quantity-field');
                var quantity = parseInt($quantityField.val(), 10);
                $quantityField.val(quantity + 1);
                updateCart($quantityField.data('item-id'), quantity + 1);
            });

            // Quantity field change event
            $(document).on('change', '.quantity-field', function() {
                var itemId = $(this).data('item-id');
                var quantity = $(this).val();
                updateCart(itemId, quantity);
            });

            function updateCart(itemId, quantity) {
                $.ajax({
                    url: '{{ route('qty.update') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        item_id: itemId,
                        quantity: quantity,

                    },
                    success: function(response) {
                        toastr.success(response);
                        $('#cart-item').load(location.href + ' #cart-item');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
        });
    </script>


    {{-- cart celar ajax code  --}}
    <script type="text/javascript">
        $(document).on('click', '#cart-clear', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'get',
                success: function(response) {
                    toastr.warning(response);
                    $('#cart-item').load(location.href + ' #cart-item');
                }
            });
        });
    </script>

    {{-- cart add tax ajax code  --}}
    <script type="text/javascript">
        $(document).on('change', '#tax', function(e) {
            e.preventDefault();
            var taxrate = $(this).val();

            $.ajax({
                url: '{{ route('tax.add') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    tax: taxrate,
                },
                success: function(response) {
                    // toastr.success(response);
                    $('#cart-item').load(location.href + ' #cart-item');
                }
            });
        });
    </script>


    {{-- cart add discount ajax code  --}}
    <script type="text/javascript">
        $(document).on('change', '#discount', function(e) {
            e.preventDefault();
            var discountrate = $(this).val();

            $.ajax({
                url: '{{ route('discount.add') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    discount: discountrate,
                },
                success: function(response) {
                    // toastr.success(response);
                    $('#cart-item').load(location.href + ' #cart-item');
                }
            });
        });
    </script>
@endsection
