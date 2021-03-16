<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patients;

class PatientsApiController extends Controller
{
    public function index()
    {
        return Patients::all();
    }

    public function show($id)
    {
        return Patients::where('id','=',$id)->get();
    }

}
