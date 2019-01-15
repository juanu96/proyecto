<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\job_titlesRequest;
use App\job_titles as job_title; 
use App\Work_area as work_area; 
use Carbon\Carbon;
use Validator;

class job_titlesController extends Controller
{
    public function store(job_titlesRequest $request)
    {
        if($request->ajax())
        {
           
            $data = job_title::create($request->all());               
            $data->name = $request->input('name');
            $data->description = $request->input('description');
            $data->salary = $request->input('salary');
            $data->work_area_id = $request->input('work_area_id');
            $data->save();  
            $data->WorkAreaName = $data->WorkAreaName->name;

            return response(['success' => true, 'message' => 'Puesto de trabajo agregada correctamente, id:' . $data->id, 'data' => $data], 201)
                    ->header('Content-Type', 'text/plain');
            
        } 
    }

    public function update(job_titlesRequest $request, $id)
    {
        if($request->ajax())
        {
        $data = job_title::find($id);
        $data->name = $request->get('name');
        $data->description = $request->get('description');
        $data->salary = $request->get('salary');
        $data->work_area_id = $request->get('work_area_id');
        $data->update();      
        $data->WorkAreaName = $data->WorkAreaName->name;

        return response(['success' => true, 'message' => 'Area de trabajo actualizada correctamente, id:' . $data->id, 'data' => $data], 201)
                    ->header('Content-Type', 'text/plain');
        }
    }

    public function destroy($id)
    {
        $job_title = job_title::find($id);
        if (isset($job_title)) {
        job_title::find($id)->delete();
        return response(['success' => true, 'message' => 'Eliminado', 'data' => $job_title->id], 201)
                    ->header('Content-Type', 'text/plain');
        }
        else{
            return response(['success' => false, 'message' => 'Registro no se puede eliminar porque no existe', 'data' => $job_title->id], 400)
                ->header('Content-Type', 'text/plain');
        }
    }
}
