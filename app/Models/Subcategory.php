<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidModel;
use App\Models\Categorys;

class Subcategory extends Model
{
    use HasFactory,UuidModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id','categorys_id','name', 'url_imagen',
    ];

    /**
     * Obtiene la categoria de la subcategoria.
     */
    public function categorys()
    {
        return $this->belongsTo(Categorys::class, 'categorys_id', 'id');
    }
}
