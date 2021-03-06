@extends('layout.layout_base')
@section('content')
{!!Form::open(['route'=>'usuarios.store','method'=>'POST','class'=>'form-horizontal form-label-left','autocomplete'=>'off'])!!}
@include('alertas.ErrorMsg')
@include('cuenta.form.form')
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="marca">Seleccione un Rol:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control select2 col-md-7 col-xs-12" required="required" name="rol">
            <option value="">Seleccione---> </option>
            @foreach ($rol as $rol)
            <option value="{{$rol->id_rol}}">{{$rol->nombre_rol}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-actions">
            <button type="submit" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-save"></i> GUARDAR </button>
            <a href="/usuarios" class="btn btn-danger pull-right"><i class="glyphicon glyphicon-remove"> CANCELAR</i></a>
        </div>
    </div>
</div> 
{!!Form::close()!!}
@stop