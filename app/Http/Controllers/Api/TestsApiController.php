<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Tests;
use Illuminate\Http\Request;

class TestsApiController extends Controller
{
    public function getTests(){
        return Tests::all();
    }

    public function getTest($id){
        return Tests::where('patient_id','=',$id)->get();
    }
}
