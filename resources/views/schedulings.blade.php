@extends('layouts.menu')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Agendamentos</h1>
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
					</tr>
			    @endforeach 
			</tbody>
		</table>
	@else
		
	@endif
</div>
@stop