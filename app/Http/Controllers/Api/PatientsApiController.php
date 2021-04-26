<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patients;

class PatientsApiController extends Controller
{
    public function index()
    {
        $patients = Patients::all();

        foreach ($patients as $patient) {
            if($patient->image != null)
                $patient->image = asset('/storage/'.$patient->image);
        }


        return $patients;
    }

    public function show($id)
    {
        return Patients::where('id','=',$id)->get();
    }

}
