@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sistema de reservas de citas medicas</h1>
@stop

@section('content')
    <div class="container-fluid">

        <div class="row">
            <h1>Registro de nuevo usuario</h1>

        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos</h3>
                        <form action="" method="POST" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Nombre del usuario </label><b>*</b>
                                        <input type="text" class="form-control" name="name" required>
                                        @error('nombre')
                                            <small class="bg-danger text-white p-1">{{ session('info') }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email</label><b>*</b>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    @error('email')
                                        <small class="bg-danger text-white p-1">{{ session('info') }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">Contrasena</label><b>*</b>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                    @error('password')
                                        <small class="bg-danger text-white p-1">{{ session('info') }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password_confirmation">Verificacion de contrasena</label><b>*</b>
                                        <input type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                    @error('password_confirmation')
                                        <small class="bg-danger text-white p-1">{{ session('info') }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ route('admin.usuarios.create') }}" class="btn btn-secondary">
                                            Cancelar
                                            {{-- <i class="fa-solid fa-plus"></i> --}}
                                        </a>
                                        <button type="submit" class="btn btn-primary">Registrar usuario</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
