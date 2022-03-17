<?php

namespace App\Http\Controllers\API;

use App\Models\Ciudades;
use App\Models\Galery;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\Ciudades as CiudadesResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class CiudadesController extends BaseController
{
    public function index()
    {
        $data = Ciudades::all();
        return $this->sendResponse(CiudadesResource::collection($data), 'Ciudades fetched.');
    }

}
