<?php

namespace App\Http\Controllers;

use App\Http\Requests\absencesRequest;
use App\absences as absences;
use Illuminate\Http\Request;
use App\Workers as Worker;
use Carbon\Carbon;
use DataTables;
use App\Files;
use Redirect;
use Storage;
use Auth;
use DB;


class absencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = absences::get();
        $dataw = Worker::get();
        
        return view("absences.index", compact('data','dataw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(absencesRequest $request)
    {
        
        if($request->ajax())
        {
            
            $data = new absences; 
            $data->worker_id = $request->input('worker_id');              
            $data->date = Carbon::createFromFormat( 'd/m/Y', $request->input('date'));
            $data->quantity = $request->input('quantity');
            $data->observation = $request->input('observation');
            $data->file = $request->input('file');
            $data->created_by = Auth::user()->id;
            if ($request->input('justified')) {
                $data->justified = $request->input('justified');
            } else {
                $data->justified = 0;
            }
            $data->save();  
             

            return response(['success' => true, 'message' => 'Ausencia agregada correctamente, id:' . $data->id, 'data' => $data], 201)
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
        $date = new Carbon();
        try {
            $data = absences::where('worker_id', $id)
                ->orderBy('date', 'DESC')
                ->get();
            return response(['success' => true, 'data' => $data], 201)
                ->header('Content-Type', 'text/plain');
        } catch (\Exception $ex) {
            return response(['success' => false, 'message' => 'Por favor intente de nuevo, codigo de error: ' . $ex->getCode()], 400)
                ->header('Content-Type', 'text/plain');
        }
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
    public function update(absencesRequest $request, $id)
    {
        if($request->ajax())
        {
            
            $data = absences::find($id); 
            $data->worker_id = $request->input('worker_id');              
            $data->date = Carbon::createFromFormat( 'd/m/Y', $request->input('date'));
            $data->quantity = $request->input('quantity');
            $data->observation = $request->input('observation');
            $data->file = $request->input('file');
            $data->created_by = Auth::user()->id;
            if ($request->input('justified')) {
                $data->justified = $request->input('justified');
            } else {
                $data->justified = 0;
            }
            $data->update();  
             

            return response(['success' => true, 'message' => 'Ausencia actualizada correctamente, id:' . $data->id, 'data' => $data], 201)
                    ->header('Content-Type', 'text/plain');
            
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = absences::find($id);
            if (isset($data)) {
                $data->delete();
                return response(['success' => true, 'message' => 'Eliminado', 'data' => 1], 201)
                    ->header('Content-Type', 'text/plain');
            } else {
                return response(['success' => false, 'message' => 'Registro no se puede eliminar porque no existe', 'data' => 1], 400)
                    ->header('Content-Type', 'text/plain');
            }

        } catch (\Exception $ex) {
            return response(['success' => false, 'message' => 'Por favor intente de nuevo, codigo de error: ' . $ex->getCode()], 400)
                ->header('Content-Type', 'text/plain');
        }
    }
}
