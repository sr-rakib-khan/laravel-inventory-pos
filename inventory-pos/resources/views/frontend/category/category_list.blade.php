@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Category List</h4>
                    <h6>Manage your Category</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('add.category') }}" class="btn btn-added"><img
                            src="{{ asset('assets/img/icons/plus.svg') }}" alt="img" />Add
                        Category</a>
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
                                    <th>Category Name</th>
                                    <th>Category Code</th>
                                    <th>Description</th>
                                    <th>photo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $row)
                                    <tr>
                                        <td>{{ $row->category_name }}</td>
                                        <td>{{ $row->category_code }}</td>
                                        <td>{{ $row->category_description }}</td>
                                        <td>
                                            <img width="40px" height="40px" src="{{ asset($row->photo) }}"
                                                alt="">
                                        </td>
                                        <td>
                                            @if ($row->status == 1)
                                                <span class="text-success">Active</span>
                                            @else
                                                <span class="text-danger">Inactive</span>
                                            @endif

                                        </td>
                                        <td>
                                            <a class="me-3" href="{{ route('category.edit', $row->id) }}">
                                                <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img" />
                                            </a>
                                            <a class="me-3 delete" href="{{ route('category.delete', $row->id) }}">
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
