<?php

namespace App\Http\Controllers\Api;

use App\ContactInformation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactApiController extends Controller
{
    public function index(){

        return ContactInformation::all();
    }

    public function contactinfo($id){
       return ContactInformation::where('patient_id','=',$id)->get();
    }
}
