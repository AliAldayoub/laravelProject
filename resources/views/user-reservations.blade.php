@extends('layouts.master')
@section('css')

@section('title')
    User Reservations
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> User Reservations</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">User Reservations</li>
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
    <h1>User Reservations</h1>
    <div class="form-group">
        <label for="user_id">Select User:</label>
        <select id="user_id" name="user_id" class="form-control">
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <button type="button" class="btn btn-primary" onclick="loadUserReservations()">Load Reservations</button>
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
                    <th>Doctor</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ $reservation->time }}</td>
                    <td>{{ $reservation->remarks }}</td>
                    <td>
    @foreach ($reservation->doctors as $doctor)
        {{ $doctor->name }}<br>
    @endforeach
</td>

                    <td>
                        <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3>No reservations to display</h3>
        @endif
        @else
        <h3>Please select a user to get reservations</h3>
    @endisset
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>   
    function loadUserReservations() {
        var userId = document.getElementById('user_id').value;
        window.location.href = "/user-reservations/reservations?user_id=" + userId;
    }
</script>
@endsection
