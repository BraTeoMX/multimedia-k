@extends('layouts.app', ['activePage' => 'avanceproduccion', 'titlePage' => __('avanceproduccion')])

@section('content')
<h2 style="text-align: center">{{ $mensaje }}</h2>
<div class="content">
  <div class="container-fluid">
    <div class="card-header card-header-info card-header-icon">
      <div class="accordion" id="accordionExample">

        @foreach($videosPorSubcategoria as $subcategoria => $videos)
          <div class="card custom-card">
            <!-- Encabezado de la Subcategoría -->
            <div class="card-header custom-card-header" id="headingSubcategoria{{ $loop->index }}">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSubcategoria{{ $loop->index }}" aria-expanded="true" aria-controls="collapseSubcategoria{{ $loop->index }}" style="color: #ffffff !important;">
                  {{ $descripcionesSubcategorias[$subcategoria] ?? $subcategoria }}
                </button>
              </h2>
            </div>

            <!-- Contenido del Acordeón de la Subcategoría -->
            <div id="collapseSubcategoria{{ $loop->index }}" class="collapse" aria-labelledby="headingSubcategoria{{ $loop->index }}" data-parent="#accordionExample">
              <div class="card-body">
                @foreach($videos as $index => $video)
                  <div class="card custom-card">
                    <!-- Encabezado del Video -->
                    <div class="card-header custom-card-header" id="headingVideo{{ $loop->parent->index }}_{{ $index }}">
                      <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseVideo{{ $loop->parent->index }}_{{ $index }}" aria-expanded="true" aria-controls="collapseVideo{{ $loop->parent->index }}_{{ $index }}" style="color: #ffffff !important;">
                          {{ $video->titulo }}
                        </button>
                      </h2>
                    </div>

                    <!-- Contenido del Video -->
                    <div id="collapseVideo{{ $loop->parent->index }}_{{ $index }}" class="collapse" aria-labelledby="headingVideo{{ $loop->parent->index }}_{{ $index }}" data-parent="#collapseSubcategoria{{ $loop->index }}">
                      <div class="card-body">
                        {{ $video->descripcion }}
                        <br>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#videoModal{{ $loop->parent->index }}_{{ $index }}">
                          Ver Video
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="videoModal{{ $loop->parent->index }}_{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel{{ $loop->parent->index }}_{{ $index }}" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="videoModalLabel{{ $loop->parent->index }}_{{ $index }}">{{ $video->titulo }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <video width="100%" controls>
                                  <source src="{{ Storage::url($video->link) }}" type="video/mp4">
                                  Tu navegador no admite la etiqueta de video.
                                </video>
                              </div>
                            </div>
                          </div>
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

<style>
  .accordion .card .custom-card-header {
      background-color: #2c6975; /* Color de fondo de la cabecera */
      color: #ffffff; /* Color del texto de la cabecera */
  }
</style>
@endsection
