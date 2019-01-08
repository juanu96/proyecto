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
        <div class="panel panel-primary">
                <div class="panel-heading">Información Personal</div>
                <div class="panel-body">
                        <div class="form-group col-xs-3">
                                <label for="name">Nombre</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{$worker->name}}">
                                </div>
                                
                                <div class="form-group col-xs-3">
                                        <label for="id_card">Cédula</label>
                                        <input type="text" name="cédula" class="form-control" placeholder="Cédula" value="{{$worker->id_card}}">
                                </div>
                                <div class="form-group col-xs-3">
                                        <label for="Inss">INSS</label>
                                        <input type="text" name="inss" class="form-control" placeholder="Inss" value="{{$worker->inss}}">
                                </div>
                                <div class="form-group col-xs-3">
                                        <label for="marital_status">Estado Civil</label>
                                        <input type="text" name="estado_civil" class="form-control" placeholder="Estado Civil" value="{{$worker->marital_status}}">
                                </div>
                                <div class="form-group col-xs-3">
                                        <label for="marital_status">Estado Civil</label>
                                        <select name="marital_status" class="form-control">
                                            <option value="" disabled selected>seleccionar</option>                                                                             
                                            <option value="1">Soltero/a</option>
                                            <option value="2">Comprometido/a</option>
                                            <option value="3">Casado/a</option>
                                            <option value="4">Divorciado/a</option>
                                            <option value="5">Viudo/a</option>
                                                                             
                                            </select>
                                    </div>
                                <div class="form-group col-xs-3">
                                        <label for="sons">N° Hijos/as</label>
                                        <input type="text" name="hijos/as" class="form-control" placeholder="Hijos/as" value="{{$worker->sons}}">
                                </div>
                                <div class="form-group col-xs-3">
                                        <label for="birth">Cumpleaños</label>
                                        <input type="text" name="cumpleaños" class="form-control" placeholder="Cumpleaños" value="{{$worker->birth->format('d/m/Y')}}">
                                </div>   
                                <div class="form-group col-xs-3">
                                        <label for="Edad">Edad</label>
                                        <input type="text" name="Edad" class="form-control" placeholder="Edad" value="{{$worker->birth->age}}" disabled>
                                </div>     
                        </div>
                </div>
        <div class="panel panel-primary">
                <div class="panel-heading">Infomacion Laboral</div>
                <div class="panel-body">
                        <div class="form-group col-xs-3">
                                <label for="job_title_id">Area Laboral</label>
                                <input type="text" name="Area_laboral" class="form-control" placeholder="Area Laboral" value="">
                        </div>
                        <div class="form-group col-xs-3">
                                <label for="job_title_id">Puesto Laboral</label>
                                <input type="text" name="puesto_laboral" class="form-control" placeholder="Puesto Laboral" value="{{$worker->job_title_id}}">
                        </div>
                        <div class="form-group col-xs-3">
                                <label for="marital_status">Puesto Laboral</label>
                                <select name="marital_status" class="form-control">
                                    <option value="" disabled selected>seleccionar</option>                                                                             
                                    @foreach ($datajt as $itemjt)                             
                                    <option value="{{$itemjt->id}}">{{$itemjt->name}}</option>
                                    @endforeach                                                            
                                </select>
                            </div>
                        <div class="form-group col-xs-3">
                                <label for="enroll">Fecha de Ingreso Laboral</label>
                                <input type="text" name="fecha_de_registro" class="form-control" placeholder="Fecha de Registro" value="{{$worker->enroll->format('d/m/Y')}}" disabled>
                        </div>
                        <div class="form-group col-xs-3">
                                <label for="antigüedad">antigüedad</label>
                                <input type="text" name="antigüedad" class="form-control" placeholder="antigüedad" value="{{$worker->antiguedad}}" disabled>
                        </div>
                        <div class="form-group col-xs-3">
                                <label for="salario">Salario base</label>
                                <input type="text" name="salario_base" class="form-control" placeholder="salario base" value="">
                        </div>
                        <div class="form-group col-xs-3">
                                <label for="viatic">viático</label>
                                <input type="text" name="viatico" class="form-control" placeholder="viatico" value="{{$worker->viatic}}">
                        </div>
                        <div class="form-group col-xs-3">
                                <label for="vacation">vacaciones</label>
                                <input type="text" name="vacaciones" class="form-control" placeholder="Vacaciones" value="{{$worker->vacation}}">
                        </div>
                        <div class="form-group col-xs-3">
                                <label for="salario_sub-total">Salario Sub-Total</label>
                                <input type="text" name="salario_sub-total" class="form-control" placeholder="Salario Sub-Total" value="">
                        </div>
                </div>
        </div>

        <div class="panel panel-primary">
                <div class="panel-heading">Infomacion Académica</div>
                <div class="panel-body">
                        <div class="form-group col-xs-6">
                                <label for="academic_level">Nivel Academico</label>
                                <input type="text" name="nivel_academico" class="form-control" placeholder="Nivel Academico" value="{{$worker->academic_level}}">
                        </div>
                        <div class="form-group col-xs-6">
                                        <label for="academic_level">Nivel Academico</label>
                                        <select name="nivel_academico" class="form-control">
                                            <option value="" disabled selected>seleccionar</option>                                                                             
                                            <option value="1">Primaria</option>
                                            <option value="2">Secundaria</option>
                                            <option value="3">Universidad</option>
                                            <option value="4">Posgrado</option>
                                            <option value="5">Maestria</option>
                                                                             
                                            </select>
                                    </div>
                        <div class="form-group col-xs-6">
                                <label for="profession">profesión</label>
                                <input type="text" name="profesión" class="form-control" placeholder="Profesión" value="{{$worker->profession}}">
                        </div>
                </div>
        </div>

        <div class="panel panel-primary">
                <div class="panel-heading">Infomacion de Contacto</div>
                <div class="panel-body">
                        <div class="form-group col-xs-6"> 
                                <label for="deparment">Departamento</label>
                                <input type="text" name="departamento" class="form-control" placeholder="Departamento" value="{{$worker->deparment}}">
                        </div>        
                        <div class="form-group col-xs-6">
                                <label for="address">Dirección</label>
                                <input type="text" name="dirección" class="form-control" placeholder="Dirección" value="{{$worker->address}}">
                        </div>
                </div>
        </div>
       
        
        <div class="form-group">
            <button class="btn btn-primay" style="margin-right:10px" type="submit">Editar</button>
            <a href="worker"><button class="btn btn-danger" type="btn">Cancelar</button></a>
            
        </div>
        {!!Form::close()!!}
    </div>
</div>

@endsection