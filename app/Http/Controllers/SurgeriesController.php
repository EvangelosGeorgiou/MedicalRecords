<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;
use App\Http\Requests\SurgeryRequest;
use App\Surgeries;
use App\Procedures;
use App\BodyParts;
use App\PatientBodyParts;

class SurgeriesController extends Controller
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
        return view('medicalRecord.surgery.create')->with('patients', $patients)->with('body_parts',BodyParts::all()->sortBy('name'));
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
            'procedures'  => $request->procedures,
            'body_part'  => $request->body_part,
            'complications'  => $request->complications,
            'patient_id' => $request->patient_id,
        ]);


        // if($request->procedure_name != null){
        //     for($i=0; $i < count($request->procedure_name) ; $i++){
        //         $procedure = Procedures::create([
        //             'name' => $request->procedure_name[$i],
        //             'description' => $request->procedure_description[$i] ,
        //             'surgery_id' => $surgery->id,
        //         ]);
        //     }
        // }

        // PatientBodyParts::create([
        //     'bodyPartID' => $request->body_part_id,
        //     'patient_id' => $request->patient_id,
        //     'flag' => '1'
        // ]);

        session()->flash('success','Surgery Information added successfully');
        return redirect(route('patient-surgery.show', $request->patient_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $surgery = Surgeries::find($id);
        $patients = Patients::find($surgery->id);

        return view('medicalRecord.surgery.show')->with('surgery',$surgery)->with('patients', $patients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surgery = Surgeries::find($id);
        $patients = Patients::find($surgery->patient_id);
        return view('medicalRecord.surgery.create')->with('surgery',$surgery)->with('patients', $patients)->with('body_parts',BodyParts::all()->sortBy('name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SurgeryRequest $request, Surgeries $surgery)
    {
        $data = $request->only([ 'name','datetime','doc_name','assistants','body_part','complications', 'patient_id' ,'procedures']);

        // PatientBodyParts::where('patient_id',$request->patient_id)
        //                 ->where('bodyPartID', $surgery->body_part_id )
        //                 ->update(['bodyPartID'=>$request->body_part_id,
        //                         'flag'=> 1,
        //                         'patient_id' => $request->patient_id]);

        // if($request->procedure_name != null){
        //     for($i=0; $i < count($request->procedure_name) ; $i++){
        //         Procedures::where('surgery_id', '=',$surgery->id)
        //                 ->update(['name' => $request->procedure_name[$i],
        //                         'description'=> $request->procedure_description[$i]]);
        //     }
        // }

        $surgery->update($data);


        session()->flash('success','Surgery Information updated successfully');
        return redirect(route('patient-surgery.show', $request->patient_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surgeries $surgery)
    {

        $body_part_id = $surgery->body_part_id;

        $bodyPart = PatientBodyParts::where('bodyPartID','=',$body_part_id)->where('patient_id','=',$surgery->patient_id)->delete();

        $surgery->delete();

        session()->flash('success','Surgery deleted successfully');
        return redirect()->back();
    }
}
