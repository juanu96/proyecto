@extends('layouts.admin')

@section('contenido')
<div class="row">
    <div class="col-mg-1    2 col-md-12 col-sm-12 col-xs-12">
        <h3>New Worker</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach 
            </ul>        
        </div>
        @endif
        {!!Form::open(array('url'=>'worker','method'=>'POST','autocomplete'=>'off'))!!}
        {!!Form::token()!!}
       
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ old('nombre') }}">
        </div>
       
        <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" name="dirección" class="form-control" placeholder="Dirección" value="{{ old('dirección') }}">
        </div>
       
        <div class="form-group">
                <label for="id_card">Cédula</label>
                <input type="text" name="cédula" class="form-control" placeholder="Cédula" value="{{ old('cédula') }}">
        </div>
       
        <div class="form-group">
                <label for="inss">inss</label>
                <input type="text" name="inss" class="form-control" placeholder="inss" value="{{ old('inss') }}">
        </div>
       
        <div class="form-group">
                <label for="marital_status">Estado Civil</label>
                <input type="text" name="estado_civil" class="form-control" placeholder="Estado Civil" value="{{ old('estado_civil') }}">
        </div>
       
        <div class="form-group">
                <label for="deparment">Departamento</label>
                <input type="text" name="departamento" class="form-control" placeholder="Departamento" value="{{ old('departamento') }}">
        </div>
       
        <div class="form-group">
                <label for="enroll">Fecha de Registro</label>
                <input type="text" id='datepicker'  name="fecha_de_registro" class="form-control" placeholder="Fecha de Registro" value="{{ old('fecha_de_registro') }}">
        </div>
       
        <div class="form-group">
                <label for="birth">Cumpleaños</label>
                <input type="text"  id='datepicker' name="cumpleaños" class="form-control" placeholder="Cumpleaños" value="{{ old('cumpleaños') }}">
        </div>
       
        <div class="form-group">
                <label for="viatic">Viatico</label>
                <input type="text" name="viatico" class="form-control" placeholder="Viaticio" value="{{ old('viatico') }}">
        </div>
       
        <div class="form-group">
                <label for="sons">Hijos/as</label>
                <input type="text" name="hijos/as" class="form-control" placeholder="Hijos/as" value="{{ old('hijos/as') }}">
        </div>
       
        <div class="form-group">
                <label for="academic_level">Nivel Academico</label>
                <input type="text" name="nivel_academico" class="form-control" placeholder="Nivel Academico" value="{{ old('nivel_academico') }}">
        </div>
       
        <div class="form-group">
                <label for="profession">Profesión</label>
                <input type="text" name="profesión" class="form-control" placeholder="Profesión" value="{{ old('profesión') }}">
        </div>
       
        <div class="form-group">
                <label for="job_title_id">Puesto laboral</label>
                <input type="text" name="puesto_laboral" class="form-control" placeholder="Puesto Laboral" value="{{ old('puesto_laboral') }}">
        </div>
       
        <div class="form-group">
                <label for="vacation">Vacaciones</label>
                <input type="text" name="vacaciones" class="form-control" placeholder="Vacaciones" value="{{ old('vacaciones') }}">
        </div>
        
        <div class="form-group">
            <button class="btn btn-primay" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>         
        {!!Form::close()!!}
    </div>
</div>

@endsection