@extends('layouts.master')

@section('title')
    <title>Prospectos</title>
@endsection

@section('scripts_top')

@endsection

@section('css')

@endsection

@section('scripts_bottom')

@endsection

@section('content')


<section>
	<div class="page-header">
	<h1>Prospectos</h1>
	</div>
	@if (session('success'))
		<div class="alert alert-success">
		  {{ session('success') }}
		</div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{{ $prospectos->links() }}
			</div>
			<table class="table">
				
				<thead>
				  <tr>
				    <th>Nombre</th>
				    <th>Apellido Paterno</th>
				    <th>Apellido Materno</th>
				    <th>Estatus</th>
				  </tr>
				</thead>
				<tbody>
					@foreach($prospectos as $row)
						<tr>
						    <td><a href="/evaluacionView/{{ $row->id }}">{{ strtoupper($row->nombre) }}</a></td>
						    <td>{{ strtoupper($row->Apaterno) }}</td>
						    <td>{{ strtoupper($row->Amaterno) }}</td>
						    <td>@if($row->estatus_id == 1)ENVIADO @elseif($row->estatus_id == 2)AUTORIZADO @else RECHAZADO @endif</td>
						</tr>
					@endforeach
					
				</tbody>
			</table>
			<div class="text-center">
				{{ $prospectos->links() }}
			</div>
		</div>
	</div>
</section>

@endsection