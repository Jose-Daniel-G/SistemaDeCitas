<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Paciente extends Model
{
    use HasRoles, HasFactory;

    protected $table = "pacientes";

    protected $guard_name = 'web';
    protected $guarded = ['created_at','updated_at'];

    // Relación: Paciente pertenece a un Usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

