@extends('layouts.admin')

@section('contenido')
<div class="row">
    <div class="col-mg-1    2 col-md-12 col-sm-12 col-xs-12">
        <h3>New Work Area</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach 
            </ul>        
        </div>
        @endif
        {!!Form::open(array('url'=>'work_area','method'=>'POST','autocomplete'=>'off'))!!}
        {!!Form::token()!!}
        <div class="form-group">
            <label for="name">name</label>
            <input type="text" name="name" class="form-control" placeholder="name">
        </div>
        <div class="form-group">
                <label for="address">description</label>
                <input type="text" name="description" class="form-control" placeholder="description">
        </div>      
        <div class="form-group">
            <button class="btn btn-primay" type="submit">Save</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>

@endsection