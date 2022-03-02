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
        'id','name', 'url_imagen',
    ];

    /**
     * Obtiene las subcategorias.
     */
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
