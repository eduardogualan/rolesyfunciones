//function getFuncionAsignado(btn) {
//    //console.log(btn.value);
//    var url = "/funcionesasignadosxrol";
//    var token = $("#token").val();
//    $.ajax({
//        url: url,
//        headers: {'X-CSRF-TOKEN': token},
//        type: "POST",
//        data: 'id_rol=' + btn.value,
//        dataType: "html"
//    }).done(function (resp) {
//        var valores = eval(resp);
//        var html = '';
//        $.each(valores, function (i, item) {
//            html += '<button value=" " onclick=" " class="btn btn-primary btn-xs center-block" title="Quitar Funcion"><i class="glyphicon glyphicon-arrow-left"></i> '+item.display_nombref+'</button> <br>';
//        });
//        $("#funcionasignado").html(html);
//    });
//}
//
//function getFuncionNoAsignados(btn) {
//    //console.log(btn.value);
//    var url = "/funcionesnoasignadosxrol";
//    var token = $("#token").val();
//    $.ajax({
//        url: url,
//        headers: {'X-CSRF-TOKEN': token},
//        type: "POST",
//        data: 'id_rol=' + btn.value,
//        dataType: "html"
//    }).done(function (resp) {
//        var valores = eval(resp);
//        var html = '';
//        $.each(valores, function (i, item) {
//            // html += "<tr>  <td>" + item.nombre_marca + "</td> <td><button value='" + item.marca_id + "'class='btn btn-success btn-xs' title='Modificar' onclick='Mostrar(this);' data-toggle='modal' data-target='#edit'><i class='fa fa-edit'></i></button> "+" <button value='" + item.marca_id + "' class='btn btn-danger btn-xs' title='Eliminar' onclick='Eliminar(this);'><i class='fa fa-times-circle-o'></i></button></td> </tr>";
//            html += '<button value=" " onclick=" " class="btn btn-primary btn-xs center-block" title="Asignar Funcion"><i class="glyphicon glyphicon-arrow-right"></i> '+item.display_nombref+'</button> <br>';
//        });
//        $("#funcionnoasignado").html(html);
//    });
//}


//$(document).on('ready', function () {
//
//    id_rol = null;
//    $('#select-funciones').multiSelect({
//        selectableHeader: "<div class='custom-header'>Funciones no asignados</div>",
//        selectionHeader: "<div class='custom-header'>Funciones asignados</div>",
//        afterSelect: function (value) {//enviamos al servidor el id del permiso seleccionado
//            var url = '/asignarfuncionesxrol';
//            var token = $("#token").val();
//            $.ajax({
//                url: url,
//                headers: {'X-CSRF-TOKEN': token},
//                type: 'POST',
//                dataType: 'json',
//                data: {id_funcion: value[0], id_rol: id_rol}
//            }).done(function (data) {
//                console.log(data);
//            });
//        },
//        afterDeselect: function (value) {//enviamos al servidor el id del permiso seleccionado
//            $.ajax({
//                url: '{{ URL::to("/permisos/desasignar") }}',
//                type: 'GET',
//                dataType: 'json',
//                data: {permission_id: value[0], role_id: id_rol}
//            }).done(function (data) {
//                console.log(data);
//            });
//        }
//
//    });
//
//
//    $('.getFunciones').on('click', function () {
//        var id_rol = $(this).attr('id_rol');
//        var url = "/funcionesasignadosxrol";
//        var token = $("#token").val();
//        $.ajax({
//            url: url,
//            headers: {'X-CSRF-TOKEN': token},
//            type: 'POST',
//            dataType: 'json',
//            data: {id_rol: id_rol}
//        }).done(function (data) {
//            var valores = eval(data.funcionesAsignados);
//            var html = '';
//            $.each(valores, function (i, item) {
//                $('#select-funciones option[value="' + item.id_funcion + '"]').attr('selected', true);
//            });
//            $('#select-funciones').multiSelect('refresh');
//        });
//    });
//});

function getFunciones(btn) {
    var id_rol = btn.value;
    var url = "/funcionesasignadosxrol";
    var token = $("#token").val();
    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        dataType: 'json',
        data: {id_rol: id_rol}
    }).done(function (data) {
        var valores = eval(data.funcionesAsignados);
        var html = '';
        $.each(valores, function (i, item) {
            $('#select-funciones option[value="' + item.id_funcion + '"]').attr('selected', true);
        });
        $('#select-funciones').multiSelect('refresh');
    });
    $('#select-funciones').multiSelect({
        selectableHeader: "<div class='custom-header'>Funciones no asignados</div>",
        selectionHeader: "<div class='custom-header'>Funciones asignados</div>",
        afterSelect: function (value) {//enviamos al servidor el id del permiso seleccionado
            var url = '/asignarfuncionesxrol';
            var token = $("#token").val();
            $.ajax({
                url: url,
                headers: {'X-CSRF-TOKEN': token},
                type: 'POST',
                dataType: 'json',
                data: {id_funcion: value[0], id_rol: id_rol}
            }).done(function (data) {
                console.log(data);
            });
        },
        afterDeselect: function (value) {//enviamos al servidor el id del permiso seleccionado
            var url = '/desasignarfuncionesxrol';
            var token = $("#token").val();
            $.ajax({
                url: url,
                headers: {'X-CSRF-TOKEN': token},
                type: 'POST',
                dataType: 'json',
                data: {id_funcion: value[0], id_rol: id_rol}
            }).done(function (data) {
                console.log(data);
            });
        }

    });
}

function Refrescar() {
    location.href = "/rol";
}


 