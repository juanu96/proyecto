@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-mg-1    2 col-md-12 col-sm-12 col-xs-12">
    <h3>Nuevo Trabajador</h3>
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

        {{-- PANEL INFORMACION PERSONAL --}}
        <div class="panel panel-primary">
                <div class="panel-heading">Información Personal</div>
                <div class="panel-body">
                        <div class="form-group col-xs-3">
                                <label for="name">Nombre</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ old('nombre') }}">
                                </div>
                                
                                <div class="form-group col-xs-3">
                                        <label for="id_card">Cédula</label>
                                        <input type="text" name="cédula" class="form-control" placeholder="Cédula" value="{{ old('cédula') }}">
                                </div>
                                <div class="form-group col-xs-3">
                                        <label for="Inss">INSS</label>
                                        <input type="text" name="inss" class="form-control" placeholder="Inss" value="{{ old('inss') }}">
                                </div>
                                <div class="form-group col-xs-3">
                                        <label for="marital_status">Estado Civil</label>
                                        <select name="estado_civil" class="form-control">
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
                                        <input type="text" name="hijos/as" class="form-control" placeholder="Hijos/as" value="{{ old('hijos/as') }}">
                                </div>
                                <div class="form-group col-xs-3">
                                        <label for="birth">Cumpleaños</label>
                                        <input type="text" name="cumpleaños" class="form-control datepickerjs" placeholder="Cumpleaños" value="{{ old('cumpleaños') }}">
                                </div>
                </div>
        </div>

        {{-- PANEL DE INFORMACION LABORAL --}}
        <div class="panel panel-primary">
                        <div class="panel-heading">Infomacion Laboral</div>
                        <div class="panel-body">
                                <div class="form-group col-xs-3">
                                        <label for="job_title_id">Puesto Laboral</label>
                                        <select name="puesto_laboral" class="form-control">
                                            <option value="" disabled selected>seleccionar</option>                                                                             
                                            @foreach ($datajt as $itemjt)                             
                                            <option value="{{$itemjt->id}}">{{$itemjt->name}}</option>
                                            @endforeach                                                            
                                        </select>
                                    </div>
                                <div class="form-group col-xs-3">
                                        <label for="enroll">Fecha de Ingreso Laboral</label>
                                        <input type="text" name="fecha_de_registro" class="form-control datepickerjs" placeholder="Fecha de Registro" value="{{ old('fecha_de_registro') }}">
                                </div>
                                <div class="form-group col-xs-3">
                                        <label for="viatic">viático</label>
                                        <input type="text" name="viatico" class="form-control" placeholder="viatico" value="{{ old('viatico') }}">
                                </div>
                                <div class="form-group col-xs-3">
                                        <label for="vacation">vacaciones</label>
                                        <input type="text" name="vacaciones" class="form-control" placeholder="Vacaciones" value="{{ old('vacaciones') }}">
                                </div>
                        </div>
                </div>

                {{-- PANEL DE INFORMACION ACADEMICA --}}
        <div class="panel panel-primary">
                        <div class="panel-heading">Infomacion Académica</div>
                        <div class="panel-body">
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
                                        <input type="text" name="profesión" class="form-control" placeholder="Profesión" value="{{ old('profesión') }}">
                                </div>
                        </div>
                </div>

                {{-- PANEL DE INFORMACIONDE CONTACTO --}}
        <div class="panel panel-primary">
                        <div class="panel-heading">Infomacion de Contacto</div>
                        <div class="panel-body">
                                <div class="form-group col-xs-12">
                                <div class="form-group col-xs-6">
                                        <label for="deparment">Departamento</label>
                                        <select name="departamento" class="form-control select2js">
                                                <option value="" disabled selected>seleccionar</option>                                                                          
                                                <option value="1">Managua</option>
                                                <option value="2">Masaya</option>
                                                <option value="3">León</option>
                                                <option value="4">Granada</option>
                                                <option value="5">Carazo</option>
                                                <option value="6">Estelí</option>
                                                <option value="7">Rivas</option>
                                                <option value="8">Chinandega</option>
                                                <option value="9">Chontales</option>
                                                <option value="10">Madriz</option>
                                                <option value="11">Matagalpa</option>
                                                <option value="12">Nueva Segovia</option>
                                                <option value="13">Boaco</option>
                                                <option value="14">Rio San Juan</option>
                                                <option value="15">Caribe Sur</option>
                                                <option value="16">Jinotega</option>
                                                <option value="17">Caribe Norte</option>
                                                                                
                                                </select>
                                        </div>
                                <div class="form-group col-xs-6">
                                        <label for="address">Dirección</label>
                                        <input type="text" name="dirección" class="form-control" placeholder="Dirección" value="{{ old('dirección') }}">
                                </div>
                                </div>
                                <div class="form-group col-xs-4">
                                        <label for="telefono">N° Telefonico</label>
                                        <input type="text" name="telefono" class="form-control" placeholder="Numero telefonico" value="{{ old('telefono') }}">
                                </div>
                                <div class="form-group col-xs-2">
                                        <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#TelefonoModal" value="+" />
                                </div>
                                <div class="form-group col-xs-4">
                                        <label for="email">E-mail</label>
                                        <input type="text" name="email" class="form-control" placeholder="ejemplo@correo.com" value="{{ old('e-mail') }}">
                                        
                                </div>
                                <div class="form-group col-xs-2">
                                        <input  type="button" class="btn btn-primary" data-toggle="modal" data-target="#EmailModal" value="+" />
                                </div>                               
                                         
                        </div>
                </div>              
             
                {{-- <div class="panel panel-primary">
                        <div class="panel-heading">Infomacion Académica</div>
                                <div class="panel-body">
                                        <div id="stylized" class="myform" style="margin:20px auto;">
                                                        
                                                         
                                                        <div id="div_1">
                                                        <input  type="text"   id="materiales1" style="width:200px;" />
                                                        <input class="bt_plus" style="width:40px;" id="1" type="button" value="+" />
                                                        <div class="error_form"></div>
                                                        </div>
                                                         
                                                         
                                                         
                                                         
                                                        <button type="submit" class="boton">Save</button>
                                                        <div class="spacer"></div>
                                </div>
                </div> --}}
        <div class="form-group">
            <button class="btn btn-primay" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>         
        {!!Form::close()!!}
    </div>
</div>
@include('worker.modaltelefonocreate')
@include('worker.modalemailcreate')
@endsection
