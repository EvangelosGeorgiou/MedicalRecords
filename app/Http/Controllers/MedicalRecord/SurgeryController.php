<?php

namespace App\Http\Controllers\MedicalRecord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patients;
use App\Surgeries;
use App\Procedures;
use App\Http\Requests\SurgeryRequest;

class SurgeryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($patient_id)
    {
        $patients = Patients::find($patient_id);
        return view('medicalRecord.surgery.index')->with('patients',$patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($patient_id)
    {
        $patients = Patients::find($patient_id);
        return view('medicalRecord.surgery.create')->with('patients', $patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurgeryRequest $request)
    {
        $surgery = Surgeries::create([
            'name'  => $request->name,
            'datetime'  => $request->datetime,
            'doc_name'  => $request->doc_name,
            'assistants'  => $request->assistants,
            'body_part_id'  => $request->body_part,
            'complications'  => $request->complications,
            'patient_id' => $request->patient_id,
        ]);

        if(count($request->procedure_name) > 0){
            for($i=0; $i < count($request->procedure_name) ; $i++){
                $procedure = Procedures::create([
                    'name' => $request->procedure_name[$i],
                    'description' => $request->procedure_description[$i] ,
                    'surgery_id' => $surgery->id,
                ]);
            }
        }

        session()->flash('success','Surgery Information added successfully');
        return redirect(route('patient-surgery.show ', $request->patient_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($patient_id)
    {
        $patients = Patients::find($patient_id);
        return view('medicalRecord.surgery.index')->with('patients',$patients);
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
        //
    }
}
