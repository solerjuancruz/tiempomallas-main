@extends('layouts.main', ['activePage' => 'news', 'titlePage' => 'NOTICIAS'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('noticias.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title">Noticia</h4>
              <p class="card-category">Ingresar datos</p>
            </div>
            <div class="card-body">
              {{-- @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
              @endif --}}
              <div class="row">
                <label for="title" class="col-sm-2 col-form-label">Titulo</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="title" placeholder="Ingrese el titulo" value="{{ old('title') }}" autofocus>
                  @if ($errors->has('title'))
                    <span class="error text-danger" for="input-name">{{ $errors->first('title') }}</span>
                  @endif
                </div>
              </div>
              
              <div class="row">
                <label for="description" class="col-sm-2 col-form-label">Descricion</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="description" placeholder="Ingrese la descripcion" value="{{ old('description') }}" autofocus>
                  @if ($errors->has('description'))
                    <span class="error text-danger" for="input-name">{{ $errors->first('description') }}</span>
                  @endif
                </div>
              </div>
              
              <div class="row">
                <label for="file_new" class="col-sm-2 col-form-label">Noticia</label>
                <div class="col-sm-7">
                  <input type="file" class="form-control" name="file_new" placeholder="Ingrese la noticia" value="{{ old('file_new') }}" autofocus>
                  @if ($errors->has('file_new'))
                    <span class="error text-danger" for="input-name">{{ $errors->first('file_new') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-info">Guardar</button>
            </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
