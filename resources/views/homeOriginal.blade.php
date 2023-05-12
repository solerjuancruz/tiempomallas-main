@extends('layouts.main', ['activePage' => 'home', 'titlePage' => ''])
@section('content')
    <h6 style="margin-top: 50px; margin-left:30px;">Ultima Conexión: {{ Auth::user()->last_login }} </h6>
    <div class="content" style="margin-bottom: -160px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
<h1>
Feliz Navida
</h1>
                                <form action="{{ url('/registro') }}" method="POST" enctype="multipart/form-data"
                                    class="form-horizontal">
                                    {{ csrf_field() }}
                                    <center style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
                                        <h1 align="center">Registrar Tiempos</h1>
                                        <h3 align="center"> BIENVENIDO {{ Auth::user()->name }}</h3>
                                    </center>
                                    <div class="row">
                                        &nbsp;&nbsp;&nbsp;
                                        <script type="text/javascript">
                                            function HoraActual(hora, minuto, segundo) {
                                                segundo = segundo + 1;
                                                if (segundo == 60) {
                                                    minuto = minuto + 1;
                                                    segundo = 0;
                                                    if (minuto == 60) {
                                                        minuto = 0;
                                                        hora = hora + 1;
                                                        if (hora == 24) {
                                                            hora = 0;
                                                        }
                                                    }
                                                }
                                                if (hora < 10) hora = '0' + hora;
                                                if (minuto < 10) minuto = '0' + minuto;
                                                if (segundo < 10) segundo = '0' + segundo;
                                                HoraCompleta = hora + ":" + minuto + ":" + segundo;
                                                document.getElementById('contenedor_reloj').innerHTML = HoraCompleta;
                                                setTimeout("HoraActual(" + hora + ", " + minuto + ", " + segundo + ")", 1000);
                                            }
                                        </script>
                                        <script>
                                            var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                                "Octubre", "Noviembre", "Diciembre");
                                            var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                            var f = new Date();
                                            document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                                .getFullYear());
                                        </script>
                                        &nbsp;&nbsp;&nbsp;

                                        <body input style="font-size: 20px" type="time"
                                            onload="HoraActual(<?php echo date('H') . ', ' . date('i') . ', ' . date('s'); ?>)">
                                            <div id="contenedor_reloj"></div>
                                            &nbsp;&nbsp;&nbsp;
                                            <link rel="shortcut icon" href="">
                                        </body>
                                    </div>
                                    <div class="row">
                                        <input type="hidden" id="hoy" name="hoy" value="{{ $hoy }}">
                                        <input type="hidden" id="hora" name="hora" value="{{ $hora }}">
                                        <input type="hidden" id="ago" name="ago" value="{{ $ago }}">
                                    </div>

                                    <div class="card-header">

                                        <p><button style="height: 155px">Registrar Ingreso</button></p>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
