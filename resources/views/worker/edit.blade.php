@extends('adminlte::page')

@section('content')
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

       {{--  PANEL DE INFORMACION PERSONAL  --}}
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
                                        <select name="estado_civil" class="form-control">
                                            <option value="" disabled selected>seleccionar</option>                                                                             
                                            <option value="1" @if($worker->marital_status==1) selected='selected'@endif>Soltero/a</option>
                                            <option value="2" @if($worker->marital_status==2) selected='selected'@endif>Comprometido/a</option>
                                            <option value="3" @if($worker->marital_status==3) selected='selected'@endif>Casado/a</option>
                                            <option value="4" @if($worker->marital_status==4) selected='selected'@endif>Divorciado/a</option>
                                            <option value="5" @if($worker->marital_status==5) selected='selected'@endif>Viudo/a</option>
                                                                             
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
                                        <input type="text" name="Edad" class="form-control" placeholder="Edad" value="{{$worker->birth->age}}" readonly>
                                </div>     
                        </div>
                </div>
          {{-- PANEL DE INFORMACION LABORAL --}}
        <div class="panel panel-primary">
                <div class="panel-heading">Infomacion Laboral</div>
                <div class="panel-body">
                       <div class="form-group col-xs-3">
                                <label for="job_title_id">Area Laboral</label>
                       <input type="text" name="Area_laboral" class="form-control" placeholder="Area Laboral" value="{{$datajt->WorkAreaName}}" readonly>
                        </div>
                        <div class="form-group col-xs-3">
                                <label for="job_title_id">Puesto Laboral</label>
                                <select name="puesto_laboral" class="form-control">
                                    <option value="" disabled>seleccionar</option>                                                                             
                                    @foreach ($datajt as $itemjt)                             
                                    <option value="{{$itemjt->id}}" @if($itemjt->id==$worker->job_title_id) selected='selected'@endif >{{$itemjt->name}}</option>
                                    @endforeach                                                            
                                </select>
                            </div>
                        <div class="form-group col-xs-3">
                                <label for="enroll">Fecha de Ingreso Laboral</label>
                                <input type="text" name="fecha_de_registro" class="form-control" placeholder="Fecha de Registro" value="{{$worker->enroll->format('d/m/Y')}}" readonly>
                        </div>
                        <div class="form-group col-xs-3">
                                <label for="antigüedad">antigüedad</label>
                                <input type="text" name="antigüedad" class="form-control" placeholder="antigüedad" value="{{$worker->antiguedad}}" readonly>
                        </div>
                        <div class="form-group col-xs-3">
                                <label for="salario">Salario base</label>
                                <input type="text" name="salario_base" class="form-control" placeholder="salario base" value="{{$datajt->salary}}" readonly>
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
                        <input type="text" name="salario_sub-total" class="form-control" placeholder="Salario Sub-Total" value="{{$datajt->subtotal}}">
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
                                        <option value="1" @if($worker->academic_level==1) selected='selected'@endif>Primaria</option>
                                        <option value="2" @if($worker->academic_level==2) selected='selected'@endif>Secundaria</option>
                                        <option value="3" @if($worker->academic_level==3) selected='selected'@endif>Universidad</option>
                                        <option value="4" @if($worker->academic_level==4) selected='selected'@endif>Posgrado</option>
                                        <option value="5" @if($worker->academic_level==5) selected='selected'@endif>Maestria</option>
                                                                        
                                        </select>
                                </div>
                        <div class="form-group col-xs-6">
                                <label for="profession">profesión</label>
                                <input type="text" name="profesión" class="form-control" placeholder="Profesión" value="{{$worker->profession}}">
                        </div>
                </div>
        </div>
{{-- PANEL DE INFORMACIONDE CONTACTO --}}
        <div class="panel panel-primary">
                <div class="panel-heading">Infomacion de Contacto</div>
                <div class="panel-body">
                        <div class="form-group col-xs-6">
                                <label for="deparment">Departamento</label>
                                <select name="departamento" class="form-control select2js">
                                        {{-- <option value="" disabled selected>seleccionar</option> --}}                                                                             
                                        <option value="1"  @if($worker->deparment==1) selected='selected'@endif>Managua</option>
                                        <option value="2"  @if($worker->deparment==2) selected='selected'@endif>Masaya</option>
                                        <option value="3"  @if($worker->deparment==3) selected='selected'@endif>León</option>
                                        <option value="4"  @if($worker->deparment==4) selected='selected'@endif>Granada</option>
                                        <option value="5"  @if($worker->deparment==5) selected='selected'@endif>Carazo</option>
                                        <option value="6"  @if($worker->deparment==6) selected='selected'@endif>Estelí</option>
                                        <option value="7"  @if($worker->deparment==7) selected='selected'@endif>Rivas</option>
                                        <option value="8"  @if($worker->deparment==8) selected='selected'@endif>Chinandega</option>
                                        <option value="9"  @if($worker->deparment==9) selected='selected'@endif>Chontales</option>
                                        <option value="10" @if($worker->deparment==10) selected='selected'@endif>Madriz</option>
                                        <option value="11" @if($worker->deparment==11) selected='selected'@endif>Matagalpa</option>
                                        <option value="12" @if($worker->deparment==12) selected='selected'@endif>Nueva Segovia</option>
                                        <option value="13" @if($worker->deparment==13) selected='selected'@endif>Boaco</option>
                                        <option value="14" @if($worker->deparment==14) selected='selected'@endif>Rio San Juan</option>
                                        <option value="15" @if($worker->deparment==15) selected='selected'@endif>Caribe Sur</option>
                                        <option value="16" @if($worker->deparment==16) selected='selected'@endif>Jinotega</option>
                                        <option value="17" @if($worker->deparment==17) selected='selected'@endif>Caribe Norte</option>
                                                                        
                                        </select>
                                </div>
                        <div class="form-group col-xs-6">
                                <label for="address">Dirección</label>
                                <input type="text" name="dirección" class="form-control" placeholder="Dirección" value="{{$worker->address}}">
                        </div>
                        <div class="form-group col-xs-4">
                                <label for="telefono">N° Telefonico</label>
                        <input type="text" name="telefono" class="form-control" placeholder="Numero telefonico" value="{{$worker->numbers}}" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                                <b>Añadir <br/></b>
                                <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#TelefonoModal" value="+" />
                        </div>
                        <div class="form-group col-xs-4">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" class="form-control" placeholder="ejemplo@correo.com" value="{{$worker->email}}">
                        </div>
                        <div class="form-group col-xs-2">
                                <b>Añadir <br/></b>
                                <input  type="button" class="btn btn-primary" data-toggle="modal" data-target="#EmailModal" value="+" />
                        </div>  
                </div>
        </div>
       
        
        <div class="form-group">
            <button class="btn btn-primay" style="margin-right:10px" type="submit">Editar</button>
            <button class="btn btn-danger workerjs" type="btn">Cancelar</button>
            
        </div>

         <!-- Modal Email -->
         <div class="modal fade" id="EmailModal" tabindex="-1" role="dialog" aria-labelledby="EmailModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="EmailModalLabel">E-mail</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                            
                        
                             
                            
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>


        {!!Form::close()!!}
    </div>
</div>
@include('worker.modaltelefonoedit')

@endsection