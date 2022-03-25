<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidModel;

class Servicio extends Model
{
    use HasFactory, UuidModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'business_id', 'servicio',
    ];


    /**
     * Obtiene el negocio al que pertenecen las redes.
     */
    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id', 'id');
    }
}
