<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;

	protected $table = 'patients';

    protected $fillable = ['name','rg', 'cpf', 'phone', 'address', 'registration', 'sex', 'birth'];



    //relationship
    public function schedulings()
    {
    	return $this->hasMany("\App\Scheduling", "id_patient");
    }
}
