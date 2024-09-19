@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
@stop
@section('content_header')
    <h1>Listado de consultorios</h1>
@stop

@section('content')
        <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Consultorios registrados</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.consultorios.create') }}" class="btn btn-primary">Registrar
                            {{-- <i class="fa-solid fa-plus"></i> --}}
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if ($info = Session::get('info'))
                        <div class="alert alert-success"><strong>{{ $info }}</strong></div>
                    @endif
                    <table id="consultorios" class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nro</th>
                                <th>Consultorio</th>
                                <th>Ubicacion</th>
                                <th>Capacidad</th>
                                <th>Telefono</th>
                                <th>Especialidad</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador = 1; ?>
                            @foreach ($consultorios as $consultorio)
                                <tr>
                                    <td scope="row">{{ $contador++ }}</td>
                                    <td scope="row">{{ $consultorio->nombre }}</td>
                                    <td scope="row">{{ $consultorio->ubicacion }}</td>
                                    <td scope="row">{{ $consultorio->capacidad }}</td>
                                    <td scope="row">{{ $consultorio->telefono }}</td>
                                    <td scope="row">{{ $consultorio->especialidad }}</td>
                                    <td scope="row">{{ $consultorio->estado }}</td>
                                    <td scope="row">
                                        <div class="btn-group" role="group" aria-label="basic example">
                                            <a href="{{ route('admin.consultorios.show', $consultorio->id) }}"
                                                class="btn btn-info btn-sm">Ver</a>
                                            <a href="{{ route('admin.consultorios.edit', $consultorio->id) }}"
                                                class="btn btn-success btn-sm">Editar</a>
                                            <form action="{{ route('admin.consultorios.destroy', $consultorio->id) }}" method="POST"
                                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este consultorio?');">
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
        new DataTable('#consultorios', {
            responsive: true,
            autoWidth: false, //no le vi la funcionalidad
            dom: 'Bfrtip', // Añade el contenedor de botones
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print', 'colvis' // Botones que aparecen en la imagen
            ],
            "language": {
                "decimal": "",
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ consultorios",
                "infoEmpty": "Mostrando 0 a 0 de 0 consultorios",
                "infoFiltered": "(filtrado de _MAX_ consultorios totales)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ consultorios",
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
