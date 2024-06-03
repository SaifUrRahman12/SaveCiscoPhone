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

                    {{ __('You are logged in as agent!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('user.layout.user_dash')
@section('content')


<div class="row clearfix">
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="m-b-20">
                <div class="contact-grid">
                    <div class="profile-header bg-dark">
                        <div class="user-name"> {{ $profileData->username }} </div>
                        <div class="name-center"> {{ $profileData->email }} </div>
                    </div>
                    <img src="{{ (!empty($profileData->photo)) ?
                    url('uploads/image/'.$profileData->photo)
                    :url('uploads/admin.jpg') }}" class="user-img" alt="">
                    <h3>{{$profileData->name}}</h3>
                    <div>
                        <span class="phone" style="font-size: 20px">
                            <i class="material-icons" style="font-size: 20px">phone</i>{{ $profileData->phone_number}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12 ">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="project" aria-expanded="true">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card project_widget">
                            <div class="header">
                                <h3 class="text-primary">UPDATE YOUR ACCOUNT!</h3>
                            </div>
                            <div class="body">
                                <form action="{{ route('user.profile.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="body">
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{$profileData->name}}" class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="username" value="{{$profileData->username}}" class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{$profileData->email}}" class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone_number" value="{{$profileData->phone_number}}" class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="photo" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="current_password" class="form-control"
                                                placeholder="Current Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirm_password" class="form-control"
                                                placeholder="Confirm Password">
                                        </div>
                                        <button class="btn btn-info btn-round">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
