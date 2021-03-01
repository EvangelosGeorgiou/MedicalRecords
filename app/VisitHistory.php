<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitHistory extends Model
{
    protected $fillable = [
        'doc_name','doc_speciality_id','reason_of_visit','description','date','patient_id'
    ];

    public function docSpecInfo(){
        return $this->hasOne(DoctorSpeciality::class, 'id', 'doc_speciality_id');
    }
}
