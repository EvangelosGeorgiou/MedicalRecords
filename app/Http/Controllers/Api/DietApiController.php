<?php

namespace App\Http\Controllers\Api;

use App\Diet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DietApiController extends Controller
{
    public function getDiets(){
        return Diet::all();
    }

    public function getDiet($id){
        return Diet::where('patient_id','=',$id)->get();
    }
}
