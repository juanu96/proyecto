  <!-- Modal work area en vista worker.index -->
  <div class="modal fade" id="areas_de_trabajo" tabindex="-1" role="dialog" aria-labelledby="areas_de_trabajo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        <h3 class="modal-title" id="areas_de_trabajo">Areas de Trabajo</h3>
        <form id="formularioAT">
      <div class="col-mg-1    2 col-md-12 col-sm-12 col-xs-12">
      {!!Form::open(array('url'=>'work_area','method'=>'POST','autocomplete'=>'off'))!!}
        {!!Form::token()!!}
        <div class="form-group">
            <label for="name">Id</label>
            <input type="text" name="id" class="form-control" id="idAT" placeholder="Id" value="{{ old('id') }}">
        </div>
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nameAT" placeholder="Nombre" value="{{ old('nombre') }}">
        </div>
        <div class="form-group">
            <label for="name">Descripcion</label>
            <input type="text" name="descripción" class="form-control" id="descriptionAT" placeholder="Descripción" value="{{ old('descripción') }}">
        </div>
        <div class="form-group">
            <button class="btn btn-primay" type="submit" id="guardarAT">Guardar</button>
            <button class="btn btn-primay hide" type="btn" id="editarAT">Editar</button>     
            <button class="btn btn-danger hide" type="reset" id="cancelarAT">Cancelar</button>       
        </div>
        </form>
        {!!Form::close()!!}
        </div> 
      </div>
      <div class="modal-body prueba" >
        <table class="table table-striped tabled-bordered table-condensed table-hover" id="users-table">
                    <thead>
                        <tr>
                            <th class="text-left">Id</th>
                            <th class="text-left">Nombre</th>
                            <th class="text-left">Descripcion</th>
                            <th class="text-left">opciones</th>
                        </tr>
                    </thead>
                    @foreach ($datawa as $itemwa)
            <tr class="items">
                <td>{{$itemwa->id}}</td>
                <td>{{$itemwa->name}}</td>
                <td>{{$itemwa->description}}</td>
                <td>
                <a href="#" class="glyphicon glyphicon-pencil editarat_1 "aria-hidden="true" name="editar" data-target="{{$itemwa->id}}"></a>
                <a href="" data-target="{{$item->id}}" data-toggle="modal"  class="glyphicon glyphicon-trash eliminar_at" aria-hidden="true" style="margin-left: 20px"></a>
                </td>                   
            </tr>
              @endforeach  
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn-closeAT">Close</button>
      </div>
    </div>
  </div>
</div>