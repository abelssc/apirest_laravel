<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

// SIRVE PARA TRANSFORMAR LOS DATOS QUE SE DEVUELVEN EN LAS RESPUESTAS JSON, MODIFICANDO EL FORMATO DE LOS DATOS
class NoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "id"=>$this->id,
            "title"=>"Title: " . $this->title,
            "description"=>"Description: " . $this->description,
            "example"=>"This is an Example"
        ];
    }
}
