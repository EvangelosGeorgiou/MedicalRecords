<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientBodyParts extends Model
{
    protected $fillable = [
        'bodyPartID','patient_id', 'flag'
    ];
}
