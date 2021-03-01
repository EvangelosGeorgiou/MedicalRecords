<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Medications;
use Illuminate\Http\Request;

class MedicationsApiController extends Controller
{
    public function getMedications(){
        return Medications::all();
    }

    public function getMedication($id){
        return Medications::where('patient_id','=',$id)->get();
    }
}
