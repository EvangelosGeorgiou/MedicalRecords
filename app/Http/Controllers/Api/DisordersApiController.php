<?php

namespace App\Http\Controllers\Api;

use App\Disorders;
use App\Http\Controllers\Controller;
use App\Http\Resources\DisorderResource;
use Illuminate\Http\Request;

class DisordersApiController extends Controller
{
    public function getDisorders(){
        $disorder = Disorders::with(['icdCodeInfo']);
        return DisorderResource::collection($disorder->paginate(50))->response();
    }

    public function getDisorder($id){
        $disorder = Disorders::with(['icdCodeInfo']);
        return DisorderResource::collection($disorder->where('id','=',$id)->paginate(50))->response();
    }

    public function getPatientDisorder($id){
        $disorder = Disorders::with(['icdCodeInfo']);
        return DisorderResource::collection($disorder->where('patient_id','=',$id)->paginate(50))->response();
        //return Disorders::where('patient_id','=',$id)->with('icdCodeInfo')->first();
    }
}
