@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Brand Edit</h4>
                    <h6>Update your Brand</h6>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('update.brand') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $brand->id }}" name="id">
                        <input type="hidden" value="{{ $brand->photo }}" name="old_photo">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Brand Name</label>
                                    <input type="text" value="{{$brand->brand_name}}" name="brand_name" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control">{{$brand->description}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Product Image</label>
                                    <img width="60px" height="60px" src="{{asset($brand->photo)}}" alt="">
                                    <div class="image-upload">
                                        <input name="photo" type="file" />
                                        <div class="image-uploads">
                                            <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img" />
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
