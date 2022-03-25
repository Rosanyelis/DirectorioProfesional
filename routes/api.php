<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategorysController;
use App\Http\Controllers\API\SubcategoryController;
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
# Lista las ciudades
Route::get('ciudades', [CiudadesController::class, 'index']);
# Lista los sectores segun el id de la ciudad
Route::get('sectores/{id}', [SectoresController::class, 'index']);
# Lista los categorias segun el id del sector
Route::get('categorias/{id}', [CategorysController::class, 'index']);
# Lista las subcategorias segun el id de la categoria
Route::get('subcategorias/{id}', [SubcategoryController::class, 'index']);
# Lista los negocios segun la subcategoria
Route::get('negocios/{subcategoryid}', [BusinessController::class, 'index']);
# Muestra la informacion del negocio segun el id suministrado
Route::get('data-negocio/{id}', [BusinessController::class, 'negocio']);



Route::get('galeria-de-imagenes-de-ciudad/{id}', [GaleryController::class, 'indexciudad']);
Route::get('galeria-de-imagenes-de-sector/{id}', [GaleryController::class, 'indexsector']);
Route::get('galeria-de-imagenes-de-negocios/{id}', [GaleryController::class, 'indexbusiness']);
