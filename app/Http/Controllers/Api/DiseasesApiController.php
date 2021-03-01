<?php

namespace App\Http\Controllers\Api;

use App\Diseases;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiseasesApiController extends Controller
{
    public function getDieseases(){
        return Diseases::all();
    }

    public function getDisease($id){
        return Diseases::where('patient_id','=',$id)->get();
    }
}
