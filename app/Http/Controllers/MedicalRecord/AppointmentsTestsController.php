<?php

namespace App\Http\Controllers\MedicalRecord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patients;

class AppointmentsTestsController extends Controller
{
    public function show($patient_id){
        $patients = Patients::find($patient_id);
        return view('medicalRecord.appointmets-tests')->with('patients', $patients);
    }
}
