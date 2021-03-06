@extends('layouts.app')

@section('content')
<div id="page-wrapper">
	<div class="container">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">Deletar Paciente</h1>
	        </div>
	    </div>
	</div>
    <div class="row">  
		<div class="container">
			<div class="col-sm-12">
				<form method="post" action="{{ route('admin.patient.destroy', $patient->id) }}">
					{{ csrf_field() }}

					<div class="form-group">
				  		<div class="col-sm-12">
				    		<label for="reason">Motivo:</label>
				    		<textarea class="form-control" name="reason" rows="8" required></textarea>
				    	</div>
			  		</div>

					<div class="form-group">
				  		<div class="col-sm-12 text-center">
				  			<button type="submit" class="btn btn-primary">SALVAR</button>
				  		</div>
				  	</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop