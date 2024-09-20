<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors'; // Si la tabla se llama 'doctors'

    protected $fillable=['nombres','apellidos','telefono','licencia_medica','especialidad',
    'user_id',  // Asegúrate de agregarlo aquí
    ];
    public function consultorio(){
        return $this->belongsTo(Consultorio::class);
    }
    public function horarios(){
        return $this->hasMany(Horario::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
