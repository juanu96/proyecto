@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Incidencias</h3>
    </div>
</div>

        <div class="col col-lg-6 col-md-6 col-sm-6" style="margin-top:">
            <label for="trabajador">Trabajador</label>
            <select name="trabajador" class="form-control select2js">
                <option value="" disabled selected>selecciona un trabajador</option>                                                                             
                @foreach ($dataw as $itemw)                             
                <option value="{{$itemw->id}}">{{$itemw->name}}</option>
                @endforeach                                           
            </select>

            <div class="text-left" style="margin-top:5%">
                <div id="fault-btn" class="btn-group">
                    <a class="btn btn-primary" id="ausencia">Ausencia</a>
                    <a class="btn btn-primary" id="minutos">Minutos Tarde</a>
                    <a class="btn btn-primary" id="subsidio">Subsidio</a>
                    <a class="btn btn-primary" id="compensacion">Compensación</a>
                    <a class="btn btn-primary" id="vacacioines">Vacaciones</a>
                </div>
            </div>
            <div class="col-xs-12" style="margin-top:5%">
                <div class="form-group col-xs-6">
                        <label for="date">Fecha</label>
                        <input type="text" name="date" class="form-control datepickerjs" id="" placeholder="" value="{{ old('date') }}">
                </div>

                <div class="form-group col-xs-6">
                        <label for="cthoras">Cantidad en Horas</label>
                        <input type="text" name="cthoras" class="form-control" id="" placeholder="" value="{{ old('cthoras') }}">
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                </div>
                
                <div class="checkbox">
                    <label><input type="checkbox" value="1">Falta Justificada </label>
                </div>

                <div class="form-group col-xs-12">
                    <input id="file" name="file" type="file" class="file">
                </div>

            </div>
        </div>

<div class="col col-xs-6 col-md-6 col-sm-12">
    <div id="ausencia">
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
                @foreach ($data as $item)
            
                <tr data-item="{{$itemw->id}}">
                    <td class="">{{$item->id}}</td>
                    <td class="">{{$item->date}}</td>
                    <td class="">{{$item->justified}}</td>
                    <td class="">{{$item->quantity}}</td>
                    <td class="">{{$item->observation}}</td>
                    <td class="">{{$item->file}}</td>
                    <td>
                    <a href="#" class="glyphicon glyphicon-pencil editarat_1 "aria-hidden="true" name="editar" data-id="{{$item->id}}" data-name="{{$item->name}}"></a>
                    <a href="#" data-toggle="modal"  class="glyphicon glyphicon-trash eliminar_at" aria-hidden="true" style="margin-left: 20px" data-id="{{$item->id}}" data-name="{{$item->name}}"></a>
                    </td>                   
                </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
    

