<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disorders extends Model
{
    protected $fillable = [
        'icd_code_id','description','date','patient_id', 'body_part_id'
    ];

    public function icdCodeInfo(){
        return $this->hasOne(ICD_CODE::class, 'id', 'icd_code_id');
    }

    public function bodyPartInfo(){
        return $this->hasOne(BodyParts::class, 'id', 'body_part_id');
    }
}
