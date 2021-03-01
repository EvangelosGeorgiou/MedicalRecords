<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obstetric extends Model
{
    protected $fillable = [
        'doctor_name','type','child_name','child_sex','number_of_childer','complications','date','patient_id'
    ];
}
