<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Work_areaRequest;
use App\Work_area as work_area; 
use Carbon\Carbon;
use DataTables;
use Redirect;
use DB;
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
        //  
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
        //
    }
}
