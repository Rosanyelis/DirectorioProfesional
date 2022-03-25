<?php

namespace App\Http\Controllers\API;

use App\Models\Categorys;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\CategorysResource;
use Illuminate\Http\Request;
use Validator;


class CategorysController extends BaseController
{

    public function index(Request $request)
    {
        $data = Categorys::where('sectores_id', $request->id)->get();
        return $this->sendResponse(CategorysResource::collection($data), 'Categorias fetched.');
    }


}
