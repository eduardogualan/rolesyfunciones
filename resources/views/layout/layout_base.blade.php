<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{$titulo or 'ROLES Y FUNCIONES'}}</title>

        <!-- CSS de Bootstrap -->
        {!!Html::style('assets/css/bootstrap.min.css')!!}
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <!-- El logotipo y el icono que despliega el menú se agrupan
                 para mostrarlos mejor en los dispositivos móviles -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Desplegar navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Logotipo de la Empresa</a>
            </div>

            <!-- Agrupar los enlaces de navegación, los formularios y cualquier
                 otro elemento que se pueda ocultar al minimizar la barra -->
            @if(Auth::user()!=null)
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    @if(Utilidades::getFunciones('ver_usuarios')=='ver_usuarios')
                    <li><a href="/usuarios">Usuarios</a></li>
                    @endif
                    @if(Utilidades::getFunciones('ver_roles')=='ver_roles')
                    <li><a href="/rol">Roles</a></li>
                    @endif
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li><a href="/auth/create">Salir</a></li>
                    <p class="navbar-text"> <strong><i class="glyphicon glyphicon-user"></i> Bienvenido</strong> {{Utilidades::getNombreUsuarioLogueado()}}</p>
                </ul>
            </div>
            @endif
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{$titulo or ' '}}</div>
                        <div class="panel-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!!Html::script('assets/js/jquery.js')!!}
        {!!Html::script('assets/js/bootstrap.min.js')!!}
        @section('scripts')
        @show
    </body>
</html>