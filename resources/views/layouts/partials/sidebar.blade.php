<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/avatar_plusis.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>

                    <p> {{session()->get('fullname')}} </p>
                    {{-- <p>{{ $libroUnico->codid}}</p> --}}
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Activo</a>
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">FUNCIONES</li>
            <!-- Optionally, you can add icons to the links -->

            @role('admin')
            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>USUARIOS</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('listado_usuarios') }}">Listado Usuarios</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </li>
            @endrole
            <li class="treeview">
                <a href="#"><i class='fa fa-pie-chart'></i> <span>PROYECTO</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Crear</a></li>
                    <li><a href="#">Reportar Avance</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-sitemap'></i> <span>DIRECCION</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Proyectos</a></li>
                    <li><a href="#">Emitir Resolución</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-sticky-note-o'></i> <span>EVALUACION</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Proyectos</a></li>
                    <li><a href="#"></a>Avance de Proyectos</li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
