@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>All Advanced Salary List</h4>
                    <h6>Manage Advanced Salary</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('create.advanced-salary') }}" class="btn btn-added"><img
                            src="{{ asset('assets/img/icons/plus.svg') }}" alt="img" />Add
                        Customer</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="{{ asset('assets/img/icons/filter.svg') }}" alt="img" />
                                    <span><img src="{{ asset('assets/img/icons/closes.svg') }}" alt="img" /></span>
                                </a>
                            </div>
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

                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Filter By Name</label>
                                        <input id="filter_name" class="name" type="text" name="name"
                                            placeholder="Enter employe name" />
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Filter By Month</label>
                                        <input id="filter_month" class="month" type="text" name="month"
                                            placeholder="Enter Month" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th>Employe Name</th>
                                    <th>Photo</th>
                                    <th>Advanced Salary</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $row)
                                    <tr>
                                        <td>{{ $row->name }}</td>
                                        <td>
                                            <img width="40px" height="40px"
                                                src="{{ asset('files/employes/' . $row->photo) }}" alt=""
                                                srcset="">
                                        </td>
                                        <td>{{ $row->advanced_salary }}</td>
                                        <td>{{ $row->month }}</td>

                                        <td>{{ $row->year }}</td>
                                        <td>
                                            <a class="me-3" href="{{ route('details-advanced.salary', $row->id) }}">
                                                <img src="{{ asset('assets/img/icons/eye.svg') }}" alt="img" />
                                            </a>
                                            <a class="me-3" href="{{ route('edit-advanced.salary', $row->id) }}">
                                                <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img" />
                                            </a>
                                            <a class="me-3" href="{{ route('advanced_salary.delete', $row->id) }}">
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

    {{-- ajax cdn link  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>




    <script>
        $('#filter_name, #filter_month').on('keyup', function() {
            var name = $('.name').val();
            var month = $('.month').val();

            $.ajax({
                url: '{{ route('all-advanced.salary') }}',
                type: 'GET',
                data: {
                    name: name,
                    month: month
                },
                success: function(response) {
                    // Clear the existing rows
                    $('.datanew tbody').empty();

                    // Append new rows
                    $.each(response, function(index, value) {
                        var row = '<tr>';
                        row += '<td>' + value.name + '</td>';
                        row += '<td><img src="{{ asset('files/employes/') }}/' + value.photo +
                            '" alt="' + value.name + '" width="50" /></td>';
                        row += '<td>' + value.advanced_salary + '</td>';
                        row += '<td>' + value.month + '</td>';
                        row += '<td>' + value.year + '</td>';
                        row += '<td>' +
                            '<a class="me-3" href="{{ route('details-advanced.salary', '') }}/' +
                            value.id + '">' +
                            '<img src="{{ asset('assets/img/icons/eye.svg') }}" alt="View" />' +
                            '</a>' +
                            '<a class="me-3" href="{{ route('edit-advanced.salary', '') }}/' +
                            value.id + '">' +
                            '<img src="{{ asset('assets/img/icons/edit.svg') }}" alt="Edit" />' +
                            '</a>' +
                            '<a class="me-3" href="{{ route('advanced_salary.delete', '') }}/' + value
                            .id + '">' +
                            '<img src="{{ asset('assets/img/icons/delete.svg') }}" alt="Delete" />' +
                            '</a>' + '</td>';
                        row += '</tr>';

                        $('.datanew tbody').append(row);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + status + " - " + error);
                }
            });
        });
    </script>
@endsection
