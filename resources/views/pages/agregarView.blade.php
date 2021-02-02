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

<form action="{{ url('/agragarView/enviar') }}" method="POST" enctype="multipart/form-data">
  <fieldset>
    {{ csrf_field() }}
    <div class="row">
      <div class="form-group">
        <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
          <label>Nombre*</label>
          <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" placeholder="Ejemplo: juan" required>
          @if ($errors->has('nombre'))
              <span class="help-block">
                  <strong>{{ $errors->first('nombre') }}</strong>
              </span>
          @endif
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('Apaterno') ? ' has-error' : '' }}">
          <label>Apellido Paterno*</label>
          <input type="text" name="Apaterno" class="form-control" value="{{ old('Apaterno') }}" placeholder="Ejemplo: Peréz" required>
          @if ($errors->has('Apaterno'))
              <span class="help-block">
                  <strong>{{ $errors->first('Apaterno') }}</strong>
              </span>
          @endif
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
          <label>Apellido Materno</label>
          <input type="text" class="form-control" name="Amaterno" value="{{ old('Amaterno') }}" placeholder="Ejemplo: Peréz">

        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('colonia') ? ' has-error' : '' }}">
          <label>Calle*</label>
          <input type="text" class="form-control" name="calle" value="{{ old('calle') }}" placeholder="Ejemplo: San Lucas" required>
          @if ($errors->has('calle'))
              <span class="help-block">
                  <strong>{{ $errors->first('calle') }}</strong>
              </span>
          @endif
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('numero') ? ' has-error' : '' }}">
          <label>Numero*</label>
          <input type="text" class="form-control" name="numero" value="{{ old('numero') }}" placeholder="Ejemplo: 3888" required>
          @if ($errors->has('numero'))
              <span class="help-block">
                  <strong>{{ $errors->first('numero') }}</strong>
              </span>
          @endif
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('colonia') ? ' has-error' : '' }}">
          <label>Colonia*</label>
          <input type="text" class="form-control" name="colonia" value="{{ old('colonia') }}" placeholder="Ejemplo: Los Arboles" required>
          @if ($errors->has('colonia'))
              <span class="help-block">
                  <strong>{{ $errors->first('colonia') }}</strong>
              </span>
          @endif
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('codigo') ? ' has-error' : '' }}">
          <label>Codigo Postal*</label>
          <input type="text" class="form-control" name="codigo" value="{{ old('codigo') }}" placeholder="Ejemplo: 8000" required>
          @if ($errors->has('codigo'))
              <span class="help-block">
                  <strong>{{ $errors->first('codigo') }}</strong>
              </span>
          @endif
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('telefono') ? ' has-error' : '' }}">
          <label>Teléfono</label>
          <div class="fancy-form"><!-- input -->
            <i class="fa fa-phone-square"></i>
            <input type="text" name="telefono" value="{{ old('telefono') }}" class="form-control masked" data-format="(999) 999-9999" data-placeholder="X" placeholder="Ejemplo: 6671000000" required>
            @if ($errors->has('telefono'))
              <span class="help-block">
                  <strong>{{ $errors->first('telefono') }}</strong>
              </span>
          @endif
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 form-group {{ $errors->has('rfc') ? ' has-error' : '' }}">
          <label>RFC*</label>
          <input type="text" class="form-control" name="rfc" value="{{ old('rfc') }}" placeholder="Ejemplo: XXXX-000000-XX0" required>
          @if ($errors->has('rfc'))
              <span class="help-block">
                  <strong>{{ $errors->first('rfc') }}</strong>
              </span>
          @endif
        </div>
      </div>
      <div class="form-group col-xs-12 col-sm-12" >
        <label>Documento* <br/></label>
        <div class="input-container  {{ $errors->has('filename.*') ? ' has-error' : '' }}">
            <div class="fancy-file-upload fancy-file-danger">
                <i class="fa fa-upload"></i>
                <p class="text-right">
                  <input type="button" id="add-item" class="btn btn-info btn-sm" value="Agregar Documento">
                </p>
                <input type="file" class="form-control  imagen" value="{{old('filename.*')}}" name="filename[]" onchange="jQuery(this).next('input').val(this.value);" />
                <input type="text" class="form-control" placeholder="No se ha seleccionado archivo" readonly="" />
                <small class="text-muted block">Max file size: 2Mb (jpg/jpeg/gif/png).</small>
                @if ($errors->has('filename'))
                    <span class="help-block">
                        <strong>{{ $errors->first('filename.*') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="tab-pane" id="opciones">
          <div class="opciones list-unstyled">
          </div>
        </div>
      </div>      
    </div>

    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Advertencia!</h4>
          </div>
          <div class="modal-body">
            <p style="color: red; font-weight: bold;">Si sales del formulario perderas los datos ya rellenados, los datos perdidos no se guardaran en ninguna base de datos.</p>
          </div>
          <div class="modal-footer">
            <a href="/" class="btn btn-danger">Aceptar</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>

    <div class="row">
      <div class="form-group">
        <div class="col-xs-12">
          <p class="text-center nomargin">
            <button type="submit" class="btn btn-3d btn-info">Enviar</button>
            <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Salir</a>
          </p>
        </div>
      </div>
    </div>
  </fieldset>
</form>
@endsection

