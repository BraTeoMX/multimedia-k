<div class="sidebar" data-color="brown" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal"> <img class="navbar-brand-logo-mini" src="{!! asset('/material/img/logo.png') !!}" alt="Logo" width='80%'>
    </a>
  </div>
  <div class="sidebar-wrapper" >
    <ul class="nav">
      {{-- Inicio Apartado del boton cafe de la barra de opciones  --}}
      <li class="nav-item{{ $activePage == 'avanceproduccion' ? ' active' : '' }}"  >
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons" >home</i>
            <p >{{ __('Home - Inicio') }}</p>
        </a>
      </li>
      {{-- Fin Apartado del boton cafe de la barra de opciones  --}}

      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample2" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Planeación') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse hide" id="laravelExample2">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">
                <span class="sidebar-mini">  </span>
                <span class="sidebar-normal">{{ __('Actualización') }} </span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">
                <span class="sidebar-mini">  </span>
                <span class="sidebar-normal">Altas y bajas </span>
              </a>
            </li>
            
          </ul>
        </div>    
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('prueba.sorteo') }}">
          <span class="sidebar-mini">  </span>
          <span class="sidebar-normal">Sorteo </span>
        </a>
      </li>


    </ul>
  </div>
</div>
