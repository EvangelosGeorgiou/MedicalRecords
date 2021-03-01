<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;
use App\FamilyHistory;
use App\Http\Requests\CreateFamilyHistoryRequest;

class FamilyHistoryController extends Controller
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
        return view('familyHistory.create')->with('patients',$patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFamilyHistoryRequest $request)
    {
        $fam_history = FamilyHistory::create([
            'family_member_name'  => $request->family_member_name,
            'diagnosed_age'  => $request->diagnosed_age,
            'diagnosed_year'  => $request->diagnosed_year,
            'disease_name'  => $request->disease_name,
            'description'  => $request->description,
            'extra_notes'  => $request->extra_notes,
            'family_side'  => $request->family_side,
            'patient_id'  => $request->patient_id
        ]);

        session()->flash('success',"Family History Information created successfully");

        return redirect(route('patient-info.show', $request->patient_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fh = FamilyHistory::find($id);
        $patients = Patients::find($fh->patient_id);
        return view('familyHistory.show')->with('fam_hist', $fh)->with('patients',$patients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $family = FamilyHistory::find($id);
        $patients = Patients::find($family->patient_id);
        return view('familyHistory.create')->with('patients',$patients)->with('familyHistory', $family);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateFamilyHistoryRequest $request, $id)
    {
        $data = $request->only(['family_member_name', 'diagnosed_age','diagnosed_year','disease_name','description',
        'extra_notes','family_side','patient_id' ]);

        $family = FamilyHistory::find($id);
        $family->update($data);

        session()->flash('success','Family History Information updated successfully');

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
        $fh = FamilyHistory::find($id);
        $fh->delete();
        session()->flash('success','Family History information deleted successfully');
        return redirect()->back();
    }
}
