<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;
use App\Diseases;
use App\Http\Requests\CreateDiseasesRequest;
use App\ICD_CODE;
use App\BodyParts;
use App\PatientBodyParts;
use Illuminate\Support\Facades\Http;

class DiseasesController extends Controller
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
    public function create($patients_id)
    {
        //$icd_json = Http::get('http://127.0.0.1:8000/api/getIcdCode');
        //dd($icd_json);
        $patients = Patients::find($patients_id);
        return view('diseases.create')->with('patients',$patients)->with('icdCode', ICD_CODE::all())->with('body_parts',BodyParts::all()->sortBy('name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiseasesRequest $request)
    {
        // dd($request->body_part_id);
        $diseases = Diseases::create([
            'icd_code_id' => $request->icd_code_id,
            'description' => $request->description,
            'diagnosis'  => $request->diagnosis,
            'symptoms' => $request->symptoms,
            'doc_name' => $request->doc_name,
            'date' => $request->date,
            'body_part' => $request->body_part,
            'patient_id' => $request->patient_id
        ]);

        // PatientBodyParts::create([
        //     'bodyPartID' => $request->body_part_id,
        //     'patient_id' => $request->patient_id,
        //     'flag' => '1'
        // ]);

        session()->flash('success',"Disease Information created successfully");

        return redirect(route('illness.show', $request->patient_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Diseases $disease)
    {
        $patients = Patients::find($disease->patient_id);
        return view('diseases.show')->with('disease', $disease)->with('patients',$patients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Diseases $disease)
    {
        $patients = Patients::find($disease->patient_id);
        return view('diseases.create')->with('patients',$patients)->with('disease', $disease)->with('patients',$patients)->with('icdCode', ICD_CODE::all())->with('body_parts',BodyParts::all()->sortBy('name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateDiseasesRequest $request, Diseases $disease)
    {
        $data = $request->only([ 'icd_code_id', 'description', 'patient_id','diagnosis','symptoms','doc_name','date','body_part' ]);
        // PatientBodyParts::where('patient_id',$request->patient_id)
        //                 ->where('bodyPartID', $disease->body_part_id )
        //                 ->update(['bodyPartID'=>$request->body_part_id,
        //                         'flag'=> 1,
        //                         'patient_id' => $request->patient_id]);

        $disease->update($data);


        session()->flash('success','Disease Information updated successfully');

        return redirect(route('illness.show', $request->patient_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diseases $disease)
    {

        $patients_id = $disease->patient_id;

        $body_part_id = $disease->body_part_id;
        //PatientBodyParts::where('bodyPartID','=',$body_part_id)->where('patient_id','=',$disease->patient_id)->delete();
        $disease->delete();

        session()->flash('success', 'Disease deleted successfuly');

        return redirect(route('illness.show', $patients_id));
    }
}
