<?php

namespace App\Http\Resources;

use App\Diseases;
use App\ICD_CODE;
use Illuminate\Http\Resources\Json\JsonResource;

class IcdCodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            [
                'icd_code' =>$this->icd_code,
                'name' => $this->name,
            ]
        ];
    }
}
