<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidModel;

class Categorys extends Model
{
    use HasFactory, UuidModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'sectores_id', 'name', 'url_imagen',
    ];

    /**
     * Obtiene las subcategorias.
     */
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'categorys_id', 'id');
    }

    /**
     * Obtiene el sector al que pertenece la subcategoria.
     */
    public function sectores()
    {
        return $this->belongsTo(Sectores::class, 'sectores_id', 'id');
    }
}
