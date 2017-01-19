@extends('layout.layout_base')
@section('content')
{!!Form::model($rol,['route'=>['rol.update',$rol->id_rol],'method'=>'PUT', 'class'=>'form-horizontal form-label-left','novalidate','autocomplete'=>'off'])!!}
@include('alertas.ErrorMsg')
@include('roles.form.form')
{!!Form::close()!!}
@stop