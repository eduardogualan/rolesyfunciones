@extends('layout.layout_base')
@section('content')
{!!Html::style('assets/css/multi-select.css')!!}
@include('modal.ModalFunciones')
@if(Utilidades::getFunciones('crear_roles')=='crear_roles')
<a href="/rol/create" class="btn btn-primary"> NUEVO</a>
@endif
@include('alertas.SuccessMsg')
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Permisos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rol as $item)
        <tr>
            <td>{{$item->nombre_rol}}</td>
            <td>{{$item->descripcion}}</td>

            <td>
                @if(Utilidades::getFunciones('gestionar_funciones')=='gestionar_funciones')
                <button value="{{$item->id_rol}}" onclick="getFunciones(this)"type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ModalF">Funciones</button>
                @endif
            </td>
            <td>
                @if(Utilidades::getFunciones('editar_roles')=='editar_roles')
                <a href="/rol/{{$item->id_rol}}/edit" class="btn btn-success btn-xs" title="Editar Rol">Editar</a>
                @endif
                @if(Utilidades::getFunciones('eliminar_roles')=='eliminar_roles')
                <a href="#" class="btn btn-danger btn-xs" title="Eliminar Rol">Eliminar</a>
                @endif


            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
@section('scripts')
{!!Html::script('assets/js/funciones.js')!!}   
{!!Html::script('assets/js/jquery.multi-select.js')!!}
@endsection