@extends('layouts.app', ['activePage' => 'avanceproduccion', 'titlePage' => __('avanceproduccion')])

@section('content')

  <div class="content">
  
    <div class="container-fluid">
        <div class="card-header card-header-info card-header-icon">
          <h2 id="texto-escritura" class="estilo-mensaje"></h2>
          
          <div class="row">
            {{-- Tarjetas de opciones --}}
            @foreach($tarjetas as $tarjeta)
                <div class="col-md-6 fade-in"> {{-- Añadir la clase fade-in aquí --}}
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
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px); /* Puedes ajustar este valor si lo necesitas */
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }


    .fade-in {
        margin-bottom: 20px; /* Ajusta este valor según tus necesidades */
        animation: fadeIn 2s ease-out forwards;
    }

    @media (max-width: 768px) { /* Para dispositivos móviles */
        .fade-in {
            margin-bottom: 10px; /* Un margen más pequeño en dispositivos móviles */
        }
    }

  </style>
  <style>
    .card {
        transition: transform 0.3s ease-in-out;
        margin-bottom: 100px; 
    }
    
    @media (max-width: 768px) { /* Para dispositivos móviles */
        .card {
            margin-bottom: 10px; /* Un margen más pequeño en dispositivos móviles */
        }
    }

    .card:hover {
        transform: translateY(-20px); /* eleva la tarjeta un poco cuando el usuario pasa el ratón por encima */
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

    .card-title {
        font-size: 30px; /* Ajusta este valor según tus necesidades */
    }

    .card-text {
        font-size: 18px; /* Ajusta este valor según tus necesidades */
    }

    .estilo-mensaje {
        text-align: center;
        font-weight: bold;
        color: black;
        font-family: Arial, Helvetica, sans-serif;
    }


  </style>

<script>
    const elementoTexto = document.getElementById('texto-escritura');
    const texto = 'Bienvenidos a Intimark 🐱‍👓';
    let indiceActual = 0;
    let tiempoEspera = 70; // Tiempo entre letras en milisegundos

    function escribirTexto() {
        if (indiceActual < texto.length) {
            elementoTexto.innerHTML += texto[indiceActual];
            indiceActual++;
            if (texto[indiceActual - 1] === ' ' || texto[indiceActual - 1] === '🐱‍👓') {
                // Aumentar el tiempo de espera después de un espacio o al final
                setTimeout(escribirTexto, 650);
            } else {
                setTimeout(escribirTexto, tiempoEspera);
            }
        }
    }

    escribirTexto(); // Iniciar la función al cargar la página
</script>


@endsection


