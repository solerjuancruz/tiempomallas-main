@extends('layouts.main', ['activePage' => '', 'titlePage' => ''])
@section('content')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <h2 style="text-transform: capitalize" class="title mt-5 ml-4 mb-0">Bienvenido {{ Auth::user()->name }}</h2>
    <h6 style="margin-top: 50px; margin-left:30px;margin-bottom:-100px">Ultima Conexión: {{ Auth::user()->last_login }}
    </h6>

    <div class="content" style="margin-bottom:-140px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-group">
                                        <style>
                                            .btn-registros {
                                                width: 150px;
                                                height: 80px;
                                            }

                                        </style>

                                        <div class="col text-center">
                                            <h1 id="clock"></h1>

                                            <input type="text" id="hola" value="Hora" hidden>
                                            <script>
                                                function digiClock() {
                                                    var crTime = new Date();
                                                    var crHrs = crTime.getHours();
                                                    var crMns = crTime.getMinutes();
                                                    var crScs = crTime.getSeconds();
                                                    crMns = (crMns < 10 ? "0" : "") + crMns;
                                                    crScs = (crScs < 10 ? "0" : "") + crScs;
                                                    var timeOfDay = (crHrs < 12) ? "AM" : "PM";
                                                    crHrs = (crHrs > 12) ? crHrs - 12 : crHrs;
                                                    crHrs = (crHrs == 0) ? 12 : crHrs;
                                                    var crTimeString = crHrs + ":" + crMns + ":" + crScs + " " + timeOfDay;
                                    
                                                    $("#clock").html(crTimeString);
                                                }
                                                $(document).ready(function() {
                                                    setInterval('digiClock()', 1000);
                                    
                                                });
                                            </script>

                                            <p>

                                                <body input type="time" onload="HoraActual(<?php echo date('H') . ', ' . date('i') . ', ' . date('s'); ?>)">
                                            </p>
                                            <p>
                                                <e>
                                                    <div style="font-size: 50px" id="contenedor_reloj"></div>
                                                </e>
                                            </p>
                                            <p>
                                                <link rel="shortcut icon" href="">
                                            </p>
                                            <script>
                                                var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                                    "Octubre", "Noviembre", "Diciembre");
                                                var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                                var f = new Date();
                                                document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                                    .getFullYear());
                                            </script>
                                        </div>
                                    </div>


                                    {{-- @can('haveaccess', 'ciclo.index') --}}
                                    @foreach ($ciclosos as $ciclo)
                                   @php
                                     $total = $ciclo->total;   
                                   @endphp
                                    @endforeach
                                   @if (empty($total) )
                                    <div class="row">
                                        <div class="col">
                                            <form action="{{ url('/ciclo') }}" method="POST" enctype="multipart/form-data"
                                                class="form-horizontal">
                                                {{ csrf_field() }}

                                                <div class="card-boton text-center mt-5">
                                                    <input type='submit' class="btn btn-info" id="turnoin" name='turnoin'
                                                        value='INICIO DE TURNO' onClick="desactiva_enlace(this)" onmouseover = "rojo(this)" onmouseout="azul(this)">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col" id="mas">
                                            @foreach ($ciclosos as $ciclo)
                                                <form action="{{ url('/ciclosalida/' . $ciclo->id) }}" method="post">
                                                    @csrf
                                                    {{-- @method('DELETE') --}}
                                                    <a href="{{ url('/ciclosalida/' . $ciclo->id . '/edit') }}"
                                                        class="btn btn-info  mt-5" role="button" aria-pressed="true">Ingreso al panel de control</a>
                                                </form>
                                            @endforeach
                                        </div>
                                    </div>
                                    @else
                                    <p class="text-center">
                                        Usted ya registro salida!
                                    </p>
                                    @endif
                                    {{-- @else
                                    @endcan --}}

                                    <div><input type="hidden" id="hora" name="hora" value="{{ $hora }}"> </div>
                                    <div><input type="hidden" id="nombre" name="nombre" value=" {{ $user_nombre }}"></div>
                                    <div><input type="hidden" id="cedula" name="cedula" value=" {{ $user_cedula }}"></div>
                                    <div><input type="hidden" name="breakin" id="breakin"></div>
                                    <div><input type="hidden" name="breakout" id="breakout"></div>
                                    <div><input type="hidden" name="almuerzoin" id="almuerzoin"></div>
                                    <div><input type="hidden" name="almuerzoout" id="almuerzoout"></div>
                                    <div><input type="hidden" name="capacitacion" id="capacitacion"></div>
                                    <div><input type="hidden" name="pausas" id="pausas"></div>
                                    <div><input type="hidden" name="daño" id="daño"></div>
                                    <div><input type="hidden" name="evaluacion" id="evaluacion"></div>
                                    <div><input type="hidden" name="retro" id="retro"></div>
                                    <div><input type="hidden" name="reunion" id="reunion"></div>
                                    <div><input type="hidden" name="reunion" id="reunion" value="{{ $llave }}">
                                    </div>


                                    <form action="{{ url('/ciclo') }}" method="POST" enctype="multipart/form-data"
                                        class="form-horizontal">
                                        <div><input type="hidden" id="fecha" name="fecha" value="{{ $hoy }}">
                                        </div>
                                        <div class="container-fluid">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card"
                                                        style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">

                                                        <table class="table table-ligthr">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Fecha de registro</th>
                                                                    <th scope="col">Nombre</th>
                                                                    <th scope="col">Ingreso</th>
                                                                    <th scope="col">Salida</th>
                                                                    <th scope="col">Tiempo de Conexión</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($ciclosos as $ciclo)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $ciclo->fecha }}</td>
                                                                        <td>{{ $ciclo->nombre }}</td>
                                                                        <td>{{ $ciclo->ingreso }}</td>
                                                                        <td>{{ $ciclo->salida }}</td>
                                                                        <td>{{ $ciclo->total }}</td>

                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        @if (empty($ciclo->ingreso))
                                                            <p>
                                                                Aun no hay registro del dia de hoy
                                                            </p>
                                                        @else
                                                            <script>
                                                              
                                                            function desactiva_enlace(evento) {
                                                                turnoin.stye.visibility = 'hidden';                                                         
                                                            }

                                                            function azul(turnoin){                                                              
                                                            document.getElementById('turnoin').style.visibility = 'hidden'; 
                                                            }   
                                                            setInterval(azul, 0001);
               
                                                            </script>
                                                        @endif
                                                       
                                                    </div>
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
        </div>
    </div>
@endsection