<?php

namespace App\Http\Controllers\Api;

use App\Allergies;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllergiesApiController extends Controller
{
    public function getAllergies(){
        return Allergies::all();
    }

    public function getAllergy($id){
        return Allergies::where('patient_id','=',$id)->get();
    }
}
