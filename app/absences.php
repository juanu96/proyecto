<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absences extends Model
{
    protected $table='absences';
    
    protected $primariKey='id';

    public $timestamps=false;

    protected $fillable=[
        'worker_id',
        'justified',
        'quantity',
        'observation',
        'created_by',
        'file'
    ];

    protected $dates = [
        'date'         
    ];

}
