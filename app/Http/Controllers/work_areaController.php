<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Work_areaRequest;
use App\Work_area as work_area; 
use Carbon\Carbon;
use DataTables;
use Redirect;
use response;
use DB;
use Laracasts\Flash\Flash;


class work_areaController extends Controller
{
     
    public function store(Work_areaRequest $request)
    {          

             if($request->ajax())
        {
            $work_area = work_area::create($request->all()); 
            $work_area->save();
            return response(['success' => true, 'message' => 'Area de trabajo agregada correctamente, id:' . $work_area->id, 'data' => $work_area], 201)
                    ->header('Content-Type', 'text/plain');
        }      


     }
 
     public function update(Work_areaRequest $request, $id)
    {
        if($request->ajax())
        {
        $work_area = work_area::find($id);
        $work_area->name = $request->get('name');
        $work_area->description = $request->get('description');
        $work_area->update();
        return response(['success' => true, 'message' => 'Area de trabajo actualizada correctamente, id:' . $work_area->id, 'data' => $work_area], 201)
                    ->header('Content-Type', 'text/plain');
        }
    }


    public function destroy($id)
    {
        $work_area = work_area::find($id);
        if (isset($work_area)) {
        work_area::find($id)->delete();
        return response(['success' => true, 'message' => 'Eliminado', 'data' => $work_area->id], 201)
                    ->header('Content-Type', 'text/plain');
        }
        else{
            return response(['success' => false, 'message' => 'Registro no se puede eliminar porque no existe', 'data' => $work_area->id], 400)
                ->header('Content-Type', 'text/plain');
        }
    }
}
