@extends('adminlte::layouts.app_member')

@section('htmlheader_title')
    Data Ruang
@endsection

@section('main-content')

<div class="box box-primary">
    <div class="box-header with-border"><center><h4>Tambah Data Penunjang Medis</h4></center>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
        <div class="box-body">

            @if (isset($edit))
            <form action="{{ route('member.rooms.update', ['room' => $edit->id]) }}" method="POST" enctype="multipart/form-data">
            @else
            <form action="{{ route('member.rooms.store') }}" method="POST" enctype="multipart/form-data">
            @endif
            {{ csrf_field() }}
            <div class="form-group col-md-4">
                <label for="room_type_id">Tipe Ruang : </label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-pencil"></i>
                        </div>
                        <select class="form-control" name="room_type_id" id="room_type_id">
                            @foreach (\App\RoomType::all() as $type)
                                <option {{ (isset($edit) ? $edit->type()->get()->contains('type', $type->name) : null) ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
            </div>

            <div class="form-group col-md-4 {{ $errors->has('code') ? 'has-error' : '' }}">
                    <label for="code">Kode Ruang : </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-pencil"></i>
                            </div>
                    <input class="form-control" type="text" name="code" id="code" value="{{ isset($edit) ? $edit->code : old('code') }}">
                    @if ($errors->has('code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('code') }}</strong>
                    </span>
                    @endif
                    </div>
                </div>

            <div class="form-group col-md-4">
                    <label for="name">Nama Ruang : </label>
                     <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-pencil"></i>
                        </div>
                    <input class="form-control" type="text" name="name" id="name" value="{{ isset($edit) ? $edit->name : old('name') }}">
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="status_id">Status Ruang : </label>
                <div class="input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-pencil"></i>
                    </div>
                    <select class="form-control" name="status_id" id="status_id">
                        @foreach (\App\Status::all() as $status)
                            <option {{ (isset($edit) ? $edit->status()->get()->contains('status', $status->status) : null) ? 'selected' : ''}} value="{{ $status->id }}">{{ $status->status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group col-md-4 {{ $errors->has('service') ? 'has-error' : ''}}">
                <label for="service">Fasilitas Ruang</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <input class="form-control" type="text" name="service" id="service" value="{{ isset($edit) ? $edit->service : old('service') }}">
                    @if ($errors->has('service'))
                        <span class="help-block">
                            <strong>{{ $errors->first('service') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="fare">Tarif Ruang : </label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <input class="form-control" type="text" name="fare" id="fare" value="{{ isset($edit) ? $edit->fare : old('fare') }}">
                </div>
            </div>

            <div class="form-group col-md-6">
                    <label for="image">Foto : <font size="1px">* bisa diisi bisa tidak</font></label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <input class="form-control" type="file" name="image" id="image" value="{{ isset($edit) ? $edit->image : old('image') }}">
                </div>
                </div>

            <div class="form-group col-md-6 {{ $errors->has('location') ? 'has-error' : '' }}">
                <label for="location">Lokasi Ruang : </label>
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

            <div class="form-group col-md-6 {{ $errors->has('information') ? 'has-error' : '' }}">
                <label for="information">Keterangan : </label>
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

            <div class="form-group col-md-6">
                <label for="stock">Stok : </label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <input class="form-control" type="number" name="stock" id="stock" value="{{ isset($edit) ? $edit->stock : old('stock') }}">
                </div>
            </div>

            <div class="form-group text-center">
                <button class="btn btn-primary">{{ isset($edit) ? 'Update' : 'Simpan' }}</button>
            </div>
            @if (isset($edit))
            <div class="form-group text-center">
                <a href="{{ route('member.rooms') }}" class="btn btn-default">Batal</a>
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
                            <th>Tipe</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Pelayanan</th>
                            <th>Tarif</th>
                            <th>Gambar</th>
                            <th>Lokasi</th>
                            <th>Informasi</th>
                            <th>Jumlah Ruang Tersisa</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rooms as $key => $room)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $room->type->name }}</td>
                            <td>{{ $room->code }}</td>
                            <th>{{ $room->name }}</th>
                            <td>
                                @if($room->status->status == 'Aktif')
                                    <div class="btn btn-xs btn-success">{{ $room->status->status }}</div>
                                @elseif($room->status->status == 'Tidak Aktif')
                                    <div class="btn btn-xs btn-danger">{{ $room->status->status }}</div>
                                @endif
                            </td>
                            <td>{{ $room->service }}</td>
                            <td>{{ $room->fare }}</td>
                            <td>
                                @if($room->image == NULL)
                                    <div class="btn btn-xs btn-danger">Tidak ada foto</div>
                                @else
                                    <img src="../..{{ $room->image }}" width="50" height="50">
                                @endif
                            </td>
                            <td>{{ $room->location }}</td>
                            <td>{{ $room->information }}</td>
                            <td>{{ $room->stock }}</td>
                            <td>
                                <a href="{{ route('member.rooms', ['room' => $room->id]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                <a href="{{ route('member.rooms.destroy', ['room' => $room->id]) }}" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash"></i></a>
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
                            <th>Tipe</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Pelayanan</th>
                            <th>Tarif</th>
                            <th>Gambar</th>
                            <th>Lokasi</th>
                            <th>Informasi</th>
                            <th>Jumlah Ruang Tersisa</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="text-center">
                {{-- {{ $medichals->appends(['search' => $search])->links() }} --}}
                {{ $rooms->appends(['search' => $search])->render() }}
                </div>
            </div>
        </div>
@endsection

{{-- @section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.13/jquery.min.js"></script>
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
@endsection --}}
