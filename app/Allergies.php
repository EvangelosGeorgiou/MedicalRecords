<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergies extends Model
{
    protected $fillable = [
        'name','description','date','patient_id'
    ];
}
