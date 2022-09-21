<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="utf8_decode()">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   

   <link rel="stylesheet" href="{{asset('css/bootstrap4css/bootstrap.min.css')}}">

   <link rel="stylesheet" href="{{asset('css/estilo3.css')}}">
   <link rel="stylesheet" href="{{asset('css/estilo4.css')}}">
   <link rel="stylesheet" href="{{asset('css/custom.css')}}">

   <link rel="stylesheet" href="{{asset('css/jquery-confirmv3/jquery-confirm.min.css')}}">

   <link rel="stylesheet" href="{{asset('jquery-ui/jquery-ui.min.css')}}">
   
   <link rel="stylesheet" href="{{asset('alertifyjs/css/alertify.min.css')}}">
   <link rel="stylesheet" href="{{asset('alertifyjs/css/themes/default.min.css')}}">
   
   
   <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
   <title>@yield('titulo', 'Inventario')</title>
   
   <!--css para las vistas-->
   @yield('css')


</head>

<header>
    <section class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 0px; padding-bottom: 1px; padding-top: 1px;"> 
            <div class="container-fluid">

                <div>
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i> 
                        <span>Menu</span>
                    </button>
                    @if (session()->get("roles") && count(session()->get("roles")) > 1)
                        <button type="button" id="sidebarCollapse" class="btn btn-success cambiar-rol">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Roles</span>
                        </button>
                    @endif
                    
                </div>
                
                    
                    
                    
                        <h2>Bienvenido {{session()->get('usuario') ?? 'Invitado'}}</h2>
                        {{-- <h2>Bienvenido {{session()->get('nombre_usuario') ?? 'Invitado'}}</h2> --}}
                
                    
                
            </div>

        </nav>
    </section>
  </header>




<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">

            <!-- Inicio sidebar -->
            @include("sidebar")
            <!-- Fin sidebar -->

            
        </nav>

        <div id="content">
            
            
            <main style="margin-bottom: 0px; margin-top: 30px;">
                @yield('contenido')
             </main>

        </div>
            <!-- Dark Overlay element -->
                <div class="overlay"></div>
                <!--Inicio de ventana modal para login con más de un rol -->
                @if(session()->get("roles") && count(session()->get("roles")) > 1)
                @csrf
                <div class="modal fade" id="modal-seleccionar-rol" data-rol-set="{{empty(session()->get("rol_id")) ? 'NO' : 'SI'}}" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Roles de Usuario</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                            </div>
                            <div class="modal-body">
                                <p>Cuentas con mas de un Rol en la plataforma, a continuación seleccione con cual de ellos desea trabajar</p>
                                @foreach(session()->get("roles") as $key => $rol)
                                    <li>
                                        <a href="#" class="asignar-rol" data-rolid="{{$rol['id']}}" data-rolnombre="{{$rol["nombre"]}}">
                                            {{$rol["nombre"]}}
                                        </a>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif        

    </div>

   

<!--JS-->
<script src="{{asset('js/jquery/jquery-3.3.1.min.js')}}"></script>	 
<script src="{{asset('js/popper/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap4js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Plugins que solo se ocupen en paginas especiales -->	 	
@yield("scriptsPlugins")
<script src="{{asset('js/pages/scripts/admin/scripts.js')}}"></script>
<script src="{{asset('js/bootstrap4js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('js/bootstrap4js/sidebarcollapse3.js')}}"></script>
<script src="{{asset('js/funciones.js')}}"></script>

<script src="{{asset('js/jquery-confirmv3/jquery-confirm.min.js')}}"></script>

<script src="{{asset('alertifyjs/alertify.min.js')}}"></script>

@yield("scripts")
</body>
</html>
