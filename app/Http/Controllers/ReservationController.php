<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\User;
use App\Models\Doctor;

class ReservationController extends Controller
{
    public function create()
    {
        $doctors = Doctor::all();
        return view('add-reservation', compact('doctors'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email',
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required',
            'time' => 'required',
            'remarks' => 'nullable',
        ]);

        $user = User::where('email', $validatedData['user_email'])->first();
        if (!$user) {
            return redirect()->back()->withInput()->withErrors(['error' => 'The email you entered is not registered. Please create a new user account and try again.']);
        }
        $reservation = Reservation::create([
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
            'remarks' => $validatedData['remarks'],
            'user_id' => $user->id,
        ]);


        $doctor = Doctor::find($validatedData['doctor_id']);
        $doctor->reservations()->attach($reservation);


        return redirect()->route('reservationsForUser', ['user_id' => $reservation->user_id])->with('success', 'Reservation added successfully!');
    }
    public function showReservations(Request $request)
    {

        $users = User::all();


        return view('user-reservations', compact('users'));
    }

    public function userReservations(Request $request)
    {
        $userId = $request->input('user_id');


        $user = User::findOrFail($userId);
        $reservations = $user->reservations()->with('doctors')->get();


        $users = User::all();

        return view('user-reservations', compact('users', 'reservations'));
    }

    public function edit(Reservation $reservation)
    {
        $doctors = Doctor::all();
        return view('add-reservation', compact('reservation', 'doctors'));
    }
    public function update(Request $request, Reservation $reservation)
    {

        $validatedData = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required',
            'time' => 'required',
            'remarks' => 'nullable',
        ]);



        $reservation->date = $validatedData['date'];
        $reservation->time = $validatedData['time'];
        $reservation->remarks = $validatedData['remarks'];
        $reservation->save();


        $doctor = Doctor::find($validatedData['doctor_id']);
        $doctor->reservations()->sync([$reservation->id, true]);

        return redirect()->route('reservationsForUser', ['user_id' => $reservation->user_id])->with('success', 'Reservation updated successfully!');
    }
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $userId = $reservation->user_id;

        $reservation->doctors()->detach();


        $reservation->delete();


        return redirect()->route('reservationsForUser', ['user_id' => $userId])->with('success', 'Reservation deleted successfully!');
    }
    public function getDoctorReservations()
    {
        $doctors = Doctor::all();
        return view('doctor-reservations', compact('doctors'));
    }
    public function doctorReservations($doctorId)
    {

        $doctor = Doctor::findOrFail($doctorId);
        $reservations = $doctor->reservations()->with('user')->get();
        $doctors = Doctor::all();

        return view('doctor-reservations', compact('reservations', 'doctors'));
    }
}
