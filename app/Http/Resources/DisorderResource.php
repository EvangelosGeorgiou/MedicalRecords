<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DisorderResource extends JsonResource
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
                'icdCode' =>new IcdCodeResource($this->icdCodeInfo),
                'description' => $this->description,
                'date' => $this->date,
                'body_part' => $this->body_part,
                'patient_id' => $this->patient_id
            ]
        ];
    }
}
