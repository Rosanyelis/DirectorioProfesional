<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategorysController;
use App\Http\Controllers\API\CiudadesController;
use App\Http\Controllers\API\SectoresController;
use App\Http\Controllers\API\GaleryController;
use App\Http\Controllers\API\BusinessController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('categorias', CategorysController::class);

Route::get('categorias', [CategorysController::class, 'index']);

Route::get('ciudades', [CiudadesController::class, 'index']);

Route::get('sectores/{id}', [SectoresController::class, 'index']);

Route::get('negocios/{subcategoryid}/{sectorid}', [BusinessController::class, 'index']);
Route::get('negocios/{id}/catalogo', [BusinessController::class, 'downloadcatalogo']);


Route::get('galeria-de-imagenes-de-ciudad/{id}', [GaleryController::class, 'indexciudad']);
Route::get('galeria-de-imagenes-de-sector/{id}', [GaleryController::class, 'indexsector']);
Route::get('galeria-de-imagenes-de-negocios/{id}', [GaleryController::class, 'indexbusiness']);
