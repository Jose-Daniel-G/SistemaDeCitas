    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')
        <h1>Sistema de reservas de citas medicas</h1>
    @stop

    @section('content')

        <div class="row">
            <h1>Actualizacion consultorio: {{ $consultorio->nombre }} {{ $consultorio->ubicacion }}</h1>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.horarios.update', $horario->id)  }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="doctor_id">Doctores </label><b>*</b>
                                        <select class="form-control" name="doctor_id" id="doctor_id">
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            @foreach ($doctores as $doctor)
                                                <option value="{{ $doctor->id }}">
                                                    {{ $doctor->nombres . ' ' . $doctor->apellidos }}</option>
                                            @endforeach
                                        </select>
                                        @error('doctor_id')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="consultorio_id">Consultorios </label><b>*</b>
                                        <select class="form-control" name="consultorio_id" id="consultorio_id">
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            @foreach ($consultorios as $consultorio)
                                                <option value="{{ $consultorio->id }}">
                                                    {{ $consultorio->nombres . ' Ubicacion: ' . $consultorio->ubicacion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('consultorio_id')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="dia">Dia </label><b>*</b>
                                        <select class="form-control" name="dia" id="dia">
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <option value="LUNES">LUNES</option>
                                            <option value="MARTES">MARTES</option>
                                            <option value="MIERCOLES">MIERCOLES</option>
                                            <option value="JUEVES">JUEVES</option>
                                            <option value="VIERNES">VIERNES</option>
                                            <option value="SABADO">SABADO</option>
                                            {{-- <option value="DOMINGO">DOMINGO</option> --}}
                                        </select>
                                        @error('dia')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hora_inicio">Hora Inicio </label><b>*</b>
                                        <input type="time" class="form-control" name="hora_inicio" id="hora_inicio"
                                            value="{{ old('hora_inicio') }}" required>
                                        @error('hora_inicio')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hora_fin">Hora Final </label><b>*</b>
                                        <input type="time" class="form-control" name="hora_fin" id="hora_fin"
                                            value="{{ old('hora_fin') }}" required>
                                        @error('hora_fin')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ route('admin.horarios.index') }}"
                                            class="btn btn-secondary">Regresar</a>
                                        <button type="submit" class="btn btn-primary">Registrar horario</button>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>

            </div>
        </div>
    @stop

    @section('css')

    @stop

    @section('js')

    @stop
