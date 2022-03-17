<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidModel;

class Tag extends Model
{
    use HasFactory, UuidModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id','description',
    ];

    /**
     * Obtiene los negocios relacionados a la etiqueta.
     */
    public function business()
    {
        return $this->morphedByMany(Business::class, 'taggable');
    }
}
