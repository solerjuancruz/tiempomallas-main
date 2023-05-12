@extends('layouts.main', ['activePage' => 'Historico General', 'titlePage' => 'HISTORICO GENERAL'])
@section('content')
  {{-- mapa --}}

<!-- Agregar capa de OpenStreetMap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
{{-- FIN --}}
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">

                                    <h1 align="center" style="font-family: "robot";color:black">Historial de Tiempos</h1>
                                    <h3 align="center"> BIENVENIDO {{ Auth::user()->name }}</h3>
                                    {{ csrf_field() }}
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

                                    <body input type="time" style="text-align: center"  class="reloj text-center" onload="HoraActual(<?php echo date('H') . ', ' . date('i') . ', ' . date('s'); ?>)">

                                        <div id="tituloCards">
                                            <div style="font-size: 50px" id="contenedor_reloj" class="reloj text-center"></div>
                                        </div>
                                        <link rel="shortcut icon" href="" class="reloj text-center">

                                    </body>

                                    <div class="row mt-5 m-4">
                                        <div class="input-group">
                                            <div class="form-outline">

                                                <form action="/searchpersonalgeneral" method="GET">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="search" name="searchpersonalgeneral"
                                                                class="form-control" placeholder="Buscar">
                                                        </div>
                                                        <div class="col">
                                                            <button type="submit" class="buscador btn btn-info">
                                                                Buscar por documento</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div><input type="hidden" id="hora" name"hora" value="{{ $hora }}"> </div>
                                    <div><input type="hidden" id="nombre" name="nombre" value=" {{ $user_nombre }}"></div>
                                    <div><input type="hidden" id="cedula" name="cedula" value=" {{ $user_cedula }}"></div>
                                    <div><input type="hidden" name="reunion" id="reunion" value="{{ $llave }}"></div>





                                    <form action="{{ url('/ciclo') }}" method="POST" enctype="multipart/form-data"
                                        class="form-horizontal">
                                        <div><input type="hidden" id="fecha" name"fecha" value="{{ $hoy }}"> </div>
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
                                                                <th scope="col">Salida</th>
                                                                <th scope="col">timepo break</th>
                                                                <th scope="col">Tiempo Almuerzo</th>
                                                                <th scope="col">Tiempo de Conexión</th>
                                                                <th scope="col">Ver en mapa</th>

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
                                                                    <td>{{ $ciclo->salida }}</td>
                                                                    <td>{{ $ciclo->timebreak }}</td>
                                                                    <td>{{ $ciclo->timelunch }}</td>
                                                                    <td>{{ $ciclo->total }}</td>
                                                                    <td>
                                                                        <a href="{{route('personalgeneral.edit', $ciclo->id)}}" style="background: none; border: 0px">
                                                                            <i class="material-icons" style=" color: rgb(0, 228, 0);">visibility</i>
                                                                        </a>
                                                                        <script>
                                                                           
                                                                        </script>
                                                                        <a type="button" data-toggle="modal" data-target="#exampleModal" style="background: none; border: 0px">
                                                                            <i class="material-icons" style=" color: rgb(255, 255, 40);" onclick="todo('{{$ciclo->latitude}}','{{$ciclo->longitude}}')">visibility</i>
                                                                        </a>                                                                   
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                      {{-- modal mapa --}}
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                        <div class="modal-content" >
                                                                            <div class="modal-body"> 
                                                                                <div id="todo">
                                                                                    <div id="mapa" style="height: 330px;width: 450px;"></div>
                                                                                   <div id="mapsview"></div>  
                                                                                   </div>
                                                                          </div>
                                                                        </div>
                                                                        </div>
                                                                    </div> 
                                                                        {{-- FIN --}}
                                                                            
                                                                       <script>
                                                                       
                                                                                /* localizacion */
    
                                                                                var mapa = L.map('mapa');

function todo(latitude, longitude) {
  // Limpiar capa de marcadores
  capaMarcadores.clearLayers();
  
  // Obtener la latitud y longitud desde tu variable de JavaScript
  var latitud = latitude;
  var longitud = longitude;

  // Crear un objeto LatLng con la latitud y longitud
  var ubicacion = L.latLng(latitud, longitud);

  // Centrar el mapa en la ubicación
  mapa.setView(ubicacion, 15);

  // Agregar un marcador en la ubicación a la capa de marcadores
  L.marker(ubicacion).addTo(capaMarcadores);
  
  // Actualizar enlace a Google Maps
  const mapsview = document.getElementById('mapsview')
  mapsview.innerHTML = `<a href="https://www.google.com/maps/@${latitude},${longitude},105m/data=!3m1!1e3" target="_blank" rel="noopener" style="color:red">Ver en Google Maps</a>`
}

// Agregar capa de OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
}).addTo(mapa);

// Agregar capa de marcadores
var capaMarcadores = L.layerGroup().addTo(mapa);

// Agregar evento click al mapa para limpiar los marcadores
mapa.on('click', function() {
  capaMarcadores.clearLayers();
  mapsview.innerHTML = '';
});

// Agregar evento click a los elementos con la clase 'ubicacion' para mostrar la ubicación en el mapa
var ubicaciones = document.querySelectorAll('.ubicacion');
ubicaciones.forEach(function(ubicacion) {
  ubicacion.addEventListener('click', function() {
    var latitude = this.dataset.latitude;
    var longitude = this.dataset.longitude;
    todo(latitude, longitude);
  });
});
                                                                                    
                                                                                        /* FIN */
                                                                                      </script>

                                                    {{ $ciclosos->links() }}


                                    </form>
                                </div>
                                <p>
                                    clic <a class="btn-descar" href="{{ route('ciclo.excel') }}">Aqui</a>
                                    para descargar en Excel la base de Tiempos de los colaboradores
                                </p>
                            </div>


                            <div id="mapa" style="height: 330px;width: 715px;"></div>


                            <style>
                                .btn-descar {
                                    background-color: #cfd0d0;
                                    width: 520px;
                                    height: 100px;
                                    border: 4px solid #cfd0d0;

                                }


                            </style>






                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    
@endsection
