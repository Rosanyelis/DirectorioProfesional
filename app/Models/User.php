<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\UuidModel;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UuidModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apellido',
        'email',
        'edad',
        'sexo',
        'dni',
        'password',
        'rol',
        'ciudad_id',
        'sector_id',
        'direccion',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ciudades()
    {
        return $this->belongsTo(Ciudades::class, 'ciudad_id', 'id');
    }

    public function sectores()
    {
        return $this->belongsTo(Sectores::class, 'sector_id', 'id');
    }
}
