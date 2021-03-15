<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\ICD_CODE;
use Illuminate\Http\Request;

class IcdApiController extends Controller
{
    public function getICDs(){
        return ICD_CODE::all();
    }

    public function getICD($id){
        return ICD_CODE::where('id','=',$id)->get();
    }
}
