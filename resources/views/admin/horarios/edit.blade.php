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
                        <form action="{{ route('admin.consultorios.update', $consultorio->id) }}" method="POST"
                            autocomplete="off">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nombre">Nombre del consultorio </label><b>*</b>
                                        <input type="text" class="form-control" name="nombre"
                                            value="{{ $consultorio->nombre }}" required>
                                        @error('nombre')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="ubicacion">Ubicacion </label><b>*</b>
                                        <input type="text" class="form-control" name="ubicacion"
                                            value="{{ $consultorio->ubicacion }}" required>
                                        @error('ubicacion')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="capacidad">Capacidad </label><b>*</b>
                                        <input type="text" class="form-control" name="capacidad"
                                            value="{{ $consultorio->capacidad }}" required>
                                        @error('capacidad')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="telefono">Telefono </label><b>*</b>
                                        <input type="text" class="form-control" name="telefono"
                                            value="{{ $consultorio->telefono }}" required>
                                        @error('telefono')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="especialidad">Especialidad </label><b>*</b>
                                        <input type="text" class="form-control" name="especialidad"
                                            value="{{ $consultorio->especialidad }}" required>
                                        @error('especialidad')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="estado">Estado </label><b>*</b>
                                        <select name="estado" id="" class="form-control" name="estado">
                                            <!-- Opción por defecto -->
                                            @if ($consultorio->estado == 'A')
                                                <option value="A">Activo</option>
                                                <option value="I">Inactivo</option>
                                            @else
                                                <option value="I">Inactivo</option>
                                                <option value="A">Activo</option>
                                            @endif

                                        </select>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ route('admin.consultorios.index') }}" class="btn btn-secondary">
                                            Regresar
                                            {{-- <i class="fa-solid fa-plus"></i> --}}
                                        </a>
                                        <button type="submit" class="btn btn-primary">Registrar consultorio</button>
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
