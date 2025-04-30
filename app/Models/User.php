<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',  // Agregamos 'role' aquí para permitir asignación masiva
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relación: un usuario puede ser un cliente.
     */
    public function client()
    {
        return $this->hasOne(Client::class);
    }

    /**
     * Relación: un usuario puede ser un empleado.
     */
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    /**
     * Validación de roles permitidos.
     * @return array
     */
    public static function getRoles()
    {
        return ['cliente', 'administrador', 'cajero', 'cocinero', 'mensajero'];
    }
}
