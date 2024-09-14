    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')
        <h1>Sistema de reservas de citas medicas</h1>
    @stop

    @section('content')

        <div class="row">
            <h1>Paciente: {{ $paciente->nombres }} {{ $paciente->apellidos }}</h1>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nombres">Nombres </label>
                                    <p>{{ $paciente->nombres }}</p>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos </label>
                                    <p>{{ $paciente->apellidos }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cc">Cc </label>
                                    <p>{{ $paciente->cc }}</p>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nro_seguro">Nro seguro </label>
                                    <p>{{ $paciente->nro_seguro }}</p>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de nacimiento </label>
                                    <p>{{ $paciente->fecha_nacimiento }}</p>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="celular">Celular </label>
                                    <p>{{ $paciente->celular }}</p>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="genero">Género </label>
                                    @if ($paciente->genero == 'M')
                                        'Masculino'
                                    @else
                                        'Femenino'
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="correo">Correo </label>
                                    <p>{{ $paciente->correo }}</p>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="direccion">Direccion </label>
                                    <p>{{ $paciente->direccion }}</p>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="grupo_sanguineo">Grupo sanguineo</label>
                                    <p>{{ $paciente->agrupo_sanguineo }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="alergias">Alergias</label>
                                    <p>{{ $paciente->alergias }}</p>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="contacto_emergencia">Contacto Emergencia</label>
                                    <p>{{ $paciente->contacto_emergencia }}</p>
                                </div>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="observaciones">Observaciones</label>
                                    <p>{{ $paciente->observaciones }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <a href="{{ route('admin.pacientes.index') }}" class="btn btn-secondary">
                            Cancelar
                            {{-- <i class="fa-solid fa-plus"></i> --}}
                        </a>
                        <button type="submit" class="btn btn-primary">Registrar paciente</button>
                    </div>
                </div>
            </div>
        </div>

    @stop

    @section('css')

    @stop

    @section('js')

    @stop
