<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact_email as email;
use App\Http\Requests\Contact_emailRequest;


class Contact_emailController extends Controller
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
    public function store(Contact_emailRequest $request)
    {
        if($request->ajax())
        {     
            $email = email::create($request->all()); 
            $email->email = $request->get('email');
            $email->worker_id = $request->get('worker_id');
            $email->save();
            return response(['success' => true, 'message' => 'Email agregado correctamente, Email:' . $email->email, 'data' => $email], 201)
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
    public function update(Contact_emailRequest $request, $id)
    {
        if($request->ajax())
        {     
            $email = email::find($id); 
            $email->email = $request->get('email'); 
            $email->worker_id = $request->get('worker_ide');
            $email->update();
            
            return response(['success' => true, 'message' => 'Email actualizado correctamente, Email:' . $email->email, 'data' => $email], 201)
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
        $email = email::find($id);
        if (isset($email)) {
        email::find($id)->delete();
        return response(['success' => true, 'message' => 'Eliminado', 'data' => $email->email], 201)
                    ->header('Content-Type', 'text/plain');
        }
        else{
            return response(['success' => false, 'message' => 'Registro no se puede eliminar porque no existe', 'data' => $email->email], 400)
                ->header('Content-Type', 'text/plain');
        }
    }
}
