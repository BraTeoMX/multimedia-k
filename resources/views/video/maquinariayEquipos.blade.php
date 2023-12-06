@extends('layouts.app', ['activePage' => 'avanceproduccion', 'titlePage' => __('avanceproduccion')])

@section('content')

  <div class="content">
  
    <div class="container-fluid">
        <div class="card-header card-header-info card-header-icon">
          <h3>{{ $mensaje }}</h3>
          
          <div class="accordion" id="accordionExample">
            @foreach($Videos as $index => $video)
              <div class="card custom-card">
                <div class="card-header custom-card-header" id="heading{{ $index }}">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="true" aria-controls="collapse{{ $index }}" style="color: #ffffff !important;">
                      {{ $video->titulo }}
                    </button>
                  </h2>
                </div>
          
                <div id="collapse{{ $index }}" class="collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-parent="#accordionExample">
                  <div class="card-body">
                    {{ $video->descripcion }}
                    <br>
                    <!-- Botón para abrir el modal con el video -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#videoModal{{ $index }}">
                      Ver Video
                    </button>
                  </div>
                </div>
              </div>
              {{-- ... después del cierre del div card-body ... --}}

                <!-- Modal -->
                <div class="modal fade" id="videoModal{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel{{ $index }}" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="videoModalLabel{{ $index }}">{{ $video->titulo }}</h5>
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

            @endforeach
          </div>
        
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


