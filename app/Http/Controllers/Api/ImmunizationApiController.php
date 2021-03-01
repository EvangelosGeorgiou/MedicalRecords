<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Immunization;
use Illuminate\Http\Request;

class ImmunizationApiController extends Controller
{
    public function getImmunizations(){
        return Immunization::all();
    }

    public function getImmunization($id){
        return Immunization::where('patient_id','=',$id)->get();
    }
}
