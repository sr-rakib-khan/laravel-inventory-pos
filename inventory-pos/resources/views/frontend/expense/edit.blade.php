@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Expense Edit</h4>
                    <h6>Update your Expenses</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('update.expense') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $expense->id }}">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <div class="input-groupicon">
                                        <input type="text" value="{{ $expense->amount }}" name="amount" />
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
                                        <input type="date" value="{{ $expense->date }}" name="date"
                                            placeholder="Choose Date" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Expense for</label>
                                    <input type="text" value="{{ $expense->expense_for }}" name="expense_for" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control">{{ $expense->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Update Expense</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
