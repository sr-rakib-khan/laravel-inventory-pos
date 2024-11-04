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
                <form action="{{ route('update-advanced.salary') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $advanced_salary->id }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Employe Name</label>
                                    <select class="select" name="employe_id">
                                        @foreach ($employe as $row)
                                            <option @if ($advanced_salary->name == $row->name) selected @endif
                                                value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Advanced Month</label>
                                    <select class="select" name="month">
                                        <option @if ($advanced_salary->month == 'january') selected @endif value="january">January
                                        </option>
                                        <option @if ($advanced_salary->month == 'february') selected @endif value="february">February
                                        </option>
                                        <option @if ($advanced_salary->month == 'march') selected @endif value="march">March
                                        </option>
                                        <option @if ($advanced_salary->month == 'april') selected @endif value="april">April
                                        </option>
                                        <option @if ($advanced_salary->month == 'may') selected @endif value="may">May
                                        </option>
                                        <option @if ($advanced_salary->month == 'june') selected @endif value="june">June
                                        </option>
                                        <option @if ($advanced_salary->month == 'jully') selected @endif value="jully">Jully
                                        </option>
                                        <option @if ($advanced_salary->month == 'august') selected @endif value="august">August
                                        </option>
                                        <option @if ($advanced_salary->month == 'septembar') selected @endif value="septembar">
                                            Septembar</option>
                                        <option @if ($advanced_salary->month == 'octobar') selected @endif value="octobar">Octobar
                                        </option>
                                        <option @if ($advanced_salary->month == 'novembar') selected @endif value="novembar">
                                            Novembar</option>
                                        <option @if ($advanced_salary->month == 'decembar') selected @endif value="decembar">
                                            Decembar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Advanced Year</label>
                                    <input name="year" value="{{ $advanced_salary->year }}" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Advanced Salary</label>
                                    <input name="advanced_salary" value="{{ $advanced_salary->advanced_salary }}"
                                        type="text" />
                                </div>
                            </div>
                            <div class="col-lg-8 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Advanced Salary Description</label>
                                    <textarea name="description" id="" cols="30" rows="10">{{ $advanced_salary->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
