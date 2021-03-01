<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $fillable = [
        'name','surname','email','nationality','dbo','gender','weight','height','status','identity_number', 'telephone'
    ];

    public function contactInfo(){
        return $this->hasOne(ContactInformation::class, 'patient_id', 'id');
    }

    public function dietInformation(){
        return $this->hasMany(Diet::class,'patient_id','id');
    }

    public function habitsInfo(){
        return $this->hasMany(Habits::class,'patient_id','id');
    }

    public function immunizationInfo(){
        return $this->hasMany(Immunization::class,'patient_id','id');
    }

    public function familyHistoryInfo(){
        return $this->hasMany(FamilyHistory::class,'patient_id','id');
    }

    public function diseasesInfo(){
        return $this->hasMany(Diseases::class,'patient_id','id');
    }

    public function allergiesInfo(){
        return $this->hasMany(Allergies::class,'patient_id','id');
    }

    public function disordersInfo(){
        return $this->hasMany(Disorders::class,'patient_id','id');
    }

    public function visitHistoryInfo(){
        return $this->hasMany(VisitHistory::class,'patient_id','id');
    }

    public function testInfo(){
        return $this->hasMany(Tests::class,'patient_id','id');
    }

    public function medicationInfo(){
        return $this->hasMany(Medications::class,'patient_id','id')->orderBy('start_date');
    }

    public function surgeryInfo(){
        return $this->hasMany(Surgeries::class,'patient_id','id')->orderBy('datetime');
    }

    public function obstetricInfo(){
        return $this->hasMany(Obstetric::class,'patient_id','id')->orderBy('date');
    }
}
