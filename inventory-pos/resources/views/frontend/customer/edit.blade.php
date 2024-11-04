@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Customer Management</h4>
                    <h6>Update Customer</h6>
                </div>
            </div>

            <div class="card">
                <form action="{{ route('update.customer') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $customer->id }}" name="id">
                    <input type="hidden" value="{{ $customer->photo }}" name="old_photo">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <input name="name" value="{{ $customer->name }}" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{ $customer->email }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{ $customer->phone }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>city</label>
                                    <input type="text" name="city" value="{{ $customer->city }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name" value="{{ $customer->company_name }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Bank Name</label>
                                    <input type="text" name="bank_name" value="{{ $customer->bank_name }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Account Holder Name</label>
                                    <input type="text" name="account_holder" value="{{ $customer->account_holder }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Account Number</label>
                                    <input type="text" name="account_number" value="{{ $customer->account_no }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Brance Name</label>
                                    <input type="text" name="brance_name" value="{{ $customer->brance_name }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Routing Number</label>
                                    <input type="text" name="routing_no" value="{{ $customer->routing_no }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Customer Status</label>
                                    <select class="select" name="status">
                                        <option @if ($customer->status == 1) selected @endif value="1">Active
                                        </option>
                                        <option @if ($customer->status == 0) selected @endif value="0">Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-9 col-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" value="{{ $customer->address }}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Photo</label>
                                    <img width="60px" height="60px" src="{{ asset($customer->photo) }}" alt="">
                                    <div class="image-upload">
                                        <input type="file" name="photo" />
                                        <div class="image-uploads">
                                            <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img" />
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
