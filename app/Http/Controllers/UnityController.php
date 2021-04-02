<?php

namespace App\Http\Controllers;

use App\Patients;
use Illuminate\Http\Request;

class UnityController extends Controller
{
    public function index($patient_id){
        $patients = Patients::find($patient_id);
        return view('unity.index')->with('patients',$patients);
    }
}
