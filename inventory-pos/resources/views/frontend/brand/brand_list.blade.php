@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Brand List</h4>
                    <h6>Manage your Brand</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('add.brand') }}" class="btn btn-added"><img
                            src="{{ asset('assets/img/icons/plus.svg') }}" alt="img" />Add
                        Brand</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-input">
                                <a class="btn btn-searchset"><img src="{{ asset('assets/img/icons/search-white.svg') }}"
                                        alt="img" /></a>
                            </div>
                        </div>
                        <div class="wordset">
                            <ul>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                            src="{{ asset('assets/img/icons/pdf.svg') }}" alt="img" /></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                            src="{{ asset('assets/img/icons/excel.svg') }}" alt="img" /></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                            src="{{ asset('assets/img/icons/printer.svg') }}" alt="img" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th>Brand Name</th>
                                    <th>photo</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brand as $row)
                                    <tr>
                                        <td>{{ $row->brand_name }}</td>
                                        <td>
                                            <img width="40px" height="40px" src="{{ asset($row->photo) }}"
                                                alt="">
                                        </td>
                                        <td>{{ $row->description }}</td>
                                        <td>
                                            <a class="me-3" href="{{ route('brand.edit', $row->id) }}">
                                                <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img" />
                                            </a>
                                            <a class="me-3 delete" href="{{ route('brand.delete', $row->id) }}">
                                                <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img" />
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
@endsection
