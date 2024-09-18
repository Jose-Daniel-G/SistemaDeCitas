@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sistema de reservas de citas medicas</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1>Registro de un nuevo horario</h1>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Llene los Datos</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.horarios.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
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
                                <div class="col-md-12">
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
                                <div class="col-md-12">
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
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="hora_inicio">Hora Inicio </label><b>*</b>
                                        <input type="time" class="form-control" name="hora_inicio" id="hora_inicio"
                                            value="{{ old('hora_inicio') }}" required>
                                        @error('hora_inicio')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12">
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
        <div class="col-md-9">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Hora</th>
                            <th scope="col">Lunes</th>
                            <th scope="col">Martes</th>
                            <th scope="col">Miercoles</th>
                            <th scope="col">Jueves</th>
                            <th scope="col">Viernes</th>
                            <th scope="col">Sabado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $horas = [
                                '08:00:00 - 09:00:00',
                                '09:00:00 - 10:00:00',
                                '10:00:00 - 11:00:00',
                                '11:00:00 - 12:00:00',
                                '12:00:00 - 13:00:00',
                                '13:00:00 - 14:00:00',
                                '15:00:00 - 16:00:00',
                                '17:00:00 - 18:00:00',
                                '19:00:00 - 20:00:00',
                            ];
                            $diasSemana = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO'];
                        @endphp

                        @foreach ($horas as $hora)
                            @php
                                [$hora_inicio, $hora_fin] = explode(' - ', $hora);
                            @endphp
                            <tr>
                                <td scope="row">{{ $hora }}</td>
                                @foreach ($diasSemana as $dia)
                                    @php
                                        $nombre_doctor = '';
                                        foreach ($horarios as $horario) {
                                            if (
                                                strtoupper($horario->dia) == $dia &&
                                                $hora_inicio >= $horario->hora_inicio &&
                                                $hora_fin <= $horario->hora_fin
                                            ) {
                                                $nombre_doctor =
                                                    $horario->doctor->nombres . ' ' . $horario->doctor->apellidos; // Acceder al atributo nombres
                                                break;
                                            }
                                        }
                                    @endphp
                                    <td>{{ $nombre_doctor }}</td>
                                @endforeach
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@stop

@section('css')

@stop

@section('js')
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>

    <!-- Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.colVis.min.js"></script>
    <script>
        new DataTable('#horarios', {
            responsive: true,
            autoWidth: false, //no le vi la funcionalidad
            dom: 'Bfrtip', // Añade el contenedor de botones
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print', 'colvis' // Botones que aparecen en la imagen
            ],
            "language": {
                "decimal": "",
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ horarios",
                "infoEmpty": "Mostrando 0 a 0 de 0 horarios",
                "infoFiltered": "(filtrado de _MAX_ horarios totales)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ horarios",
                "loadingRecords": "Cargando...",
                "processing": "",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron registros coincidentes",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "orderable": "Ordenar por esta columna",
                    "orderableReverse": "Invertir el orden de esta columna"
                }
            }

        });

        @if (session('mensaje') && session('icono'))
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{ session('mensaje') }}",
                icon: "{{ session('icono') }}"
            });
        @endif
    </script>
@stop
