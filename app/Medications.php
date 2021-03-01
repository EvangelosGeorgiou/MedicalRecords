<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medications extends Model
{
    protected $fillable = [
        'name','start_date','finish_date','dosage','instuctions','purpose','doctor_name','side_effects','patient_id'
    ];
}
