<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surgeries extends Model
{
    protected $fillable = [
        'name','datetime','doc_name','assistants','body_part_id','complications', 'patient_id'
    ];

    public function proceduresInfo(){
        return $this->hasMany(Procedures::class,'surgery_id','id');
    }

    public function bodyPartInfo(){
        return $this->hasOne(BodyParts::class, 'id', 'body_part_id');
    }
}
