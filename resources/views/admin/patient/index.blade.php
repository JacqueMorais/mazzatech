@extends('layouts.app')

@section('content')
<div id="page-wrapper">
	<div class="row">
    	<div class="col-lg-2 col-md-offset-3">
				<img src="{{ asset('/img/admin-mazzatech.png')}}" class="img-responsive"  width="150">
		</div>
    	<div class="col-lg-6">
			<h2>Admin Mazzatech</h2>
		</div>
    </div>
    <div class="row">
    	<div class="col-lg-12">
			<h1 class="page-header">Pacientes</h1>
		</div>
    </div>
    <div class="row">  
    	<div class="container">
    		<div class="col-sm-12">
    			<div class="text-right">
    				<a class="btn btn-primary" href="{{ route('admin.patient.create') }}">CADASTRAR</a>
    			</div>
    		</div>
			<div class="col-sm-12">
				@if(!$patients->isEmpty()) 
					<table class="table" id="admin_patients">
						<thead>
							<tr>
								<th>Nome</th>
								<th>RG</th>
								<th>CPF</th>
								<th>Número do convênio</th>
								<th>Telefone</th>
								<th>Endereço</th>
								<th>Data de nascimento</th>
								<th>Opções</th>
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
								
									<td style="width:200px">
										<a href="{{ route('admin.patient.edit', $patient->id) }}">
											<i class="fa fa-edit fa-fw"></i>Editar
										</a>
										<span>&nbsp;&nbsp;&nbsp;</span>
										<a href="{{ route('admin.patient.delete', $patient->id) }}">
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
	    $('#admin_patients').DataTable( {
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