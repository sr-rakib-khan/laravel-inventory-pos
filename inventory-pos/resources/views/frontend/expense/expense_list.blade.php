@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Expense List</h4>
                    <h6>Manage your Expense</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('add.expense') }}" class="btn btn-added"><img
                            src="{{ asset('assets/img/icons/plus.svg') }}" alt="img" />Add
                        Expense</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="{{ asset('assets/img/icons/filter.svg') }}" alt="img" />
                                    <span><img src="{{ asset('') }}assets/img/icons/closes.svg" alt="img" /></span>
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
                                    <a id="generatePDF" data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
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
                    <div class="card mb-0" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="">Start Date</label>
                                                <input type="date" class="form-control start-date" name="start_date">
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="">End Date</label>
                                                <input type="date" name="end_date" class="form-control end-date">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-sm-6 col-12">
                                            <div class="form-group">
                                                <a id="filter" class="btn btn-filters ms-auto mt-4"><img
                                                        src="{{ asset('assets/img/icons/search-whites.svg') }}"
                                                        alt="img" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="download" class="table datanew">
                            <thead>
                                <tr>
                                    <th>Expense for</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $row)
                                    <tr>
                                        <td>{{ $row->expense_for }}</td>
                                        <td>{{ $row->amount }}</td>
                                        <td>{{ $row->date }}</td>
                                        <td>{{ $row->description }}</td>
                                        <td>
                                            <a class="me-3" href="{{ route('expense.edit', $row->id) }}">
                                                <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img" />
                                            </a>
                                            <a class="me-3 delete" href="{{ route('expense.delete', $row->id) }}">
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
        $('#filter').on('click', function() {
            var start_date = $('.start-date').val();
            var end_date = $('.end-date').val();

            $.ajax({
                url: '{{ route('expense.list') }}',
                type: 'GET',
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                success: function(response) {
                    // Clear the existing rows
                    $('.datanew tbody').empty();

                    // Append new rows
                    $.each(response, function(index, value) {
                        var row = '<tr>';
                        row += '<td>' + value.expense_for + '</td>';
                        row += '<td>' + value.amount + '</td>';
                        row += '<td>' + value.date + '</td>';
                        row += '<td>' + value.description + '</td>';
                        row += '<td>' +
                            '<a class="me-3" href="{{ route('expense.edit', '') }}/' +
                            value.id + '">' +
                            '<img src="{{ asset('assets/img/icons/edit.svg') }}" alt="Edit" />' +
                            '</a>' +
                            '<a class="me-3" href="{{ route('expense.delete', '') }}/' +
                            value
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
