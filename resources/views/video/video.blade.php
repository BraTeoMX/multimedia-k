@extends('layouts.app', ['activePage' => 'avanceproduccion', 'titlePage' => __('avanceproduccion')])

@section('content')

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

          <form method="POST" action="{{ route('registroVideo') }}" enctype="multipart/form-data">
            @csrf
    
            <div class="form-group">
                <label for="tituloVideo">Titulo del video:</label>
                <input type="text" class="form-control" id="tituloVideo" name="tituloVideo" required>
            </div>
            <div class="form-group">
              <label for="descripcionVideo">Descripcion del video:</label>
              <input type="text" class="form-control" id="descripcionVideo" name="descripcionVideo" required>
            </div>
            <div class="form-group">
              <label for="cargaVideo">Carga de video:</label>
              <input type="file" class="form-control" id="cargaVideo" name="cargaVideo" required onchange="vistaPrevia(event)">
              <video id="vistaPreviaVideo" width="320" height="240" controls style="display:none;"></video>
            </div>
          
    
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        </div>

          <!-- Acordeón -->
      <div id="accordion">
        
        <!-- Tarjeta para Planta 1 -->
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Visualizar datos almacenados   
              </button>
            </h5>
          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              <p>prueba </p>
                {{-- Campo de búsqueda --}}
                <div>
                  <input type="text" class="form-control"  id="searchInput" onkeyup="filterTable()" placeholder="Buscar por nombre o descripción...">
                </div>
                <table BORDER id="myTable">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Titulo </th>
                            <th>Descripcion</th>
                            <th>Accion </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Videos as $video)
                            <tr>
                                <td>{{ $video->id }}</td></td>
                                <td>{{ $video->titulo }}</td>
                                <td style="text-align: left;">{{ $video->descripcion}}</td>
                                <td>
                                  <form action="{{ route('video.ActualizarEstatus', $video->id) }}" method="POST">
                                      @csrf
                                      @method('PATCH')
                                      @if($video->estatus == 'A')
                                          <input type="hidden" name="estatus" value="B">
                                          <button class="btn-danger" type="submit">Dar de Baja</button>
                                      @else
                                          <input type="hidden" name="estatus" value="A">
                                          <button class="btn-secondary" type="submit">Dar de Alta</button>
                                      @endif
                                  </form>
                              </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

              {{--Seccion final del acordeon  --}}
            </div>
          </div>
        </div>
      </div>
      {{--Fin acordeon --}}
    </div>
  </div>
  <style>
    /* Estilos generales para la tabla */
    table {
        border-collapse: collapse;
        width: 100%;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        border-radius: 8px;
        overflow: hidden; /* Asegura que los bordes redondeados se apliquen en los bordes de la tabla */
    }

    th, td {
        padding: 12px 15px; /* Ajusta el padding para más espacio */
        text-align: center;
        border-bottom: solid 1px #ddd; /* Línea sutil entre filas */
        color: black;
    }

    th {
        background-color: #bbcdce; /* Color de fondo para los encabezados */
        color: #333; /* Color del texto para los encabezados */
        font-weight: bold;
    }

    tr:hover {
        background-color: #f5f5f5; /* Color al pasar el ratón por encima de las filas */
    }
  </style>
  <script>
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable"); // Asegúrate de poner el id correcto de tu tabla
        tr = table.getElementsByTagName("tr");
    
        // Recorre todas las filas de la tabla y oculta las que no coinciden con la búsqueda
        for (i = 1; i < tr.length; i++) { // Comienza en 1 para saltar el encabezado de la tabla
            // Obtén las celdas de "Team Leaders" y "Modulo"
            var tdLeader = tr[i].getElementsByTagName("td")[1];
            var tdModule = tr[i].getElementsByTagName("td")[2];
            if (tdLeader || tdModule) {
                if (tdLeader.textContent.toUpperCase().indexOf(filter) > -1 || tdModule.textContent.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }       
        }
    }
    </script>
    <script>
      var acc = document.getElementsByClassName("accordion");
      var i;
      
      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var panel = this.nextElementSibling;
          if (panel.style.display === "block") {
            panel.style.display = "none";
          } else {
            panel.style.display = "block";
          }
        });
      }
      </script>
      <script>
        function vistaPrevia(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('vistaPreviaVideo');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script>
      document.getElementById('tituloVideo').addEventListener('input', function(e) {
          e.target.value = e.target.value.toUpperCase();
      });

  </script>
@endsection


