@extends('layouts.app', ['activePage' => 'avanceproduccion', 'titlePage' => __('avanceproduccion')])

@section('content')

  <div class="content">
  
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


