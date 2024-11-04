@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Company Info Setting</h4>
                    <h6>Manage Company Info Setting</h6>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('company-info.updae') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_logo" value="{{ $info->company_logo }}">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Company Name<span class="manitory">*</span></label>
                                    <input type="text" name="company_name" value="{{ $info->company_name }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Company Address<span class="manitory">*</span></label>
                                    <input type="text" name="company_address" value="{{ $info->company_address }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Company Phone<span class="manitory">*</span></label>
                                    <input type="text" name="company_phone" value="{{ $info->company_phone }}" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Company Email<span class="manitory">*</span> </label>
                                    <input type="email" class="form-control" name="company_email"
                                        value="{{ $info->company_email }}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Company Logo</label>
                                    <img width="60px" src="{{ asset($info->company_logo) }}" alt="">
                                    <div class="image-upload">
                                        <input type="file" name="company_logo" />
                                        <div class="image-uploads">
                                            <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img" />
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-submit me-2">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
