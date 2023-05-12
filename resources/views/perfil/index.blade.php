@extends('layouts.main', ['activePage' => 'Perfil', 'titlePage' => 'PERFIL DE USUARIO'])
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <h3 aline="center">PERFIL DE USUARIO</h3>
                    </center>
                    <div class="card">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <form action="#" method="post" class="form-horizontal">
                                        @csrf
                                        @method('PUT')
                                        <div class="card">
                                            <div class="card-header card-header-info">
                                                <h4 class="card-title">Usuario</h4>
                                                <p class="card-category">Editar datos</p>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <label for="name" class="col-sm-2 col-form-label">Nombre y
                                                        Apellido</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ Auth::user()->name }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="username" class="col-sm-2 col-form-label">Nombre de
                                                        usuario</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="username"
                                                            value="{{ Auth::user()->username }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="email" class="col-sm-2 col-form-label">Correo</label>
                                                    <div class="col-sm-7">
                                                        <input type="email" class="form-control" name="email"
                                                            value="{{ Auth::user()->email }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="cedula" class="col-sm-2 col-form-label">Cedula</label>
                                                    <div class="col-sm-7">
                                                        <input type="number" class="form-control" name="cedula"
                                                            value="{{ Auth::user()->cedula }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                                    <div class="col-sm-7">
                                                        <input type="password" class="form-control" name="password"
                                                            placeholder="Ingrese nueva contraseña" autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer ml-auto mr-auto">
                                                <button type="submit" class="btn btn-info">Actualizar</button>
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
