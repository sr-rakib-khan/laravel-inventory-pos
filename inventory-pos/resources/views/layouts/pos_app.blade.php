<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta name="description" content="POS - Bootstrap Admin Template" />
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects" />
    <meta name="author" content="Dreamguys - Bootstrap Admin Template" />
    <meta name="robots" content="noindex, nofollow" />
    <title>pos</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/owlcarousel/owl.theme.default.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"></div>
    </div>
    <div class="main-wrappers">
      @include('layouts.frontend_partial.header')
        @yield('page-content')
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
                                        src="{{ asset('') }}assets/img/icons/close-circle.svg"
                                        alt="img" /></a>
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
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
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
                            <button type="submit" id="addcustomer" class="btn btn-submit me-2">Submit</button>
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
                                <button class="nav-link" id="payment-tab" data-bs-toggle="tab"
                                    data-bs-target="#payment" type="button" aria-controls="payment"
                                    aria-selected="false" role="tab">
                                    Payment
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="return-tab" data-bs-toggle="tab"
                                    data-bs-target="#return" type="button" aria-controls="return"
                                    aria-selected="false" role="tab">
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
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="pdf"><img
                                                        src="{{ asset('') }}assets/img/icons/pdf.svg"
                                                        alt="img" /></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="excel"><img
                                                        src="{{ asset('') }}assets/img/icons/excel.svg"
                                                        alt="img" /></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="print"><img
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
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="pdf"><img
                                                        src="{{ asset('') }}assets/img/icons/pdf.svg"
                                                        alt="img" /></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="excel"><img
                                                        src="{{ asset('') }}assets/img/icons/excel.svg"
                                                        alt="img" /></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="print"><img
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
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="pdf"><img
                                                        src="{{ asset('assets/img/icons/pdf.svg') }}"
                                                        alt="img" /></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="excel"><img
                                                        src="{{ asset('assets/img/icons/excel.svg') }}"
                                                        alt="img" /></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="print"><img
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





    {{-- all js link  --}}
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.j') }}s"></script>

    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>




</body>

</html>
