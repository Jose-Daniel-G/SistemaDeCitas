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

        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Llene los Datos</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <form action="{{ route('admin.horarios.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="consultorio_id">Consultorios </label><b>*</b>
                                <select name="consultorio_id" id="consultorio_select" class="form-control">
                                    <option value="" selected disabled>Seleccione una opción</option>
                                    @foreach ($consultorios as $consultorio)
                                        <option value="{{ $consultorio->id }}">
                                            {{ $consultorio->nombres . ' - ' . $consultorio->ubicacion }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('consultorio_id')
                                    <small class="bg-danger text-white p-1">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="doctor_id">Doctores </label><b>*</b>
                                <select class="form-control" name="doctor_id" id="doctor_id">
                                    <option value="" selected disabled>Seleccione una opción</option>
                                    @foreach ($doctores as $doctor)
                                        <option value="{{ $doctor->id }}">
                                            {{ $doctor->nombres . ' ' . $doctor->apellidos }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('doctor_id')
                                    <small class="bg-danger text-white p-1">{{ $message }}</small>
                                @enderror
                            </div>

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
                                </select>
                                @error('dia')
                                    <small class="bg-danger text-white p-1">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="hora_inicio">Hora Inicio </label><b>*</b>
                                <input type="time" class="form-control" name="hora_inicio" id="hora_inicio"
                                    value="{{ old('hora_inicio') }}" required>
                                @error('hora_inicio')
                                    <small class="bg-danger text-white p-1">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="hora_fin">Hora Final </label><b>*</b>
                                <input type="time" class="form-control" name="hora_fin" id="hora_fin"
                                    value="{{ old('hora_fin') }}" required>
                                @error('hora_fin')
                                    <small class="bg-danger text-white p-1">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <a href="{{ route('admin.horarios.index') }}" class="btn btn-secondary">Regresar</a>
                                <button type="submit" class="btn btn-primary">Registrar horario</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <hr>
                        <div id="consultorio_info"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
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
    </script>
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
