@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar Paciente</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            
        </div>
    </div>
    <div class="row">  
        <div class="container">
            <div class="col-sm-12">      
                <form action="{{ route('admin.patient.update', $patient->id) }}" method="post">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="name">Nome:</label>
                                <input type="text" name="name" class="form-control" value="{{ $patient->name }}" required>
                            </div>
                            <div class="col-sm-3">
                                <label for="rg">RG:</label>
                                <input type="text" name="rg" class="form-control" value="{{ $patient->rg }}">
                            </div>
                            <div class="col-sm-3">
                                <label for="cpf">CPF:</label>
                                <input type="text" name="cpf" class="form-control" value="{{ $patient->cpf }}" required>
                            </div>
                            <div class="col-sm-3">
                                <label for="registration">Número do convênio:</label>
                                <input type="text" name="registration" class="form-control" value="{{ $patient->registration }}" required>
                            </div>
                        </div>                  
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="address">Endereço:</label>
                                <input type="text" name="address" class="form-control" value="{{ $patient->address }}">
                            </div>
                            <div class="col-sm-4">
                                <label for="phone">Telefone:</label>
                                <input type="text" name="phone" class="form-control" value="{{ $patient->phone }}">
                            </div>
                            <div class="col-sm-4">
                                <label for="birth">Data de Nascimento:</label>
                                <input type="text" name="birth" class="txt required full-width form-control txt maskbirth" value="{{ \helpers::date_format($patient->birth, 'data') }}">
                            </div>
                            <div class="col-sm-4">
                                <label for="sexo">Sexo:</label>
                                <input type="radio" name="sex" value="1" {{ $patient->sex == 1 ? 'checked' : ''}}> Masculino
                                <input type="radio" name="sex" value="2" {{ $patient->sex == 2 ? 'checked' : ''}}> Feminino
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