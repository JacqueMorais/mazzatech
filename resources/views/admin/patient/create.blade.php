@extends('layouts.app')

@section('content')
<div id="page-wrapper">
	<div class="container">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">Novo Paciente</h1>
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
				<form action="{{ route('admin.patient.store') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="row">
						<div class="form-group">
							<div class="col-sm-3">
					    		<label for="name">Nome* :</label>
					    		<input type="text" name="name" class="form-control" placeholder="Digite aqui" value="{{ old('name') }}" required>
					    	</div>
					    	<div class="col-sm-3">
					    		<label for="rg">RG :</label>
					    		<input type="text" name="rg" class="form-control" placeholder="Digite aqui" value="{{ old('rg') }}">
					    	</div>
					    	<div class="col-sm-3">
					    		<label for="cpf">CPF* :</label>
					    		<input type="text" name="cpf" class="form-control" placeholder="Digite aqui" value="{{ old('cpf') }}" required>
					    	</div>
					    	<div class="col-sm-3">
					    		<label for="registration">Número do convênio* :</label>
					    		<input type="text" name="registration" class="form-control" placeholder="Digite aqui" value="{{ old('registration') }}" required>
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
					    	<div class="col-sm-4">
								<label for="birth">Data de Nascimento :</label>
						    	<input type="text" name="birth" class="txt required full-width form-control txt maskbirth" placeholder="Digite a data" value="{{ old('birth') }}">
						    </div>
						    <div class="col-sm-4">
								<label for="sexo">Sexo :</label>
								<input type="radio" name="sex" value="1"> Masculino
								<input type="radio" name="sex" value="2"> Feminino
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