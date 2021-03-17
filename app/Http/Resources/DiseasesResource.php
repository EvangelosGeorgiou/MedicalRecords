<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiseasesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'icdCode' => new IcdCodeResource($this->icdCodeInfo),
            'description' => $this->description,
            'diagnosis' => $this->diagnosis,
            'symptoms' => $this->symptoms,
            'doc_name' => $this->doc_name,
            'date' => $this->date,
            'body_part' => $this->body_part,
            'patient_id' => $this->patient_id,

        ];
    }
}
