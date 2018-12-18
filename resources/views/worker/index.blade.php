@extends('layouts.admin')

@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Trabajadores <a href="worker/create"><button class="btn btn-success">Nuevo</button></a></h3>
      
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#areas_de_trabajo">Area de Trabajo</button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#puesto_de_trabajo">Puestos de Trabajo</button>


<div class="row">
    <div class="col-mg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped tabled-bordered table-condensed table-hover" id="Worker-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Inss</th>                    
                    <th>Cumpleaños</th>
                    <th>Viatico</th>                   
                    <th>Puesto laboral</th>
                    <th>vacaciones</th> 
                    <th>Opciones</th>   
                </tr>              
                </thead>
           
               @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->id_card}}</td>
                    <td>{{$item->inss}}</td>                    
                    <td>{{$item->birth->format('d/m/Y')}}</td>
                    <td>{{$item->viatic}}</td>
                    <td>{{$item->job_title_id}}</td>
                    <td>{{$item->vacation}}</td> 
                    <td>
                    <a href="{{URL::action('WorkersController@edit',$item->id)}}" class="glyphicon glyphicon-pencil" aria-hidden="true"></a> 
                    <a href="" data-target="#modal-delete-{{$item->id}}" data-toggle="modal" class="glyphicon glyphicon-trash" aria-hidden="true" style="margin-left: 20px"></a>
                    
                    </td>                   
                </tr>
                @include('worker.modaleliminado')
                @endforeach                
            </table> 
        </div>
    </div>
</div>
@stop

@include('work_area.index')
