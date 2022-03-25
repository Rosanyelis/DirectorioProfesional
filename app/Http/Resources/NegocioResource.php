<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\RedesSocialesResource;
use App\Http\Resources\ProductosResource;
use App\Http\Resources\ServiciosResource;

class NegocioResource extends JsonResource
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
            'subcategory_id' => $this->subcategory_id,
            'sectores_id' => $this->sectores_id,
            'name' => $this->name,
            'description' => $this->description,
            'url_logo' => $this->url_logo,
            'sitio_web' => $this->sitio_web,
            'phone' => $this->phone,
            'email' => $this->email,
            'delivery' => $this->delivery,
            'direccion' => $this->direccion,
            'url_catalogo' => $this->url_catalogo,
            'created_at' => $this->created_at->format('m/d/Y'),
            'updated_at' => $this->updated_at->format('m/d/Y'),
            'redes_sociales' => RedesSocialesResource::collection($this->redes),
            'productos' => ProductosResource::collection($this->productos),
            'servicios' => ServiciosResource::collection($this->servicios),
        ];
    }
}
