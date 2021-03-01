<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    protected $fillable = [
        'testName','testReason','place','comments','date','patient_id'
    ];
}
