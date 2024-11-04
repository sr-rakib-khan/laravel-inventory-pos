@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Import Product</h4>
                </div>
                <div class="page-title">
                    <a class="btn btn-submit" href="{{ route('export') }}">Download Xlsx file</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Import Xlsx file</label>
                                    <input type="file" class="form-control" name="improt_product" />
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
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
