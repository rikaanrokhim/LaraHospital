<!DOCTYPE html>
<html>

@include('adminlte::layouts.partials.htmlheader')

@section('scripts')
    @include('adminlte::layouts.partials.scripts')
    @yield('script')
@show

@yield('content')



</html>
