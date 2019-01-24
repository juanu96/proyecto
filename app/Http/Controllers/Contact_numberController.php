<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact_number as number;
use Validator;
use App\Http\Requests\Contact_numberRequest;

class Contact_numberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Contact_numberRequest $request)
    {
        if($request->ajax())
        {           
            
                $number = number::create($request->all()); 
                $number->number = $request->get('number');
                $number->worker_id = $request->get('worker_id');
                $number->save();
                return response(['success' => true, 'message' => 'Numero telefonico agregado correctamente, N#:' . $number->number, 'data' => $number], 201)
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
    public function update(Contact_numberRequest $request, $id)
    {
        if($request->ajax())
        {           
                $number = number::find($id); 
                $number->number = $request->get('number');
                $number->worker_id = $request->get('worker_id');
                $number->update();
                return response(['success' => true, 'message' => 'Numero telefonico actualizado correctamente, N#:' . $number->number, 'data' => $number], 201)
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
        $number = number::find($id);
        if (isset($number)) {
        number::find($id)->delete();
        return response(['success' => true, 'message' => 'Eliminado', 'data' => $number->number], 201)
                    ->header('Content-Type', 'text/plain');
        }
        else{
            return response(['success' => false, 'message' => 'Registro no se puede eliminar porque no existe', 'data' => $number->number], 400)
                ->header('Content-Type', 'text/plain');
        }
    }
}
