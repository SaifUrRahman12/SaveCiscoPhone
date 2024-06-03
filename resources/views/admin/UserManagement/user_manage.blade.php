@extends('admin.layout.admin_dash')
@section('content')

<!-- Basic Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                {{-- <div>
                    @include('Admin.message.success')
                    @include('Admin.message.error')
                </div> --}}
                @php
                    $id = Auth::user()->id;
                    $profileData = App\Models\User::find($id);
                @endphp
                    <h2 class="text-center"><strong>Table</strong>&nbsp;&nbsp;Users</h2>
                    <button class="btn btn-success" data-toggle="modal" data-target="#AddUserModel">Add New</button>
                    <div class="modal fade" id="AddUserModel" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="formModal">Add New Users!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('store.users') }}" onsubmit="return validateUserAddedForm()" method="POST" enctype="multipart/form-data" id="storeUsers">
                                        @csrf

                                        <label>Name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name">
                                            </div>
                                        </div>
                                        <label>USER NAME</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="username" name="username" class="form-control" placeholder="Enter user name">
                                            </div>
                                        </div>
                                        <label>PHONE NUMBER</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Enter phone number">
                                            </div>
                                        </div>
                                        <label>EMAIL</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="email" name="email" class="form-control" placeholder="Enter email">
                                            </div>
                                        </div>

                                        <label>ROLE</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="role" id="" class="form-control">
                                                    <option value="ADMIN">ADMIN</option>
                                                    <option value="AGENT">AGENT</option>
                                                </select>
                                            </div>
                                        </div>
                                        <label>PASSWORD</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter password">
                                            </div>
                                        </div>
                                        <label>IMAGE</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="photo" class="form-control">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" form="storeUsers" class="btn btn-info waves-effect">Save</button>
                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>IMAGE</th>
                            <th>NAME</th>
                            <th>USER NAME</th>
                            <th>PHONE NUMBER</th>
                            <th>EMAIL</th>
                            <th>ROLE</th>
                            <th>UPDATE</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $data)
                            <tr>
                                <td>{{ $data->id}}</td>
                                <td class="table-img center">
                                    <img src="{{ asset($data->photo) }}" width="50" alt="">
                                </td>
                                <td>{{ $data->name}}</td>
                                <td>{{ $data->username}}</td>
                                <td>{{ $data->phone_number}}</td>
                                <td>{{ $data->email}}</td>
                                <td>{{ $data->role}}</td>
                                {{-- <td>{{ $data->password}}</td> --}}
                                <td><a href="#"><span data-toggle="modal" data-target="#UpdateUser{{ $data->id}}" class="fa fa-edit" style="font-size: 18px"></span>
                                    <div class="modal fade" id="UpdateUser{{ $data->id}}" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="formModal">Update Users!</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('update.user',['id' => $data->id])}}" method="POST" enctype="multipart/form-data" id="EditUser{{ $data->id}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <label>Name</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" value="{{ $data->name}}" name="name" class="form-control" placeholder="Enter Name">
                                                            </div>
                                                        </div>
                                                        <label>USER NAME</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" value="{{ $data->username}}" name="username" class="form-control" placeholder="Enter user name">
                                                            </div>
                                                        </div>
                                                        <label>PHONE NUMBER</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="number" value="{{ $data->phone_number }}" name="phone_number" class="form-control" placeholder="Enter phone number">
                                                            </div>
                                                        </div>
                                                        <label>EMAIL</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="email" value="{{ $data->email }}" name="email" class="form-control" placeholder="Enter email">
                                                            </div>
                                                        </div>
                                                        <label>ROLE</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <select name="role" id="" class="form-control">
                                                                    <option value="ADMIN">ADMIN</option>
                                                                    <option value="AGENT">AGENT</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <label>PASSWORD</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="password" name="password" class="form-control" placeholder="Enter password">
                                                            </div>
                                                        </div>
                                                        <label>IMAGE</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="file" name="photo" class="form-control">
                                                                <img src="{{ asset($data->photo) }}" width="50" alt="">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" form="EditUser{{ $data->id }}" class="btn btn-info waves-effect">Save</button>
                                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a></td>
                                <td><a href="{{ route('delete.user',['id' => $data->id ])}}"><span class="fas fa-trash text-danger" style="font-size: 18px"></span></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Table -->

@endsection
