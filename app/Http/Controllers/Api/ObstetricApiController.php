<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Obstetric;
use Illuminate\Http\Request;

class ObstetricApiController extends Controller
{
    public function getObstetrics(){
        return Obstetric::all();
    }

    public function getObstetric($id){
        return Obstetric::where('patient_id','=',$id)->get();
    }
}
