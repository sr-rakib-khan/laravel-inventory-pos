@extends('layouts.frontend_app')
@section('page-content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Employe Details</h4>
                    <h6>Full details of an Employe</h6>
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
                                        <h6>{{ $employe->name }}</h6>
                                    </li>
                                    <li>
                                        <h4>Email</h4>
                                        <h6>{{ $employe->email }}</h6>
                                    </li>
                                    <li>
                                        <h4>Phone</h4>
                                        <h6>{{ $employe->phone }}</h6>
                                    </li>
                                    <li>
                                        <h4>NID No</h4>
                                        <h6>{{ $employe->nid_no }}</h6>
                                    </li>
                                    <li>
                                        <h4>Experience</h4>
                                        <h6>{{ $employe->experience }}</h6>
                                    </li>
                                    <li>
                                        <h4>Salary</h4>
                                        <h6>{{ $employe->salary }}</h6>
                                    </li>
                                    <li>
                                        <h4>Vacation</h4>
                                        <h6>{{ $employe->vacation }}</h6>
                                    </li>
                                    <li>
                                        <h4>City</h4>
                                        <h6>{{ $employe->city }}</h6>
                                    </li>
                                    <li>
                                        <h4>Photo</h4>
                                        <h6><img src="{{asset('files/employes/'.$employe->photo)}}" alt="img/"
                                                srcset=""></h6>
                                    </li>
                                    <li>
                                        <h4>Address</h4>
                                        <h6>{{ $employe->address }}</h6>
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
