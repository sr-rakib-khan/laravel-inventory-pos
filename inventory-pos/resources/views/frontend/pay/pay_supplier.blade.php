@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Pay Supplier</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    @php
                        $supplier = DB::table('suppliers')
                            ->where('id', $purchase_info->supplier_id)
                            ->first();
                    @endphp
                    <form action="{{ route('pay.supplier') }}" method="post">
                        @csrf
                        <input type="hidden" name="purchase_id" value="{{ $purchase_info->id }}">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="supplier">Pay To</label>
                                <select name="supplier_id" class="form-select form-control">
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="purchase_date">Pay Amount</label>
                                <input name="amount" value="{{ $purchase_info->total_amount }}" id="purchase_date"
                                    class="form-control" type="text">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="purchase_date">Invoice Number</label>
                                <input name="invoice_no" value="{{ $purchase_info->invoice_number }}"
                                    id="purchase_date" class="form-control" type="text">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="purchase_date">Pay Date</label>
                                <input name="date" id="purchase_date" class="form-control" value="" type="date" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success me-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
