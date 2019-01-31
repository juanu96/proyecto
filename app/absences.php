<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class absences extends Model
{
    use SoftDeletes;

    protected $table='absences';
    
    protected $primariKey='id';

    public $timestamps=true;

    protected $fillable=[
        'worker_id',
        'justified',
        'quantity',
        'observation',
        'created_by',
        'file'
    ];

    protected $dates = [
        'date',  
        'deleted_at'         
    ];

    public function backup(){
        return $this->belongsTo('App\Files','file', 'id');
    }

}
