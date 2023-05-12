@extends('layouts.main', ['activePage' => 'supervisor', 'titlePage' => 'Supervisor Personal - Edicion de Mallas'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h2 class="card-title pl- "><b>Edita los siguientes datos</b> </h2>
                                <h4 class="card-category text-white"><b>Edición de mallas</b></h4>
                            </div>
                            <div class=" container-fluid  m-1 p-1">
                                <form action="{{ route('mallas.update',$mallas ->id)}}" method="POST"
                                    class="form-control-sm p-1 m-1">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row d-flex justify-content-around mt-3">
                                        <div class="form-group col-md-5 pt-0 mt-0 ">
                                            <label class="text-info" style="font-size:1.3em;" for="users_id">Nombre
                                                Asesor</label>
                                            <select name="users_id" id="users_id" class="form-control"
                                                aria-label="Default select example" required>
                                                <option value="{{$mallas -> user -> name}}"></option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5 p-4 ">
                                            <label class="text-info" style="font-size:1.3em;"
                                                for="semana">Semana-Asignada</label>
                                            <input type="week" class="form-control" name="semana" id="semana"
                                                value="{{$mallas ->semana}}" required>
                                        </div>
                                    </div>


                                    <div class="form-row d-flex justify-content-around mt-2">

                                        <div class="form-group col-md-3">
                                            <label class="text-info" style="font-size:1.3em;"
                                                for="campaña">Campaña</label>
                                            <input type="text" class="form-control mt-3" id="campaña" name="campaña"
                                                value="{{$mallas ->campaña}}" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="text-info" style="font-size:1.3em;"
                                                for="foco">Foco</label></label>
                                            <input type="text" class="form-control mt-3" name="foco" id="foco"
                                                value="{{$mallas ->foco}}" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="text-info" style="font-size:1.3em;"
                                                for="encargado">Encargado</label>
                                            <input type="text" class="form-control mt-3" name="encargado" id="encargado"
                                                value="{{$mallas ->encargado}}" required>
                                        </div>
                                    </div>
                                    <div class="form-row d-flex justify-content-around mt-2">

                                        <div class="form-group col-md-2">
                                            <label class="text-info" style="font-size:1.3em;" for="H-trab">Horas totales
                                                trabajadas</label>
                                            <input type="text" class="form-control mt-3" id="H-trab"
                                                value="{{$mallas -> horastotal}}" disabled>
                                        </div>
                                        <div class="form-group col-md-2">

                                            <label class="text-info" style="font-size:1.3em;"
                                                for="horainicio">Hora-inicio</label>
                                            <input type="time" class="form-control mt-3" name="horainicio"
                                                id="horainicio" value="{{$mallas -> horainicio}}" required>

                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="text-info" style="font-size:1.3em;"
                                                for="H-fin">Hora-fin</label>
                                            <input type="time" class="form-control mt-3" name="horafinal" id="horafinal"
                                                value="{{$mallas -> horafinal}}" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="text-info" style="font-size:1.3em;" for="descanso1">Descanso
                                                1</label>
                                            <input type="time" class="form-control mt-3" name="descanso1" id="descanso1"
                                                value="{{$mallas -> descanso1}}" required>
                                        </div>
                                    </div>
                                    <div class="form-row d-flex justify-content-around mt-2">

                                        <div class="form-group col-md-2">
                                            <label class="text-info" style="font-size:1.3em;"
                                                for="almuerzoinicio">Hora-inicio-alm</label>
                                            <input type="time" class="form-control mt-3" name="almuerzoinicio"
                                                id="almuerzoinicio" value="{{$mallas -> almuerzoinicio}}" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="text-info" style="font-size:1.3em;"
                                                for="almuerzofinal">Hora-fin-alm</label>
                                            <input type="time" class="form-control mt-3" name="almuerzofinal"
                                                id="almuerzofinal" value="{{$mallas -> almuerzofinal}}" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="text-info" style="font-size:1.3em;" for="descanso2">Descanso
                                                2</label></label>
                                            <input type="time" class="form-control mt-3" name="descanso2" id="descanso2"
                                                value="{{$mallas -> descanso2}}" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="text-info" style="font-size:1.3em;"
                                                for="semana">Dia-descanso</label>
                                            <input value="{{$mallas->diadescanso}}"  class="form-control mt-3" type="date" name="date" id="date"
                                                min="<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+3 days"));?>"
                                                max="<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+10 days"));?>">


                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end m-4">

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
@endsection