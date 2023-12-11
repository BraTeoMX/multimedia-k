@extends('layouts.app', ['activePage' => 'avanceproduccion', 'titlePage' => __('avanceproduccion')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="card-header card-header-info card-header-icon">
            <h2 id="texto-escritura" class="estilo-mensaje"></h2>

            <div class="row">
                {{-- Iterar sobre las categorías --}}
                @php
                    $colores = ['#558B2F', '#1B5E20', '#B71C1C', '#FF6F00', '#4A148C', '#3E2723', '#01579B', '#1A237E', '#004D40', '#BF360C', 
                                '#880E4F', '#006064', '#F57F17', '#263238', '#2E7D32', '#D84315', '#4E342E', '#827717', '#558B2F', '#0D47A1']; // Lista de colores sólidos
                @endphp
                @foreach($categorias as $categoria)
                    @php
                    $colorIndex = abs(crc32($categoria->nombre)) % count($colores);
                    $color = $colores[$colorIndex];
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
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSubcategoria{{ $subcategoria->id }}" aria-expanded="true" aria-controls="collapseSubcategoria{{ $subcategoria->id }}" style="color: #ffffff !important;">
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
                                                                        <video width="100%" controls>
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
    .modal-fullscreen-custom {
        width: 100%;
        height: 100%;
        max-width: none;
        margin: 0;
    }

    .modal-fullscreen-custom .modal-content {
        height: 100%;
        border: 0;
        border-radius: 0;
        overflow-y: auto; /* Habilitar desplazamiento vertical */
    }

    .modal-body {
        overflow-y: auto; /* Habilitar desplazamiento vertical */
        max-height: calc(100vh - 120px); /* Ajustar según sea necesario */
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
        

@endsection


