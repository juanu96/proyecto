<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$item->id}}">
{!! Form::open(array('action'=>array('WorkersController@destroy',$item->id),'method'=>'DELETE')) !!}
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">x</span>
                <h4 class="modal-title">Delete Worker</h4>
            </button>
        </div>
        <div class="modal-body">
            <p>confirm if you want to delete the worker</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">accept</button>
        </div>
    </div>
</div>
{!! Form::close() !!} 
</div>