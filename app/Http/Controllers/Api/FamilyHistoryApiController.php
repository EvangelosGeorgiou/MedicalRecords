<?php

namespace App\Http\Controllers\Api;

use App\FamilyHistory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FamilyHistoryApiController extends Controller
{
    public function getFamilyHistories(){
        return FamilyHistory::all();
    }

    public function getFamilyHistory($id){
        return FamilyHistory::where('patient_id','=',$id)->get();
    }
}
