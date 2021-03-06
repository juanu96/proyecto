<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Requests\Work_areaRequest;
use App\Http\Requests\WorkersRequest;
use App\Work_area as work_area; 
use App\job_titles as job_title;
use App\Contact_email as email;
use App\Contact_number as number;
use App\Workers as Worker;
use Carbon\Carbon;
use DataTables;
use Redirect;
use DB;



class WorkersController extends Controller
{
    public function index(Request $request) 
    {
        if($request)
        {
            $data=Worker::get();
            $datawa=work_area::get();
            $datajt=job_title::get();  
            return view('worker.index',compact('data','datawa','datajt'));   
        }
    }

    public function create()
    {
        $datajt=job_title::get();
        $data=Worker::get();
        /* $ultimo = 1 + $data->last()->id;
        $data->ultimo = $ultimo;
        dd($data); */
        return view("worker.create",compact('datajt','data'));
    }

    public function store(WorkersRequest $request)
    {   
        $worker = new Worker;
        $worker->name = $request->get('nombre');
        $worker->address = $request->get('dirección');
        $worker->id_card = $request->get('cédula');      
        $worker->inss = $request->get('inss');
        $worker->marital_status = $request->get('estado_civil');
        $worker->deparment = $request->get('departamento');
        $worker->enroll = Carbon::createFromFormat( 'd/m/Y', $request->input('fecha_de_registro'));
        $worker->birth = Carbon::createFromFormat( 'd/m/Y', $request->input('cumpleaños'));
        $worker->viatic = $request->get('viatico');
        $worker->sons = $request->get('hijos/as');
        $worker->academic_level = $request->get('nivel_academico');  
        $worker->profession = $request->get('profesión');
        $worker->job_title_id = $request->get('puesto_laboral');
        $worker->vacation = $request->get('vacaciones');
        $worker->save();

        return redirect::to('worker');
    }

    public function show($id)
    {
        return view("worker.show",["worker"=>Worker::findOrFail($id)]);
    }

    public function edit($id)
    {

        $datawa = work_area::get();
        $worker = Worker::find($id);
        $datajt = job_title::get();

        foreach ($worker->ContactNumbers as $contact) {
            $worker->numbers = $contact->number . ", " . $worker->numbers;
        }        

        foreach ($worker->ContactEmails as $correo) {
            $worker->emails = $correo->email . ", " . $worker->emails;
        }  
        
        $puesto_laboral = job_title::find($worker->job_title_id);
       
        $datajt->WorkAreaName = $puesto_laboral->WorkAreaName->name;
        $datajt->salary = $puesto_laboral->salary;
        $datajt->subtotal = $datajt->salary + $worker->viatic;      
        
        $fecha_actual = Carbon::now();
        $fecha_antigua = Carbon::parse($worker->enroll);
        $antiguedad = $fecha_antigua->diff($fecha_actual);  
        $worker->antiguedad = $antiguedad->y . " año(s) " . $antiguedad->m . " mes(es) " . $antiguedad->d . " día(s)";

        return view("worker.edit",compact('worker', 'datajt', 'datawa'));  
    }

    public function update(WorkersRequest $request, $id)
    {
        $worker = Worker::findOrFail($id);
        $worker->name = $request->get('nombre');
        $worker->address = $request->get('dirección');
        $worker->id_card = $request->get('cédula');      
        $worker->inss = $request->get('inss');
        $worker->marital_status = $request->get('estado_civil');
        $worker->deparment = $request->get('departamento');
        $worker->enroll = Carbon::createFromFormat( 'd/m/Y', $request->input('fecha_de_registro'));
        $worker->birth = Carbon::createFromFormat( 'd/m/Y', $request->input('cumpleaños'));
        $worker->viatic = $request->get('viatico');
        $worker->sons = $request->get('hijos/as');
        $worker->academic_level = $request->get('nivel_academico');  
        $worker->profession = $request->get('profesión');
        $worker->job_title_id = $request->get('puesto_laboral');
        $worker->vacation = $request->get('vacaciones');
        $worker->update();

        return redirect::to('worker');
    }

    public function destroy($id)
    {
        
        $worker = Worker::findOrFail($id);
        $worker->delete();

        return redirect::to('worker');

    }
}
