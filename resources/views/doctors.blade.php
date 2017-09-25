@extends('layouts.menu')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Médicos</h1>
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