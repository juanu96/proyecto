<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use SoftDeletes;
    
    protected $table='files';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable=[
        'path'
    ];

    protected $dates = [
        'deleted_at'         
    ];
}
