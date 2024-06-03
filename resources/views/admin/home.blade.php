{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as Admin!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('admin.layout.admin_dash')
@section('content')


<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
                    <li class="breadcrumb-item bcrumb-1">
                        <a href="../../index.html">
                            <i class="fas fa-home"></i> Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="support-box text-center bg-green">
                <div class="icon m-b-10">
                    <div class="chart chart-bar"></div>
                </div>
                <div class="text m-b-10">Total Users</div>
                <h3 class="m-b-0">&nbsp;&nbsp;{{$users}}
                    <span class="fa fa-users"></span>
                </h3>
            </div>
        </div>

        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="support-box text-center bg-purple">
                <div class="icon m-b-10">
                    <span class="chart chart-line"></span>
                </div>
                <div class="text m-b-10">TOTAL Cisco Phone</div>
                <h3 class="m-b-0">&nbsp;&nbsp;{{$phone}}
                    <span class="fa fa-phone"></span>
                </h3>
                {{-- <small class="displayblock">13% Highr Than Average </small> --}}
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="support-box text-center bg-pink">
                <div class="icon m-b-10">
                    <div class="chart chart-pie"></div>
                </div>
                <div class="text m-b-10">TOTAL Province</div>
                <h3 class="m-b-0">&nbsp;&nbsp;{{$province}}
                    <span class="fa fa-map-marker"></span>
                </h3>
                {{-- <small class="displayblock">34% Lower Than Average </small> --}}
            </div>
        </div>
    </div>
</div>

@endsection
