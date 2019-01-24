<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact_number extends Model
{
    use SoftDeletes;
    
    protected $table='contact_numbers';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable=[
        'number',
        'worker_id'
    ];

    protected $dates = [
        'deleted_at'         
    ];
}
