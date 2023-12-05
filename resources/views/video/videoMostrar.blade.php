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

             {{-- Cuadrícula de videos --}}
            <div class="row">
              @foreach($Videos as $video)
                  <div class="col-md-4 mb-4">
                      <div class="card h-100">
                          {{-- Si tienes miniaturas para los videos, puedes incluirlas aquí --}}
                          {{-- <img src="path_to_thumbnail" class="card-img-top" alt="..."> --}}

                          <div class="card-body d-flex flex-column">
                              <h4 class="card-title" style="color: black"><strong>{{ $video->titulo }}</strong></h4>
                              <p class="card-text">{{ Str::limit($video->descripcion, 150) }}</p>
                              {{-- Reproductor de video --}}
                              <video controls class="mt-auto">
                                  <source src="{{ asset('storage/' . $video->link) }}" type="video/mp4">
                                  Tu navegador no soporta la etiqueta de video.
                              </video>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
          
        </div>

         
    </div>
  </div>
  
@endsection


