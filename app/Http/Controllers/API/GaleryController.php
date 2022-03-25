<?php

namespace App\Http\Controllers\API;

use App\Models\Galery;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\GaleryResource;
use Illuminate\Http\Request;
use Validator;

class GaleryController extends BaseController
{
    public function indexciudad(Request $request)
    {
        $data = Galery::where('ciudades_id', $request->id)->get();
        return $this->sendResponse(GaleryResource::collection($data), 'Galeria de Imagenes de Ciudad fetched.');
    }

    public function indexsector(Request $request)
    {
        $data = Galery::where('sectores_id', $request->id)->get();
        return $this->sendResponse(GaleryResource::collection($data), 'Galeria de Imagenes de Sector fetched.');
    }

    public function indexbusiness(Request $request)
    {
        $data = Galery::where('business_id', $request->id)->get();
        return $this->sendResponse(GaleryResource::collection($data), 'Galeria de Imagenes de Negocio fetched.');
    }
}
