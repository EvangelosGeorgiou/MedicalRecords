<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    protected $fillable = [
        'description', 'start_date', 'finish_date', 'patient_id'
    ];
}
