<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Immunization extends Model
{
    protected $fillable = [
        'vaccine_name', 'date', 'description', 'patient_id'
    ];
}
