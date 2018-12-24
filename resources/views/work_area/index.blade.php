 <!-- Modal area de trabajo en vista trabajador.index -->
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
      @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach 
            </ul>        
        </div>
        @endif      
        {!!Form::open()!!}
        {!!Form::token()!!}
            <form>
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="name" class="form-control" id="nameAT" placeholder="Nombre" value="{{ old('name') }}">
              </div>
              <div class="form-group">
                  <label for="descripción">Descripción</label>
                  <input type="text" name="description" class="form-control" id="descriptionAT" placeholder="Descripción" value="{{ old('description') }}">
              </div>
              <div class="form-group">
                  <button class="btn btn-primay" id="guardarAT" type="submit" >Guardar</button>
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
                    {{ csrf_field() }}
                   @foreach ($datawa as $itemwa)
                      <tbody>
                         <tr class="items">
                            <td>{{$itemwa->id}}</td>
                            <td>{{$itemwa->name}}</td>
                            <td>{{$itemwa->description}}</td>
                            <td>
                              <a href="#" class="glyphicon glyphicon-pencil editarat_1 "aria-hidden="true" name="editar" data-id="{{$itemwa->id}}" data-name="{{$itemwa->name}}"></a>
                              <a href="" data-toggle="modal"  class="glyphicon glyphicon-trash eliminar_at" aria-hidden="true" style="margin-left: 20px" data-id="{{$itemwa ->id}}" data-name="{{$itemwa->name}}"></a>
                            </td>                   
                        </tr> 
                    </tbody>
                    @endforeach
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn-closeAT">Close</button>
      </div>
    </div>
  </div>
</div>