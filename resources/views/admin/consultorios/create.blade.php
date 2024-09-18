@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sistema de reservas de citas medicas</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <h1>Registro de un nuevo consultorio</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los Datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.consultorios.store') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nombre">Nombre del consultorio </label><b>*</b>
                                    <input type="text" class="form-control" name="nombre"
                                        value="{{ old('nombre') }}" required>
                                    @error('nombre')
                                        <small class="bg-danger text-white p-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="ubicacion">Ubicacion </label><b>*</b>
                                    <input type="text" class="form-control" name="ubicacion"
                                        value="{{ old('ubicacion') }}" required>
                                    @error('ubicacion')
                                        <small class="bg-danger text-white p-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="capacidad">Capacidad </label><b>*</b>
                                    <input type="text" class="form-control" name="capacidad"
                                        value="{{ old('capacidad') }}" required>
                                    @error('capacidad')
                                        <small class="bg-danger text-white p-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telefono">Telefono </label><b>*</b>
                                    <input type="text" class="form-control" name="telefono"
                                        value="{{ old('telefono') }}" required>
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
                                        value="{{ old('especialidad') }}" required>
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
                                        <option value="" selected disabled>Seleccione una opción</option>
                                        <option value="A">Activo</option>
                                        <option value="I">Inactivo</option>
                                    </select>
                                    @error('estado')
                                        <small class="bg-danger text-white p-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>

                </div>

            </div>
        </div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <a href="{{ route('admin.consultorios.index') }}" class="btn btn-secondary">
                    Cancelar
                    {{-- <i class="fa-solid fa-plus"></i> --}}
                </a>
                <button type="submit" class="btn btn-primary">Registrar consultorio</button>
            </div>
        </div>
    </div>
    </form>
</div>

@stop

@section('css')

@stop

@section('js')

@stop
