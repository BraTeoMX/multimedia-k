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

            <!-- Botón para abrir el modal principal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPrincipal">Abrir Modal Principal</button>

            <!-- Modal Principal -->
            <div class="modal fade" id="modalPrincipal" tabindex="-1" role="dialog" aria-labelledby="modalPrincipalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalPrincipalLabel">Modal Principal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Contenido del Modal Principal.
                            <!-- Botón para abrir el modal anidado -->
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalAnidado">Abrir Modal Anidado</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Anidado -->
            <div class="modal fade" id="modalAnidado" tabindex="-1" role="dialog" aria-labelledby="modalAnidadoLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAnidadoLabel">Modal Anidado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Contenido del Modal Anidado.
                        </div>
                    </div>
                </div>
            </div>

          
        </div>

         

    </div>
  </div>
  
@endsection


