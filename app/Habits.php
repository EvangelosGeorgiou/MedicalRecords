<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habits extends Model
{
    protected $fillable = [
        'name','patient_id'
    ];
}
