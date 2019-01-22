<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact_number extends Model
{
    protected $table='contact_numbers';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable=[
        'numbers',
        'worker_id'
    ];
}
