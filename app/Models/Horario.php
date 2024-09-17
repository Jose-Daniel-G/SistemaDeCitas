<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $fillable=['dia','hora_inicio','hora_fin','doctor_id','consultorio_id'];
    public function horario(){
        return $this->belongsTo(Doctor::class);
    }
    public function cosultorio(){
        return $this->hasMany(Consultorio::class);
    }
}
