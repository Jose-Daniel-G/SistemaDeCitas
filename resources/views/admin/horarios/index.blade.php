@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
@stop
@section('content_header')
    <h1>Listado de horarios</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Horarios registrados</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.horarios.create') }}" class="btn btn-primary">Registrar
                            {{-- <i class="fa-solid fa-plus"></i> --}}
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if ($info = Session::get('info'))
                        <div class="alert alert-success"><strong>{{ $info }}</strong></div>
                    @endif
                    <table id="horarios" class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nro</th>
                                <th>Doctor</th>
                                <th>Especialidad</th>
                                <th>Consultorio</th>
                                <th>Dia de atencion</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador = 1; ?>
                            @foreach ($horarios as $horario)
                                <tr>
                                    <td scope="row">{{ $contador++ }}</td>
                                    <td scope="row">{{ $horario->doctor->nombres }}</td>
                                    <td scope="row">{{ $horario->doctor->especialidad }}</td>
                                    <td scope="row">
                                        {{ $horario->consultorio->nombre . ' Ubicacion: ' . $horario->consultorio->ubicacion }}
                                    </td>
                                    <td scope="row">{{ $horario->dia }}</td>
                                    <td scope="row" class="text-center">{{ $horario->hora_inicio }}</td>
                                    <td scope="row" class="text-center">{{ $horario->hora_fin }}</td>
                                    <td scope="row">
                                        <div class="btn-group" role="group" aria-label="basic example">
                                            <a href="{{ route('admin.horarios.show', $horario->id) }}"
                                                class="btn btn-info btn-sm">Ver</a>
                                            <a href="{{ route('admin.horarios.edit', $horario->id) }}"
                                                class="btn btn-success btn-sm">Editar</a>
                                            <form action="{{ route('admin.horarios.destroy', $horario->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este horario?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Calendario de atencion de Doctores</h3>

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="consultorio_id">Consultorios </label><b>*</b>
                        <select name="consultorio_id" id="consultorio_select" class="form-control">
                            <option value="" selected disabled>Seleccione una opción</option>
                            @foreach ($consultorios as $consultorio)
                                <option value="{{ $consultorio->id }}">
                                    {{ $consultorio->nombres . ' - ' . $consultorio->ubicacion }} </option>
                            @endforeach
                        </select>
                        @error('consultorio_id')
                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                        @enderror
                    </div>
                    <hr>
                    <div id="consultorio_info"></div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>// carga contenido de tabla en  consultorio_info
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
           // buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'  ], // Botones que aparecen en la imagen
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
        @if (session('info') && session('icono'))
            Swal.fire({
                title: "Good job!",
                text: "{{ session('info') }}",
                icon: "{{ session('icono') }}"
            });
        @endif
    </script>
@stop
