@extends('layouts.main', ['activePage' => 'news', 'titlePage' => 'NOTICIAS'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('convenios.update',$convenio->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title">Noticias</h4>
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
                  <input type="text" class="form-control" name="title" placeholder="{{ $convenio->title }}" value="" autofocus>
                  @if ($errors->has('title'))
                    <span class="error text-danger" for="input-name">{{ $errors->first('title') }}</span>
                  @endif
                </div>
              </div>
              
              <div class="row">
                <label for="description" class="col-sm-2 col-form-label">Descricion</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="description" placeholder="{{ $convenio->description }}" value="" autofocus>
                  @if ($errors->has('description'))
                    <span class="error text-danger" for="input-name">{{ $errors->first('description') }}</span>
                  @endif
                </div>
              </div>
              
              <div class="row">
                <label for="convenio" class="col-sm-2 col-form-label">Convenios</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="convenio" placeholder="{{ $convenio->description }}" value="{{ old('convenio') }}" autofocus>
                  @if ($errors->has('convenio'))
                    <span class="error text-danger" for="input-name">{{ $errors->first('convenio') }}</span>
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
