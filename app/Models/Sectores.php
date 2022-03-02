<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidModel;

class Sectores extends Model
{
    use HasFactory,UuidModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id','ciudades_id','name',
    ];

    /**
     * Obtiene la ciudad a la que pertenece el sector.
     */
    public function ciudades()
    {
        return $this->belongsTo(Ciudades::class, 'ciudades_id', 'id');
    }
}
