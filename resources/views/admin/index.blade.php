@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
@stop
@section('content_header')
    <h1>Sistema de reservas de citas medicas</h1>
@stop

@section('content')
    <div class="row">
        <h1>Panel principal</h1>
    </div>
    <div class="row">
        <div class="col-md-10">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $total_usuarios }}</h3>

                                <p>Usuarios</p>
                            </div>
                            <div class="icon">
                                <i class="ion fas bi bi-file-person"></i>
                            </div>
                            <a href="{{ route('admin.usuarios.index')}}" class="small-box-footer">Mas informacion <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
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
                            <a href="{{ route('admin.secretarias.index')}}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $total_pacientes }}</h3>

                                <p>Pacientes</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('admin.pacientes.index')}}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $total_consultorios }}</h3>

                                <p>Consultorios</p>
                            </div>
                            <div class="icon">
                                <i class="ion fas bi bi-building-fill-add"></i>
                            </div>
                            <a href="{{ route('admin.horarios.index')}}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $total_doctores }}</h3>

                            <p>Doctores</p>
                        </div>
                        <div class="icon">
                            <i class="ion fas bi bi-person-lines-fill"></i>
                        </div>
                        <a href="{{ route('admin.horarios.index')}}" class="small-box-footer">Mas informacion <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>

                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $total_horarios }}</h3>

                            <p>Horarios</p>
                        </div>
                        <div class="icon">
                            <i class="ion fas bi bi-calendar2-week"></i>
                        </div>
                        <a href="{{ route('admin.horarios.index')}}" class="small-box-footer">Mas informacion <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    @stop

    @section('js')

    @stop
