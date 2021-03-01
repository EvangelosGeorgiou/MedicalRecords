<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ICD_CODE extends Model
{
    protected $fillable = [
        'icd_code', 'name'
    ];

}
