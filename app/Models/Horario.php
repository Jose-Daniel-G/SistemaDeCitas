<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $fillable = ['dia', 'hora_inicio', 'hora_fin', 'doctor_id', 'consultorio_id'];

    // Relación con Doctor (belongsTo)
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // Relación con Consultorio (hasMany, aunque esto podría necesitar revisión)
    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class, 'consultorio_id');
    }
}
