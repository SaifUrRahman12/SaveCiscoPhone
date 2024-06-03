@extends('user.layout.user_dash')
@section('content')

<!-- Basic Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">

                @include('user.message.success')
                @include('user.message.errors')

                @php
                    $id = Auth::user()->id;
                    $profileData = App\Models\User::find($id);
                @endphp
                    <h2 class="text-center"><strong>Table</strong>&nbsp;&nbsp;Cisco</h2>
                    <button class="btn btn-success" data-toggle="modal" data-target="#AddCiscoModel">Add New Cisco</button>
                    <div class="modal fade" id="AddCiscoModel" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="formModal">Add New Cisco Phone!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('store.cisco')}}" method="POST" onsubmit="return validateCiscoForm()" enctype="multipart/form-data" id="storePhone">
                                        @csrf

                                        <label for="unit">Rigestrar Name:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="name" id="" class="form-control">
                                                    <option value="{{ $profileData->name}}">{{ $profileData->name}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <label>Source</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="city" id="" class="form-control">
                                                    @foreach ($province as $pro)
                                                            <option value="{{ $pro->province_name }}">
                                                            {{ $pro->province_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <label>Phone Model</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="model" name="model" class="form-control" placeholder="Enter Phone Model">
                                            </div>
                                        </div>
                                        <label>Serial Number</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="serial_number" name="serial_number" class="form-control" placeholder="Enter Phone Serial number">
                                            </div>
                                        </div>
                                        <label>Mac Address</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="mac_address" name="mac_address" class="form-control" placeholder="Enter phone Mac">
                                            </div>
                                        </div>
                                        <label>Choose Date</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" id="date_added" name="date_added" class="form-control" placeholder="Choose Date">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" form="storePhone" class="btn btn-info waves-effect">Save</button>
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
                            <th>Registrar Name</th>
                            <th>Source</th>
                            <th>Phone Model</th>
                            <th>Serial Namber</th>
                            <th>Mac Address</th>
                            <th>Added Date</th>
                            <th>UPDATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($phone as $phone)
                        <tr>
                            <td>{{ $phone->id}}</td>
                            <td>{{ $phone->registrar_name}}</td>
                            <td>{{ $phone->source}}</td>
                            <td>{{ $phone->model}}</td>
                            <td>{{ $phone->serial_number}}</td>
                            <td>{{ $phone->mac_address}}</td>
                            <td>{{ $phone->date_added}}</td>
                            <td><a href="#"><span data-toggle="modal" data-target="#UpdateCisco{{$phone->id}}" class="fa fa-edit" style="font-size: 18px"></span>
                                <div class="modal fade" id="UpdateCisco{{$phone->id}}" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="formModal">Update Users!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('update.cisco', ['id' =>$phone->id])}}" method="POST" enctype="multipart/form-data" id="EditCisco{{ $phone->id}}">
                                                    @csrf
                                                    @method('PUT')
                                                    <label for="unit">Rigestrar Name:</label>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <select name="name" id="" class="form-control">
                                                                <option value="{{ $profileData->name}}">{{ $profileData->name}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <label>Source</label>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <select name="city" id="" class="form-control">
                                                                @foreach ($province as $pro)
                                                                        <option value="{{ $pro->province_name }}">
                                                                        {{ $pro->province_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <label>PHONE MODEL</label>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" value="{{ $phone->model }}" name="model" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                    <label>SERIAL NUMBER</label>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" value="{{ $phone->serial_number }}" name="serial_number" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                    <label>MAC ADDRESS</label>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" value="{{ $phone->mac_address }}" name="mac_address" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                    <label>DATE ADDED</label>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="date" value="{{ $phone->date_added }}" name="date_added" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" form="EditCisco{{ $phone->id}}" class="btn btn-info waves-effect">Save</button>
                                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a></td>
                            {{-- <td><a href="{{ route('delete.cisco',['id' => $phone->id])}}"><span class="fas fa-trash text-danger" style="font-size: 18px"></span></a></td> --}}
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
