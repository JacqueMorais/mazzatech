<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = "logs";

    protected $dates = ['date_in', 'date_out'];

    public $timestamps = false;

    protected $fillable = ['id', 'iduser', 'date_in', 'date_out', 'ip', 'status'];
}
