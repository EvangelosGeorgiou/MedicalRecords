<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Surgeries;
use Illuminate\Http\Request;

class SurgeriesApiController extends Controller
{
    public function getSurgeries(){
        return Surgeries::all();
    }

    public function getSurgery($id){
        return Surgeries::where('id','=',$id)->get();
    }

    public function getPatientSurgery($id){
        return Surgeries::where('patient_id','=',$id)->get();
    }
}
