@extends('adminlte::layouts.app')


@section('htmlheader_title')
    Data Pegawai
@endsection

@section('main-content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-bed"> &nbsp; Data Pegawai </i></h3>
        </div>

        <form action="{{ route('admin.member') }}" method="get" class="sidebar-form" style=" margin-right: 81%; margin-bottom: -2px;">
                <div class="input-group">
                    <input type="text" id="search" name="search" class="form-control" value="{{ isset($search) ? $search : '' }}" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
                    <span class="input-group-btn">
                        <button type='submit' class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama </th>
                        <th>E-Mail</th>
                        <th>Opsi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('admin.member.destroy', $user) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger" >
                                    <i class="fa fa-trash"></i>
                                </button>

                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        &nbsp; {{ $users->appends([ 'search' => $search ])->render() }}
    </div>
@endsection