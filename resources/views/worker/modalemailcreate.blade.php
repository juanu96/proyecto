<!-- Modal email -->
<div class="modal fade" id="EmailModal" tabindex="-1" role="dialog" aria-labelledby="EmailModallLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <div class="modal-body">
            {{-- Formulario para agregar un nuevo email --}}
        <div>
            <form id="formularioworkeremail">
                <input type="hidden" name="id" id="idemail">

            <input type="hidden" name="worker_ide" id="worker_ide" value="{{$data->ultimo}}">

                <div class="form-group col-xs-12">
                        <label for="email">E-mail</label>
                        <input type="tex" name="email" class="form-control" id="email" placeholder="ejemplo@correo.com">
                </div>

                <div class="form-group col-xs-12">
                        <button class="btn btn-primay" id="guardaremail" type="submit" >Guardar</button>
                        <button class="btn btn-primay hide" type="submit" id="emailedit">Editar</button>     
                        <button class="btn btn-danger hide cancelar" type="reset">Cancelar</button>       
                </div>
            </form>
        </div>
                {{-- formulario para agregar mas email --}}
            <div>
            <table class="table table-striped tabled-bordered table-condensed table-hover DataTablejs" id="tabla_email" >
                <thead>
                    <tr>
                        <th class="text-left">Email</th>
                        <th class="text-left">Opciones</th>
                    </tr>
                </thead>
                {{ csrf_field() }}
                <tbody>                                     
                            
                    <tr data-item="">
                        <td class="workeremail"></td>
                        <td></td>                   
                    </tr>
                </tbody>
            </table>
            </div>
                    
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary cerrar" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
