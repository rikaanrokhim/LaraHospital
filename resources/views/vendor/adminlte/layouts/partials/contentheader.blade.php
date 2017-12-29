<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'SISTIM INFORMASI MANAGEMENT') <br>
        <small> Menampilkan data pada hari,
            <?php
                date_default_timezone_set("Asia/Jakarta");
                $day =array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
                $dayS =$day[date("N")];

                echo $dayS.", ".date("d M Y, H:i");
        ?>
        </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('adminlte_lang::message.level') }}</a></li>
        <li class="active">@yield('htmlheader_title')</li>
    </ol>
</section>