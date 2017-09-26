@extends('layouts.app')

@section('content')
<div id="page-wrapper">
	<div class="container">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">Novo Médico</h1>
	        </div>
	    </div>
	    <div class="row">
	    	<div class="col-lg-12">
	    		@include('layouts.form-errors')
	    	</div>
	    </div>
	</div>
    <div class="row">  
		<div class="container">
			<div class="col-sm-12">
				<form action="{{ route('admin.doctor.store') }}" method="post">
					{{ csrf_field() }}

					<div class="row">
						<div class="form-group">
							<div class="col-sm-4">
					    		<label for="name">Nome* :</label>
					    		<input type="text" name="name" class="form-control" placeholder="Digite aqui" value="{{ old('name') }}" required>
					    	</div>
					    	<div class="col-sm-4">
					    		<label for="crm">CRM* :</label>
					    		<input type="text" name="crm" class="form-control" placeholder="Digite aqui" value="{{ old('crm') }}" required>
					    	</div>
					    	<div class="col-sm-4">
					    		<label for="specialty">Especialidade* :</label>
					    		<input type="text" name="specialty" class="form-control" placeholder="Digite aqui" value="{{ old('specialty') }}" required>
					    	</div>
					  	</div>					
					</div>

					<div class="row">
						<div class="form-group">
							<div class="col-sm-4">
					    		<label for="address">Endereço :</label>
					    		<input type="text" name="address" class="form-control" placeholder="Digite aqui" value="{{ old('address') }}">
					    	</div>
							<div class="col-sm-4">
					    		<label for="phone">Telefone :</label>
					    		<input type="text" name="phone" class="form-control" placeholder="Digite aqui" value="{{ old('phone') }}">
					    	</div>
					  	</div>					
					</div>

					<div class="row">
						<div class="form-group">
							<div class="col-sm-12">
					    		<label for="address">* Campos Obrigatórios.</label>
					    	</div>
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