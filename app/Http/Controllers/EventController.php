<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datos = $request->all();
        // return response()->json($datos);
        $request->validate(['fecha_reserva'=>'required','hora_reserva'=>'required']);

        // Buscar el doctor por su ID
        $doctor = Doctor::find($request->doctor_id);
        $fecha_reserva = $request->fecha_reserva;
        $hora_reserva = $request->hora_reserva;

        $horarios = Horario::where('doctor_id', $doctor->id)
                    ->where('dia', date('1',strtotime($fecha_reserva)))
                    ->where('hora_inicio','<=','hora_reserva')
                    ->where('hora_fin','>=','hora_reserva')
                    ->exists();

        if(!$horarios){
            throw ValidationException::withMessages([
                'hora_reserva'=>['El doctor no esta disponible en ese horario.'],
            ]);
        }            
        // Crear una nueva instancia de Event
        $evento = new Event();
        
        // Asignar valores al evento
        $evento->title = $request->hora_reserva . " - " . $doctor->especialidad;
        $evento->start = $request->fecha_reserva;
        $evento->end = $request->fecha_reserva;
        $evento->color = '#e82216';
        $evento->user_id = Auth::user()->id;
        $evento->doctor_id = $request->doctor_id;
        $evento->consultorio_id = 1;  // Asegúrate de que este campo exista en la tabla de eventos
    
        // Guardar el evento en la base de datos
        $evento->save();
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.index')
            ->with('info', 'Se registró la reserva de la cita médica de forma correcta')
            ->with('icono', 'success');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
