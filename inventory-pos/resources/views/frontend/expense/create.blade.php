@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Expense Add</h4>
                    <h6>Add your Expenses</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('store.expense') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="amount" />
                                        <div class="addonset">
                                            <img src="{{ asset('assets/img/icons/dollar.svg') }}" alt="img" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Expense Date </label>
                                    <div class="input-groupicon">
                                        <input type="date" name="date" placeholder="Choose Date"
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Expense for</label>
                                    <input type="text" name="expense_for" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control"></textarea>
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
                                <button type="submit" class="btn btn-submit me-2">Add Expense</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
