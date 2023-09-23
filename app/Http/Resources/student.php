<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class student extends JsonResource
{
   
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'student_code' => $this->student_code,
            'department' => $this->department,
            'faculty' => $this->faculty,
            'address' => $this->address,
            'phone' => $this->phone,
            'note' => $this->note,
          ];
    }
}
