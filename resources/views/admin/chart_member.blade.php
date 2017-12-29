@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Chart Pegawai
@endsection

@section('main-content')
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Pegawai</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
                <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="utf-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1">

                        {!! Charts::styles() !!}

                    </head>
                    <body>
                        <div class="app">
                            <center>
                                {!! $chart->html() !!}
                            </center>
                        </div>
                        {!! Charts::scripts() !!}
                        {!! $chart->script() !!}
                    </body>
                </html>
            </div>
        </div>
@endsection