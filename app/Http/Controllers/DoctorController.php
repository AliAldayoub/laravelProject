<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors', compact('doctors'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-doctor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('add-doctor', compact('doctor'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);
        // Update the doctor's information based on the form data in $request
        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->specialist = $request->input('specialist');
        $doctor->experienceYears = $request->input('experienceYears');
        $doctor->phone = $request->input('phone');
        $doctor->description = $request->input('description');
        $doctor->save();

        // Redirect back to the doctors list with a success message
        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        // Redirect back to the doctors list with a success message
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }
}
