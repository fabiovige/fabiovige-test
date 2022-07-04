<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => strtolower($this->name),
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->image,
            'stocked' => $this->stocked,
            'status' => $this->status,
            'date' => Carbon::create($this->created_at)->format('d/m/Y H:i'),
        ];
    }
}
