<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar Médico</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            
        </div>
    </div>
    <div class="row">  
        <div class="container">
            <div class="col-sm-12">      
                <form action="{{ route('admin.doctor.update', $doctor->id) }}" method="post">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="name">Nome:</label>
                                <input type="text" name="name" class="form-control" value="{{ $doctor->name }}" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="crm">CRM:</label>
                                <input type="text" name="crm" class="form-control" value="{{ $doctor->crm }}" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="specialty">Especialidade:</label>
                                <input type="text" name="specialty" class="form-control" value="{{ $doctor->specialty }}">
                            </div>
                        </div>                  
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="address">Endereço:</label>
                                <input type="text" name="address" class="form-control" value="{{$doctor->address }}">
                            </div>
                            <div class="col-sm-4">
                                <label for="phone">Telefone:</label>
                                <input type="text" name="phone" class="form-control" value="{{ $doctor->phone }}">
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
