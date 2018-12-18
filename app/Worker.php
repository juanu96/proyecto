<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workers extends Model
{
    protected $table='workers';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[

        'name',
        'address',
        'id_card',
        'inss',
        'marital_status',
        'deparment',          
        'viatic',
        'sons',
        'academic_level',
        'profession',
        'job_title_id',
        'vacation'        

    ];

    protected $dates = [
        'enroll', 
        'birth'        
    ];

    protected $guarded =[

    ];
}
