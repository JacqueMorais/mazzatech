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