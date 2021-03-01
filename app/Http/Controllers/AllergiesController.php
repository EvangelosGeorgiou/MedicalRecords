<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;
use App\Allergies;
use App\Http\Requests\CreateAllergiesRequest;

class AllergiesController extends Controller
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
    public function create($id)
    {
        $patients= Patients::find($id);
        return view('allergies.create')->with('patients',$patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAllergiesRequest $request)
    {
        $allergies = Allergies::create([ 
            'name' => $request->name, 
            'date' => $request->date, 
            'description' => $request->description, 
            'patient_id' => $request->patient_id
        ]);

        session()->flash('success',"Allergy added successfully");

        return redirect(route('illness.show', $request->patient_id));
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
    public function destroy(Allergies $allergy)
    {
        $patients_id = $allergy->patient_id;

        $allergy->delete();

        session()->flash('success', 'Allergy deleted successfuly');

        return redirect(route('illness.show', $patients_id));
    }
}
