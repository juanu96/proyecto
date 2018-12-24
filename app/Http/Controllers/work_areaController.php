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
    public function index(Request $request)
    {
        //
    } 

   
    public function create()
    {
        //
    }

    
    public function store(Work_areaRequest $request)
    {          
             /* $work_area = work_area::create($request->all()); 
             $work_area->save();
             return response()->json(['success'=>'Data is successfully added']);  */  

             $workarea = new work_area;
             $workarea->name = $request->name;
             $workarea->description = $request->description;
             $workarea->save();
             return response()->json($workarea);

     }
 
  
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //return view("work_area.edit",["work_area"=>work_area::findOrFail($id)]); 
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        work_area::find($id)->delete();

        return response()->json(['done']);
    }
}
