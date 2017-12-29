@extends('adminlte::layouts.app_member')

@section('htmlheader_title')
    Penunjang Kesehatan
@endsection

@section('main-content')

<!--Date Time Picker-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('daterange/daterangepicker.css') }}" />

<div class="box box-primary">
    <div class="box-header with-border"><center><h4>Tambah Data Penunjang Medis</h4></center>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
        <div class="box-body">
            @if (isset($edit))
            <form action="{{ route('member.medichals.update', ['medichal' => $edit->id]) }}" method="POST" enctype="multipart/form-data">
            @else
            <form action="{{ route('member.medichals.store') }}" method="POST" enctype="multipart/form-data">
            @endif
            {{ csrf_field() }}
                <div class="form-group col-md-4 {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Nama : </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-pencil"></i>
                            </div>
                    <input class="form-control" type="text" name="name" id="name" value="{{ isset($edit) ? $edit->name : old('name') }}">
                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="user_id">Penjaga : </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <select class="form-control" name="user_id" id="user_id">
                            @foreach (\App\User::all() as $user)
                            <option {{ (isset($edit) ? $edit->user()->get()->contains('user', $user->name) : null) ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                            </select>
                    </div>
                </div>

                <div class="form-group col-md-4 ">
                    <label for="status_id">Status : </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                            <i class="fa fa-pencil"></i>
                            </div>
                            <select class="form-control" name="status_id" id="status_id">
                            @foreach (\App\Status::all() as $status)
                            <option {{ (isset($edit) ? $edit->status()->get()->contains('status', $status->status) : null) ? 'selected' : '' }} value="{{ $status->id }}">{{ $status->status }}</option>
                            @endforeach
                            </select>
                        </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="type">Tipe : </label>
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <select name="type" id="type" class="form-control">
                        <option>Labolatorium</option>
                        <option>Kamar Mayat</option>
                        <option>Bank Darah</option>
                        <option>Manajemnt Dapur</option>
                    </select>
                </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="image">Foto : <font size="1px">* bisa diisi bisa tidak</font></label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <input class="form-control" type="file" name="image" id="image" value="{{ isset($edit) ? $edit->image : old('image') }}">
                </div>
                </div>

                <div class="form-group col-md-4 {{ $errors->has('location') ? 'has-error' : '' }}">
                    <label for="location">Lokasi : </label>
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <input class="form-control" type="text" name="location" id="location" value="{{ isset($edit) ? $edit->location : old('location') }}">
                    @if ($errors->has('location'))
                    <span class="help-block">
                        <strong>{{ $errors->first('location') }}</strong>
                    </span>
                    @endif
                </div>
                </div>

                <div class="form-group col-md-4 {{ $errors->has('open') ? 'has-error' : '' }}">
                    <label for="open">Buka : </label>
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <input class="form-control" type="text" name="open" id="open" value="{{ isset($edit) ? $edit->open : old('open') }}">
                    @if ($errors->has('open'))
                    <span class="help-block">
                        <strong>{{ $errors->first('open') }}</strong>
                    </span>
                    @endif
                </div>
                </div>

                <div class="form-group col-md-8 {{ $errors->has('information') ? 'has-error' : '' }}">
                    <label for="information">Informasi : </label>
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <input class="form-control" type="text" name="information" id="information" value="{{ isset($edit) ? $edit->information : old('information') }}">
                    @if ($errors->has('information'))
                    <span class="help-block">
                        <strong>{{ $errors->first('information') }}</strong>
                    </span>
                    @endif
                </div>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-primary">{{ isset($edit) ? 'Update' : 'Simpan' }}</button>
                </div>
                @if (isset($edit))
                <div class="form-group text-center">
                    <a href="{{ route('member.medichals') }}" class="btn btn-default">Batal</a>
                </div>
                @endif
            </form>
        </div>
    </div>

    <div class="box">
        <div class="box-header">
            <h4 class="box-title pull-left"><i class="fa fa-bed"> &nbsp; Data Ruang </i></h4>
        </div>
            <form action="{{ route('member.medichals') }}" method="GET" class="sidebar-form" enctype="multipart/form-data" style="margin-top: -28px; margin-left: 80%">
                <div class="input-group">
                    <input type="text" id="search" name="search" class="form-control" value="{{ isset($search) ? $search : '' }}" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
                    <span class="input-group-btn">
                        <button type='submit' class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Penjaga</th>
                            <th>Status</th>
                            <th>Tipe</th>
                            <th>Foto</th>
                            <th>Jam Buka</th>
                            <th>Lokasi</th>
                            <th>Informasi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($medichals as $key => $medichal)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $medichal->name }}</td>
                            <td>{{ $medichal->user->name }}</td>
                            <td>
                                @if($medichal->status->status == 'Aktif')
                                    <div class="btn btn-xs btn-success">{{ $medichal->status->status }}</div>
                                @elseif($medichal->status->status == 'Tidak Aktif')
                                    <div class="btn btn-xs btn-danger">{{ $medichal->status->status }}</div>
                                @endif
                            </td>
                            <td>{{ $medichal->type }}</td>
                            <td>
                                @if($medichal->image == NULL)
                                    <div class="btn btn-xs btn-danger">Tidak ada foto</div>
                                @else
                                    <img src="../..{{ $medichal->image }}" width="50" height="50">
                                @endif
                            </td>
                            <td>{{ $medichal->open }}</td>
                            <td>{{ $medichal->location }}</td>
                            <td>{{ $medichal->information }}</td>
                            <td>
                                <a href="{{ route('member.medichals', ['medichal' => $medichal->id]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                <a href="{{ route('member.medichals.destroy', ['medichal' => $medichal->id]) }}" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash"></i></a>
                            </td>
                        @empty
                        <div class="form-group text-center">
                            <button class="btn btn-xs btn-danger">Tidak ada data untuk ditampilkan</button>
                        </div>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Penjaga</th>
                            <th>Status</th>
                            <th>Tipe</th>
                            <th>Foto</th>
                            <th>Jam Buka</th>
                            <th>Lokasi</th>
                            <th>Informasi</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="text-center">
                {{-- {{ $medichals->appends(['search' => $search])->links() }} --}}
                {{ $medichals->appends(['search' => $search])->render() }}
                </div>
            </div>
        </div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.13/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{ asset('daterange/moment.min.js') }}"></script>
<script src="{{ asset('daterange/daterangepicker.js') }}"></script>

<script>
    $(function() {
    $('input[name="open"]').daterangepicker({
        datePicker: false,
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'h:mm A'
        }
    });
});
</script>
@endsection