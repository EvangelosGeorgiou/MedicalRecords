<?php

namespace App\Http\Controllers\Api;

use App\BodyParts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BodyPartsApiController extends Controller
{
    public function getBodyParts(){
        return BodyParts::all();
    }

    public function getBodyPart($id){
        return BodyParts::where('id','=',$id)->get();
    }
}
