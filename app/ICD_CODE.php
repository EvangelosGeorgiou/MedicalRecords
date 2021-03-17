<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ICD_CODE extends Model
{
    protected $fillable = [
        'icd_code', 'name'
    ];

    public function diseaseInfo(){
        return $this->hasMany(Diseases::class, 'icd_code_id','id');
    }

}
