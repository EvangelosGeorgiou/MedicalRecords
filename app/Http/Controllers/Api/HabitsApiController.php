<?php

namespace App\Http\Controllers\Api;

use App\Habits;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HabitsApiController extends Controller
{
    public function getHabits(){
        return Habits::all();
    }

    public function getHabit($id){
        return Habits::where('patient_id','=',$id)->get();
    }
}
