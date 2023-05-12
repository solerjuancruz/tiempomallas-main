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
                            <center>
                                <h1 id="canvasH" style="font-family:Roboto;color:rgb(48, 192, 211);">{{ Auth::user()->name }}</h1>

                                {{--      <h3 id="titulosalida" style="text-transform: uppercase;">
                                    {{ Auth::user()->name }}</h3>
                                 

  <h1 style="text-aline:center;">PANEL DE REGISTRO DE TIEMPOS
                                </h1> --}}


                            </center>
                            <div class="row">
                                <div class="reloj" style="width:100%">
                                    <center>

                                        <body input type="time" style="font-size: 20px;  border-radius:0.75rem;"
                                            onload="HoraActual(<?php echo date('H') . ', ' . date('i') . ', ' . date('s'); ?>)">

                                            <h1 id="clock" style="font-family:Roboto;color:rgb(48, 192, 211);"></h1>

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
                                                        <p class="card-text reloj-text"><small class="text-muted2"
                                                                style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                                <e class="tiemp-text">
                                                                    {{ old('ingreso', $ciclosos->ingreso) }}
                                                                </e>
                                                            </small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"
                                                                style="color:rgb(0, 0, 0)"><b>Fin:</b>
                                                                <e class="tiemp-text">
                                                                    {{ old('salida', $ciclosos->salida) }}
                                                                </e>
                                                            </small></p>
                                                        @if (empty($ciclosos->salida))
                                                            <p class="card-text reloj-text"><small class="text-muted2"
                                                                    style="color:rgb(0, 0, 0)"><b>Tiempo: </b>
                                                                    <rem class="tiemp-text">0</rem>
                                                                </small></p>
                                                        @else
                                                            <p class="card-text reloj-text"><small class="text-muted2"
                                                                    style="color:rgb(0, 0, 0)"><b>Tiempo: </b>
                                                                    <rem class="tiemp-text">
                                                                    </rem>
                                                                </small></p>
                                                        @endif
                                                        <input type="hidden" name="total" id="total" value="">
                                                        <a style="color: white"
                                                            href="{{ url('/ciclosalidaout/' . $ciclosos->id . '/edit') }}"><button
                                                                class="text-white btn btn-info">Registrar
                                                                Salida</button></a>
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
                                                            <p class="card-text" style="color:rgb(0, 0, 0)">Turno
                                                            </p>
                                                        </strong>
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
                                                            <p class="card-text reloj-text"><small class="text-muted2"
                                                                    style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                                    <e class="tiemp-text">
                                                                        {{ old('ingreso', $ciclosos->ingreso) }}
                                                                    </e>
                                                                </small></p>
                                                            <p class="card-text reloj-text"><small class="text-muted2">
                                                                    <b>Fin:</b>
                                                                    <e class="tiemp-text">
                                                                        {{ old('salida', $ciclosos->salida) }}
                                                                    </e>
                                                                </small></p>
                                                            <p class="card-text reloj-text">
                                                                <small class="text-muted2"><b>Tiempo:</b>
                                                                    <e class="tiemp-text">
                                                                        <input id="" name=""
                                                                            class="" value="{{ $ciclosos->total }}"
                                                                            disabled
                                                                            style="width:40px;background-color: transparent;border:none">
                                                                    </e>
                                                                </small>
                                                            </p>
                                                            <input type="hidden" name="total" id="total"
                                                                value="">

                                                            <input type='submit' class="botonesinactivos"
                                                                value=' SALIDA DE TURNO REGISTRADA' disabled>
                                                        </div>
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
                                                    <p class="card-text reloj-text"><small class="text-muted2">
                                                            <b>Inicio:</b>
                                                            <e class="tiemp-text">
                                                                {{ old('breakin', $ciclosos->breakin) }} </e>
                                                        </small></p>
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Fin:</b>
                                                            <e class="tiemp-text">
                                                                {{ old('breakout', $ciclosos->breakout) }}
                                                            </e>
                                                        </small></p>

                                                    <p class="card-text reloj-text">
                                                        <small class="text-muted2"><b>Tiempo:</b>
                                                            <e class="tiemp-text">
                                                                <input id="" name="" class=""
                                                                    value="{{ $ciclosos->timebreak }}" disabled
                                                                    style="width:40px;background-color: transparent;border:none">
                                                                <rem class="tiemp-text">0</rem>
                                                            </e>
                                                        </small>
                                                    </p>
                                                    {{-- registro el break inicio o salida --}}
                                                    @if (@isset($ciclosos->breakin))
                                                        <a style="color: white"
                                                            href="{{ route('ciclobreakout.show', $ciclosos->id) }}">
                                                            <button class="text-white btn btn-danger">Registrar fin
                                                                Break</button></a>
                                                    @else
                                                        <a style="color: white"
                                                            href="{{ url('/ciclobreakin/' . $ciclosos->id . '/edit') }}">
                                                            <button class="text-white btn btn-info">Registrar
                                                                break</button></a>
                                                    @endif


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
                                                    <p class="card-text reloj-text">
                                                        <small lass="text-muted2"><b>Inicio:</b>
                                                            <e class="tiemp-text">
                                                                <input id="" name=""
                                                                    value="{{ $ciclosos->breakin }}" disabled
                                                                    style="width:70px;background-color: transparent;border:none">
                                                            </e>
                                                        </small>
                                                    </p>

                                                    <p class="card-text reloj-text">
                                                        <small class="text-muted2"><b>Fin:</b>
                                                            <e class="tiemp-text">
                                                                <input id="" name="" class=""
                                                                    value="{{ $ciclosos->breakout }}" disabled
                                                                    style="width:70px;background-color: transparent;border:none">
                                                            </e>
                                                        </small>
                                                    </p>

                                                    <p class="card-text reloj-text">
                                                        <small class="text-muted2"><b>Tiempo:</b>
                                                            <e class="tiemp-text">
                                                                <input id="" name="" class=""
                                                                    value="{{ $ciclosos->timebreak }}" disabled
                                                                    style="width:40px;background-color: transparent;border:none">
                                                            </e>
                                                        </small>
                                                    </p>
                                                    <input type='submit' class="botonesinactivos"
                                                        value='BREAK YA REGISTRADO' disabled>
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
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                            <e class="tiemp-text">
                                                                {{ old('almuerzo', $ciclosos->almuerzo) }}
                                                            </e>
                                                        </small></p>
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                            <e class="tiemp-text">
                                                                {{ old('almuerzoout', $ciclosos->almuerzoout) }}
                                                            </e>
                                                        </small></p>

                                                    <p class="card-text reloj-text">
                                                        <small class="text-muted2"><b>Tiempo:</b>
                                                            <e class="tiemp-text">
                                                                <input id="" name="" class=""
                                                                    value="{{ $ciclosos->timelunch }}" disabled
                                                                    style="width:40px;background-color: transparent;border:none">
                                                                <rem class="tiemp-text">0</rem>
                                                            </e>
                                                        </small>
                                                    </p>
                                                    {{-- registro el lunch inicio o salida --}}
                                                    @if (@isset($ciclosos->almuerzo))
                                                        <a style="color: white"
                                                            href="{{ route('ciclobreakout.show', $ciclosos->id) }}">
                                                            <button class="text-white btn btn-danger">Registrar fin
                                                                Break</button></a>
                                                    @else
                                                        <a style="color: white"
                                                            href="{{ url('/ciclolunch/' . $ciclosos->id . '/edit') }}"><button
                                                                class="botones text-white btn btn-info">Registrar
                                                                Lunch</button></a>
                                                    @endif
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
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                            <e class="tiemp-text">
                                                                {{ old('almuerzo', $ciclosos->almuerzo) }}
                                                            </e>
                                                        </small></p>
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                            <e class="tiemp-text">
                                                                {{ old('almuerzoout', $ciclosos->almuerzoout) }}
                                                            </e>
                                                        </small></p>

                                                    <p class="card-text reloj-text">
                                                        <small class="text-muted2"><b>Tiempo:</b>
                                                            <e class="tiemp-text">
                                                                <input id="" name="" class=""
                                                                    value="{{ $ciclosos->timelunch }}" disabled
                                                                    style="width:40px;background-color: transparent;border:none">
                                                            </e>
                                                        </small>
                                                    </p>
                                                    @if (@isset($ciclosos->almuerzoout))
                                                        <input type='submit' class="botonesinactivos"
                                                            value='ALMUERZO YA REGISTRADO' disabled>
                                                    @else
                                                        <a style="color: white"
                                                            href="{{ route('ciclolunchout.show', $ciclosos->id) }}">
                                                            <button class="text-white btn btn-danger">Registrar fin
                                                                Lunch</button></a>
                                                    @endif

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
                                                        <p class="card-text reloj-text"><small class="text-muted2"
                                                                style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                                <e class="tiemp-text">
                                                                    {{ old('capacitacion', $ciclosos->capacitacion) }}
                                                                </e>
                                                            </small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"
                                                                style="color:rgb(0, 0, 0)"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                                <e class="tiemp-text">
                                                                    {{ old('capout', $ciclosos->capout) }}
                                                                </e>
                                                            </small></p>

                                                        <p class="card-text reloj-text">
                                                            <small class="text-muted2"><b>Tiempo:</b>
                                                                <e class="tiemp-text">
                                                                    <input id="" name="" class=""
                                                                        value="{{ $ciclosos->timecap }}" disabled
                                                                        style="width:40px;background-color: transparent;border:none">
                                                                    <rem class="tiemp-text">0</rem>
                                                                </e>
                                                            </small>
                                                        </p>
                                                        {{-- registro el Capacitacion inicio o salida --}}
                                                        @if (@isset($ciclosos->capacitacion))
                                                            <a style="color: white"
                                                                href="{{ route('ciclocapout.show', $ciclosos->id) }}">
                                                                <button class="text-white btn btn-danger">Registrar fin
                                                                    Capacitacion</button></a>
                                                        @else
                                                            <a style="color:white"
                                                                href="{{ url('/ciclocapa/' . $ciclosos->id . '/edit') }}">
                                                                <button class="botones text-white btn btn-info">R.
                                                                    Capacitación</button></a>
                                                        @endif

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
                                                            <p class="card-text reloj-text"><small class="text-muted2"
                                                                    style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                                    <e class="tiemp-text">
                                                                        {{ old('capacitacion', $ciclosos->capacitacion) }}
                                                                    </e>
                                                                </small></p>
                                                            <p class="card-text reloj-text"><small class="text-muted2"
                                                                    style="color:rgb(0, 0, 0)"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                                    <e class="tiemp-text">
                                                                        {{ old('capout', $ciclosos->capout) }}
                                                                    </e>
                                                                </small></p>
                                                            @if (empty($ciclosos->capout))
                                                                <p class="card-text reloj-text"><small class="text-muted2"
                                                                        style="color:rgb(0, 0, 0)"><b>Capacitacion:
                                                                        </b>
                                                                        <rem class="tiemp-text">0</rem>
                                                                    </small></p>
                                                            @else
                                                                <p class="card-text reloj-text">
                                                                    <small class="text-muted2"><b>Tiempo:</b>
                                                                        <e class="tiemp-text">
                                                                            <input id="" name=""
                                                                                class=""
                                                                                value="{{ $ciclosos->timecap }}" disabled
                                                                                style="width:40px;background-color: transparent;border:none">
                                                                        </e>
                                                                    </small>
                                                                </p>
                                                            @endif
                                                            <input type='submit' class="botonesinactivos"
                                                                value='CAPACITACION YA REGISTRADA' disabled>
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
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                            <e class="tiemp-text">
                                                                {{ old('pausas', $ciclosos->pausas) }}
                                                            </e>
                                                        </small></p>
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                            <e class="tiemp-text">
                                                                {{ old('pausasout', $ciclosos->pausasout) }}
                                                            </e>
                                                        </small></p>

                                                    <p class="card-text reloj-text">
                                                        <small class="text-muted2"><b>Tiempo:</b>
                                                            <e class="tiemp-text">
                                                                <input id="" name="" class=""
                                                                    value="{{ $ciclosos->timepausas }}" disabled
                                                                    style="width:40px;background-color: transparent;border:none">
                                                                <rem class="tiemp-text">0</rem>
                                                            </e>
                                                        </small>
                                                    </p>
                                                    {{-- registro el tiempo pausas inicio o salida --}}
                                                    @if (@isset($ciclosos->pausas))
                                                        <a style="color: white"
                                                            href="{{ route('ciclopausasout.show', $ciclosos->id) }}">
                                                            <button class="text-white btn btn-danger">Registrar fin
                                                                pausas</button></a>
                                                    @else
                                                        <a style="color: white"
                                                            href="{{ url('/ciclopausas/' . $ciclosos->id . '/edit') }}"><button
                                                                class="botones text-white btn btn-info">Registrar
                                                                Pausas</button></a>
                                                    @endif
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
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                            <e class="tiemp-text">
                                                                {{ old('pausas', $ciclosos->pausas) }}
                                                            </e>
                                                        </small></p>
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                            <e class="tiemp-text">
                                                                {{ old('pausasout', $ciclosos->pausasout) }}
                                                            </e>
                                                        </small></p>

                                                    <p class="card-text reloj-text">
                                                        <small class="text-muted2"><b>Tiempo:</b>
                                                            <e class="tiemp-text">
                                                                <input id="" name="" class=""
                                                                    value="{{ $ciclosos->timepausas }}" disabled
                                                                    style="width:40px;background-color: transparent;border:none">
                                                            </e>
                                                        </small>
                                                    </p>
                                                    <input type='submit' class="botonesinactivos"
                                                        value='PAUSA REGISTRADA' disabled>

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
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                            <e class="tiemp-text">
                                                                {{ old('baño', $ciclosos->daño) }} </e>
                                                        </small></p>
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                            <e class="tiemp-text">
                                                                {{ old('dañoout', $ciclosos->dañoout) }}</e>
                                                        </small></p>
                                                    <p class="card-text reloj-text">
                                                        <small class="text-muted2"><b>Tiempo:</b>
                                                            <e class="tiemp-text">
                                                                <input id="" name="" class=""
                                                                    value="{{ $ciclosos->timedaño }}" disabled
                                                                    style="width:40px;background-color: transparent;border:none">
                                                                <rem class="tiemp-text">0</rem>
                                                            </e>
                                                        </small>

                                                        {{-- registro el tiempo Daño inicio o salida --}}
                                                        @if (@isset($ciclosos->daño))
                                                            <a style="color: white"
                                                                href="{{ route('cicloaveriaout.show', $ciclosos->id) }}">
                                                                <button class="text-white btn btn-danger">Registrar fin
                                                                    Daño</button></a>
                                                        @else
                                                            <a style="color: white"
                                                                href="{{ url('/cicloaveria/' . $ciclosos->id . '/edit') }}"><button
                                                                    class="botones text-white btn btn-info">REGISTRAR
                                                                    DAÑO</button></a>
                                                        @endif
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
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                            <e class="tiemp-text">
                                                                {{ old('baño', $ciclosos->daño) }} </e>
                                                        </small></p>
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                            <e class="tiemp-text">
                                                                {{ old('dañoout', $ciclosos->dañoout) }}</e>
                                                        </small></p>

                                                    @if (empty($ciclosos->dañoout))
                                                        <p class="card-text reloj-text"><small class="text-muted2"
                                                                style="color:rgb(0, 0, 0)"><b>Daño de
                                                                    Equipo: </b>
                                                                <rem class="tiemp-text"> 0 </rem>
                                                            </small></p>
                                                    @else
                                                        <p class="card-text reloj-text">
                                                            <small class="text-muted2"><b>Tiempo:</b>
                                                                <e class="tiemp-text">
                                                                    <input id="" name="" class=""
                                                                        value="{{ $ciclosos->timedaño }}" disabled
                                                                        style="width:40px;background-color: transparent;border:none">
                                                                </e>
                                                            </small>
                                                        </p>
                                                    @endif

                                                    <input type='submit' class="botonesinactivos"
                                                        value='AVERIA REGISTRADA' disabled>
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
                                                        <p class="card-text reloj-text"><small class="text-muted2"
                                                                style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                                <e class="tiemp-text">
                                                                    {{ old('evaluacion', $ciclosos->evaluacion) }}
                                                                </e>
                                                            </small></p>
                                                        <p class="card-text reloj-text"><small class="text-muted2"
                                                                style="color:rgb(0, 0, 0)"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                                <e class="tiemp-text">
                                                                    {{ old('evaluacionout', $ciclosos->evaluacionout) }}
                                                                </e>
                                                            </small></p>
                                                        <p class="card-text reloj-text">
                                                            <small class="text-muted2"><b>Tiempo:</b>
                                                                <e class="tiemp-text">
                                                                    <input id="" name="" class=""
                                                                        value="{{ $ciclosos->timeeva }}" disabled
                                                                        style="width:40px;background-color: transparent;border:none">
                                                                    <rem class="tiemp-text">0</rem>
                                                                </e>
                                                            </small>
                                                        </p>

                                                        {{-- registro el tiempo evaluacion inicio o salida --}}
                                                        @if (@isset($ciclosos->evaluacion))
                                                            <a style="color: white"
                                                                href="{{ route('cicloevaout.show', $ciclosos->id) }}">
                                                                <button class="text-white btn btn-danger">Registrar fin
                                                                    evaluacion</button></a>
                                                        @else
                                                            <a style="color: white"
                                                                href="{{ url('/cicloeva/' . $ciclosos->id . '/edit') }}"><button
                                                                    class="botones text-white btn btn-info">R.
                                                                    Evaluación</button></a>
                                                        @endif
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
                                                            <p class="card-text reloj-text"><small class="text-muted2"
                                                                    style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                                    <e class="tiemp-text">
                                                                        {{ old('evaluacion', $ciclosos->evaluacion) }}
                                                                    </e>
                                                                </small></p>
                                                            <p class="card-text reloj-text"><small class="text-muted2"
                                                                    style="color:rgb(0, 0, 0)"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                                    <e class="tiemp-text">
                                                                        {{ old('evaluacionout', $ciclosos->evaluacionout) }}
                                                                    </e>
                                                                </small></p>

                                                            @if (empty($ciclosos->evaluacionout))
                                                                <p class="card-text reloj-text"><small class="text-muted2"
                                                                        style="color:rgb(0, 0, 0)"><b>Evaluación:
                                                                        </b>
                                                                        <rem class="tiemp-text"> 0 </rem>
                                                                    </small></p>
                                                            @else
                                                                <p class="card-text reloj-text">
                                                                    <small class="text-muted2"><b>Tiempo:</b>
                                                                        <e class="tiemp-text">
                                                                            <input id="" name=""
                                                                                class=""
                                                                                value="{{ $ciclosos->timeeva }}" disabled
                                                                                style="width:40px;background-color: transparent;border:none">
                                                                        </e>
                                                                    </small>
                                                                </p>
                                                            @endif
                                                            <input type='submit' class="botonesinactivos"
                                                                value='EVALUACION REGISTRADA' disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                @endif


                                @if (empty($ciclosos->retroout))
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div style="margin: 10px">
                                                <strong id="tituloCards">
                                                    <p class="card-text">Retro</p>
                                                </strong>
                                                <div class="col-sm-6">
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                            <e class="tiemp-text">
                                                                {{ old('retro', $ciclosos->retro) }} </e>
                                                        </small></p>
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                            <e class="tiemp-text">
                                                                {{ old('retroout', $ciclosos->retroout) }}
                                                            </e>
                                                        </small></p>
                                                    <p class="card-text reloj-text">
                                                        <small class="text-muted2"><b>Tiempo:</b>
                                                            <e class="tiemp-text">
                                                                <input id="" name="" class=""
                                                                    value="{{ $ciclosos->timeretro }}" disabled
                                                                    style="width:40px;background-color: transparent;border:none">
                                                                <rem class="tiemp-text">0</rem>
                                                            </e>
                                                        </small>

                                                        {{-- registro el tiempo Retro inicio o salida --}}
                                                        @if (@isset($ciclosos->retro))
                                                            <a style="color: white"
                                                                href="{{ route('cicloretroout.show', $ciclosos->id) }}">
                                                                <button class="text-white btn btn-danger">Registrar fin
                                                                    Retro</button></a>
                                                        @else
                                                            <a style="color: white"
                                                                href="{{ url('/cicloretro/' . $ciclosos->id . '/edit') }}">
                                                                <button class="botones text-white btn btn-info">Registrar
                                                                    Retro</button></a>
                                                        @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div style="margin: 10px">
                                                <strong>
                                                    <p class="card-text" style="color:rgb(0, 0, 0)">Retro</p>
                                                </strong>
                                                <div class="col-sm-6">
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                            <e class="tiemp-text">
                                                                {{ old('retro', $ciclosos->retro) }} </e>
                                                        </small></p>
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                            <e class="tiemp-text">
                                                                {{ old('retroout', $ciclosos->retroout) }}
                                                            </e>
                                                        </small></p>
                                                    @if (empty($ciclosos->retroout))
                                                        <p class="card-text reloj-text"><small class="text-muted2"
                                                                style="color:rgb(0, 0, 0)"><b>Retro: </b>
                                                                <rem class="tiemp-text"> 0 </rem>
                                                            </small></p>
                                                    @else
                                                        <p class="card-text reloj-text">
                                                            <small class="text-muted2"><b>Tiempo:</b>
                                                                <e class="tiemp-text">
                                                                    <input id="" name="" class=""
                                                                        value="{{ $ciclosos->timeretro }}" disabled
                                                                        style="width:40px;background-color: transparent;border:none">
                                                                </e>
                                                            </small>
                                                        </p>
                                                    @endif
                                                    <input type='submit' class="botonesinactivos"
                                                        value=' RETROALIMENTACION REGISTRADA' disabled>
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
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                            <e class="tiemp-text">
                                                                {{ old('reunion', $ciclosos->reunion) }} </e>
                                                        </small></p>
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                            <e class="tiemp-text">
                                                                {{ old('reunionout', $ciclosos->reunionout) }}
                                                            </e>
                                                        </small></p>
                                                    <p class="card-text reloj-text">
                                                        <small class="text-muted2"><b>Tiempo:</b>
                                                            <e class="tiemp-text">
                                                                <input id="" name="" class=""
                                                                    value="{{ $ciclosos->timereunion }}" disabled
                                                                    style="width:40px;background-color: transparent;border:none">
                                                                <rem class="tiemp-text">0</rem>
                                                            </e>
                                                        </small>
                                                    </p>

                                                    {{-- registro el tiempo reunion inicio o salida --}}
                                                    @if (@isset($ciclosos->reunion))
                                                        <a style="color: white"
                                                            href="{{ route('cicloreunionout.show', $ciclosos->id) }}">
                                                            <button class="text-white btn btn-danger">Registrar fin
                                                                reunion</button></a>
                                                    @else
                                                        <a style="color: white"
                                                            href="{{ url('/cicloreunion/' . $ciclosos->id . '/edit') }}"><button
                                                                class="botones text-white btn btn-info">Registrar
                                                                Reunión</button></a>
                                                    @endif
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
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Inicio:</b>
                                                            <e class="tiemp-text">
                                                                {{ old('reunion', $ciclosos->reunion) }} </e>
                                                        </small></p>
                                                    <p class="card-text reloj-text"><small class="text-muted2"
                                                            style="color:rgb(0, 0, 0)"><b>Fin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                            <e class="tiemp-text">
                                                                {{ old('reunionout', $ciclosos->reunionout) }}
                                                            </e>
                                                        </small></p>
                                                    @if (empty($ciclosos->reunionout))
                                                        <p class="card-text reloj-text"><small class="text-muted2"
                                                                style="color:rgb(0, 0, 0)"><b>Reunión:
                                                                </b>
                                                                <rem class="tiemp-text">0</rem>
                                                            </small></p>
                                                    @else
                                                        <p class="card-text reloj-text">
                                                            <small class="text-muted2"><b>Tiempo:</b>
                                                                <e class="tiemp-text">
                                                                    <input id="" name="" class=""
                                                                        value="{{ $ciclosos->timereunion }}" disabled
                                                                        style="width:40px;background-color: transparent;border:none">
                                                                </e>
                                                            </small>
                                                        </p>
                                                    @endif

                                                    <input type='submit' class="botonesinactivos"
                                                        value=' REUNION REGISTRADA' disabled>
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

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"
        integrity="sha512-f8mwTB+Bs8a5c46DEm7HQLcJuHMBaH/UFlcgyetMqqkvTcYg4g5VXsYR71b3qC82lZytjNYvBj2pf0VekA9/FQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/Flip.min.js"></script>

@endsection


<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"
    integrity="sha512-f8mwTB+Bs8a5c46DEm7HQLcJuHMBaH/UFlcgyetMqqkvTcYg4g5VXsYR71b3qC82lZytjNYvBj2pf0VekA9/FQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/Flip.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="./assests/js/efect_header.js"></script>
