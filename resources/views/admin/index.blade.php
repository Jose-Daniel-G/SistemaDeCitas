@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
@stop
@section('content_header')
    <h1>Sistema de reservas de citas medicas</h1>
@stop

@section('content')
    <div class="row">
        <h3><b>Bienvenido:</b> {{ Auth::user()->email }} / <b>Rol:</b> {{ Auth::user()->roles->pluck('name')->first() }}
        </h3>
    </div>

    <div class="row">
        @can('admin.usuarios.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total_usuarios }}</h3>
                        <p>Usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas bi bi-file-person"></i>
                    </div>
                    <a href="{{ route('admin.usuarios.index') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.secretarias.index')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_secretarias }}
                            {{-- <sup style="font-size: 20px">%</sup></h3> --}}
                            <p>Secretarias</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas bi bi-person-circle"></i>
                    </div>
                    <a href="{{ route('admin.secretarias.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.pacientes.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $total_pacientes }}</h3>

                        <p>Pacientes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('admin.pacientes.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
        @can('admin.consultorios.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $total_consultorios }}</h3>

                        <p>Consultorios</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas bi bi-building-fill-add"></i>
                    </div>
                    <a href="{{ route('admin.consultorios.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
        @can('admin.pacientes.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $total_doctores }}</h3>

                        <p>Doctores</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas bi bi-person-lines-fill"></i>
                    </div>
                    <a href="{{ route('admin.doctores.index') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
        @can('admin.horarios.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ $total_horarios }}</h3>

                        <p>Horarios</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas bi bi-calendar2-week"></i>
                    </div>
                    <a href="{{ route('admin.horarios.index') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="card-title">Calendario de atencion de Doctores</h3>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <label for="consultorio_id">Consultorios </label><b>*</b>
                        </div>
                        <div class="col-md-4">
                            <select name="consultorio_id" id="consultorio_select" class="form-control">
                                <option value="" selected disabled>Seleccione una opción</option>
                                @foreach ($consultorios as $consultorio)
                                    <option value="{{ $consultorio->id }}">
                                        {{ $consultorio->nombre . ' - ' . $consultorio->ubicacion }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <hr>
                    <div id="consultorio_info"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="card-title">Calendario de reserva de citas medicas</h3>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <label for="consultorio_id">Consultorios </label><b>*</b>
                        </div>
                        <div class="col-md-4">
                            <select name="consultorio_id" id="consultorio_select" class="form-control">
                                <option value="" selected disabled>Seleccione una opción</option>
                                @foreach ($consultorios as $consultorio)
                                    <option value="{{ $consultorio->id }}">
                                        {{ $consultorio->nombre . ' - ' . $consultorio->ubicacion }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#claseModal">
                            Registrar Cita Medica
                        </button>
                        <!-- Modal -->
                        <form action="{{ route('admin.eventos.store') }}" method="POST">
                            @csrf
                            <div class="modal fade" id="claseModal" tabindex="-1" aria-labelledby="claseModal"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="claseModal">Reserva de cita medica</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group"><label for="doctor_id">Doctor</label>
                                                        <select name="doctor_id" id="doctor_id" class="form-control">
                                                            <option value="" selected disabled>Selecione</option>
                                                            @foreach ($doctores as $doctore)
                                                                <option value="{{ $doctore->id }}">
                                                                    {{ $doctore->nombres . ' ' . $doctore->apellidos . ' - ' . $doctore->especialidad }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group"><label for="doctor">Fecha de reserva</label>
                                                        <input type="date" class="form-control" name="fecha_reserva">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group"><label for="doctor">Hora de reserva</label>
                                                        <input type="time" class="form-control" name="hora_reserva">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Registrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        {{-- @include('admin.modal.modal') --}}

                    </div>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    @stop

    @section('js')
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'es',
                    events: [{
                        title: 'Consultorio Odontologia',
                        start: '2024-09-01', // Corregir formato de fecha
                        end: '2024-09-01' // Corregir formato de fecha y coma
                    }]
                });
                calendar.render();
            });
        </script>

        <script>
            // carga contenido de tabla en  consultorio_info
            $('#consultorio_select').on('change', function() {
                var consultorio_id = $('#consultorio_select').val();
                var url = "{{ route('admin.horarios.cargar_datos_consultorios', ':id') }}";
                url = url.replace(':id', consultorio_id);

                if (consultorio_id) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(data) {
                            $('#consultorio_info').html(data);
                        },
                        error: function() {
                            alert('Error al obtener datos del consultorio');
                        }
                    });
                } else {
                    $('#consultorio_info').html('');
                }
            });
            @if (session('info') && session('icono'))
                Swal.fire({
                    title: "Good job!",
                    text: "{{ session('info') }}",
                    icon: "{{ session('icono') }}"
                });
            @endif
        </script>

    @stop
