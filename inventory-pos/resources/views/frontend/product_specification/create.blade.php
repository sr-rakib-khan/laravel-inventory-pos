@extends('layouts.frontend_app')
@section('page-content')

    {{-- warehouse manage start  --}}
    <div class="page-wrapper cardhead">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Warehouse</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <form action="{{ route('add.warehouse') }}" method="POST">
                                        @csrf
                                        <h5 class="card-title">Add warehouse</h5>
                                        <div class="form-group">
                                            <label>Warehouse Name</label>
                                            <input type="text" name="warehouse" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="select">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
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
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Add
                                                warehouse
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-6 border-start">
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
                                                    <th>Warehouse Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($warehouse as $row)
                                                    <tr>
                                                        <td>{{ $row->warehouse_name }}</td>
                                                        <td>
                                                            @if ($row->status == 1)
                                                                Active
                                                            @else
                                                                Inactive
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a class="me-3 warehouseedit" data-bs-toggle="modal"
                                                                data-bs-target="#warehouseeditModal"
                                                                href="{{ route('edit.warehouse', $row->id) }}">
                                                                <img src="{{ asset('assets/img/icons/edit.svg') }}"
                                                                    alt="img" />
                                                            </a>
                                                            <a class="me-3"
                                                                href="{{ route('warehouse.delete', $row->id) }}">
                                                                <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                                    alt="img" />
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
    </div>
    {{-- warehouse manage end  --}}



    {{-- product unit mangae start --}}
    <div class="page-wrapper cardhead">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Unit</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <form action="{{ route('add.unit') }}" method="POST">
                                        @csrf
                                        <h5 class="card-title">Add Unit</h5>
                                        <div class="form-group">
                                            <label>Unit</label>
                                            <input type="text" name="unit" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="select">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
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
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Add
                                                unit
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-6 border-start">
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
                                                    <th>Unit</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($unit as $row)
                                                    <tr>
                                                        <td>{{ $row->unit }}</td>
                                                        <td>
                                                            @if ($row->status == 1)
                                                                Active
                                                            @else
                                                                Inactive
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a class="me-3 unitedit" data-bs-toggle="modal"
                                                                data-bs-target="#uniteditModal"
                                                                href="{{ route('edit.unit', $row->id) }}">
                                                                <img src="{{ asset('assets/img/icons/edit.svg') }}"
                                                                    alt="img" />
                                                            </a>
                                                            <a class="me-3"
                                                                href="{{ route('delete.unit', $row->id) }}">
                                                                <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                                    alt="img" />
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
    </div>
    {{-- product unit mangae end --}}




    {{-- product unit mangae start --}}
    <div class="page-wrapper cardhead">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Storage Spot</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <form action="{{ route('add.storage_spot') }}" method="POST">
                                        @csrf
                                        <h5 class="card-title">Add Storage Spot</h5>
                                        <div class="form-group">
                                            <label>Storage Spot</label>
                                            <input type="text" name="spot" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="select">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
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
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Add
                                                Storage Spot
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-6 border-start">
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
                                                        title="pdf"><img src="{{ asset('assets/img/icons/pdf.svg') }}"
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
                                                    <th>Storage Spot</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($spot as $row)
                                                    <tr>
                                                        <td>{{ $row->spot }}</td>
                                                        <td>
                                                            @if ($row->status == 1)
                                                                Active
                                                            @else
                                                                Inactive
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a class="me-3 unitedit" data-bs-toggle="modal"
                                                                data-bs-target="#spoteditModal"
                                                                href="{{ route('edit.spot', $row->id) }}">
                                                                <img src="{{ asset('assets/img/icons/edit.svg') }}"
                                                                    alt="img" />
                                                            </a>
                                                            <a class="me-3"
                                                                href="{{ route('spot.delete', $row->id) }}">
                                                                <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                                    alt="img" />
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
    </div>
    {{-- product unit mangae end --}}


    {{-- warehouse edit modal  --}}
    <div class="modal fade" id="warehouseeditModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Edit Warehouse</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal_body">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    {{-- unit edit modal  --}}
    <div class="modal fade" id="uniteditModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Edit Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="unitmodal_body">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    {{-- storage spot edit modal  --}}
    <div class="modal fade" id="spoteditModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Edit Storage Spot</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="spotmodal_body">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    {{-- jquery ajax link  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- warehouse edit jquery ajax code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('body').on('click', '.warehouseedit', function() {
                let url = $(this).attr('href');

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(data) {
                        $('#modal_body').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to load content:', error);
                    }
                });
            });
        });
    </script>


    {{-- unit jquery ajax code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('body').on('click', '.unitedit', function() {
                let url = $(this).attr('href');

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(data) {
                        $('#unitmodal_body').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to load content:', error);
                    }
                });
            });
        });
    </script>


    {{-- storage spot jquery ajax code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('body').on('click', '.unitedit', function() {
                let url = $(this).attr('href');

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(data) {
                        $('#spotmodal_body').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to load content:', error);
                    }
                });
            });
        });
    </script>
@endsection
