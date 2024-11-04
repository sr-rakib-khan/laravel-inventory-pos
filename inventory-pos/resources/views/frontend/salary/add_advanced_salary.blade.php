@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Employe Advanced Salary Provide</h4>
                    <h6>Employe Advanced salary</h6>
                </div>
            </div>

            <div class="card">
                <form action="{{ route('add.advanced-salary') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Employe Name</label>
                                    <select class="select" name="employe_id">
                                        @foreach ($employe as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Advanced Month</label>
                                    <select class="select" name="month">
                                        <option value="january">January</option>
                                        <option value="february">February</option>
                                        <option value="march">March</option>
                                        <option value="april">April</option>
                                        <option value="may">May</option>
                                        <option value="june">June</option>
                                        <option value="jully">Jully</option>
                                        <option value="august">August</option>
                                        <option value="septembar">Septembar</option>
                                        <option value="octobar">Octobar</option>
                                        <option value="novembar">Novembar</option>
                                        <option value="decembar">Decembar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Advanced Year</label>
                                    <input name="year" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Advanced Salary</label>
                                    <input name="advanced_salary" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-8 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Advanced Salary Description</label>
                                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Pay Advanced</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
