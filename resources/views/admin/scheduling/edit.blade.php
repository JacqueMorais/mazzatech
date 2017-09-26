@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar Agendamento</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            
        </div>
    </div>
    <div class="row">  
        <div class="container">
            <div class="col-sm-12">      
                <form action="{{ route('admin.scheduling.update', $scheduling->id) }}" method="post">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="name">Médico* :</label>
                                <select name="id_doctor" class="form-control">
                                    @foreach($doctors as $doctor) 
                                        <option value="{{$doctor->id}}">{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label for="rg">Paciente* :</label>
                                <select name="id_patient" class="form-control">
                                    @foreach($patients as $patient) 
                                        <option value="{{$patient->id}}">{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="specialty">Especialidade :</label>
                                <input type="text" name="specialty" class="form-control" value="{{ $scheduling->specialty }}">
                            </div>
                            <div class="col-sm-4">
                                <label for="date">Data* :</label>
                                <input type="text" name="date" class="form-control maskdate" value="{{ \helpers::date_format($scheduling->date, 'data') }}" required>
                            </div>
                            <div class="col-sm-2">
                                <label for="horary">Hora* :</label>
                                <input type="text" name="horary" class="form-control masktime" value="{{ $scheduling->horary }}" required>
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
