@extends('layout.layout_base')
@section('content')
{!!Html::style('assets/css/multi-select.css')!!}
@include('modal.ModalFunciones')
@if(Utilidades::getFunciones('crear_usuarios')=='crear_usuarios')
<a href="/usuarios/create" class="btn btn-primary"> NUEVO</a>
@endif
@include('alertas.SuccessMsg')
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Cedula</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $item)
        <tr>
            <td>{{$item->cedula_ruc}}</td>
            <td>{{$item->apellidos}}{{' '}}{{$item->nombres}}</td>
            <td>{{$item->nombre_rol}}</td>
            <td>{{$item->estado}}</td>
            <td>
                @if(Utilidades::getFunciones('editar_usuarios')=='editar_usuarios')
                <a href="/usuarios/{{$item->id_cuenta}}/edit" class="btn btn-success btn-xs" title="Editar Rol">Editar</a>
                @endif
                @if(Utilidades::getFunciones('eliminar_usuarios')=='eliminar_usuarios')
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