<?php

namespace App\Http\Controllers\Api;

use App\Diseases;
use App\Http\Controllers\Controller;
use App\Http\Resources\DiseasesResource;
use App\ICD_CODE;
use Illuminate\Http\Request;

class DiseasesApiController extends Controller
{
    public function getDieseases(){
        //return Diseases::all();
        $diseases = Diseases::with(['icdCodeInfo']);
        return DiseasesResource::collection($diseases->paginate(50))->response();
    }

    public function getDisease($id){
        $diseases = Diseases::with(['icdCodeInfo']);
        return DiseasesResource::collection($diseases->where('patient_id','=',$id)->paginate(50))->response();
        //return Diseases::where('patient_id','=',$id)->get();
    }
}
