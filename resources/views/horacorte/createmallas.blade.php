@extends('layouts.main', ['activePage' => 'supervisor', 'titlePage' => 'Supervisor Personal'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h2 class="card-title pl- "><b>Diligencia los siguientes datos</b> </h2>
                                <h4 class="card-category text-white"><b>Creación de mallas</b></h4>
                            </div>
                              <!-- formulario nuevo -->
                            <div class=" container-fluid  m-1 p-1">
                                <div class="m-4 p-4">
                                    <form action="{{route('mallas.store')}}" method="post" class="" id="">
                                        @csrf
                                        <div class="form-row d-flex justify-content-around mt-3">
                                            <div class="form-group col-sm-3 pt-0 mt-0 ">
                                                <label class="text-info" style="font-size:1.3em;" for="users_id">Nombre
                                                    Asesor</label>
                                                <select name="users_id" id="users_id" class="form-control"
                                                    aria-label="Default select example" required>
                                                    @foreach ($usuarios as $usuario)
                                                    <option value="{{ $usuario['id']}}">{{ $usuario['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-3 p-4 ">
                                                <label class="text-info" style="font-size:1.3em;"
                                                    for="semana">Semana-Asignada</label>
                                                <input type="week" class="form-control" name="semana" id="semana"
                                                    required>
                                            </div>
                                            <div class="form-group col-sm-3 ">
                                                <label class="text-info" style="font-size:1.3em;"
                                                    for="semana">Dia-descanso</label>
                                                <input type="date" class="form-control mt-3" name="diadescanso" min="<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+3 days"));?>"
                                                max="<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+10 days"));?>"
                                                    id="diadescanso" required>
                                            </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-around mt-1">

                                            <div class="form-group col-sm-3">
                                                <label class="text-info" style="font-size:1.3em;"
                                                    for="campaña">Campaña</label>
                                                <input type="text" class="form-control mt-3" id="campaña" name="campaña"
                                                    required>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label class="text-info" style="font-size:1.3em;"
                                                    for="foco">Foco</label></label>
                                                <input type="text" class="form-control mt-3" name="foco" id="foco"
                                                    required>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label class="text-info" style="font-size:1.3em;"
                                                    for="encargado">Encargado</label>
                                                <input type="text" class="form-control mt-3" name="encargado"
                                                    id="encargado" required>
                                            </div>
                                        </div>
                                        <div class=" mt-4 pt-4 ">
                                            <table class=" table table-hover w-100">
                                                <thead style="background:#00CED1;"
                                                    class="fw-bold text-light text-center">
                                                    <tr class="col-sm-auto m-0 p-0 d-grid justify-content-between">
                                                        <th class="col-1" style="font-size:1.5em; font-weight: bold; "
                                                            scope="col">
                                                            Mallas/Gestión</th>
                                                        <th class="col-1" style="font-size:1.5em; font-weight: bold;"
                                                            scope="col">
                                                            Hr-trab
                                                        </th>
                                                        <th class="col-1" style="font-size:1.5em; font-weight: bold; "
                                                            scope="col">Hr
                                                            Ini
                                                        </th>
                                                        <th class="col-1" style="font-size:1.5em; font-weight: bold; "
                                                            scope="col">
                                                            H-fin
                                                        </th>
                                                        <th class="col-1" style="font-size:1.5em; font-weight: bold; "
                                                            scope="col">
                                                            Desc 1
                                                        </th>
                                                        <th class="col-1" style="font-size:1.5em; font-weight: bold; "
                                                            scope="col">
                                                            H-ini-alm</th>
                                                        <th class="col-1" style="font-size:1.5em; font-weight: bold; "
                                                            scope="col">
                                                            H-fin-alm</th>
                                                        <th class="col-1" style="font-size:1.5em; font-weight: bold; "
                                                            scope="col">
                                                            Desc 1</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="col-sm-8 m-0 p-0 d-grid justify-content-center">
                                                        <th class="text-info text-center col-1"
                                                            style="font-size:1.5em;">
                                                            Lunes</th>
                                                        <td><input
                                                                class="form-control text-info text-center font-weight-bold col w-100"
                                                                style="font-size: 1.5rem;" type="text" name=""
                                                                id="htrab" disabled></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="horainicio"
                                                                onchange="calcular('horainicio','horafin','alminicio','almfin','htrab')"
                                                                onclick="calcular('horainicio','horafin','alminicio','almfin','htrab')" value="08:00:00"></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="horafin"   onchange="calcular('horainicio','horafin','alminicio','almfin','htrab')"
                                                                onclick="calcular('horainicio','horafin','alminicio','almfin','htrab')"
                                                                 value="17:00:00"></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="desc1" value="10:00:00"></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="alminicio" value="13:00:00">
                                                        </td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="almfin" value="14:00:00"
                                                                onchange="calcular()" onclick="calcular()"></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="desc2" value="16:00:00"></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-info text-center" style="font-size:1.5em ;">
                                                            Martes</th>
                                                        <td><input
                                                                class="form-control text-info text-center font-weight-bold col w-100"
                                                                style="font-size: 1.5rem;" type="text" name=""
                                                                id="htrabmar" disabled></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="horainiciomar" onchange="calcular('horainiciomar','horafinmar','alminiciomar','almfinmar','htrabmar')" 
                                                                onclick="calcular('horainiciomar','horafinmar','alminiciomar','almfinmar','htrabmar')" value="08:00:00"
                                                                required>
                                                        </td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="horafinmar" onchange="calcular('horainiciomar','horafinmar','alminiciomar','almfinmar','htrabmar')" 
                                                                onclick="calcular('horainiciomar','horafinmar','alminiciomar','almfinmar','htrabmar')"value="17:00:00"
                                                                required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="desc1" onchange="calcular('horainiciomar','horafinmar','alminiciomar','almfinmar','htrabmar')" 
                                                                onclick="calcular('horainiciomar','horafinmar','alminiciomar','almfinmar','htrabmar')" value="10:00:00"
                                                                required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="alminiciomar" onchange="calcular('horainiciomar','horafinmar','alminiciomar','almfinmar','htrabmar')" 
                                                                onclick="calcular('horainiciomar','horafinmar','alminiciomar','almfinmar','htrabmar')" value="13:00:00"
                                                                required>
                                                        </td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="almfinmar" onchange="calcular('horainiciomar','horafinmar','alminiciomar','almfinmar','htrabmar')" 
                                                                onclick="calcular('horainiciomar','horafinmar','alminiciomar','almfinmar','htrabmar')" value="14:00:00"
                                                                required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="desc2" value="16:00:00"
                                                                required></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-info text-center" style="font-size:1.5em ;">
                                                            Miercoles</th>
                                                        <td><input
                                                                class="form-control text-info text-center font-weight-bold col w-100"
                                                                style="font-size: 1.5rem;" type="text" name=""
                                                                id="htrabmie" disabled></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciomie','horafinmie','alminiciomie','almfinmie','htrabmie')" 
                                                                onclick="calcular('horainiciomie','horafinmie','alminiciomie','almfinmie','htrabmie')"
                                                                type="time" name="" id="horainiciomie" value="08:00:00"
                                                                required>
                                                        </td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciomie','horafinmie','alminiciomie','almfinmie','htrabmie')" 
                                                                onclick="calcular('horainiciomie','horafinmie','alminiciomie','almfinmie','htrabmie')"
                                                                type="time" name="" id="horafinmie" value="17:00:00"
                                                                required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" 
                                                                type="time" name="" id="desc1" value="10:00:00"
                                                                required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciomie','horafinmie','alminiciomie','almfinmie','htrabmie')" 
                                                                onclick="calcular('horainiciomie','horafinmie','alminiciomie','almfinmie','htrabmie')"
                                                                type="time" name="" id="alminiciomie" value="13:00:00"
                                                                required>
                                                        </td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciomie','horafinmie','alminiciomie','almfinmie','htrabmie')" 
                                                                onclick="calcular('horainiciomie','horafinmie','alminiciomie','almfinmie','htrabmie')"
                                                                type="time" name="" id="almfinmie" value="14:00:00"
                                                                required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="desc2" value="16:00:00"
                                                                required></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-info text-center" style="font-size:1.5em ;">
                                                            Jueves</th>
                                                        <td><input
                                                                class="form-control text-info text-center font-weight-bold col w-100"
                                                                style="font-size: 1.5rem;" type="text" name=""
                                                                id="htrabjue" disabled></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciojue','horafinjue','alminiciojue','almfinjue','htrabjue')" 
                                                                onclick="calcular('horainiciojue','horafinjue','alminiciojue','almfinjue','htrabjue')" 
                                                                type="time" name="" id="horainiciojue" value="08:00:00"
                                                                required>
                                                        </td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciojue','horafinjue','alminiciojue','almfinjue','htrabjue')" 
                                                                onclick="calcular('horainiciojue','horafinjue','alminiciojue','almfinjue','htrabjue')" 
                                                                type="time" name="" id="horafinjue" value="17:00:00"
                                                                required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="desc1" value="10:00:00"
                                                                required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciojue','horafinjue','alminiciojue','almfinjue','htrabjue')" 
                                                                onclick="calcular('horainiciojue','horafinjue','alminiciojue','almfinjue','htrabjue')" 
                                                                type="time" name="" id="alminiciojue" value="13:00:00"
                                                                required>
                                                        </td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciojue','horafinjue','alminiciojue','almfinjue','htrabjue')" 
                                                                onclick="calcular('horainiciojue','horafinjue','alminiciojue','almfinjue','htrabjue')" 
                                                                type="time" name="" id="almfinjue" value="14:00:00"
                                                                required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="desc2" value="16:00:00"
                                                                required></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-info text-center" style="font-size:1.5em ;">
                                                            Viernes</th>
                                                        <td><input
                                                                class="form-control text-info text-center font-weight-bold col w-100"
                                                                style="font-size: 1.5rem;" type="text" name="" 
                                                                id="htrabvie" disabled></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciovie','horafinvie','alminiciovie','almfinvie','htrabvie')" 
                                                                onclick="calcular('horainiciovie','horafinvie','alminiciovie','almfinvie','htrabvie')"
                                                                type="time" name="" id="horainiciovie" value="08:00:00"
                                                                required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciovie','horafinvie','alminiciovie','almfinvie','htrabvie')" 
                                                                onclick="calcular('horainiciovie','horafinvie','alminiciovie','almfinvie','htrabvie')"
                                                                type="time" name="" id="horafinvie" value="17:00:00"
                                                                required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="desc1" value="10:00:00"
                                                                required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciovie','horafinvie','alminiciovie','almfinvie','htrabvie')" 
                                                                onclick="calcular('horainiciovie','horafinvie','alminiciovie','almfinvie','htrabvie')"
                                                                type="time" name="" id="alminiciovie" value="13:00:00"
                                                                required>
                                                        </td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciovie','horafinvie','alminiciovie','almfinvie','htrabvie')" 
                                                                onclick="calcular('horainiciovie','horafinvie','alminiciovie','almfinvie','htrabvie')"
                                                                type="time" name="" id="almfinvie" value="14:00:00"
                                                                required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="desc2" value="16:00:00"
                                                                required></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-info text-center" style="font-size:1.5em ;">
                                                            Sabado</th>
                                                        <td><input
                                                                class="form-control text-info text-center font-weight-bold col w-100"
                                                                style="font-size: 1.5rem;" type="text" name=""
                                                                id="htrabsab" disabled></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciosab','horafinsab','alminiciosab','almfinsab','htrabsab')"
                                                                onclick="calcular('horainiciosab','horafinsab','alminiciosab','almfinsab','htrabsab')"
                                                                type="time" name="" id="horainiciosab" value="08:00:00"
                                                                required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciosab','horafinsab','alminiciosab','almfinsab','htrabsab')"
                                                                onclick="calcular('horainiciosab','horafinsab','alminiciosab','almfinsab','htrabsab')"
                                                                type="time" name="" id="horafinsab" value="17:00:00"
                                                                required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" 
                                                                type="time" name="" id="desc1" value="10:00:00"
                                                                required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciosab','horafinsab','alminiciosab','almfinsab','htrabsab')"
                                                                onclick="calcular('horainiciosab','horafinsab','alminiciosab','almfinsab','htrabsab')"
                                                                type="time" name="" id="alminiciosab" value="13:00:00"
                                                                required>
                                                        </td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciosab','horafinsab','alminiciosab','almfinsab','htrabsab')"
                                                                onclick="calcular('horainiciosab','horafinsab','alminiciosab','almfinsab','htrabsab')"
                                                                type="time" name="" id="almfinsab" value="14:00:00"
                                                                required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="desc2" value="16:00:00"
                                                                required></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-info text-center" style="font-size:1.5em ;">
                                                            Domingo</th>
                                                        <td><input
                                                                class="form-control text-info text-center font-weight-bold col w-100"
                                                                style="font-size: 1.5rem;" type="text" name=""
                                                                id="htrabdom" disabled></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciodom','horafindom','alminiciodom','almfindom','htrabdom')"
                                                                onclick="calcular('horainiciodom','horafindom','alminiciodom','almfindom','htrabdom')"
                                                                type="time" name="" id="horainiciodom" required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciodom','horafindom','alminiciodom','almfindom','htrabdom')"
                                                                onclick="calcular('horainiciodom','horafindom','alminiciodom','almfindom','htrabdom')"
                                                                type="time" name="" id="horafindom" required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="desc1" required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciodom','horafindom','alminiciodom','almfindom','htrabdom')"
                                                                onclick="calcular('horainiciodom','horafindom','alminiciodom','almfindom','htrabdom')"
                                                                type="time" name="" id="alminiciodom" required>
                                                        </td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;" onchange="calcular('horainiciodom','horafindom','alminiciodom','almfindom','htrabdom')"
                                                                onclick="calcular('horainiciodom','horafindom','alminiciodom','almfindom','htrabdom')"
                                                                type="time" name="" id="almfindom" required></td>
                                                        <td><input style="border-radius:30px; border:1px solid #2980B9; box-shadow:0px 0px 5px #4DD0E1;
                                                                 font-weight:bold; text-align:end; color:teal;"
                                                                type="time" name="" id="desc2" required></td>
                                                    </tr>
                                                     <script>
                                                    function calcular(id1, id2, id3, id4, id5) {

                                                        
                                                        let a = parseFloat(document.getElementById(id1).value) || 0;
                                                        let b = parseFloat(document.getElementById(id2).value) || 0;
                                                        let c = parseFloat(document.getElementById(id3).value) || 0;
                                                        let d= parseFloat(document.getElementById(id4).value) || 0;
                                                        let total = document.getElementById(id5).value = (b - a) - (
                                                            d - c) + "-horas";
                                                    }
                                                    </script>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class=" d-flex justify-content-end m-4">
                                            <button type="submit" class="btn btn-info">Guardar</button>
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
</div>
@endsection