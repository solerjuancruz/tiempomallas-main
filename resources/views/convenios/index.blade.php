@extends('layouts.main', ['activePage' => 'news', 'titlePage' => 'Convenios'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-info">
                                    <h4 class="card-title">Convenios</h4>
                                    <p class="card-category">Convenios registrados</p>
                                </div>
                               {{--  <div class="col-md-6">
                                    <form action="/searchuser" method="GET">
                                        <div class="input-group">
                                            <input type="searchuser" name="searchuser" class="form-control" autofocus>
                                            <span class="input-group-prepend">
                                                <button type="submit" class="btn btn-info btn-sm" style="border-radius: 10px">Buscar por Numero</button>
                                            </span>
                                        </div>
                                    </form>
                                </div> --}}
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            @can('user_create')
                                                <a href="{{ route('convenios.create') }}" class="btn btn-sm btn-facebook">Añadir
                                                    Convenio</a>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>Titulo</th>
                                                <th>Descripcion</th>
                                                <th>Convenios</th>
                                                <th>Fecha de creacion</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($convenios as $convenio)
                                                    <tr>
                                                        <td>{{$convenio->title}}</td>
                                                        <td>{{$convenio->description}}</td>
                                                        <td>{{$convenio->convenio}}</td>
                                                        <td>{{$convenio->created_at}}</td>
                                                        <td>
                                                            <a href="{{route('convenios.edit',$convenio->id)}}" class="btn btn-success">Editar</a>
                                                            <form action="{{route('convenios.destroy',$convenio->id)}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger">Eliminar</button>

                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer mr-auto">
                                 {{ $convenios->links() }} 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
