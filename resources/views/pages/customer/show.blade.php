@extends('layouts.admin')

@section('title')
    Customer {{ $data->user->first_name }}
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Data Customer</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>Nama</td>
                                <td>: {{ $data->user->first_name}} {{ $data->user->last_name }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: {{ $data->address }}</td>
                            </tr>
                            <tr>
                                <td>dibuat</td>
                                <td>: {{ $data->created_at->diffForHumans() }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="bg-black"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection