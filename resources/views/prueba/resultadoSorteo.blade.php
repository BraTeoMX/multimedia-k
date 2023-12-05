@extends('layouts.app', ['activePage' => 'avanceproduccion', 'titlePage' => __('Vicepresidencia Finanzas')])
<style>
  .ct-chart {
      position: relative;
  }
  .ct-legend {
      position: relative;
      z-index: 10;
      list-style: none;
      text-align: center;
  }
  .ct-legend li {
      position: relative;
      padding-left: 23px;
      margin-right: 10px;
      margin-bottom: 3px;
      cursor: pointer;
      display: inline-block;
  }
  .ct-legend li:before {
      width: 12px;
      height: 12px;
      position: absolute;
      left: 0;
      content: '';
      border: 3px solid transparent;
      border-radius: 2px;
  }
  .ct-legend li.inactive:before {
      background: transparent;
  }
  .ct-legend.ct-legend-inside {
      position: absolute;
      top: 0;
      right: 0;
  }
  .ct-legend.ct-legend-inside li{
      display: block;
      margin: 0;
  }
  .ct-legend .ct-series-0:before {
      background-color:#1889c2;
      border-color: #1889c2;
  }
  .ct-legend .ct-series-1:before {
      background-color: #d70206;
      border-color:#d70206;
  }
  
</style>
@section('content')
    <div class="content">
        <div class="container-fluid">
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
            <div class="card card-stats">
                <div class="card-header card-header-tabs card-header-info">
                    <div class="nav-tabs-navigation">
                      <h2> Resultado para sorteo </h2>
                    </div>
                  </div>
                <br>
                {{$mensaje}}

                <div id="roulette" style="width:300px; height:300px; border-radius:50%; border:1px solid black; position: relative;">
                    <div class="segmento" style="background-color: red; transform: rotate(0deg); top: 0; left: 0;"></div>
                    <div class="segmento" style="background-color: blue; transform: rotate(60deg); top: 0; left: 0;"></div>
                    <div class="segmento" style="background-color: green; transform: rotate(120deg); top: 0; left: 0;"></div>
                    <div class="segmento" style="background-color: yellow; transform: rotate(180deg); top: 0; left: 0;"></div>
                    <div class="segmento" style="background-color: black; transform: rotate(70deg); top: 0; left: 0;"></div>
                    <div class="segmento" style="background-color: rgb(134, 29, 29): rotate(90deg); top: 0; left: 0;"></div>
                    <!-- Más segmentos aquí -->
                </div>
            
                <button id="spinButton" onclick="spinRoulette()">Obtener Ganador</button>
            
                <div id="winner" style="margin-top: 20px;">
                    {{-- El ganador se mostrará aquí --}}
                </div>
            </div>
                
            </div>
        </div>
    </div>

    <style>
        .segmento {
            position: absolute;
            width: 50%;
            height: 100%;
            clip-path: polygon(100% 50%, 0 0, 0 50%);
            /* Añade aquí más estilos para cada segmento */
        }
    </style>
    <script>
        function spinRoulette() {
            // Aquí iría la lógica para girar la ruleta visualmente
            // Por ejemplo, cambiar la clase CSS o aplicar una animación
            var roulette = document.getElementById('roulette');
            roulette.style.transition = 'transform 10s ease-out';
            roulette.style.transform = 'rotate(' + (3600 + Math.random() * 360) + 'deg)';
    
            // Simular la duración de giro de la ruleta y obtener el ganador
            setTimeout(function() {
                fetch('{{ route('obtenerGanador') }}')
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('winner').innerHTML = 'Ganador: <strong>' + data.nombre + '</strong>';
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }, 10000); // 10 segundos para simular el giro
        }
    </script>
@endsection

