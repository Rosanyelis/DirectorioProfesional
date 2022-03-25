<?php

namespace App\Http\Controllers\API;

use App\Models\Subcategory;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\SubcategorysResource;
use Illuminate\Http\Request;
use Validator;

class SubcategoryController extends BaseController
{
    public function index(Request $request)
    {
        $data = Subcategory::where('categorys_id', $request->id)->get();
        return $this->sendResponse(SubcategorysResource::collection($data), 'subcategorias fetched.');
    }
}
