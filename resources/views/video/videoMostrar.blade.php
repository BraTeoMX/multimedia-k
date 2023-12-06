@extends('layouts.app', ['activePage' => 'avanceproduccion', 'titlePage' => __('avanceproduccion')])

@section('content')
<h1 style="text-align: center">Reproductor de video </h1>
  <div class="content">
    
     {{-- ... dentro de tu vista ... --}}
     @if(session('error'))
     <div class="alert alert-danger">
         {{ session('error') }}
     </div>
     @endif

     @if(session('success'))
     <div class="alert alert-success">
         {{ session('success') }}
         @if(session('sorteo'))
             <br>{{ session('sorteo') }}
         @endif
     </div>
     @endif
     @if(session('status')) {{-- A menudo utilizado para mensajes de estado genéricos --}}
         <div class="alert alert-secondary">
             {{ session('status') }}
         </div>
     @endif
     {{-- ... el resto de tu vista ... --}}
    <div class="container-fluid">
      
        <div class="card-header card-header-info card-header-icon">
          <h3>{{ $mensaje }}</h3>

            <div class="accordion" id="accordionExample">
              @foreach($Videos as $index => $video)
                <div class="card">
                  <div class="card-header" id="heading{{ $index }}">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="true" aria-controls="collapse{{ $index }}">
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
  
@endsection


