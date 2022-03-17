<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidModel;

class Business extends Model
{
    use HasFactory, UuidModel;

    protected $table = 'business';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id','subcategory_id', 'sectores_id', 'name', 'description', 'url_logo',
        'sitio_web', 'phone', 'email', 'delivery', 'direccion', 'url_catalogo',
         'url_instagram', 'url_facebook',
    ];

    /**
     * Obtiene las imagenes de galeria.
     */
    public function galeries()
    {
        return $this->hasMany(Galery::class,'business_id', 'id');
    }

    /**
     * Obtiene la subcategoria a la que pertenece
     */
    public function subcategories()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }

    /**
     * Obtiene el sector de la subcategoria.
     */
    public function sectores()
    {
        return $this->belongsTo(Sectores::class, 'sectores_id', 'id');
    }

    /**
     * Obtiene todas las etiquetas del negocio.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
