@extends('layouts.app', ['activePage' => 'avanceproduccion', 'titlePage' => __('avanceproduccion')])

@section('content')

  <div class="content">
  
    <div class="container-fluid">
        <div class="card-header card-header-info card-header-icon">
          <h3>{{ $mensaje }}</h3>
          
          <div class="row">
            {{-- Tarjetas de opciones --}}
            @foreach($tarjetas as $tarjeta)
                <div class="col-md-6">
                  <div class="card text-center h-100 shadow" style="background-color: {{ $tarjeta['colorFondo'] }};">
                        <div class="card-body d-flex flex-column card-text-white">
                            {{--<i class="{{ $tarjeta['icono'] }} my-3"></i>--}}
                            <h5 class="card-title">{{ $tarjeta['titulo'] }}</h5>
                            <p class="card-text">{{ $tarjeta['descripcion'] }}</p>
                            <a href="{{ route($tarjeta['ruta']) }}" class="btn btn-primary mt-auto">{{ $tarjeta['textoBoton'] }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Tarjetas vacías -->
            @for($i = 0; $i < 2; $i++)
            <div class="col-md-3">
                <div class="card text-center h-100 shadow">
                    <div class="card-body d-flex flex-column">
                        <i class="card-icon my-3 fas fa-folder-plus"></i> {{-- Icono de ejemplo --}}
                        <h5 class="card-title">Próximamente</h5>
                        <p class="card-text">Más funcionalidades en desarrollo.</p>
                        <a href="#" class="btn btn-secondary mt-auto disabled">Próximamente</a>
                    </div>
                </div>
            </div>
            @endfor
          </div>

        </div>
        
    </div>
  </div>

  <style>
    .card {
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-20px); /* eleva la tarjeta un poco cuando el usuario pasa el ratón por encima */
    }

    .card-icon {
        font-size: 3rem; /* ajusta el tamaño del icono según sea necesario */
    }

    .btn-primary {
        background-color: #0056b3; /* color de tu marca, por ejemplo */
        border-color: #0056b3;
    }

    .btn-primary:hover {
        background-color: #003d82; /* un tono más oscuro para el hover */
        border-color: #003d82;
    }

    /* ... otros estilos ... */

    /* En tu archivo CSS */
    .card-background-1 {
        background-color: #f8f9fa; /* Color claro */
    }
    .card-background-2 {
        background-color: #6c757d; /* Color oscuro */
    }
    /* ... más clases para diferentes colores de fondo ... */

    .card-text-white h5,
    .card-text-white p {
        color: #ffffff;
    }



  </style>
@endsection


