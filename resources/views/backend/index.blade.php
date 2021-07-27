@extends('backend.layouts.master')

@section('content')
    
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales Summery -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col l3 m6 s12">
                <div class="card danger-gradient card-hover">
                    <div class="card-content">
                        <div class="d-flex no-block align-items-center">
                            @php
                                $user=Auth::user()->count();
                            @endphp
                            <div>
                                <h2 class="white-text m-b-5">{{ $user }}</h2>
                                <h6 class="white-text op-5 light-blue-text">Total User</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="white-text display-6"><i class="material-icons">assignment</i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l3 m6 s12">
                <div class="card info-gradient card-hover">
                    <div class="card-content">
                        <div class="d-flex no-block align-items-center">
                            @php
                              
                                $selr=DB::table('Users')->where('role','LIKE','seller')->count();

                            @endphp
                            <div>
                                <h2 class="white-text m-b-5">{{ $selr }}</h2>
                                <h6 class="white-text op-5">Total Seller</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="white-text display-6"><i class="material-icons">receipt</i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
            
            <div class="col l3 m6 s12">
                <div class="card success-gradient card-hover">
                    <div class="card-content">
                        <div class="d-flex no-block align-items-center">
                            @php
                                $order=DB::table('orders')->count();
                            @endphp
                            <div>
                                <h2 class="white-text m-b-5">{{ $order }}</h2>
                                <h6 class="white-text op-5 text-darken-2">Total Orders</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="white-text display-6"><i class="material-icons">equalizer</i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="col l3 m6 s12">
                <div class="card warning-gradient card-hover">
                    <div class="card-content">
                        <div class="d-flex no-block align-items-center">
                            @php
                                $city=DB::table('cities')->count();
                            @endphp
                            <div>
                                <h2 class="white-text m-b-5">{{ $city }}</h2>
                                <h6 class="white-text op-5">Total City</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="white-text display-6"><i class="material-icons"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Sales Summery -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col s12 l8">
                <div class="card">
                    <div class="card-content">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="card-title">Yearly Sales</h5>
                            </div>
                            <div class="ml-auto">
                                <ul class="list-inline font-12 dl m-r-10">
                                    <li class="cyan-text"><i class="fa fa-circle"></i> Earnings</li>
                                    <li class="blue-text text-accent-4"><i class="fa fa-circle"></i> Sales</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sales Summery -->
                        <div class="p-t-20">
                            <div class="row">
                                <div class="col s12">
                                    <div id="sales" style="height: 332px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 l4">
                <div class="card card-hover">
                    <div class="card-content">
                        <div class="d-flex align-items-center">
                            <div class="m-r-20">
                                <h1 class=""><i class="ti-light-bulb"></i></h1></div>
                            <div>
                                <h3 class="card-title">Sales Analytics</h3>
                                <h6 class="card-subtitle">March  2021</h6> </div>
                        </div>
                        <div class="row d-flex align-items-center">
                            <div class="col s6">
                                <h3 class="font-light m-t-10"><sup><small><i class="ti-arrow-up"></i></small></sup>35487</h3>
                            </div>
                            <div class="col s6 right-align">
                                <div class="p-t-10 p-b-10">
                                    <div class="spark-count" style="height:65px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-hover">
                    <div class="card-content">
                        <div class="d-flex align-items-center">
                            <div class="m-r-20">
                                <h1 class=""><i class="ti-pie-chart"></i></h1></div>
                            <div>
                                <h3 class="card-title">Bandwidth usage</h3>
                                <h6 class="card-subtitle">March  2021</h6> 
                            </div>
                        </div>
                        <div class="row d-flex align-items-center">
                            <div class="col s6">
                                <h3 class="font-light m-t-10">50 GB</h3>
                            </div>
                            <div class="col s6 p-t-10 p-b-20 right-align">
                                <div class="p-t-10 p-b-10 m-r-20">
                                    <div class="spark-count2" style="height:65px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
<!-- ============================================================== -->
<!-- Right Sidebar -->
<!-- ============================================================== -->


@endsection