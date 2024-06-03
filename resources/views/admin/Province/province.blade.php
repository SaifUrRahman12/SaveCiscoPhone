@extends('admin.layout.admin_dash')
@section('content')

<!-- ------- ---------- START of Added Country MOdal --------------------------- -->

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    @include('admin.message.success')
    @include('admin.message.errors')
    <div class="modal fade" id="countryModal" tabindex="-1" role="dialog"
        aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Add New Province</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('store.province')}}" onsubmit="return validateProvince();" method="post" enctype="multipart/form-data" id="storeProvince">
                    @csrf
                    <div class="modal-body">
                        @csrf
                        <label for="name">Province Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="province_name" name="province_name"
                                    class="form-control"
                                    placeholder="..... Province  Name ....">
                                    <span class="msg text-danger" id="msg1"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="storeProvince" class="btn btn-info waves-effect" >Save</button>
                        <button type="button" class="btn btn-danger waves-effect"
                        data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- --------------- - ----------- END of Addedd Sub Category Modal ----------- -->
<div class="row">


    <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-md-8">
                        <h5>Province</h5>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#countryModal">add</button>
                    </div>
                </div>
            </div>
            <div class="body">
                <main class="app-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tile">
                                <div class="tile-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered" id="printTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Province Name</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!is_null($province))
                                                    @foreach ($province as $pro)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$pro->province_name}}</td>
                                                            <td>
                                                                <form class="float-right"  style="display: inline" action="{{ route('delete.province',['id' => $pro->id])}}" method="POST" onsubmit="return confirm('Do you want to delete?') ">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="badge badge-danger" type="submit" style="border:none">x</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <td colspan="3" style="text-align: center">....No more record in database</td>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</div>

@endsection
