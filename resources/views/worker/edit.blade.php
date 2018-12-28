@extends('layouts.admin')

@section('contenido')
<div class="row">
    <div class="col-mg-1    2 col-md-12 col-sm-12 col-xs-12">
    <h3>Editando Trabajador: {{ $worker->name}}</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach 
            </ul>        
        </div>
        @endif
        {!!Form::model($worker,['method'=>'PATCH','route'=>['worker.update',$worker->id]])!!}
        {!!Form::token()!!}
        <div class="form-group">
            <label for="name">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{$worker->name}}">
        </div>
        <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" name="dirección" class="form-control" placeholder="Dirección" value="{{$worker->address}}">
        </div>
        <div class="form-group">
                <label for="id_card">Cédula</label>
                <input type="text" name="cédula" class="form-control" placeholder="Cédula" value="{{$worker->id_card}}">
        </div>
        <div class="form-group">
                <label for="Inss">inss</label>
                <input type="text" name="inss" class="form-control" placeholder="Inss" value="{{$worker->inss}}">
        </div>
        <div class="form-group">
                <label for="marital_status">Estado Civil</label>
                <input type="text" name="estado_civil" class="form-control" placeholder="Estado Civil" value="{{$worker->marital_status}}">
        </div>
        <div class="form-group">
                <label for="deparment">Departamento</label>
                <input type="text" name="departamento" class="form-control" placeholder="Departamento" value="{{$worker->deparment}}">
        </div>
        <div class="form-group">
                <label for="enroll">Fecha de Registro</label>
                <input type="text" name="fecha_de_registro" class="form-control" placeholder="Fecha de Registro" value="{{$worker->enroll->format('d/m/Y')}}">
        </div>
        <div class="form-group">
                <label for="birth">Cumpleaños</label>
                <input type="text" name="cumpleaños" class="form-control" placeholder="Cumpleaños" value="{{$worker->birth->format('d/m/Y')}}">
        </div>
        <div class="form-group">
                <label for="viatic">viático</label>
                <input type="text" name="viatico" class="form-control" placeholder="viatico" value="{{$worker->viatic}}">
        </div>
        <div class="form-group">
                <label for="sons">Hijos/as</label>
                <input type="text" name="hijos/as" class="form-control" placeholder="Hijos/as" value="{{$worker->sons}}">
        </div>
        <div class="form-group">
                <label for="academic_level">Nivel Academico</label>
                <input type="text" name="nivel_academico" class="form-control" placeholder="Nivel Academico" value="{{$worker->academic_level}}">
        </div>
        <div class="form-group">
                <label for="profession">profesión</label>
                <input type="text" name="profesión" class="form-control" placeholder="Profesión" value="{{$worker->profession}}">
        </div>
        <div class="form-group">
                <label for="job_title_id">Puesto Laboral</label>
                <input type="text" name="puesto_laboral" class="form-control" placeholder="Puesto Laboral" value="{{$worker->job_title_id}}">
        </div>
        <div class="form-group">
                <label for="vacation">vacaciones</label>
                <input type="text" name="vacaciones" class="form-control" placeholder="Vacaciones" value="{{$worker->vacation}}">
        </div>
        <div class="form-group">
            <button class="btn btn-primay" type="submit">Guardar</button>
            <a href="worker"><button class="btn btn-danger" type="btn">Cancelar</button></a>
            
        </div>
        {!!Form::close()!!}
    </div>
</div>

@endsection