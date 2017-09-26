@extends('layouts.menu')

@section('content')
<div class="row">
	<div class="col-lg-1">
		<img src="{{ asset('/img/patient-mazzatech.png')}}" class="img-responsive .img-circle">
	</div>
    <div class="col-lg-11">
        <h1 class="page-header">Pacientes</h1>
    </div>
</div>

<div class="row">
<div class="col-sm-12">
	@if(!$patients->isEmpty()) 
		<table class="table" id="patients">
			<thead>
				<tr>
					<th>Nome</th>
					<th>RG</th>
					<th>CPF</th>
					<th>Número do convênio</th>
					<th>Telefone</th>
					<th>Endereço</th>
					<th>Data de nascimento</th>
				</tr>
			</thead>
			<tbody>
			  	@foreach($patients as $patient) 
					<tr>
						<td>{{ $patient->name }}</td>
						<td>{{ $patient->rg }}</td>
						<td>{{ $patient->cpf }}</td>
						<td>{{ $patient->registration }}</td>
						<td>{{ $patient->phone }}</td>
						<td>{{ $patient->address }}</td>
						<td>{{ \helpers::date_format($patient->birth, 'data') }}</td>
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
	    $('#patients').DataTable( {
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