<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;
use App\Obstetric;
use App\Http\Requests\ObstetricRequest;

class ObstetricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $patients = Patients::find($id);
        return view('medicalRecord.obstetric')->with('patients',$patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $patients = Patients::find($id);
        return view('obstetric.create')->with('patients',$patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ObstetricRequest $request)
    {
        $obstetric = Obstetric::create([
            'doctor_name' => $request->doctor_name,
            'type' => $request->type,
            'childrens' => $request->childrens,
            'number_of_childer' =>$request->number_of_childer,
            'complications' => $request->complications,
            'date' => $request->date,
            'patient_id' => $request->patient_id
        ]);

        session()->flash('success',"Obstetric created successfully");

        return redirect(route('obstetric.index', $request->patient_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Obstetric $obstetric)
    {
        $patients = Patients::find($obstetric->patient_id);
        return view('obstetric.show')->with('patients',$patients)->with('obstetric', $obstetric);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Obstetric $obstetric)
    {
        $patients = Patients::find($obstetric->patient_id);
        return view('obstetric.create')->with('patients',$patients)->with('obstetric', $obstetric);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ObstetricRequest $request, Obstetric $obstetric)
    {
        $data = $request->only([  'doctor_name','type','child_name','child_sex','number_of_childer','complications','date','patient_id']);

        $obstetric->update($data);

        session()->flash('success','Obstetric Information updated successfully');

        return redirect(route('obstetric.index', $request->patient_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obstetric $obstetric)
    {
        $obstetric->delete();
        session()->flash('success','Obstetric deleted successfully');
        return redirect()->back();
    }
}
