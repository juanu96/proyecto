 <!-- Modal area de trabajo en vista trabajador.index -->
 <div class="modal fade" id="puesto_de_trabajo" tabindex="-1" role="dialog" aria-labelledby="puesto_de_trabajo" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          <h3 class="modal-title" id="puesto_de_trabajo">Puestos de Trabajo</h3>
          <form id="formulariojt">
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
              <form id="jobtitleform">                
                  {{-- <input type="hidden" name="_token" id="tokenjt" value="{{ csrf_token() }}"> --}}
                  <input type="hidden" name="id" id="idjt">
                  {{-- input name --}}                  
                        <div class="form-group col-xs-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="name" class="form-control" id="namejt" placeholder="Nombre" value="{{ old('name') }}">
                        </div>                    

                    {{-- input desciption --}}
                        <div class="form-group col-xs-6">
                            <label for="descripción">Descripción</label>
                            <input type="text" name="description" class="form-control" id="descriptionjt" placeholder="Descripción" value="{{ old('description') }}">
                        </div>

                         {{-- input salary --}}
                         <div class="form-group col-xs-6">
                            <label for="descripción">Salario</label>
                            <input type="text" name="salary" class="form-control" id="salaryjt" placeholder="Salario C$" value="{{ old('salary') }}">
                        </div>

                        {{-- input work area id --}}
                        <div class="form-group col-xs-6">
                                <label for="work_area_id">Area de Trabajo</label>
                                <select name="work_area_id" class="form-control" id="work_area_idjt">
                                  <option value="" disabled selected>seleccionar</option>    
                                  @foreach ($datawa as $itemwa)                             
                                  <option value="{{$itemwa->id}}">{{$itemwa->name}}</option>
                                  @endforeach                                  
                                  </select>
                            </div>
                  {{-- Botones --}}                  
                        <div class="form-group">
                            <button class="btn btn-primay guardarjt" id="btn-guardarjt" type="submit" >Guardar</button>
                            <button class="btn btn-primay hide editarjt" type="submit">Editar</button>     
                            <button class="btn btn-danger hide cancelar" type="reset">Cancelar</button>       
                        </div>
              </form>
          </div> 
        </div>
        <div class="modal-body prueba" >
          <table class="table table-striped tabled-bordered table-condensed table-hover" id="tabla_jobtitle" >
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
                      {{ csrf_field() }}
                      <tbody>
                      @foreach ($datajt as $itemjt)
                        
                        <tr data-item="{{$itemjt->id}}">
                              <td>{{$itemjt->id}}</td>
                              <td class="jtname">{{$itemjt->name}}</td>
                              <td class="jtdescription">{{$itemjt->description}}</td>
                              <td class="jtsalary">{{$itemjt->salary}}</td>
                              <td class="jtwork_area_id">{{$itemjt->WorkAreaName->name}}</td> 
                              <td>
                                <a href="#" class="glyphicon glyphicon-pencil editarjt_1 "aria-hidden="true" name="editar" data-id="{{$itemjt->id}}" data-name="{{$itemjt->name}}"></a>
                                <a href="#" data-toggle="modal"  class="glyphicon glyphicon-trash eliminar_jt" aria-hidden="true" style="margin-left: 20px" data-id="{{$itemjt ->id}}" data-name="{{$itemjt->name}}"></a>
                              </td>                   
                          </tr> 
                      
                      @endforeach
                          </tbody>
                    </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary cerrar" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>