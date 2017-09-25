@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
    	<div class="col-lg-12">
			<h1 class="page-header">Agendamentos</h1>
		</div>
    </div>
    <div class="row">
    	<div class="col-lg-12">
    	</div>
    </div>
    <div class="row">  
    	<div class="container">
    		<div class="col-sm-12">
    			<div class="text-right">
    				<a class="btn btn-primary" href="{{ route('admin.scheduling.create') }}">CADASTRAR</a>
    			</div>
    		</div>
			<div class="col-sm-12">
				@if(!$schedulings->isEmpty()) 
					<table class="table" id="admin_schedulings">
						<thead>
							<tr>
								<th>Médico</th>
								<th>Paciente</th>
								<th>Data</th>
								<th>Hora</th>
								<th>Especialidade</th>
								<th>Opções</th>
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
									<td style="width:200px">
										<a href="{{ route('admin.scheduling.edit', $scheduling->id) }}">
											<i class="fa fa-edit fa-fw"></i>Editar
										</a>
										<span>&nbsp;&nbsp;&nbsp;</span>
										<a href="{{ route('admin.scheduling.delete', $scheduling->id) }}">
											<i class="fa fa-trash-o fa-fw"></i>Deletar
										</a>
									</td>
								</tr>
						    @endforeach 
						</tbody>
					</table>
				@else
					
				@endif
		    </div>
		</div>
	</div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
	    $('#admin_schedulings').DataTable( {
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