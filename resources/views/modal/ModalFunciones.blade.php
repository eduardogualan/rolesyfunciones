
<!-- 
<div id="ModalF" class="modal fade" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">GESTIONAR FUNCIONES</h4>
            </div>
            <div class="modal-body">
               <div class="row">
                    <input type="hidden" id="token" value="{{ csrf_token()}}" name="_token">
                    <div class="col-xs-6">
                        <h6 class="text-center">FUNCIONES NO ASIGNADOS</h6>
                        <ul class="list-group" id="funcionnoasignado" >
                        </ul>
                    </div>
                    <div class="col-xs-6">
                        <h6 class="text-center">FUNCIONES  ASIGNADOS</h6>
                        <ul class="list-group" id="funcionasignado">
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div> -->

<div class="modal" id="ModalF">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button onclick="Refrescar()" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Gestionar Funciones</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="token" value="{{ csrf_token()}}" name="_token">
                <select id="select-funciones" multiple="multiple">
                    @if(isset($funciones))
                    @foreach($funciones as $funcion)
                    <option value="{{ $funcion->id_funcion }}">{{ $funcion->display_nombref }} </option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn" onclick="Refrescar()">Cerrar</a>
            </div>
        </div>
    </div>
</div>
