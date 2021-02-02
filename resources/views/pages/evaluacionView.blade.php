@extends('layouts.master')

@section('title')
    <title>Prospectos</title>
@endsection

@section('scripts_top')

@endsection

@section('css')

@endsection

@section('scripts_bottom')
<script>
    $(document).ready(function(){
        $("#add-item").on("click", function(){
          var query = "'input'"
          var html = '<div class="input-container">' +
              '<div class="fancy-file-upload fancy-file-danger">' +
                    '<i class="fa fa-upload"></i>' +
                    '<p class="text-right">' +
                    '<button class="remove-item btn btn-danger text-right" type="button"><span class="glyphicon glyphicon-remove"></span></button>' +
                    '</p>' +
                    '<input type="file" class="form-control" name="filename[]" onchange="jQuery(this).next('+query+').val(this.value);" />' +
                    '<input type="text" class="form-control" placeholder="No se ha seleccionado archivo" readonly="" />' +
                    '<small class="text-muted block">Max file size: 2Mb (jpg/jpeg/gif/png).</small>' +
                    
                '</div>' +
            '</div>';
            $(".opciones").append(html);
        });
        
        $(".opciones").on("click", ".remove-item", function(){
          $(this).closest(".input-container").remove();
        });        
    
    });
</script>
@endsection

@section('content')

<form action="{{ url('/evaluacionView/'.$prospecto->id) }}" method="POST">
  <fieldset>
    {{ csrf_field() }}
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
        <label>Nombre*</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') ? old('nombre') : $prospecto->nombre }}" placeholder="Ejemplo: juan" disabled>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('Apaterno') ? ' has-error' : '' }}">
        <label>Apellido Paterno*</label>
        <input type="text" name="Apaterno" class="form-control" value="{{ old('Apaterno') ? old('Apaterno') : $prospecto->Apaterno }}" placeholder="Ejemplo: Peréz" disabled>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
        <label>Apellido Materno</label>
        <input type="text" class="form-control" name="Amaterno" value="{{ old('Amaterno') ? old('Amaterno') : $prospecto->Amaterno }}" placeholder="Ejemplo: Peréz" disabled>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('calle') ? ' has-error' : '' }}">
        <label>Calle*</label>
        <input type="text" class="form-control" name="calle" value="{{ old('calle') ? old('calle') : $prospecto->calle }}" placeholder="Ejemplo: San Lucas" disabled>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('numero') ? ' has-error' : '' }}">
        <label>Numero*</label>
        <input type="text" class="form-control" name="numero" value="{{ old('numero') ? old('numero') : $prospecto->numero }}" placeholder="Ejemplo: 3888" disabled>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('colonia') ? ' has-error' : '' }}">
        <label>Colonia*</label>
        <input type="text" class="form-control" name="colonia" value="{{ old('colonia') ? old('colonia') : $prospecto->colonia }}" placeholder="Ejemplo: Los Arboles" disabled>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('codigo') ? ' has-error' : '' }}">
        <label>Codigo Postal*</label>
        <input type="text" class="form-control" name="codigo" value="{{ old('codigo') ? old('codigo') : $prospecto->codigo }}" placeholder="Ejemplo: 8000" disabled>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('telefono') ? ' has-error' : '' }}">
        <label>Teléfono</label>
        <div class="fancy-form"><!-- input -->
          <i class="fa fa-phone-square"></i>
          <input type="text" name="telefono" value="{{ old('telefono') ? old('telefono') : $prospecto->telefono }}" class="form-control masked" data-format="(999) 999-9999" data-placeholder="X" placeholder="Ejemplo: 6671000000" disabled>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('rfc') ? ' has-error' : '' }}">
        <label>RFC*</label>
        <input type="text" class="form-control" name="rfc" value="{{ old('rfc') ? old('rfc') : $prospecto->rfc }}" placeholder="Ejemplo: XXXX-000000-XX0" disabled>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 form-group">
        <ul>
          @foreach($prospecto->archivo as $row)
            <li><a href="{{ $row->ruta }}" target="_blank">{{ $row->nombre }}</a></li>
          @endforeach
        </ul>
      </div>
      @if($prospecto->estatus_id == 1)
        <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('rfc') ? ' has-error' : '' }}">
          <label>Estatus*</label>
          <select class="form-control" name="estatus" value="{{ old('estatus') ? old('estatus') : $prospecto->estatus }}">
            <option value="">--Seleccionar--</option>
            <option value="2">Autorizar</option>
            <option value="3">Rechazar</option>
          </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 form-group {{ $errors->has('rfc') ? ' has-error' : '' }}">
          <label>Observaciones*</label>
          <textarea class="form-control" name="observaciones">{{ old('observaciones') ? old('observaciones') : $prospecto->observaciones }}</textarea>
        </div>
      @else
        <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('rfc') ? ' has-error' : '' }}">
          <label>Estatus*</label>
          <select class="form-control" name="estatus" value="{{ old('estatus') ? old('estatus') : $prospecto->estatus_id }}" disabled>
            <option value="2" {{ $prospecto->estatus_id == 2 ? 'selected="selected"' : '' }}>Autorizado</option>
            <option value="3" {{ $prospecto->estatus_id == 3 ? 'selected="selected"' : '' }}>Rechazar</option>
          </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 form-group {{ $errors->has('rfc') ? ' has-error' : '' }}">
          <label>Observaciones*</label>
          <textarea class="form-control" name="observaciones" disabled>{{ old('observaciones') ? old('observaciones') : $prospecto->observaciones }}</textarea>
        </div>
      @endif
    </div>
    <div class="row">
      <div class="form-group">
        <div class="col-xs-12">
          <p class="text-center nomargin">
            @if($prospecto->estatus_id == 1)
            <button type="submit" class="btn btn-3d btn-info">Aceptar</button>
            <a href="/listadoView" class="btn btn-3d btn-default">Atras</a>
            @else
              <a href="/listadoView" class="btn btn-3d btn-default">Atras</a>
            @endif
          </p>
        </div>
      </div>
    </div>
  </fieldset>
</form>
@endsection

