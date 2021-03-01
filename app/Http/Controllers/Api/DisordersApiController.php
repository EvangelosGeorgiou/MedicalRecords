<?php

namespace App\Http\Controllers\Api;

use App\Disorders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DisordersApiController extends Controller
{
    public function getDisorders(){
        return Disorders::all();
    }

    public function getDisorder($id){
        return Disorders::where('patient_id','=',$id)->get();
    }
}
