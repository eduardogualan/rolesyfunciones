@extends('layout.layout_base')
@section('content')
{!!Form::open(['route'=>'auth.store', 'method'=>'POST', 'class'=>'form-horizontal form-label-left', 'autocomplete'=>'off'])!!}
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email:</label>
    <div class="col-md-6 col-sm-6 col-xs-12 input-icon right">
        <input id="email" name="email"class="form-control col-md-7 col-xs-12" placeholder="email" type="email" required="">
        <span class="help-block"></span>
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password:</label>
    <div class="col-md-6 col-sm-6 col-xs-12 input-icon right">
        <input id="password" name="password"class="form-control col-md-7 col-xs-12" placeholder="password" type="password" required="">
        <span class="help-block"></span>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-actions">
            <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-save"></i> ACCEDER </button>
        </div>
    </div>
</div> 
{!!Form::close()!!}
@stop