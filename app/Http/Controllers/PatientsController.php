<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;
use App\Http\Requests\CreatePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;
use App\ContactInformation;


class PatientsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patients.index')->with('patients', Patients::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePatientsRequest $request)
    {
        $patient = Patients::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'nationality' => $request->nationality,
            'dbo' => $request->dbo,
            'gender' => $request->gender,
            'weight' => $request->weight,
            'height' => $request->height,
            'status' => $request->status,
            'identity_number' => $request->identity_number,
            'telephone' => $request->telephone,
            ]);

        session()->flash('success',"Patient created successfully");

        return redirect(route('home'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patients $patient)
    {
        $contact = Patients::with('contactInfo')->get();
        // dd($patient->contactInfo->address);
        //return view('medicalRecord.patientInfo')->with('patients', $patient);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patients = Patients::find($id);
        return view('patients.create')->with('patients',$patients);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientsRequest $request, Patients $patients)
    {
        $patient_id = $request->patient_id;
        $patients = Patients::find($patient_id);

        $data = $request->only(['name','surname','email','nationality','dbo','gender','weight','height','status','identity_number', 'telephone']);

        $patients->update($data);
        session()->flash('success','Patient Information updated successfuly');

        return redirect(route('patient-info.show', $request->patient_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
