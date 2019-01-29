<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\absences as absences;
use App\Workers as Worker;
use Carbon\Carbon;
use DataTables;
use Redirect;
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
    public function store(Request $request)
    {
        //
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
