<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PatientBodyParts;

class PatientsBodyPartsController extends Controller
{
    public function getbodyparts(){
        return PatientBodyParts::all();
    }

    public function getbodypart($id){
        return PatientBodyParts::where('patient_id','=',$id)->get();
    }
}
