@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h3>Incidencias</h3>
    </div>
</div>

<div class="col col-lg-12 col-md-12 col-sm-12">

    <div class="col col-lg-6 col-md-6 col-sm-6">
        <label for="trabajador">Trabajador</label>
        <select name="trabajador" class="form-control select2js" id="selectrabajador">
            <option value="" disabled selected>selecciona un trabajador</option>                                                                             
            @foreach ($dataw as $itemw)                             
            <option value="{{$itemw->id}}">{{$itemw->name}}</option>
            @endforeach                                           
        </select>
    </div>

    <div class="col col-lg-6 col-md-6 col-sm-6">
        <input type="hidden" name="id" class="form-control trabajador_id" id="" placeholder="" value="{{ old('date') }}">
        <div class="text-left" style="margin-top:5%">
            <div id="fault-btn" class="btn-group">
                <a class="btn btn-primary" id="ausencia">Ausencia</a>
                <a class="btn btn-primary" id="minutos">Minutos Tarde</a>
                <a class="btn btn-primary" id="subsidio">Subsidio</a>
                <a class="btn btn-primary" id="compensacion">Compensación</a>
                <a class="btn btn-primary" id="vacaciones">Vacaciones</a>
            </div>
        </div>
    </div>            
</div>

<div class="col col-xs-12 col-lg-12 col-md-12 col-sm-12">
    {{-- ----------------------------------------bloque boton ausencia--------------------------------------------- --}}
    <div id="vista_ausencia">
        {{------------------- formulario ------------------}}
        <div class="col-xs-6" style="margin-top:5%">
                <div class="form-group col-xs-6">
                        <label for="date">Fecha</label>
                        <input type="text" name="date" class="form-control datepickerjs" id="" placeholder="" value="{{ old('date') }}">
                </div>

                <div class="form-group col-xs-6">
                        <label for="cthoras">Cantidad en Horas</label>
                        <input type="text" name="cthoras" class="form-control" id="" placeholder="" value="{{ old('cthoras') }}">
                </div>

                <div class="form-group col-xs-12">
                    <label for="comment">Comentario</label>
                    <textarea class="form-control" rows="5" style="resize:vertical" id="comment"></textarea>
                </div>            
                
                <div class="form-group col-xs-12">
                    <input id="file" name="file" type="file" class="file">
                </div>

                <div class="checkbox col-xs-6">
                    <label><input type="checkbox" value="1">Falta Justificada </label>
                </div>

                <div class="form-group">
                    <button class="btn btn-primay" style="margin-right:10px" type="submit">Guardar</button>
                    
                </div>

            </div>
        {{------------------- tabla -----------------------}}
        <div id="ausencia" class="form-group col-xs-6" style="margin-top:5%">
            <table class="table table-striped tabled-bordered table-condensed table-hover DataTablejs" id="tbodyausencia" >
                <thead>
                    <tr>
                        <th class="text-left">Id</th>
                        <th class="text-left">Fecha</th>
                        <th class="text-left">Justificado</th>
                        <th class="text-left">Horas</th>
                        <th class="text-left">Comentario</th>
                        <th class="text-left">Respaldo</th>
                        <th class="text-left">opciones</th>
                    </tr>
                </thead>
                {{ csrf_field() }}
                <tbody>
                    <tr data-item="id_item_abs">
                        <td class="abs_id"></td>
                        <td class="abs_fecha"></td>
                        <td class="abs_justificado"></td>
                        <td class="abs_horas"></td>
                        <td class="abs_comentario"></td>
                        <td class="abs_respaldo"></td>
                        <td></td>                   
                    </tr> 
                </tbody>
            </table>
        </div>
    </div>
    {{-- ------------------------------------ bloque boton minutos tarde ----------------------------------------- --}}
    {{-- ------------------------------------ bloque boton subsidio      ----------------------------------------- --}}
    {{-- ------------------------------------ bloque boton Compensacion  ----------------------------------------- --}}
    {{-- ------------------------------------ bloque boton vacaciones    ----------------------------------------- --}}
</div>
@stop
    

