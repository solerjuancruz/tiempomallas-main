@extends('layouts.main', ['activePage' => '', 'titlePage' => ''])
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
                                <center>
                                    <h3 id="titulosalida" style="text-transform: uppercase;">
                                        BIENVENIDO {{ Auth::user()->name }}</h3>
                                    <h1 style="text-aline:center;">PANEL DE REGISTRO DE TIEMPOS
                                    </h1>
                                </center>
                                <div class="row">
                                    <div class="reloj" style="background-color: transparent; width:100%">
                                        <center>

                                            <body input type="time" style="font-size: 20px;  border-radius:0.75rem;"
                                                onload="HoraActual(<?php echo date('H') . ', ' . date('i') . ', ' . date('s'); ?>)">
                                                <div id="contenedor_reloj"
                                                    style="width: 400px; font-size:30px; font-family: Lucida Console, Courier New , monospace; text-align:center; margin-left:0;">
                                                </div>
                                                <link rel="shortcut icon" href="">
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
                            <div id="cuenta"></div>
                            {{-- INICIO SECCION 1 --}}
                            <div style="margin-top: 10px">
                                <div class="row" style="margin:3px">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div style="margin: 10px">
                                                <strong>
                                                    <p class="card-text" style="color:rgb(0, 0, 0)">Turno</p>
                                                </strong>
                                                <div class="col-sm-6">
                                                    <p class="card-text reloj-text"><small
                                                            class="text-muted2"><b>Inicio:</b>
                                                            <e class="tiemp-text">
                                                                {{ old('ingreso', $ciclosos->ingreso) }} </e>
                                                        </small></p>
                                                    <p class="card-text reloj-text"><small
                                                            class="text-muted2"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                            <e class="tiemp-text">
                                                                {{ old('salida', $ciclosos->salida) }}</e>
                                                        </small></p>
                                                    @if (empty($ciclosos->salida))
                                                        <p class="card-text reloj-text"><small
                                                                class="text-muted2"><b>Horas de Conexión: </b>
                                                                <rem class="tiemp-text">0</rem>
                                                            </small></p>
                                                    @else
                                                        <p class="card-text reloj-text"><small
                                                                class="text-muted2"><b>Horas de Conexión: </b>
                                                                <rem class="tiemp-text"> {{ $total }} </rem>
                                                            </small></p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card">
                                            <div style="margin: 10px">
                                                <strong>
                                                    <p class="card-text" style="color:rgb(0, 0, 0)">Break</p>
                                                </strong>
                                                <div class="col-sm-6">
                                                    <p class="card-text reloj-text"><small class="text-muted2"><b>Inicio:
                                                            </b>
                                                            <e class="tiemp-text">
                                                                {{ old('breakin', $ciclosos->breakin) }} </e>
                                                        </small></p>
                                                    <p class="card-text reloj-text"><small
                                                            class="text-muted2"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                            <e class="tiemp-text">
                                                                {{ old('breakout', $ciclosos->breakout) }}</e>
                                                        </small></p>
                                                    <p class="card-text reloj-text"><small class="text-muted2">{{ old('timebreak', $ciclosos->timebreak) }}
                                                            <b>minutos</b></small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card">
                                            <div style="margin: 10px">
                                                <strong>
                                                    <p class="card-text" style="color:rgb(0, 0, 0)">Almuerzo</p>
                                                </strong>
                                                <div class="col-sm-6">
                                                    <p class="card-text reloj-text"><small class="text-muted2"><b>Inicio:</b>
                                                        <e class="tiemp-text"> <input id="" name="" value="{{ $ciclosos->almuerzo}}" disabled style="width:70px;background-color: transparent;border:none"></e> </small>
                                                    </p>

                                                    <p class="card-text reloj-text"><small class="text-muted2"><b>Fin:</b>
                                                        <e class="tiemp-text"> <input id="" name="" class="" value="{{ $ciclosos->almuerzoout}}" disabled style="width:70px;background-color: transparent;border:none"></e> </small>
                                                    </p>

                                                    <p class="card-text reloj-text"><small class="text-muted2"><b>Tiempo:</b>
                                                        <e class="tiemp-text"> <input id="" name="" class="" value="{{ $ciclosos->timelunch}}" disabled style="width:70px;background-color: transparent;border:none"></e> </small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- INICIO SECCION 2 --}}
                                <div style="margin-top: 10px">
                                    <div class="row" style="margin:3px">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong>
                                                        <p class="card-text" style="color:rgb(0, 0, 0)">Capacitación
                                                        </p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <p class="card-text reloj-text"><small
                                                                class="text-muted2"><b>Inicio:</b>
                                                                <e class="tiemp-text">
                                                                    {{ old('capacitacion', $ciclosos->capacitacion) }}
                                                                </e>
                                                            </small></p>
                                                        <p class="card-text reloj-text"><small
                                                                class="text-muted2"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                                <e class="tiemp-text">
                                                                    {{ old('capout', $ciclosos->capout) }}</e>
                                                            </small></p>
                                                        <p class="card-text reloj-text"><small
                                                                class="text-muted2"><b>Horas de Capacitación </b>
                                                                {{ old('timecap', $ciclosos->timecap) }} </small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong>
                                                        <p class="card-text" style="color:rgb(0, 0, 0)">Pausas Activas
                                                        </p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <p class="card-text reloj-text"><small
                                                                class="text-muted2"><b>Inicio:</b>
                                                                <e class="tiemp-text">
                                                                    {{ old('pausas', $ciclosos->pausas) }} </e>
                                                            </small></p>
                                                        <p class="card-text reloj-text"><small
                                                                class="text-muted2"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                                <e class="tiemp-text">
                                                                    {{ old('pausasout', $ciclosos->pausasout) }}</e>
                                                            </small></p>
                                                        <p class="card-text reloj-text"><small
                                                                class="text-muted2"><b>Horas de Pausas </b>
                                                                {{ old('timepausas', $ciclosos->timepausas) }} </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong>
                                                        <p class="card-text" style="color:rgb(0, 0, 0)">Daño Tecnico
                                                        </p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <p class="card-text reloj-text"><small
                                                                class="text-muted2"><b>Inicio:</b>
                                                                <e class="tiemp-text">
                                                                    {{ old('baño', $ciclosos->daño) }} </e>
                                                            </small></p>
                                                        <p class="card-text reloj-text"><small
                                                                class="text-muted2"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                                <e class="tiemp-text">
                                                                    {{ old('dañoout', $ciclosos->dañoout) }}</e>
                                                            </small></p>
                                                        <p class="card-text reloj-text"><small
                                                                class="text-muted2"><b>Horas de Daño</b>
                                                                {{ old('timedaño', $ciclosos->timedaño) }} </small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- INICIO SECCION 3 --}}
                                <div class="" style="margin-top: 10px">
                                    <div class="row" style="margin:3px">
                                  <div class="col-md-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong>
                                                        <p class="card-text" style="color:rgb(0, 0, 0)">Evaluación</p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <h1 id="clock"  style="font-size: 25px"></h1>

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
                                                        <form action="{{url('/cicloeva/'.$ciclosos->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                            {{csrf_field()}}
                                                            @method('PATCH')
                                                            <div><input type="hidden" id="hoy" name"hoy" value="{{ $hoy }}"> </div>
                                                            <div><input type="hidden" id="hora" name"hora" value="{{ $hora }}"> </div>
                                                           <div><input type="hidden" id= "nombre" name="nombre" value=" {{$user_nombre}}"></div>
                                                            <div><input type="hidden" id= "cedula" name="cedula" value=" {{$user_cedula}}"></div>
                                                            <div><input type="hidden" id= "evaluacion" name="evaluacion" value=" {{$hora}}"></div>
                                                        <input type='submit' class="botones  text-white btn btn-info" value='Inicio' onclick="finalizareva()">
                                                                   
                                                        {{--function de finalizar turno --}}
                                                        <script>
                                                          function finalizareva()
                                                            {
                                                                var confirsalida = confirm("Desea registrar Evaluación?");
                                                                if (confirsalida == false) 
                                                                     {
                                                                        event.preventDefault();
                                                                     }
                                                                     else{
                                                                     }
                                                            }
                                                        </script>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    


                                        <div class="col-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong>
                                                        <p class="card-text" style="color:rgb(0, 0, 0)">Retro</p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <p class="card-text reloj-text"><small
                                                                class="text-muted2"><b>Inicio:</b>
                                                                <e class="tiemp-text">
                                                                    {{ old('retro', $ciclosos->retro) }} </e>
                                                            </small></p>
                                                        <p class="card-text reloj-text"><small
                                                                class="text-muted2"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                                <e class="tiemp-text">
                                                                    {{ old('retroout', $ciclosos->retroout) }}</e>
                                                            </small></p>
                                                        @if (empty($ciclosos->retroout))
                                                            <p class="card-text reloj-text"><small
                                                                    class="text-muted2"><b>Tiempo: </b>
                                                                    <rem class="tiemp-text"> 0 </rem>
                                                                </small></p>
                                                        @else
                                                            <p class="card-text reloj-text"><small
                                                                    class="text-muted2"><b>Tiempo: </b>
                                                                    <rem class="tiemp-text"> {{ $timeretro }}</rem>
                                                                </small></p>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card">
                                                <div style="margin: 10px">
                                                    <strong>
                                                        <p class="card-text" style="color:rgb(0, 0, 0)">Reunión</p>
                                                    </strong>
                                                    <div class="col-sm-6">
                                                        <p class="card-text reloj-text"><small
                                                                class="text-muted2"><b>Inicio:</b>
                                                                <e class="tiemp-text">
                                                                    {{ old('reunion', $ciclosos->reunion) }} </e>
                                                            </small></p>
                                                        <p class="card-text reloj-text"><small
                                                                class="text-muted2"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                                <e class="tiemp-text">
                                                                    {{ old('reunionout', $ciclosos->reunionout) }}</e>
                                                            </small></p>
                                                        @if (empty($ciclosos->reunionout))
                                                            <p class="card-text reloj-text"><small
                                                                    class="text-muted2"><b>Tiempo: </b>
                                                                    <rem class="tiemp-text">0</rem>
                                                                </small></p>
                                                        @else
                                                            <p class="card-text reloj-text"><small
                                                                    class="text-muted2"><b>Tiempo: </b>
                                                                    <rem class="tiemp-text"> {{ $timereunion }}
                                                                    </rem>
                                                                </small></p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


