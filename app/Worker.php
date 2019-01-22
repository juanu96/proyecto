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
        'vacation',
        'telefono',
        'email'       

    ];

    protected $dates = [
        'enroll', 
        'birth'        
    ];
    public function JobTitleName()
    {
        return $this->belongsTo('App\job_titles','job_title_id'); 
    }

    public function ContactEmailName()
    {
        return $this->belongsTo('App\contact_email','email'); 
    }

    public function ContactNumberName()
    {
        return $this->belongsTo('App\contact_number','telefono'); 
    }
} 