<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;
use App\Disorders;
use App\Http\Requests\CreateDisordersRequest;
use App\ICD_CODE;
use App\BodyParts;
use App\PatientBodyParts;

class DisordersController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create($id) {
        $patients = Patients::find($id);
        return view('disorders.create')->with('patients', $patients)->with('icdCode', ICD_CODE::all())->with('body_parts',BodyParts::all()->sortBy('name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDisordersRequest $request) {
        $disorder = Disorders::create([
            'icd_code_id' => $request -> icd_code_id,
            'date' => $request -> date,
            'description' => $request -> description,
            'body_part' => $request->body_part,
            'patient_id' => $request -> patient_id
        ]);

        // PatientBodyParts::create([
        //     'bodyPartID' => $request->body_part_id,
        //     'patient_id' => $request->patient_id,
        //     'flag' => '1'
        // ]);

        session() -> flash('success', "Disorder added successfully");

        return redirect(route('illness.show', $request -> patient_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Disorders $disorder) {
        $patients = Patients::find($disorder->patient_id);
        return view('disorders.show')
                                    ->with('patients',$patients)
                                    ->with('disorder',$disorder)
                                    ->with('icdCode', ICD_CODE::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Disorders $disorder) {
        $patients = Patients::find($disorder->patient_id);
        return view('disorders.create')
                                    ->with('patients',$patients)
                                    ->with('disorder',$disorder)
                                    ->with('icdCode', ICD_CODE::all())
                                    ->with('body_parts',BodyParts::all()->sortBy('name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateDisordersRequest $request, Disorders $disorder) {
        $data = $request->only([ 'icd_code_id','description','date','patient_id', 'body_part' ]);

        // PatientBodyParts::where('patient_id',$request->patient_id)
        //                 ->where('bodyPartID', $disorder->body_part_id )
        //                 ->update(['bodyPartID'=>$request->body_part_id,
        //                         'flag'=> 1,
        //                         'patient_id' => $request->patient_id]);

        $disorder->update($data);

        session()->flash('success','Disorder Information updated successfully');

        return redirect(route('illness.show', $request->patient_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disorders $disorder) {
        $patients_id = $disorder -> patient_id;

        $body_part_id = $disorder->body_part_id;

        // PatientBodyParts::where('bodyPartID','=',$body_part_id)->where('patient_id','=',$disorder->patient_id)->delete();
         $disorder -> delete();

        session() -> flash('success', 'Disorder deleted successfuly');

        return redirect(route('illness.show', $patients_id));
    }


}
