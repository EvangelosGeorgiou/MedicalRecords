<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Immunization;
Use App\Patients;
use App\Http\Requests\CreateImmunizationRequest;

class ImmunizationController extends Controller
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
        return view('immunizations.create')->with('patients',$patients);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateImmunizationRequest $request)
    {
        $habits = Immunization::create([
            'vaccine_name' => $request->vaccine_name,
            'date' => $request->date,
            'description' => $request->description,
            'patient_id' => $request->patient_id
        ]);

        session()->flash('success','Immunization Information added successfully');
        return redirect(route('dhi.show', $request->patient_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $immunization = Immunization::find($id);
        $immunization->delete();
        session()->flash('success','Immunization Information deleted successfully');
        return redirect()->back();
    }
}
