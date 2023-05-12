@extends('layouts.main', ['activePage' => 'supervisor', 'titlePage' => 'Supervisor Personal'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <h1 aling="center">Tiempo del Personal</h1>

                                <body input type="time" style="text-align: center" class="reloj text-center"
                                    onload="HoraActual(<?php echo date('H') . ', ' . date('i') . ', ' . date('s'); ?>)">

                                    <div id="tituloCards">
                                        <div style="font-size: 50px" id="contenedor_reloj" class="reloj text-center">
                                        </div>
                                    </div>
                                    <link rel="shortcut icon" href="" class="reloj text-center">

                                </body>
                                {{--   <div class="row mt-5 m-4">
                                    <div class="input-group">
                                        <div class="form-outline">

                                            <form action="/searchpersonalgeneral" method="GET">
                                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col">
                                        <input type="search" name="searchpersonalgeneral" class="form-control"
                                            placeholder="Buscar">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="buscador btn btn-info">
                                            Buscar por documento</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-12 text-right">
                            @can('user_create')
                            <a href="{{url ('mallas')}}" class="btn btn-sm btn-info"> Crear Malla</a>
                            <a href="{{ route('superpersonal.edit','1') }}" class="btn btn-sm btn-facebook">VER
                                PERSONAL</a>
                            @endcan
                        </div>
                    </div>
                    <form action="{{ url('/ciclo') }}" method="POST" enctype="multipart/form-data"
                        class="form-horizontal">
                        <div class="container-fluid">
                            <div class="card">
                                <table class="table table-ligthr">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Fecha de registro</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Documento</th>
                                            <th scope="col">Ingreso</th>
                                            {{--<th scope="col">Salida</th>--}}
                                            <th scope="col">timepo break</th>
                                            <th scope="col">Tiempo Almuerzo</th>
                                            <th scope="col">Tiempo Pausas activas</th>
                                            <th scope="col">Tiempo de Conexión</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ciclosos as $ciclo)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $ciclo->fecha }}</td>
                                            <td>{{ $ciclo->nombre }}</td>
                                            <td>{{ $ciclo->cedula }}</td>
                                            <td>{{ $ciclo->ingreso }}</td>
                                            {{--<td>{{ $ciclo->salida }}</td>--}}
                                            <td>{{ $ciclo->timebreak }}</td>
                                            <td>{{ $ciclo->timelunch }}</td>
                                            <td>{{ $ciclo->timepausas }}</td>
                                            <td>{{ $ciclo->total }}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $ciclosos->links() }}
                    </form>
                </div>
            </div>
            {{--  @can('desacarga') --}}
            <form action="{{route('superpersonal.excel')}}">
                <button type="submit" class="btn btn-info" style="border-radius: 10px; margin-left:-900px"><i
                        class="material-icons">file_download</i>Generar Informe</button>
            </form>
            {{-- @endcan --}}
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection