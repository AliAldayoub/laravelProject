<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors', compact('doctors'));
    }



    public function create()
    {
        return view('add-doctor');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'specialist' => 'nullable',
            'experienceYears' => 'nullable|integer',
            'phone' => 'nullable',
            'description' => 'nullable',
        ]);

        Doctor::create($validatedData);

        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully!');
    }


    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('add-doctor', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);


        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->specialist = $request->input('specialist');
        $doctor->experienceYears = $request->input('experienceYears');
        $doctor->phone = $request->input('phone');
        $doctor->description = $request->input('description');
        $doctor->save();

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully');
    }

    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }
}
