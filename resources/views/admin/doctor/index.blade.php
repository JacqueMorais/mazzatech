<div id="page-wrapper">
    <div class="row">
    	<div class="col-lg-12">
			<h1 class="page-header">Médicos</h1>
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
    				<a class="btn btn-primary" href="{{ route('admin.doctor.create') }}">CADASTRAR</a>
    			</div>
    		</div>
			<div class="col-sm-12">
				@if(!$doctors->isEmpty()) 
					<table class="table">
						<thead>
							<tr>
								<th>Nome</th>
								<th>CRM</th>
								<th>Especialidade</th>
								<th>Edereço</th>
								<th>Telefone</th>
								<th>Opções</th>
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
									<td style="width:200px">
										<a href="{{ route('admin.doctor.edit', $doctor->id) }}">
											<i class="fa fa-edit fa-fw"></i>Editar
										</a>
										<span>&nbsp;&nbsp;&nbsp;</span>
										<a href="{{ route('admin.doctor.delete', $doctor->id) }}">
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
