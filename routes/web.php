<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorysController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\CiudadesController;
use App\Http\Controllers\SectoresController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\TagController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('categorias', [CategorysController::class, 'index'])->name('categorias');
Route::get('categorias/nueva-categoria', [CategorysController::class, 'create'])->name('categoria.create');
Route::post('categorias/guardar-categoria', [CategorysController::class, 'store'])->name('categoria.store');
Route::get('categorias/{id}/ver-categoria', [CategorysController::class, 'show'])->name('categoria.show');
Route::get('categorias/{id}/editar-categoria', [CategorysController::class, 'edit'])->name('categoria.edit');
Route::put('categorias/{id}/actualizar-categoria', [CategorysController::class, 'update'])->name('categoria.update');
Route::delete('categorias/{id}/eliminar-categoria', [CategorysController::class, 'destroy'])->name('categoria.destroy');

Route::get('subcategorias', [SubcategoryController::class, 'index'])->name('subcategorias');
Route::get('subcategorias/nueva-subcategoria', [SubcategoryController::class, 'create'])->name('subcategoria.create');
Route::post('subcategorias/guardar-subcategoria', [SubcategoryController::class, 'store'])->name('subcategoria.store');
Route::get('subcategorias/{id}/ver-subcategoria', [SubcategoryController::class, 'show'])->name('subcategoria.show');
Route::get('subcategorias/{id}/editar-subcategoria', [SubcategoryController::class, 'edit'])->name('subcategoria.edit');
Route::put('subcategorias/{id}/actualizar-subcategoria', [SubcategoryController::class, 'update'])->name('subcategoria.update');
Route::delete('subcategorias/{id}/eliminar-subcategoria', [SubcategoryController::class, 'destroy'])->name('subcategoria.destroy');


Route::get('ciudades', [CiudadesController::class, 'index'])->name('ciudades');
Route::get('ciudades/nueva-ciudad', [CiudadesController::class, 'create'])->name('ciudad.create');
Route::post('ciudades/guardar-ciudad', [CiudadesController::class, 'store'])->name('ciudad.store');
Route::get('ciudades/{id}/ver-ciudad', [CiudadesController::class, 'show'])->name('ciudad.show');
Route::get('ciudades/{id}/editar-ciudad', [CiudadesController::class, 'edit'])->name('ciudad.edit');
Route::put('ciudades/{id}/actualizar-ciudad', [CiudadesController::class, 'update'])->name('ciudad.update');
Route::delete('ciudades/{id}/eliminar-ciudad', [CiudadesController::class, 'destroy'])->name('ciudad.destroy');


Route::get('sectores', [SectoresController::class, 'index'])->name('sectores');
Route::get('sectores/nuevo-sector', [SectoresController::class, 'create'])->name('sector.create');
Route::post('sectores/guardar-sector', [SectoresController::class, 'store'])->name('sector.store');
Route::get('sectores/{id}/ver-sector', [SectoresController::class, 'show'])->name('sector.show');
Route::get('sectores/{id}/editar-sector', [SectoresController::class, 'edit'])->name('sector.edit');
Route::put('sectores/{id}/actualizar-sector', [SectoresController::class, 'update'])->name('sector.update');
Route::delete('sectores/{id}/eliminar-sector', [SectoresController::class, 'destroy'])->name('sector.destroy');
Route::get('sectores/{id}/sectores-por-ciudad', [SectoresController::class, 'sectores'])->name('sector.sectores');


Route::get('negocios', [BusinessController::class, 'index'])->name('negocios');
Route::get('negocios/nuevo-negocio', [BusinessController::class, 'create'])->name('negocio.create');
Route::post('negocios/guardar-negocio', [BusinessController::class, 'store'])->name('negocio.store');
Route::get('negocios/{id}/ver-negocio', [BusinessController::class, 'show'])->name('negocio.show');
Route::get('negocios/{id}/editar-negocio', [BusinessController::class, 'edit'])->name('negocio.edit');
Route::put('negocios/{id}/actualizar-negocio', [BusinessController::class, 'update'])->name('negocio.update');
Route::delete('negocios/{id}/eliminar-negocio', [BusinessController::class, 'destroy'])->name('negocio.destroy');


Route::get('tags', [TagController::class, 'index'])->name('tags');
Route::get('tags/nueva-tag', [TagController::class, 'create'])->name('tag.create');
Route::post('tags/guardar-tag', [TagController::class, 'store'])->name('tag.store');
Route::get('tags/{id}/ver-tag', [TagController::class, 'show'])->name('tag.show');
Route::get('tags/{id}/editar-tag', [TagController::class, 'edit'])->name('tag.edit');
Route::put('tags/{id}/actualizar-tag', [TagController::class, 'update'])->name('tag.update');
Route::delete('tags/{id}/eliminar-tag', [TagController::class, 'destroy'])->name('tag.destroy');
