<?php

namespace App\Http\Controllers\API;

use App\Models\Categorys;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\Categorys as CategorysResource;
use Illuminate\Http\Request;
use Validator;


class CategorysController extends BaseController
{

    public function index()
    {
        $data = Categorys::all();
        return $this->sendResponse(CategorysResource::collection($data), 'Categorias fetched.');
    }


}
