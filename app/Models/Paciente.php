<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = "pacientes";

    protected $guarded = ['created_at','updated_at'];

    // Relación: Paciente pertenece a un Usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

