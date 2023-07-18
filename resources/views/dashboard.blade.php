@extends('layouts.master')
@section('css')

@section('title')
    Main Dashboard
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Main Dashboard</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                {{-- <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li> --}}
                <li class="breadcrumb-item active">Main Dashboard</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
    <div class="container">
        <div class="text-center">
            <h1>Follow the steps in the sidebar</h1>
            <h2 class="text-danger">Hope you like it</h2>
            <h3>I did the task based on my understanding of the requirements and the implementation of the required operations</h3>
            <h1>Ali Aldayoub</h1>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
