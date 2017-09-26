@extends('layouts.menu')

@section('content')

<div class="row">
	<div class="col-lg-1">
		<img src="{{ asset('/img/doctor-mazzatech.png')}}" class="img-responsive" width="100">
	</div>
    <div class="col-lg-11">
        <h1 class="page-header">Médicos</h1>
    </div>
</div>

<div class="col-sm-12">
		@if(!$doctors->isEmpty()) 
			<table class="table" id="doctors">
				<thead>
					<tr>
						<th>Nome</th>
						<th>CRM</th>
						<th>Especialidade</th>
						<th>Edereço</th>
						<th>Telefone</th>
					</tr>
				</thead>
				<tbody>
				  	@foreach($doctors as $doctor) 
						<tr>
							<td>{{ $doctor->name }}</td>
							<td>{{ $doctor->crm }}</td>
							<td>{{ $doctor->specialty }}</td>
							<td>{{ $doctor->address }}</td>
							<td>{{ $doctor->phone }}</td>
						</tr>
				    @endforeach 
				</tbody>
			</table>
		@else
			
		@endif
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
	    $('#doctors').DataTable( {
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