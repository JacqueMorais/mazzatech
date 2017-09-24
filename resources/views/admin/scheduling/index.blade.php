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
					<table class="table">
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
								<tr>
									<td>{{ $scheduling->id_doctor }}</td>
									<td>{{ $scheduling->id_patient }}</td>
									<td>{{ $scheduling->date }}</td>
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
