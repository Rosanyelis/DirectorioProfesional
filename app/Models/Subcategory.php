<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidModel;

class Subcategory extends Model
{
    use HasFactory,UuidModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'categorys_id', 'sectores_id','name', 'url_imagen',
    ];

    /**
     * Obtiene la categoria de la subcategoria.
     */
    public function categorys()
    {
        return $this->belongsTo(Categorys::class, 'categorys_id', 'id');
    }

    /**
     * Obtiene el sector de la subcategoria.
     */
    public function sectores()
    {
        return $this->belongsTo(Sectores::class, 'sectores_id', 'id');
    }

    /**
     * Obtiene los negocios que pertenecen a la categoria.
     */
    public function business()
    {
        return $this->hasMany(Business::class, 'subcategory_id', 'id');
    }

}
