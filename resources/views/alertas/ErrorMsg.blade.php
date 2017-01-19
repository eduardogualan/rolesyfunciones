@if(Session::has('ErrorMsg'))
<div class="alert alert-danger alert-dismissable text-center">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>¡ADVERTENCIA!</strong>{{Session::get('ErrorMsg')}}
</div>
@endif