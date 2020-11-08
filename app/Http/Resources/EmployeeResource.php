<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProjectResource;

class EmployeeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'birthday' => $this->birthday,
            'email' => $this->email,
            'phone' => $this->phone,
            'projects'=>ProjectResource::collection($this->projects),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
