<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job_titles extends Model
{
    protected $table='jobs_titles';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable=[
        'name',
        'description',
        'salary',
        'work_area_id'
    ];

    public function WorkAreaName()
    {
        return $this->belongsTo('App\Work_area','work_area_id');
    }

}
 