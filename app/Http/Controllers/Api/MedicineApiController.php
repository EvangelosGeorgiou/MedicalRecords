<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Medicines;
use Illuminate\Http\Request;

class MedicineApiController extends Controller
{
    public function getMedicines(){
        return Medicines::all();
    }

    public function getMedicine($id){
        return Medicines::where('id','=',$id)->get();
    }
}
