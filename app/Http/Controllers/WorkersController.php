<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

//use Iluminate\Support\Facades\Redirect;
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
        return view("worker.create",compact('datajt'));
    }

    public function store(WorkersRequest $request)
    {   
        $number = new number;
        $email = new email;
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

        $email->email = $request->get('email');
        $email->worker_id = $worker->id;   
        $email->save(); 

        $number->number = $request->get('telefono');
        $number->worker_id = $worker->id;        
        $number->save();

        return redirect::to('worker');
    }

    public function show($id)
    {
        return view("worker.show",["worker"=>Worker::findOrFail($id)]);
    }

    public function edit($id)
    {

        $datawa=work_area::get();
        $worker = Worker::find($id);
        $datajt=job_title::get();
        $datanumber=number::where("worker_id", "=", $id)->get();
        $dataemail=email::where("worker_id", "=", $id)->get();
        
        $telefonos = array();
        foreach($datanumber as $t){
        $telefonos[] = $t->number; 
        }
            return  $telefonos;
            
            
        
        foreach($dataemail as $email){
            $correo_id = $email->id;
            $correo = $email->email;
        }

        /* foreach($datanumber as $number){
            $numero_id = $number->id;
            $numero = $number->number;
        }
        */

        $worker->email_id = $correo_id;
        //$worker->telefono_id = $numero_id;
        $worker->email = $correo;
        $worker->telefono = $telefonos;
        
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

        $datanumber=number::where("worker_id", "=", $id)->get();
        $dataemail=email::where("worker_id", "=", $id)->get();

        foreach($dataemail as $email){
            $correo_id = $email->id;
        }

        foreach($datanumber as $number){
            $numero_id = $number->id;
        }

        $numero = number::findOrFail($numero_id);
        $numero->number = $request->get('telefono');
        $numero->update();

        $email = email::findOrFail($correo_id);
        $email->email = $request->get('email');
        $email->update();

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
        Worker::destroy($id);

        return redirect::to('worker');

    }
}
