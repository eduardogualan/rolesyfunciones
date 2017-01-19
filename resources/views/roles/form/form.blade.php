<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre:</label>
    <div class="col-md-6 col-sm-6 col-xs-12 input-icon right">
        <input id="nombre" name="nombre"class="form-control col-md-7 col-xs-12" placeholder="nmbre de rol" type="email" required="" value="{{$rol->nombre_rol or ''}}">
        <span class="help-block"></span>
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Descripcion:</label>
    <div class="col-md-6 col-sm-6 col-xs-12 input-icon right">
        <textarea id="desc" name="desc"class="form-control col-md-7 col-xs-12" rows="5" placeholder="descripcion de rol">{{$rol->descripcion or ''}}</textarea>
        <span class="help-block"></span>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-actions">
            <button type="submit" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-save"></i> GUARDAR </button>
            <a href="/rol" class="btn btn-danger pull-right"><i class="glyphicon glyphicon-remove"> CANCELAR</i></a>
        </div>
    </div>
</div> 

