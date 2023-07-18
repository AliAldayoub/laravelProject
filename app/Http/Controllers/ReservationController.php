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
        // Validate the request data
        $validatedData = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email',
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required',
            'time' => 'required',
            'remarks' => 'nullable',
        ]);

        // Create a new user or retrieve an existing one based on the provided email
        $user = User::where('email', $validatedData['user_email'])->first();
        if (!$user) {
            return redirect()->back()->withInput()->withErrors(['error' => 'The email you entered is not registered. Please create a new user account and try again.']);
        }
        // Create the reservation
        $reservation = Reservation::create([
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
            'remarks' => $validatedData['remarks'],
            'user_id' => $user->id,
        ]);

        // Associate the reservation with the selected doctor
        $doctor = Doctor::find($validatedData['doctor_id']);
        $doctor->reservations()->attach($reservation);

        // Redirect or show success message
        return redirect()->route('reservationsForUser', ['user_id' => $reservation->user_id])->with('success', 'Reservation added successfully!');

        // return redirect()->route('reservationsForUser')->with('success', 'Reservation added successfully!');
    }
    public function showReservations(Request $request)
    {
        // Retrieve all users
        $users = User::all();

        // Pass the users to the view
        return view('user-reservations', compact('users'));
    }

    public function userReservations(Request $request)
    {
        $userId = $request->input('user_id');

        // Retrieve the selected user's reservations
        $user = User::findOrFail($userId);
        $reservations = $user->reservations()->with('doctors')->get();
        // dd($reservations);
        // Retrieve all users (for the select dropdown)
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
        // Validate the request data
        $validatedData = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required',
            'time' => 'required',
            'remarks' => 'nullable',
        ]);


        // Update the reservation details
        $reservation->date = $validatedData['date'];
        $reservation->time = $validatedData['time'];
        $reservation->remarks = $validatedData['remarks'];
        $reservation->save();

        // Associate the reservation with the selected doctor
        $doctor = Doctor::find($validatedData['doctor_id']);
        $doctor->reservations()->sync([$reservation->id]);
        // Redirect or show success message
        return redirect()->route('reservationsForUser', ['user_id' => $reservation->user_id])->with('success', 'Reservation updated successfully!');
    }
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $userId = $reservation->user_id;
        // Detach the related doctors from the reservation
        $reservation->doctors()->detach();

        // Delete the reservation
        $reservation->delete();

        // Redirect or show success message
        return redirect()->route('reservationsForUser', ['user_id' => $userId])->with('success', 'Reservation deleted successfully!');
    }
    public function getDoctorReservations()
    {
        $doctors = Doctor::all();
        return view('doctor-reservations', compact('doctors'));
    }
    public function doctorReservations($doctorId)
    {
        // Retrieve the selected doctor's reservations
        $doctor = Doctor::findOrFail($doctorId);
        $reservations = $doctor->reservations()->with('user')->get();
        $doctors = Doctor::all();
        // Pass the reservations to the view
        return view('doctor-reservations', compact('reservations', 'doctors'));
    }
}
