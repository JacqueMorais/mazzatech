@extends('layouts.menu')

@section('content')
<div class="row">
	<div class="col-lg-1">
		<img src="{{ asset('/img/agenda-mazzatech.png')}}" class="img-responsive" width="100">
	</div>
    <div class="col-lg-11">
        <h1 class="page-header">Agendamentos</h1>
    </div>
</div>
<div class="row">
</div>

<div class="col-sm-12">
	@if(!$schedulings->isEmpty()) 
		<table class="table" id="schedulings">
			<thead>
				<tr>
					<th>Médico</th>
					<th>Paciente</th>
					<th>Data</th>
					<th>Hora</th>
					<th>Especialidade</th>
				</tr>
			</thead>
			<tbody>
			  	@foreach($schedulings as $scheduling) 
			  		@php 
			  			$doctor = \App\Doctor::find($scheduling->id_doctor); 
			  			$patient = \App\Patient::find($scheduling->id_patient); 
			  		@endphp
					<tr>
						<td>{{ $doctor->name }}</td>
						<td>{{ $patient->name }}</td>
						<td>{{ \helpers::date_format($scheduling->date, 'data') }}</td>
						<td>{{ $scheduling->horary }}</td>
						<td>{{ $scheduling->specialty }}</td>
					</tr>
			    @endforeach 
			</tbody>
		</table>
	@else
		
	@endif
</div>
@stop

@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
	    $('#schedulings').DataTable( {
	        "language": {
	            "lengthMenu": "Mostrando _MENU_ registro por página",
	            "zeroRecords": "Nada encontrado",
	            "info": "Mostrando página _PAGE_ de _PAGES_",
	            "infoEmpty": "Nenhum registro disponível",
	            "infoFiltered": "(filtrado de _MAX_ registro no total)"
	        }
	    } );
	} );
</script>
@stop