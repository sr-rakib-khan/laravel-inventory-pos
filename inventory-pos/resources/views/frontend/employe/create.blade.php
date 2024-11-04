@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Employe Management</h4>
                    <h6>Add Employe</h6>
                </div>
            </div>
            <form action="{{ route('employe.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Employe Name</label>
                                    <input name="name" type="text" required />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" type="text" required />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>City</label>
                                    <input name="city" type="text" required />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Experience</label>
                                    <input name="experience" type="text" required />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Salary</label>
                                    <input name="salary" type="text" required />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Vacation</label>
                                    <input name="vacation" type="text" required />
                                </div>
                            </div>
                            <div class="col-lg-9 col-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input name="address" type="text" required />
                                </div>
                            </div>
                            <div class="col-lg-9 col-12">
                                <div class="form-group">
                                    <label>NID No</label>
                                    <input name="nid_no" type="text" required />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Avatar</label>
                                    <div class="image-upload">
                                        <input name="photo" type="file" accept="image/*" required />
                                        <div class="image-uploads">
                                            <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img" />
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
