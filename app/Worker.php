<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class Workers extends Model
{
    use SoftDeletes;

    protected $table='workers';

    protected $primaryKey='id';

    public $timestamps=true;

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
        'birth',
        'deleted_at'         
    ];

    public function JobTitleName()
    {
        return $this->belongsTo('App\job_titles','job_title_id'); 
    }

    public function ContactNumbers()
    {
        return $this->hasMany('App\Contact_number','worker_id', 'id');
    }
    
    public function ContactEmails()
    {
        return $this->hasMany('App\Contact_email','worker_id', 'id');
    }
} 