<?php

namespace App\Http\Controllers\MedicalRecord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patients;
use App\Diet;

class DHIController extends Controller
{
    public function show($patient_id){

        $dietInfo = Patients::with('habitsInfo')->get();
        $patients = Patients::find($patient_id);
        return view('medicalRecord.dhi')->with('patients', $patients);
    }
}
