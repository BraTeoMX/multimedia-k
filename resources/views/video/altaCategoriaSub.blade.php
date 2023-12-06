@extends('layouts.app', ['activePage' => 'avanceproduccion', 'titlePage' => __('avanceproduccion')])

@section('content')
  <h3 style="text-align: center">{{ $mensaje }}</h3>
  <div class="content">
    {{-- Mensajes de sesión --}}
    {{-- ... tu código existente para mostrar mensajes de sesión ... --}}

    <div class="container-fluid">
        <div class="card-header card-header-info card-header-icon">

          {{-- Formulario para agregar una nueva categoría --}}
          <form action="{{ route('categoria.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="nombreCategoria">Nombre de la Categoría</label>
              <input type="text" class="form-control" id="nombreCategoria" name="nombre_categoria" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Categoría</button>
          </form>

          {{-- Formulario para agregar una nueva subcategoría --}}
          <form action="{{ route('subcategoria.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="categoria">Categoría</label>
              <select class="form-control" id="categoria" name="categoria_id" required>
                @foreach($categorias as $categoria)
                  <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="nombreSubcategoria">Nombre de la Subcategoría</label>
              <input type="text" class="form-control" id="nombreSubcategoria" name="nombre_subcategoria" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Subcategoría</button>
          </form>

        </div>
        
    </div>
  </div>



  <script>
    document.getElementById('nombreCategoria').addEventListener('input', function(e) {
        e.target.value = e.target.value.toUpperCase();
    });
    document.getElementById('nombreSubcategoria').addEventListener('input', function(e) {
        e.target.value = e.target.value.toUpperCase();
    });
  </script>

<script>
  document.getElementById('categoria').addEventListener('change', function() {
      var categoriaId = this.value;
      var url = `{{ url('/subcategorias-por-categoria') }}/${categoriaId}`;
  
      fetch(url)
          .then(response => response.json())
          .then(data => {
              var subcategoriaSelect = document.getElementById('subcategoria');
              subcategoriaSelect.innerHTML = '<option value="">Seleccione una subcategoría</option>';
  
              data.forEach(subcategoria => {
                  var option = new Option(subcategoria.nombre, subcategoria.id);
                  subcategoriaSelect.add(option);
              });
          })
          .catch(error => console.error('Error:', error));
  });
  </script>
  
@endsection
