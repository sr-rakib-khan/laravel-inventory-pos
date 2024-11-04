@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Update Category</h4>
                    <h6>Update product Category</h6>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('update.category') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <input type="hidden" name="old_photo" value="{{ $category->photo }}">
                        <input type="hidden" name="category_code" value="{{ $category->category_code }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" value="{{ $category->category_name }}" name="category_name" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Category Code</label>
                                    <select class="select" name="status">
                                        <option @if ($category->status == 1) selected @endif value="1">Active
                                        </option>
                                        <option @if ($category->status == 0) selected @endif value="0">Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control">{{ $category->category_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Product Image</label>
                                    <img width="60px" height="60px" src="{{ asset($category->photo) }}" alt="">
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
                                <button type="submit" class="btn btn-submit me-2">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
