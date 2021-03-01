<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    protected $fillable = [
        'country','city','address','postal_code','patient_id'
    ];
    // public function patients(){
    //     return $this->hasOne(Patients::class);
    // }
}
