<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\VisitHistory;
use Illuminate\Http\Request;

class VisitHistoryApiController extends Controller
{
    public function getVisitHistories(){
        return VisitHistory::all();
    }

    public function getVisitHistory($id){
        return VisitHistory::where('patient_id','=',$id)->get();
    }
}
