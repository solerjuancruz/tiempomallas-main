<div class="sidebar" data-color="azure" data-background-color="white">
    <div class="logo" style="display:contents">
       {{-- <a href="/home" class="simple-text logo-normal"><img style="width:50px" src="{{ asset('img/logo-mini.png') }}"
                alt="">
	--}}
            {{ __('Registro de Tiempos') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            
            @can('post_index')
                <li class="nav-item{{ $activePage == 'home' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="material-icons">schedule</i> 
                        <p>{{ __('REGISTRO DE TIEMPOS') }}</p>
                    </a>
                </li>
            @endcan
            @can('Hgeneral')
                <li class="nav-item{{ $activePage == 'Historico General' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('personalgeneral.index')}}">
                        <i class="material-icons">date_range</i> 
                        <p>{{ __('Historico General') }}</p>
                    </a>
                </li>
            @endcan   
 	    @can('superpersonal')
            <li class="nav-item{{ $activePage == 'supervisor' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('superpersonal.index')}}">
                    <i class="material-icons">person</i> 
                    <p>{{ __('personal supervisor') }}</p>
                </a>
            </li>
            @endcan                 
            @can('user_index')  
            @can('superpersonal')
            <li class="nav-item{{ $activePage == 'news' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('noticias.index')}}">
                    <i class="material-icons">newspaper</i> 
                    <p>{{ __('BIENESTAR') }}</p>
                </a>
            </li>
            @endcan   
              <hr>
                <li class="nav-item{{ $activePage == 'Historial' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('historial.index') }}">
                        <i class="material-icons">history</i> 
                        <p>{{ __('Historial') }}</p>
                    </a>
                </li>
            @endcan            
            @can('user_index')
              <hr>
                <li class="nav-item{{ $activePage == 'usuarios' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('users') }}">
                        <i class="material-icons">people</i>
                        <p>{{ __('Usuarios') }}</p>
                    </a>
                </li>
            @endcan
            @can('role_index')
                <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('roles.index') }}">
                        <i class="material-icons">supervisor_account</i>
                        <p>{{ __('Roles') }}</p>
                    </a>
                </li>
            @endcan
            @can('permission_index')
                <li class="nav-item{{ $activePage == 'Permissions' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('permissions.index') }}">
                        <i class="material-icons">bubble_chart</i>
                        <p>{{ __('Permisos') }}</p>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</div>
