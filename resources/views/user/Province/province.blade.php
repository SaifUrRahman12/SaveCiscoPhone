@extends('user.layout.user_dash')
@section('content')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-md-8">
                        <h5>Province</h5>
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!is_null($province))
                                                    @foreach ($province as $pro)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$pro->province_name}}
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
