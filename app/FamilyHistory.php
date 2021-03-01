<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyHistory extends Model
{
    protected $fillable = [
        'family_member_name', 'diagnosed_age','diagnosed_year','disease_name','description',
        'extra_notes','family_side','patient_id'
    ];
}
