<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->name,
            'valor' => $this->value,
            'categoria' => [
                'id' => $this->category->id, 
                'nome' => $this->category->name,
            ],
            'usuario' => [
                'id' => $this->user->id,
                'nome' => $this->user->name,
            ] 
        ];
    }
}