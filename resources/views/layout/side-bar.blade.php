<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('decreto.index')}}">
        
       <!-- <div class="sidebar-brand-text mx-2"><img src="{{asset('img/logo.png')}}" alt="" style="width:150px; margin-top: 40px;"></div> -->
    </a><br><br>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
@if(auth()->user()->id_rol == 1)
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Vista Administrador</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-solid fa-book"></i>
            <span>Decretos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones:</h6>
                <a class="collapse-item" href="{{route('decreto.create')}}">Subir Decreto</a>
                <a class="collapse-item" href="{{route('solicitud.index')}}">Solicitudes</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa-solid fa-user"></i>
            <span>Usuario</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones:</h6>
                <a class="collapse-item" href="{{route('usuario.index')}}">Lista de Usuarios</a>
                <a class="collapse-item" href="{{route('usuario.create')}}">Crear Usuario</a>
                {{--<a class="collapse-item" href="{{route('solicitudes')}}">Solicitudes</a>--}}
                
            </div>
        </div>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @if(auth()->user()->id_rol == 2)
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('decreto.create')}}">
            <i class="fa-solid fa-file-circle-plus"></i>
            <span>Subir Decretos</span></a>
    </li>
    @endif
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('decreto.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Lista de Decretos</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>