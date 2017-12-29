<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">SIM RSU AR-ROKHIM</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href=""><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li class="active"><a href=""><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>
            <li class="treeview">
                <a href=""><i class='fa fa-bed'></i> <span>Data Ruang</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href=""><i class='fa fa-circle-o text-red'></i>Ruang</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href=""><i class='fa fa-user-md'></i> <span>Data Dokter</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href=""><i class='fa fa-circle-o text-red'></i>Dokter</a></li>
                    <li><a href=""><i class='fa fa-circle-o text-aqua'></i>Spesialis</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href=""><i class='fa fa-users'></i> <span>Data Pasien</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href=""><i class='fa fa-user'></i>Pasien Rawat Inap</a></li>
                    <li><a href=""><i class='fa fa-user'></i>Pasien Rawat Jalan</a></li>
                </ul>
            </li>

            <li><a href=""><i class='fa fa-user'></i> <span>Data Pegawai</span> </a></li>

            <li class="header">DATA STATISTIK</li>

            <li><a href=""><i class="fa fa-circle-o text-red"></i> <span>Pegawai</span></a></li>
            <li><a href=""><i class="fa fa-circle-o text-blue"></i> <span>Ruang</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
