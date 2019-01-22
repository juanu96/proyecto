<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work_area extends Model
{
    protected $table='work_areas';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable=[
        'name',
        'description'
    ];
}
