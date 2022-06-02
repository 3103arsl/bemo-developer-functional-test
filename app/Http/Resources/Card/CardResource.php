<?php

namespace App\Http\Resources\Card;

use App\Http\Resources\Column\ColumnResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
        ];
    }

    public function with($request) {
        return [
            'success' => true
        ];
    }
}
