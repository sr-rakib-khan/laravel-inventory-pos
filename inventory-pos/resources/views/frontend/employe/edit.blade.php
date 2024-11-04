@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Employe Management</h4>
                    <h6>Update Employe</h6>
                </div>
            </div>
            <form action="{{ route('employe.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <input name="old_photo" type="hidden" value="{{ $employe->photo }}" />
                            <input name="id" type="hidden" value="{{ $employe->id }}" />

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Employe Name</label>
                                    <input name="name" type="text" value="{{ $employe->name }}" required />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" value="{{ $employe->email }}" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" value="{{ $employe->phone }}" type="text" required />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>City</label>
                                    <input name="city" value="{{ $employe->city }}" type="text" required />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Experience</label>
                                    <input name="experience" value="{{ $employe->experience }}" type="text" required />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Salary</label>
                                    <input name="salary" value="{{ $employe->salary }}" type="text" required />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Vacation</label>
                                    <input name="vacation" value="{{ $employe->vacation }}" type="text" required />
                                </div>
                            </div>
                            <div class="col-lg-9 col-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input name="address" value="{{ $employe->address }}" type="text" required />
                                </div>
                            </div>
                            <div class="col-lg-9 col-12">
                                <div class="form-group">
                                    <label>NID No</label>
                                    <input name="nid_no" value="{{ $employe->nid_no }}" type="text" required />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Avatar</label>
                                    <img width="60px" src="{{ asset('files/employes/' . $employe->photo) }}" alt=""
                                        srcset="">
                                    <div class="image-upload">
                                        <input name="photo" type="file" accept="image/*" />
                                        <div class="image-uploads">
                                            <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img" />
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-success">update</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
