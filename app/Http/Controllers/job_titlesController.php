<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\job_titles as job_title; 
use Carbon\Carbon;
use DataTables;
use Redirect;
use response;
use DB;
use Laracasts\Flash\Flash;

class job_titlesController extends Controller
{
    public function store(Request $request)
    {
        if($request->ajax()) 
        {
            $data = new job_title();

            $data->name = $request->input('name');
            $data->description = $request->input('description');
            $data->salary = $request->input('salary');
            $data->work_area_id = $request->input('work_area_id');
            $data->save();            
            return response(['success' => true, 'message' => 'Puesto de trabajo agregada correctamente, id:' . $data->id, 'data' => $data], 201)
                    ->header('Content-Type', 'text/plain');
        } 
    }

    public function update(Request $request, $id)
    {
        if($request->ajax())
        {
        $job_title = job_title::find($id);
        $job_title->name = $request->get('name');
        $job_title->description = $request->get('description');
        $job_title->salary = $request->get('salary');
        $job_title->work_area_id = $request->get('work_area_id');
        $job_title->update();
        return response(['success' => true, 'message' => 'Area de trabajo actualizada correctamente, id:' . $work_area->id, 'data' => $work_area], 201)
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
