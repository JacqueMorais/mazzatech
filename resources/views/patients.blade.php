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