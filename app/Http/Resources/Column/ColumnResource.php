<?php

namespace App\Http\Resources\Column;

use App\Http\Resources\Card\CardResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ColumnResource extends JsonResource
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
            'relations' => [
				'cards' => CardResource::collection($this->cards),
            ]
        ];
    }

    public function with($request) {
        return [
            'success' => true
        ];
    }
}
