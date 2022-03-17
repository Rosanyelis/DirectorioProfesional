<?php

namespace App\Http\Controllers\API;

use App\Models\Business;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\Business as BusinessResource;
use Illuminate\Http\Request;
use Validator;

class BusinessController extends BaseController
{

    // url para generar abrir el archivo de catalago

    // url para mostrar los negocios que tienen la subcategoria y el sector seleccionado
    public function index(Request $request)
    {
        $data = Business::where('subcategory_id',  $request->subcategoryid)
                        ->where('sectores_id', $request->sectorid)
                        ->get();
        return $this->sendResponse(BusinessResource::collection($data), 'Sectores fetched.');
    }


}
