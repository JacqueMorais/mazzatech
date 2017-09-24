<div id="page-wrapper">
    <div class="row">
    	<div class="col-lg-12">
			<h1 class="page-header">Pacientes</h1>
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
    				<a class="btn btn-primary" href="{{ route('admin.patient.create') }}">CADASTRAR</a>
    			</div>
    		</div>
			<div class="col-sm-12">
				@if(!$patients->isEmpty()) 
					<table class="table">
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
									<td>{{ $patient->birth }}</td>
								
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
