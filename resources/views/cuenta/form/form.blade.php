<input type="hidden" id="token" value="{{ csrf_token()}}" name="_token">
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cedula">Cedula:</label>
    <div class="col-md-6 col-sm-6 col-xs-12 input-icon right">
        <input id="cedula" name="cedula"class="form-control col-md-7 col-xs-12" placeholder="cedula" type="email" required="" value="{{$usuarios->persona->cedula_ruc or ''}}">
        <span class="help-block"></span>
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombres">Nombres:</label>
    <div class="col-md-6 col-sm-6 col-xs-12 input-icon right">
        <input id="nombres" name="nombres"class="form-control col-md-7 col-xs-12" placeholder="nombres del usuario" type="email" required="" value="{{$usuarios->persona->nombres or ''}}">
        <span class="help-block"></span>
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellidos">Apellidos:</label>
    <div class="col-md-6 col-sm-6 col-xs-12 input-icon right">
        <input id="apellidos" name="apellidos"class="form-control col-md-7 col-xs-12" placeholder="epellidos del usuario" type="email" required="" value="{{$usuarios->persona->apellidos or ''}}">
        <span class="help-block"></span>
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email:</label>
    <div class="col-md-6 col-sm-6 col-xs-12 input-icon right">
        <input id="email" name="email"class="form-control col-md-7 col-xs-12" placeholder="email del usuario" type="email" required="" value="{{$usuarios->email or ''}}">
        <span class="help-block"></span>
    </div>
</div>

