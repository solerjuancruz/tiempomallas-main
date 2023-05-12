@extends('layouts.main', ['activePage' => 'news', 'titlePage' => 'NOTICIAS'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-info">
                                    <h4 class="card-title">Noticias</h4>
                                    <p class="card-category">Noticias registradas</p>
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
                                            <a href="{{ route('convenios.index') }}" class="btn btn-sm btn-facebook">Convenio</a>
                                                <a href="{{ route('noticias.create') }}" class="btn btn-sm btn-facebook">Añadir
                                                    Noticias</a>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>Titulo</th>
                                                <th>Descripcion</th>
                                                <th>Noticia</th>
                                                <th>Fecha de creacion</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($noticias as $noticia)
                                                    <tr>
                                                        <td>{{$noticia->title}}</td>
                                                        <td>{{$noticia->description}}</td>
                                                        <td>
                                                            <img
                                                            src="{{ asset('storage') . '/' . $noticia->file_new }}"
                                                            alt="" height="130" width="300"
                                                            style="border-radius: 10px">    
                                                        </td>
                                                        <td>{{$noticia->created_at}}</td>
                                                        <td>
                                                            <a href="{{route('noticias.edit',$noticia->id)}}" class="btn btn-success">Editar</a>
                                                            <form action="{{route('noticias.destroy',$noticia->id)}}" method="post">
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
                                 {{--    {{ $users->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
