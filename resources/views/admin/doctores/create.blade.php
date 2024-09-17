@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sistema de reservas de citas medicas</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <h1>Registro de un nuevo doctores</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los Datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.doctores.store') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nombres">Nombre del doctores </label><b>*</b>
                                    <input type="text" class="form-control" name="nombres"
                                        value="{{ old('nombres') }}" required>
                                    @error('nombres')
                                        <small class="bg-danger text-white p-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos </label><b>*</b>
                                    <input type="text" class="form-control" name="apellidos"
                                        value="{{ old('apellidos') }}" required>
                                    @error('apellidos')
                                        <small class="bg-danger text-white p-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telefono">Telefono </label><b>*</b>
                                    <input type="number" class="form-control" name="telefono"
                                        value="{{ old('telefono') }}" required>
                                    @error('telefono')
                                        <small class="bg-danger text-white p-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="licencia_medica">Licencia Medica </label><b>*</b>
                                    <input type="text" class="form-control" name="licencia_medica"
                                        value="{{ old('licencia_medica') }}" required>
                                    @error('licencia_medica')
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
                <a href="{{ route('admin.secretarias.index') }}" class="btn btn-secondary">
                    Cancelar
                    {{-- <i class="fa-solid fa-plus"></i> --}}
                </a>
                <button type="submit" class="btn btn-primary">Registrar doctores</button>
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
