@extends('layouts.master')
@section('css')

@section('title')
    Doctor Reservations
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Doctor Reservations</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Doctor Reservations</li>
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
    <h1>Doctor Reservations</h1>
    <div class="form-group">
        <label for="doctor_id">Select Doctor:</label>
        <select id="doctor_id" name="doctor_id" class="form-control">
            @foreach ($doctors as $doctor)
            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
            @endforeach
        </select>
        <button type="button" class="btn btn-primary" onclick="loadDoctorReservations()">Load Reservations</button>
    </div>
    <hr>
    <div id="reservations-container">
         @isset($reservations)
        @if ($reservations->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Remarks</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ $reservation->time }}</td>
                    <td>{{ $reservation->remarks }}</td>
                    <td>{{ $reservation->user->name }}</td>
                    
</tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3>No reservations to display</h3>
        @endif
        @else
        <h3>Please select a doctor to get reservations</h3>
    @endisset
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>   
function loadDoctorReservations() {
        var doctorId = document.getElementById('doctor_id').value;
        window.location.href = "/doctor-reservations/" + doctorId;
    }
</script>
@endsection
