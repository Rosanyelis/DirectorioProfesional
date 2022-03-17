<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidModel;


class Galery extends Model
{
    use HasFactory, UuidModel;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id','ciudades_id', 'sectores_id', 'business_id', 'url_imagen',
    ];

    /**
     * Obtiene la ciudad a la que pertenecen las imagenes.
     */
    public function ciudades()
    {
        return $this->belongsTo(Ciudades::class, 'ciudades_id', 'id');
    }

    /**
     * Obtiene la ciudad a la que pertenecen las imagenes.
     */
    public function sectores()
    {
        return $this->belongsTo(Sectores::class, 'sectores_id', 'id');
    }

    /**
     * Obtiene la ciudad a la que pertenecen las imagenes.
     */
    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id', 'id');
    }
}
