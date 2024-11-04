@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Employes List</h4>
                    <h6>Manage your Employes</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('add.employe') }}" class="btn btn-added"><img
                            src="{{ asset('assets/img/icons/plus.svg') }}" alt="img" />Add
                        Employe</a>
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
                                    <th>Employe Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>City</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employe as $row)
                                    <tr>
                                        <td>
                                            {{ $row->name }}
                                        </td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>
                                            <img width="40px" height="40px"
                                                src="{{ asset('files/employes/' . $row->photo) }}" alt=""
                                                srcset="">
                                        </td>
                                        <td>{{ $row->city }}</td>
                                        <td>
                                            <a class="me-3" href="{{ route('employe.details', $row->id) }}">
                                                <img src="{{ asset('assets/img/icons/eye.svg') }}" alt="img" />
                                            </a>
                                            <a class="me-3" href="{{ route('employe.edit', $row->id) }}">
                                                <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img" />
                                            </a>
                                            <a class="me-3 delete" href="{{ route('employe.delete', $row->id) }}">
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
