<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;
use App\VisitHistory;
use App\DoctorSpeciality;
use App\Http\Requests\VisitHistoryRequest;

class VisitHistoryController extends Controller
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
        return view('appointments-tests.create')->with('patients', $patients)->with('docSpeciality', DoctorSpeciality::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisitHistoryRequest $request)
    {
        $visit = VisitHistory::create([
            'doc_name'  => $request->doc_name,
            'doc_speciality_id'  => $request->doc_speciality_id,
            'reason_of_visit'  => $request->reason_of_visit,
            'description'  => $request->description,
            'date'  => $request->date,
            'patient_id'  => $request->patient_id
        ]);

        session()->flash('success',"Visit Information created successfully");

        return redirect(route('appointments-tests.show', $request->patient_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visits = VisitHistory::find($id);
        $patients = Patients::find($visits->patient_id);
        return view('appointments-tests.show')->with('patients', $patients)->with('visits',$visits);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vh = VisitHistory::find($id);
        $patients = Patients::find($vh->patient_id);
        return view('appointments-tests.create')->with('patients',$patients)->with('visitHistory', $vh)->with('docSpeciality', DoctorSpeciality::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VisitHistoryRequest $request, $id)
    {
        $vh = VisitHistory::find($id);
        $data = $request->only(['doc_name','doc_speciality_id','reason_of_visit','description','date','patient_id' ]);

        $vh->update($data);

        session()->flash('success','Visit Information updated successfully');

        return redirect(route('appointments-tests.show', $request->patient_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vh = VisitHistory::find($id);
        $vh->delete();
        session()->flash('success','Visit Information deleted successfully');
        return redirect()->back();
    }
}
