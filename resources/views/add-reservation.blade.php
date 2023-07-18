@extends('layouts.master')
@section('css')

@section('title')
    {{ isset($reservation) ? 'Update Reservation' : 'Add Reservation' }}
@stop
@endsection
@section('page-header')

<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ isset($reservation) ? 'Update Reservation' : 'Add Reservation' }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{ isset($reservation) ? 'Update Reservation' : 'Add Reservation' }}</li>
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
                
<form action="{{ isset($reservation) ? route('reservations.update', $reservation->id) : route('reservations.store') }}" method="POST">
    @csrf
    @if (isset($reservation))
        @method('PUT')
    @endif

    
    <div class="form-group">
        <label for="user_name">Name:</label>
        <input type="text" id="user_name" name="user_name" class="form-control" value="{{ isset($reservation) ? $reservation->user->name : '' }}" {{ isset($reservation) ? 'readonly' : 'required' }}>
    </div>

    <div class="form-group">
    <label for="user_email">Email:</label>
    <input type="email" id="user_email" name="user_email" class="form-control {{ $errors->has('error') ? 'is-invalid' : '' }}" value="{{ old('user_email', isset($reservation) ? $reservation->user->email : '') }}" {{ isset($reservation) ? 'readonly' : 'required' }}>
    @if ($errors->has('error'))
        <div class="invalid-feedback">{{ $errors->first('error') }}</div>
    @endif
</div>



    
    <div class="form-group">
        <label for="doctor_id">Select a Doctor:</label>
        <select id="doctor_id" name="doctor_id" class="form-control" required>
            @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}" {{ isset($reservation) && $reservation->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
            @endforeach
        </select>
    </div>

    
    <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" class="form-control" value="{{ isset($reservation) ? $reservation->date : '' }}" required>
    </div>

    <div class="form-group">
        <label for="time">Time:</label>
        <input type="time" id="time" name="time" class="form-control" value="{{ isset($reservation) ? $reservation->time : '' }}" required>
    </div>

    <div class="form-group">
        <label for="remarks">Remarks:</label>
        <textarea id="remarks" name="remarks" class="form-control">{{ isset($reservation) ? $reservation->remarks : '' }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">{{ isset($reservation) ? 'Update Reservation' : 'Add Reservation' }}</button>
</form>

            </div>
        </div>
    </div>
</div>

@endsection
@section('js')

@endsection
