<?php

namespace App\Http\Controllers\MedicalRecord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patients;

class PatientInfoController extends Controller
{
    public function show(Patients $patient){
        return view('medicalRecord.patientInfo')->with('patients', $patient);
    }
}
