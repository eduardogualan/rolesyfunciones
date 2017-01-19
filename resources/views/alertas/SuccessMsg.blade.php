@if(Session::has('SuccessMsg'))
<div class="alert alert-success alert-dismissable text-center">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>¡FELICIDADES!</strong>{{Session::get('SuccessMsg')}}
</div>
@endif