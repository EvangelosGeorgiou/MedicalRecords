<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Procedures;
use Illuminate\Http\Request;

class ProceduresApiController extends Controller
{
    public function getProcedures(){
        return Procedures::all();
    }

    public function getProcedure($id){
        return Procedures::where('surgery_id','=',$id)->get();
    }
}
