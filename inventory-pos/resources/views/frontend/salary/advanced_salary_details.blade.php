@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Advanced Salary Details</h4>
                    <h6>Full details of Employe Advanced Salary</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="productdetails">
                                <ul class="product-bar">
                                    <li>
                                        <h4>Employe Name</h4>
                                        <h6>{{ $advanced_salary->name }}</h6>
                                    </li>
                                    <li>
                                        <h4>Photo</h4>
                                        <h6><img src="{{ asset('files/employes/' . $advanced_salary->photo) }}" alt=""></h6>
                                    </li>
                                    <li>
                                        <h4>Month</h4>
                                        <h6>{{ $advanced_salary->month }}</h6>
                                    </li>
                                    <li>
                                        <h4>Year</h4>
                                        <h6>{{ $advanced_salary->year }}</h6>
                                    </li>
                                    <li>
                                        <h4>Advanced Salary</h4>
                                        <h6>{{ $advanced_salary->advanced_salary }}</h6>
                                    </li>
                                    <li>
                                        <h4>Description</h4>
                                        <h6>{{ $advanced_salary->description }}</h6>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
