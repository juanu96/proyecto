  <!-- Modal work area en vista worker.index -->
  <div class="modal fade" id="puesto_de_trabajo" tabindex="-1" role="dialog" aria-labelledby="puesto_de_trabajo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="puesto_de_trabajo">Areas de Trabajo</h3>
       
      </div>
      <div class="modal-body">
        <table class="table table-striped tabled-bordered table-condensed table-hover" id="users-table">
            <thead>
                <tr>
                    <th class="text-left">Id</th>
                    <th class="text-left">Nombre</th>
                    <th class="text-left">Descripcion</th>
                    <th class="text-left">Salario</th>
                    <th class="text-left">Area de Trabajo</th>
                    <th class="text-left">opciones</th>
                </tr>
            </thead>
            @foreach ($datawa as $itemwa)
     <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->description}}</td>
        <td>{{$item->salary}}</td>
        <td>{{$item->work_area_id}}</td>
        <td>
        <a href="{{URL::action('work_areaController@edit',$item->id)}}" class="glyphicon glyphicon-pencil" aria-hidden="true"></a>
        <a href="" data-target="#modal-delete-{{$item->id}}" data-toggle="modal" class="glyphicon glyphicon-trash" aria-hidden="true" style="margin-left: 20px"></a>
        </td>                   
        </tr>
       @endforeach  
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>