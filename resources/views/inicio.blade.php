@extends('layouts.app', ['activePage' => 'avanceproduccion', 'titlePage' => __('avanceproduccion')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="card-header card-header-info card-header-icon">
            <h2 id="texto-escritura" class="estilo-mensaje"></h2>

            <div class="row">
                {{-- Iterar sobre las categorías --}}
                @php
                        $colores = [
                            '#558B2F', // Verde oliva oscuro 
                            '#1B5E20', // Verde bosque
                            '#4E342E', // Marrón oscuro
                            '#FF6F00', // Naranja brillante
                            '#4A148C', // Púrpura oscuro
                            '#880E4F', // Marrón muy oscuro, casi negro
                            '#1A237E', // Azul oscuro, azul marino
                            '#01579B', // Azul más oscuro, azul medianoche
                            '#004D40', // Verde azulado oscuro, color petróleo
                            '#BF360C', // Rojo anaranjado oscuro, terracota
                            '#0D47A1', // Borgoña o vino oscuro
                            '#006064', // Cian oscuro, azul verdoso
                            '#F57F17', // Naranja amarillento, calabaza
                            '#263238', // Gris azulado muy oscuro, casi negro
                            '#2E7D32', // Verde esmeralda
                            '#D84315', // Naranja quemado
                            '#9E9D24', // Verde amarillento, como oliva clara
                            '#827717', // Verde oliva oscuro
                            '#6A1B9A', // Púrpura más vibrante
                            '#3E2723'  // Azul cobalto, azul intenso y brillante
                        ];
                        $index = 0;
                @endphp
                @foreach($categorias as $categoria)
                    @php
                        $color = $colores[$index % count($colores)];
                        $index++;
                    @endphp
                    <div class="col-md-6 fade-in">
                        <div class="card text-center h-100 shadow" style="background-color: {{ $color }}">
                            <div class="card-body d-flex flex-column card-text-white">
                                <h5 class="card-title">{{ $categoria->nombre }}</h5>
                                <p class="card-text">Descripción o más detalles de la categoría</p>
                                <button type="button" class="btn btn-danger mt-auto" data-toggle="modal" data-target="#categoriaModal-{{ $categoria->id }}">Administrar</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal para cada categoría -->
                    <div class="modal fade main-modal" id="categoriaModal-{{ $categoria->id }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-fullscreen-custom" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $categoria->nombre }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="accordion" id="accordionCategoria-{{ $categoria->id }}">
                                        @foreach($categoria->subcategorias as $subcategoria)
                                            <div class="card custom-card">
                                                <div class="card-header custom-card-header" id="headingSubcategoria{{ $subcategoria->id }}">
                                                    <h2 class="mb-0" style="background-color: {{ $color }}">
                                                        <button class="btn btn-link  btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSubcategoria{{ $subcategoria->id }}" aria-expanded="true" aria-controls="collapseSubcategoria{{ $subcategoria->id }}" style="color: #ffffff !important;">
                                                            {{ $subcategoria->nombre }}
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapseSubcategoria{{ $subcategoria->id }}" class="collapse" aria-labelledby="headingSubcategoria{{ $subcategoria->id }}" data-parent="#accordionCategoria-{{ $categoria->id }}">
                                                    <div class="card-body">
                                                        @foreach($subcategoria->videos as $video)
                                                            <!-- Aquí va la estructura del video como en tu vista de 'Maquinaria y Equipos' -->
                                                            <div class="card custom-card">
                                                                <!-- Encabezado del Video -->
                                                                <div class="card-header custom-card-header" id="headingVideo{{ $video->id }}">
                                                                <h2 class="mb-0" style="background-color: {{ $color }}">
                                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseVideo{{ $video->id }}" aria-expanded="true" aria-controls="collapseVideo{{ $video->id }}" style="color: #ffffff !important;">
                                                                    {{ $video->titulo }}
                                                                    </button>
                                                                </h2>
                                                                </div>

                                                                <!-- Contenido del Video -->
                                                                <div id="collapseVideo{{ $video->id }}" class="collapse" aria-labelledby="headingVideo{{ $video->id }}" data-parent="#collapseSubcategoria{{ $subcategoria->id }}">
                                                                <div class="card-body">
                                                                    {{ $video->descripcion }}
                                                                    <br>
                                                                    <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#videoContainer{{ $video->id }}">
                                                                        Ver Video
                                                                    </button>

                                                                    <!-- Div Colapsable para el Video -->
                                                                    <div id="videoContainer{{ $video->id }}" class="collapse video-container">
                                                                        <video id="video{{ $video->id }}" width="100%" controls>
                                                                            <source src="{{ Storage::url($video->link) }}" type="video/mp4">
                                                                            Tu navegador no admite la etiqueta de video.
                                                                        </video>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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

    .video-container {
        margin-top: 15px;
        max-width: 640px; /* Ajusta el ancho máximo según tus necesidades */
        max-height: 360px; /* Ajusta la altura máxima según tus necesidades */
        margin-left: auto;
        margin-right: auto;
        overflow: hidden; /* Esto asegura que el video no sobrepase los límites del contenedor */
    }

    .video-container video {
        width: 100%; /* Hace que el video se ajuste al ancho del contenedor */
        height: auto; /* Mantiene la proporción del video */
    }
    
    /*estilos y diseños para el modal*/
    .modal-fullscreen-custom {
        width: 100%;
        height: 100vh; /* Asegúrate de que el modal no sea más alto que la ventana del navegador */
        max-width: none;
        margin: 0;
        overflow: hidden; /* Evita el desplazamiento en el nivel del modal */
    }

    .modal-fullscreen-custom .modal-content {
        height: 100%; /* El contenido del modal también ocupa toda la altura */

    }

    .modal-body {
        overflow-y: auto; /* Habilitar desplazamiento vertical solo en modal-body */
        max-height: calc(100vh - 120px); /* Altura máxima ajustada para permitir la barra de título y algo de margen */
    }


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

    .card-body .btn-primary, 
    .card-body .btn-secondary {
        padding: 20px 20px; /* Aumenta el padding para hacer el botón más grande */
        font-size: 25px; /* Ajusta el tamaño del texto dentro del botón */
    }

    .estilo-mensaje {
        text-align: center;
        font-weight: bold;
        color: black;
        font-family: Arial, Helvetica, sans-serif;
    }


  </style>

<style>
    /* Estilos para el acordeón */
    .custom-card .card-header {
        padding: 5px 15px; /* Reduce el relleno del encabezado del acordeón */

    }

    .custom-card .card-body {
        padding: 10px; /* Reduce el relleno del cuerpo del acordeón */
    }

    .custom-card {
        margin-bottom: 5px; /* Reduce el margen entre elementos del acordeón */
    }

    /* Ajustar el efecto de hover para los acordeones */
    .custom-card:hover {
        transform: translateY(-5px); /* Reduce la cantidad de desplazamiento */
    }
    

</style>

<script>
    const elementoTexto = document.getElementById('texto-escritura');
    const texto = 'Centro de Desarrollo Habilidades Intimark 👋';
    let indiceActual = 0;
    let tiempoEspera = 70; // Tiempo entre letras en milisegundos

    function escribirTexto() {
        if (indiceActual < texto.length) {
            elementoTexto.innerHTML += texto[indiceActual];
            indiceActual++;
            if (texto[indiceActual - 1] === ' ' || texto[indiceActual - 1] === '👋') {
                // Aumentar el tiempo de espera después de un espacio o al final
                setTimeout(escribirTexto, 650);
            } else {
                setTimeout(escribirTexto, tiempoEspera);
            }
        }
    }

    escribirTexto(); // Iniciar la función al cargar la página
</script>

<script>
    $(document).ready(function() {
        // ... tu función escribirTexto() y otras funciones ...
    
        // Abrir modal principal
        $(document).on('click', '[data-toggle="modal"]', function(event) {
            event.stopPropagation();
            var target = $(this).data('target');
            $(target).modal('show');
        });
    
        // No necesitas el manejo de modal anidado ya que se eliminó esa funcionalidad
    });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Detener videos al abrir una nueva sección del acordeón
        $('.collapse').on('show.bs.collapse', function() {
            $('.video-container video').each(function() {
                this.pause();
                this.currentTime = 0;
            });
        });
    
        // Detener videos al cerrar el modal
        $('.modal').on('hidden.bs.modal', function() {
            $(this).find('.video-container video').each(function() {
                this.pause();
                this.currentTime = 0;
            });
        });
    });
    </script>
    
        

@endsection


