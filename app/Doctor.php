<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;

	protected $table = 'doctors';

    protected $fillable = ['name','crm', 'address', 'phone', 'specialty'];


    
    //relationship
    public function schedulings()
    {
    	return $this->hasMany("\App\Scheduling", "id_doctor");
    }
}
