<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;
use App\Medications;
use App\Http\Requests\MedicationsRequest;

class MedicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($patient_id)
    {
        $patients = Patients::find($patient_id);
        return view('medications.create')->with('patients', $patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicationsRequest $request)
    {
        $medication = Medications::create([
            'name'  => $request->name,
            'start_date'  => $request->start_date,
            'finish_date'  => $request->finish_date,
            'dosage'  => $request->dosage,
            'instuctions'  => $request->instuctions,
            'purpose'  => $request->purpose,
            'doctor_name'  => $request->doctor_name,
            'side_effects'  => $request->side_effects,
            'patient_id'  => $request->patient_id
        ]);

        session()->flash('success',"Patient Medication created successfully");

        return redirect(route('appointments-tests.show', $request->patient_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Medications $medication)
    {
        $patients = Patients::find($medication->patient_id);
        return view('medications.show')->with('medication',$medication)->with('patients',$patients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Medications $medication)
    {
        $patients = Patients::find($medication->patient_id);
        return view('medications.create')->with('patients', $patients)->with('medication',$medication);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicationsRequest $request, Medications $medication)
    {
        $data = $request->only(['name','start_date','finish_date','dosage','instuctions','purpose','doctor_name','side_effects','patient_id']);

        $medication->update($data);

        session()->flash('success','Patient medication updated successfully');

        return redirect(route('appointments-tests.show', $request->patient_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medications $medication)
    {
        $medication->delete();
        session()->flash('success','Patient medication deleted successfully');
        return redirect()->back();
    }
}
