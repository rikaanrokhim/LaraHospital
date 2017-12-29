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
            <li class="active"><a href=""><i class='fa fa-link'></i> <span>Home</span></a></li>

            <li class="treeview">
                <a href=""><i class='fa fa-bed'></i> <span>Data Ruang</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('member.rooms') }}"><i class='fa fa-bed'></i>Data Seluruh Ruang</a></li>
                    <li><a href=""><i class='fa fa-circle-o text-red'></i>Ruang Regular</a></li>
                    <li><a href=""><i class='fa fa-circle-o text-blue'></i>Ruang VIP</a></li>
                    <li><a href=""><i class='fa fa-circle-o text-yellow'></i>Ruang IGD</a></li>
                    <li><a href=""><i class='fa fa-circle-o text-red'></i>Ruang Operasi</a></li>
                    <li><a href=""><i class='fa fa-circle-o text-yellow'></i>Ruang Persalinan</a></li>
                    <li><a href=""><i class='fa fa-circle-o text-red'></i>Ruang Rawat Intensive</a></li>
                    <li><a href=""><i class='fa fa-circle-o text-blue'></i>Ruang Fisioterapi</a></li>
                    <li><a href=""><i class='fa fa-circle-o text-red'></i>Ruang Medical Check Up</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href=""><i class='fa fa-users'></i> <span>Penunjang Medis</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('member.medichals') }}"><i class='fa fa-circle-o text-red'></i>Labolatorium</a></li>
                    <li><a href=""><i class='fa fa-circle-o text-yellow'></i>Kamar Mayat</a></li>
                    <li><a href=""><i class='fa fa-circle-o text-blue'></i>Bank Darah</i></a></li>
                    <li><a href=""><i class='fa fa-circle-o text-red'></i>Manajemen Dapur</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href=""><i class='fa fa-users'></i> <span>Farmasi</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href=""><i class='fa fa-circle-o text-red'></i>Data Stok Obat</a></li>
                    <li><a href=""><i class='fa fa-circle-o text-yellow'></i>Produksi Obat</a></li>
                    <li><a href=""><i class='fa fa-circle-o text-blue'></i>Apotek(multi apotek)</a></li>
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
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
