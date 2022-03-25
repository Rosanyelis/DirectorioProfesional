<?php

namespace App\Http\Controllers\API;

use App\Models\Business;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\BusinessResource;
use App\Http\Resources\NegocioResource;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;

class BusinessController extends BaseController
{

    // url para generar abrir el archivo de catalago
    public function downloadcatalogo(Request $request){

        // $urlcatalogo = Business::where('id',  $request->id)->first();
        // $url = $urlcatalogo->url_catalogo;
        // return Storage::download('url');

    }
    // url para mostrar los negocios que tienen la subcategoria y el sector seleccionado
    public function index(Request $request)
    {
        $data = Business::where('subcategory_id',  $request->subcategoryid)
                        ->select(['id', 'name', 'url_logo', 'delivery'])
                        ->get();
        return $this->sendResponse(BusinessResource::collection($data), 'negocios fetched.');
    }

    public function negocio(Request $request)
    {
        $data = Business::where('id',  $request->id)->get();
        return $this->sendResponse(NegocioResource::collection($data), 'negocio fetched.');
    }


}
