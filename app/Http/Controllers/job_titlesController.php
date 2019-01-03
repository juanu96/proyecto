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
            $job_title = job_title::create($request->all());
            $job_title->save();
            
            return response(['success' => true, 'message' => 'Puesto de trabajo agregada correctamente, id:' . $job_title->id, 'data' => $job_title], 201)
                    ->header('Content-Type', 'text/plain');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
