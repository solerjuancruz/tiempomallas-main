@extends('layouts.main', ['activePage' => 'home', 'titlePage' => ''])
@section('content')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <h6 style="margin-top: 50px; margin-left:30px;margin-bottom:-100px">Ultima Conexión: {{ Auth::user()->last_login }}
    </h6>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- TITULO Y RELOJ --}}
                            <form action="{{ url('/ciclosalidaout/' . $ciclosos->id) }}" method="post"
                                enctype="multipart/form-data" class="form-horizontal">
                                {{ csrf_field() }}
                                <center>
                                    <h3
                                    id="titulosalida"  style="text-transform: uppercase;">
                                        BIENVENIDO {{ Auth::user()->name }}</h3>
                                    <h1 style="text-aline:center;">PANEL DE REGISTRO DE TIEMPOS
                                    </h1>
                                </center>
                                <div class="row">
                                    <div class="reloj" style="background-color: transparent; width:100%">
                                        <center>
                                            <body input type="time" style="font-size: 20px;  border-radius:0.75rem;"
                                                onload="HoraActual(<?php echo date('H') . ', ' . date('i') . ', ' . date('s'); ?>)">
                                                
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
                                                <div style=" margin-left:0;">
                                                    <script>
                                                        var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                                            "Octubre", "Noviembre", "Diciembre");
                                                        var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                                        var f = new Date();
                                                        document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                                            .getFullYear());
                                                    </script>
                                                </div>

                                            </body>
                                    </div>
                                </div>
                                <div><input type="hidden" name="ingreso" id="ingreso"
                                        value="{{ old('ingreso', $ciclosos->ingreso) }}">
                                </div>
                                <div><input type="hidden" name="llave" id="llave" value="{{ $llave }}"></div>
                                </body>
                                {{-- </form> --}}
                                <div id="cuenta"></div>
                                {{-- INICIO SECCION 1 --}}
                                <div style="margin-top: 10px">
                                    @if (empty($ciclosos->salida))
                                        <div class="row" style="margin:3px">
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div style="margin: 10px">
                                                        <strong id="tituloCards">
                                                            <p class="card-text fs-1">
                                                                Turno</p>
                                                        </strong>
                                                        <form action="{{ url('/ciclosalida/' . $ciclosos->id, 'edit') }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            class="form-horizontal">
                                                            {{ csrf_field() }}
                                                            @method('PATCH')
                                                            <div><input type="hidden" id="fecha" name"fecha"
                                                                    value="{{ $hoy }}"> </div>
                                                            <div><input type="hidden" id="hora" name"hora"
                                                                    value="{{ $hora }}"> </div>
                                                            <div><input type="hidden" id="nombre" name="nombre"
                                                                    value=" {{ $user_nombre }}"></div>
                                                            <div><input type="hidden" id="cedula" name="cedula"
                                                                    value=" {{ $user_cedula }}"></div>
                                                            <div><input type="hidden" name="salida" id="salida"
                                                                    value="{{ $hora }}"></div>
                                                            <div class="col-sm-6">
                                                                <p class="card-text reloj-text"><small
                                                                        class="text-muted2"
                                                                        style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                                        <e class="tiemp-text">
                                                                            {{ old('ingreso', $ciclosos->ingreso) }}
                                                                        </e>
                                                                    </small></p>
                                                                <p class="card-text reloj-text"><small
                                                                        class="text-muted2"
                                                                        style="color:rgb(0, 0, 0)"><b>Fin:</b>
                                                                        <e class="tiemp-text">
                                                                            {{ old('salida', $ciclosos->salida) }}
                                                                        </e>
                                                                    </small></p>
                                                                @if (empty($ciclosos->salida))
                                                                    <p class="card-text reloj-text"><small
                                                                            class="text-muted2"
                                                                            style="color:rgb(0, 0, 0)"><b>Horas de
                                                                                Conexión: </b>
                                                                            <rem class="tiemp-text">0</rem>
                                                                        </small></p>
                                                                @else
                                                                    <p class="card-text reloj-text"><small
                                                                            class="text-muted2"
                                                                            style="color:rgb(0, 0, 0)"><b>Horas de
                                                                                Conexión: </b>
                                                                            <rem class="tiemp-text">
                                                                                {{ $total }} </rem>
                                                                        </small></p>
                                                                @endif
                                                                <input type="hidden" name="total" id="total"
                                                                    value="{{ $total }}">
                                                                <input type='submit' class="btn btn-info"
                                                                    value='Registrar Salida' onclick="finalizarturno()">
                                                                   
                                                                    {{--function de finalizar turno --}}
                                                                    <script>
                                                                      function finalizarturno()
                                                                        {
                                                                            var confirsalida = confirm("Desea registrar su salida?");
                                                                            if (confirsalida == false) 
                                                                                 {
                                                                                    event.preventDefault();
                                                                                 }
                                                                                 else{
                                                                                 }
                                                                        }
                                                                    </script>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row" style="margin:3px">
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div style="margin: 10px">
                                                            <strong>
                                                                <p class="card-text" style="color:rgb(0, 0, 0)">Turno
                                                                </p>
                                                            </strong>
                                                            <form
                                                                action="{{ url('/ciclosalida/' . $ciclosos->id, 'edit') }}"
                                                                method="POST" enctype="multipart/form-data"
                                                                class="form-horizontal">
                                                                {{ csrf_field() }}
                                                                @method('PATCH')
                                                                <div><input type="hidden" id="fecha" name"fecha"
                                                                        value="{{ $hoy }}"> </div>
                                                                <div><input type="hidden" id="hora" name"hora"
                                                                        value="{{ $hora }}"> </div>
                                                                <div><input type="hidden" id="nombre" name="nombre"
                                                                        value=" {{ $user_nombre }}"></div>
                                                                <div><input type="hidden" id="cedula" name="cedula"
                                                                        value=" {{ $user_cedula }}"></div>
                                                                <div><input type="hidden" name="salida" id="salida"
                                                                        value="{{ $hora }}"></div>
                                                                <div class="col-sm-6">
                                                                    <p class="card-text reloj-text"><small
                                                                            class="text-muted2"
                                                                            style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                                            <e class="tiemp-text">
                                                                                {{ old('ingreso', $ciclosos->ingreso) }}
                                                                            </e>
                                                                        </small></p>
                                                                    <p class="card-text reloj-text"><small
                                                                            class="text-muted2">
                                                                            <b>Fin:</b>
                                                                            <e class="tiemp-text">
                                                                                {{ old('salida', $ciclosos->salida) }}
                                                                            </e>
                                                                        </small></p>
                                                                    @if (empty($ciclosos->salida))
                                                                        <p class="card-text reloj-text"><small
                                                                                class="text-muted2"
                                                                                style="color:rgb(0, 0, 0)"><b>Horas
                                                                                    de Conexión: </b>
                                                                                <rem class="tiemp-text">0</rem>
                                                                            </small></p>
                                                                    @else
                                                                        <p class="card-text reloj-text"><small
                                                                                class="text-muted2"
                                                                                style="color:rgb(0, 0, 0)"><b>Horas
                                                                                    de Conexión: </b>
                                                                                <rem class="tiemp-text">
                                                                                    {{ $total }} </rem>
                                                                            </small></p>
                                                                    @endif
                                                                    <input type="hidden" name="total" id="total"
                                                                        value="{{ $total }}">

                                                                    <input type='submit' class="botonesinactivos"
                                                                        value=' SALIDA DE TURNO REGISTRADA' disabled>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                    @endif


                                    @if (empty($ciclosos->breakout))
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong id="tituloCards">
                                                        <p class="card-text">Break
                                                        </p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Inicio: </b><e class="tiemp-text"> {{ old('breakin', $ciclosos->breakin)}} </e></small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Fin: </b><e class="tiemp-text">{{ old('breakout', $ciclosos->breakout)}}</e> </small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Tiempo de Break: </b> {{ old('timebreak', $ciclosos->timebreak)}} <b>minutos</b></small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong>
                                                        <p class="card-text">
                                                            Break</p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Inicio: </b><e class="tiemp-text"> {{ old('breakin', $ciclosos->breakin)}} </e></small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Fin: </b><e class="tiemp-text">{{ old('breakout', $ciclosos->breakout)}}</e> </small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Tiempo de Break: </b> {{ old('timebreak', $ciclosos->timebreak)}} <b>minutos</b></small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (empty($ciclosos->almuerzo))
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong id="tituloCards">
                                                        <p class="card-text">
                                                            Almuerzo</p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Inicio:</b><e class="tiemp-text"> {{ old('almuerzo', $ciclosos->almuerzo)}} </e></small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Fin:</b><e class="tiemp-text">{{ old('almuerzoout', $ciclosos->almuerzoout)}}</e> </small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Tiempo de Almuerzo:</b>  {{ old('timelunch', $ciclosos->timelunch)}} <b>minutos</b></small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong>
                                                        <p class="card-text" style="color:rgb(0, 0, 0)">
                                                            Almuerzo</p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Inicio:</b><e class="tiemp-text"> {{ old('almuerzo', $ciclosos->almuerzo)}} </e></small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Fin:</b><e class="tiemp-text">{{ old('almuerzoout', $ciclosos->almuerzoout)}}</e> </small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Tiempo de Almuerzo:</b>  {{ old('timelunch', $ciclosos->timelunch)}} <b>minutos</b></small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                {{-- INICIO SECCION 2 --}}
                                <div style="margin-top: 10px">
                                    @if (empty($ciclosos->capout))
                                        <div class="row" style="margin:3px">
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div style="margin: 10px">
                                                        <strong id="tituloCards">
                                                            <p class="card-text">
                                                                Capacitación</p>
                                                        </strong>
                                                        <div class="col-sm-6">
                                                            <p class="card-text reloj-text"><small class="text-muted2"><b>Inicio:</b><e class="tiemp-text"> {{ old('capacitacion', $ciclosos->capacitacion)}} </e></small></p>
                                                            <p class="card-text reloj-text"><small class="text-muted2"><b>Fin:</b><e class="tiemp-text">{{ old('capout', $ciclosos->capout)}}</e> </small></p>
                                                            <p class="card-text reloj-text"><small class="text-muted2"  style="color:rgb(0, 0, 0)"><b>Tiempo de Capacitacion: </b><rem class="tiemp-text">0</rem> </small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row" style="margin:3px">
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div style="margin: 10px">
                                                            <strong>
                                                                <p class="card-text">
                                                                    Capacitación
                                                                </p>
                                                            </strong>
                                                            <div class="col-sm-6">
                                                                <p class="card-text reloj-text"><small class="text-muted2"><b>Inicio:</b><e class="tiemp-text"> {{ old('capacitacion', $ciclosos->capacitacion)}} </e></small></p>
                                                                <p class="card-text reloj-text"><small class="text-muted2"><b>Fin:</b><e class="tiemp-text">{{ old('capout', $ciclosos->capout)}}</e> </small></p>
                                                                <p class="card-text reloj-text"><small class="text-muted2"  style="color:rgb(0, 0, 0)"><b>Tiempo de Capacitacion: </b><rem class="tiemp-text">0</rem> </small></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    @endif

                                    @if (empty($ciclosos->pausasout))
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong id="tituloCards">
                                                        <p class="card-text">Pausas
                                                            Activas</p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <div id="contenedor_reloj" style="width: 150px; height:50px ; font-size:20px; font-family: Lucida Console, Courier New , monospace; text-align:center; margin-left:-40;"></div>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Inicio:</b><e  class="tiemp-text"> {{ old('pausas', $ciclosos->pausas)}} </e></small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><e  class="tiemp-text">{{ old('pausasout', $ciclosos->pausasout)}}</e> </small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Tiempo de Pausas Activas:</b>  {{ old('timepausas', $ciclosos->timepausas)}} </small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong>
                                                        <p class="card-text" style="color:rgb(0, 0, 0)">
                                                            Pausas Activas</p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <div id="contenedor_reloj" style="width: 150px; height:50px ; font-size:20px; font-family: Lucida Console, Courier New , monospace; text-align:center; margin-left:-40;"></div>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Inicio:</b><e  class="tiemp-text"> {{ old('pausas', $ciclosos->pausas)}} </e></small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><e  class="tiemp-text">{{ old('pausasout', $ciclosos->pausasout)}}</e> </small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Tiempo de Pausas Activas:</b>  {{ old('timepausas', $ciclosos->timepausas)}} </small></p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (empty($ciclosos->dañoout))
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong id="tituloCards">
                                                        <p class="card-text">Daño
                                                            Tecnico</p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Inicio:</b><e  class="tiemp-text"> {{ old('baño', $ciclosos->daño)}} </e></small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><e  class="tiemp-text">{{ old('dañoout', $ciclosos->dañoout)}}</e> </small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Tiempo de Daño de Equipo:</b> {{ old('timedaño', $ciclosos->timedaño)}} </small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong>
                                                        <p class="card-text" style="color:rgb(0, 0, 0)">
                                                            Daño Tecnico</p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Inicio:</b><e  class="tiemp-text"> {{ old('baño', $ciclosos->daño)}} </e></small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><e  class="tiemp-text">{{ old('dañoout', $ciclosos->dañoout)}}</e> </small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Tiempo de Daño de Equipo:</b> {{ old('timedaño', $ciclosos->timedaño)}} </small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                {{-- INICIO SECCION 3 --}}
                                <div style="margin-top: 10px">
                                    @if (empty($ciclosos->evaluacionout))
                                        <div class="row" style="margin:3px">
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div style="margin: 10px">
                                                        <strong id="tituloCards">
                                                            <p class="card-text">
                                                                Evaluación</p>
                                                        </strong>
                                                        <div class="col-sm-6">
                                                            <p class="card-text reloj-text"><small class="text-muted2"><b>Inicio:</b><e  class="tiemp-text"> {{ old('evaluacion', $ciclosos->evaluacion)}} </e></small></p>
                                                            <p class="card-text reloj-text"><small class="text-muted2"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><e  class="tiemp-text">{{ old('evaluacionout', $ciclosos->evaluacionout)}}</e> </small></p>
                                                            <p class="card-text reloj-text"><small class="text-muted2"><b>Tiempo de evaluacion:</b>  {{ old('timeeva', $ciclosos->timeeva)}} </small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row" style="margin:3px">
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div style="margin: 10px">
                                                            <strong>
                                                                <p class="card-text" style="color:rgb(0, 0, 0)">
                                                                    Evaluación</p>
                                                            </strong>
                                                            <div class="col-sm-6">
                                                                <p class="card-text reloj-text"><small class="text-muted2"><b>Inicio:</b><e  class="tiemp-text"> {{ old('evaluacion', $ciclosos->evaluacion)}} </e></small></p>
                                                                <p class="card-text reloj-text"><small class="text-muted2"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><e  class="tiemp-text">{{ old('evaluacionout', $ciclosos->evaluacionout)}}</e> </small></p>
                                                                <p class="card-text reloj-text"><small class="text-muted2"><b>Tiempo de evaluacion:</b>  {{ old('timeeva', $ciclosos->timeeva)}} </small></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endif


                                    @if (empty($ciclosos->retroout))
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong >
                                                        <p class="card-text">Retro</p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <p class="card-text"><small class="text-muted2"><b>Inicio:</b>&nbsp;&nbsp;&nbsp;<e> {{ old('retro', $ciclosos->retro)}} </e></small></p>
                                                        <p class="card-text"><small class="text-muted2"><b>Fin:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<e>{{ old('retroout', $ciclosos->retroout)}}</e> </small></p>
                                                        <p class="card-text"><small class="text-muted2"><b>Tiempo de Retroalimentacion</b>  {{ old('timeretro', $ciclosos->timeretro)}} </small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong  id="tituloCards">
                                                        <p class="card-text" style="color:rgb(0, 0, 0)">Retro</p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <p class="card-text"><small class="text-muted2"><b>Inicio:</b>&nbsp;&nbsp;&nbsp;<e> {{ old('retro', $ciclosos->retro)}} </e></small></p>
                                                        <p class="card-text"><small class="text-muted2"><b>Fin:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<e>{{ old('retroout', $ciclosos->retroout)}}</e> </small></p>
                                                        <p class="card-text"><small class="text-muted2"><b>Tiempo de Retroalimentacion</b>  {{ old('timeretro', $ciclosos->timeretro)}} </small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (empty($ciclosos->reunionout))
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong id="tituloCards">
                                                        <p class="card-text">Reunión</p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Inicio:</b><e  class="tiemp-text"> {{ old('reunion', $ciclosos->reunion)}} </e></small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><e  class="tiemp-text">{{ old('reunionout', $ciclosos->reunionout)}}</e> </small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Tiempo Reunión:</b>  {{ old('timereunion', $ciclosos->timereunion)}} </small></p>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong>
                                                        <p class="card-text" style="color:rgb(0, 0, 0)">Reunión</p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Inicio:</b><e  class="tiemp-text"> {{ old('reunion', $ciclosos->reunion)}} </e></small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><e  class="tiemp-text">{{ old('reunionout', $ciclosos->reunionout)}}</e> </small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"><b>Tiempo Reunión:</b>  {{ old('timereunion', $ciclosos->timereunion)}} </small></p>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>
<script src="./assests/js/efect_header.js"></script>