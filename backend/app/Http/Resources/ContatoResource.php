<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContatoResource extends JsonResource
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
            'id'       => (integer)$this->id,
            'nome'     => (string)$this->nome,
            'email'    => (string)$this->email,
            'telefone' => (string)$this->telefone,
            'foto'     => (string)$this->foto,
            
            
        ];
    }
}
