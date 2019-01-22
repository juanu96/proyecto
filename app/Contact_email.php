<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact_email extends Model
{
    protected $table='contact_emails';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable=[
        'email',
        'worker_id'
    ];
}
