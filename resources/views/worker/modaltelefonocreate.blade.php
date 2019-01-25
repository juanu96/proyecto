<!-- Modal Number -->
<div class="modal fade" id="TelefonoModal" tabindex="-1" role="dialog" aria-labelledby="TelefonoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <div class="modal-body">
            {{-- Formulario para agregar un nuevo numero --}}
        <div>
            <form id="formularioworkernumber">
                <input type="hidden" name="id" id="idnumber">

                <input type="hidden" name="worker_id" id="worker_id" value="">

                <div class="form-group col-xs-12">
                        <label for="number">Telefono</label>
                        <input type="tex" name="number" class="form-control" id="number" placeholder="Telefono">
                </div>

                <div class="form-group col-xs-12">
                        <button class="btn btn-primay" id="guardarnumber" type="submit" >Guardar</button>
                        <button class="btn btn-primay hide" type="submit" id="numberedit">Editar</button>     
                        <button class="btn btn-danger hide cancelar" type="reset">Cancelar</button>       
                </div>
            </form>
        </div>
                {{-- formulario para agregar mas numeros telefonicos --}}
            <div>
            <table class="table table-striped tabled-bordered table-condensed table-hover DataTablejs" id="tabla_telefonos" >
                <thead>
                    <tr>
                        <th class="text-left">Telefono</th>
                        <th class="text-left">Opciones</th>
                    </tr>
                </thead>
                {{ csrf_field() }}
                <tbody>                                     
                             
                    <tr data-item="">
                        <td class="workernumber"></td>
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

    