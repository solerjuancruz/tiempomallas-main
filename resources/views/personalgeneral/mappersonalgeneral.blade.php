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
                        <h1>{{$mapa->nombre}}</h1>
                        <div id="mapa" style="height: 350px;width: 615px;margin-left: 30%;"></div>
                        <div id="mapsview"></div> 
                        <script>
                            /* localizacion */

                            var cicloarray = @json($mapa); 

                   
                       /* mapsview */
                       const mapsview = document.getElementById('mapsview')
                       mapsview.innerHTML=`<a href="https://www.google.com/maps/@${cicloarray.latitude},${cicloarray.longitude},105m/data=!3m1!1e3" target="_blank" rel="noopener" style="color:red">Ver en gogle mapa</a>`
                   
                       /* ver */
                   
                       // Obtener la latitud y longitud desde tu variable de JavaScript
                   var latitud = cicloarray.latitude;
                   var longitud = cicloarray.longitude;
                   
                   // Crear un objeto LatLng con la latitud y longitud
                   var ubicacion = L.latLng(latitud, longitud);
                   
                   // Crear un mapa y centrarlo en la ubicación
                   var mapa = L.map('mapa').setView(ubicacion, 15);
                   
                   // Agregar capa de OpenStreetMap
                   L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                       attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
                   }).addTo(mapa);
                   
                   // Agregar un marcador en la ubicación
                   L.marker(ubicacion).addTo(mapa);

                       /* FIN */
                       </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    
@endsection
