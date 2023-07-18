@extends('layouts.master')
@section('css')

@section('title')
    {{ isset($doctor) ? 'Edit Doctor' : 'Add Doctor' }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ isset($doctor) ? 'Edit Doctor' : 'Add Doctor' }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
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
                    <h1>{{ isset($doctor) ? 'Edit Doctor' : 'Add Doctor' }}</h1>
                    <form action="{{ isset($doctor) ? route('doctors.update', $doctor->id) : route('doctors.store') }}" method="POST">
                        @csrf
                        @if (isset($doctor))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ isset($doctor) ? $doctor->name : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ isset($doctor) ? $doctor->email : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="specialist">Specialist</label>
                            <input type="text" name="specialist" class="form-control" value="{{ isset($doctor) ? $doctor->specialist : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="experienceYears">Experience Years</label>
                            <input type="number" name="experienceYears" class="form-control" value="{{ isset($doctor) ? $doctor->experienceYears : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ isset($doctor) ? $doctor->phone : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control">{{ isset($doctor) ? $doctor->description : '' }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ isset($doctor) ? 'Update Doctor' : 'Add Doctor' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
