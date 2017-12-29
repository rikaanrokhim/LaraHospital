@extends('adminlte::layouts.auth')

@section('content')
<br>
<center>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="alert alert-success">
                            <p>
                                <h3><b>Selamat Datang</h3>
                                    <br>
                                        <?php
                                            $quotes = DB::table('quotes')->select('message')->inRandomOrder()->first();

                                            echo "$quotes->message";
                                        ?>




                                    </b><br><br>
                                    @if (sizeof($role) < 1)
                                        <button type="submit" id="upgrade" name="upgrade" class="btn btn-primary" data-id="{{ Auth::id() }}" data-member="member">upgrade</button>
                                    @elseif (sizeof($role == 'member'))
                                        <a href="{{ url('member') }}" class="btn btn-primary">Masuk</a>
                                    @elseif (sizeof($role == 'admin'))
                                        <a href="{{ url('admin') }}" class="btn btn-primary">Masuk</a>
                                    @else
                                        login dulu
                                    @endif
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>
@endsection

@section('script')

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $(function(){
        $('#upgrade').click(function(){
            var id = $(this).attr('data-id');
            var member = $(this).attr('data-member');
            var route = '{{ URL('home/upgrade') }}';
            var data = {
                id: id, level: member
            }
            var request = $.post(route, data);
                $(this).html('processing...');
                request.done(function(response){
                    $(this).html('upgrade');
                    if(response.success == 'true')
                        window.location.href = '{{ URL('member') }}';
                });
                request.always(function(response){
                    console.log('complete');
                    $(this).html('upgrade');
                });
        });
    });
 </script>

@endsection()