<?php

namespace App\Http\Controllers;

use App\Diseases;
use App\Disorders;
use Illuminate\Http\Request;
use App\Patients;
use App\Medications;
use App\Http\Requests\MedicationsRequest;
use App\Medicines;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class MedicationsController extends Controller
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
        return view('medications.create')->with('patients', $patients)->with('error_code', "")->with('medicines', Medicines::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicationsRequest $request)
    {
        $diseases_arr = array();

        $patients = Patients::find($request->patient_id);
        $diseases = Diseases::where('patient_id','=' ,$request->patient_id)->get();
        $disorders = Disorders::where('patient_id','=' ,$request->patient_id)->get();

        $count=0;
        foreach ($diseases as $i => $disease) {

            if((Str::contains($disease->icdCodeInfo->name, 'heart') && $request->name == "Sildenafil") || (Str::contains($disease->icdCodeInfo->name, 'liver') && $request->name == "Fluconazole")
                || (Str::contains($disease->icdCodeInfo->name, 'cholesterol') && $request->name == "Hydrothiazine" ) || (Str::contains($disease->icdCodeInfo->name, 'brain') && $request->name == "Metoclopramide") || (Str::contains($disease->icdCodeInfo->name, 'pressure')&& $request->name == "Nurofen")){
                $diseases_arr[$count++] = ($disease->icdCodeInfo->name);
            }
        }

        foreach ($disorders as $disorder) {
            if((Str::contains($disorder->icdCodeInfo->name, 'heart') && $request->name == "Sildenafil") || (Str::contains($disorder->icdCodeInfo->name, 'liver') && $request->name == "Fluconazole")
                || (Str::contains($disorder->icdCodeInfo->name, 'cholesterol') && $request->name == "Hydrothiazine" ) || (Str::contains($disorder->icdCodeInfo->name, 'brain') && $request->name == "Metoclopramide") || (Str::contains($disorder->icdCodeInfo->name, 'pressure')&& $request->name == "Nurofen")){
                $diseases_arr[$count++] = ($disease->icdCodeInfo->name);
            }
        }


        if(!empty($diseases_arr)){
            return View::make('medications.create')->with(['patients' => $patients, 'error_code'=> 5, 'request'=>$request, 'diseases' => $diseases_arr, 'medicines' => Medicines::all()]);
        }else{
            $medication = Medications::create([
                'name'  => $request->name,
                'start_date'  => $request->start_date,
                'finish_date'  => $request->finish_date,
                'dosage'  => $request->dosage,
                'instuctions'  => $request->instuctions,
                'purpose'  => $request->purpose,
                'doctor_name'  => $request->doctor_name,
                'side_effects'  => $request->side_effects,
                'patient_id'  => $request->patient_id
            ]);

            session()->flash('success',"Patient Medication added successfully");

            return redirect(route('appointments-tests.show', $request->patient_id));
        }

    }

    public function confirmStore(MedicationsRequest $request){

        $medication = Medications::create([
            'name'  => $request->name,
            'start_date'  => $request->start_date,
            'finish_date'  => $request->finish_date,
            'dosage'  => $request->dosage,
            'instuctions'  => $request->instuctions,
            'purpose'  => $request->purpose,
            'doctor_name'  => $request->doctor_name,
            'side_effects'  => $request->side_effects,
            'patient_id'  => $request->patient_id
        ]);



        return session()->flash('success',"Patient Medication added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Medications $medication)
    {
        $patients = Patients::find($medication->patient_id);
        return view('medications.show')->with('medication',$medication)->with('patients',$patients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Medications $medication)
    {
        $patients = Patients::find($medication->patient_id);
        return view('medications.create')->with('patients', $patients)->with('medication',$medication)->with('medicines', Medicines::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicationsRequest $request, Medications $medication)
    {
        $data = $request->only(['name','start_date','finish_date','dosage','instuctions','purpose','doctor_name','side_effects','patient_id']);

        $medication->update($data);

        session()->flash('success','Patient medication updated successfully');

        return redirect(route('appointments-tests.show', $request->patient_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medications $medication)
    {
        $medication->delete();
        session()->flash('success','Patient medication deleted successfully');
        return redirect()->back();
    }
}
