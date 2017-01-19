@extends('layout.layout_base')
@section('content')
{!!Form::open(['route'=>'rol.store','method'=>'POST','class'=>'form_cliente form-horizontal form-label-left','novalidate','autocomplete'=>'off'])!!}
@include('alertas.ErrorMsg')
@include('roles.form.form')
{!!Form::close()!!}
@stop