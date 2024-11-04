@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Supplier Management</h4>
                    <h6>Add Supplier</h6>
                </div>
            </div>

            <div class="card">
                <form action="{{route('add.supplier')}}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Supplier Name</label>
                                <input name="name" type="text" />
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" />
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" />
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>city</label>
                                <input type="text" name="city"/>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" name="company_name"/>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Bank Name</label>
                                <input type="text" name="bank_name"/>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Account Holder Name</label>
                                <input type="text" name="account_holder"/>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Account Number</label>
                                <input type="text" name="account_number"/>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Brance Name</label>
                                <input type="text" name="brance_name"/>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Routing Number</label>
                                <input type="text" name="routing_no"/>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Supplier Status</label>
                                <select class="select" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-9 col-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address"/>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> Photo</label>
                                <div class="image-upload">
                                    <input type="file" name="photo"/>
                                    <div class="image-uploads">
                                        <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img" />
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Insert</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
