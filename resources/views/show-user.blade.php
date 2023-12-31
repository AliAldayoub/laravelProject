@extends('layouts.master')
@section('css')

@section('title')
    show user
@stop
@endsection
@section('page-header')

<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> User Details</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>

@endsection
@section('content')

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                   <div class="container">
        <h1>User Details</h1>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
            </tr>
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
        </table>
    </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')

@endsection
