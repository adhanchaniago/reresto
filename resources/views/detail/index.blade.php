@extends('layouts.app')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading" style="padding-bottom: 0px">
            <h3 class="panel-title">Detail Pesanan</h3>
            <p class="panel-subtitle">Detail atau rincian dari pesanan yang sudah dilakukan di meja <b></b> </p>
            @if(Auth::user()->level == 'waiter')
                <a href="{{ route('detail.create',$data->id) }}" class="btn btn-primary btn-rounded btn-fw" style="margin-top: 10px; margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah Detail</a>
                @else
                <a href="{{ route('detail.create',$data->id) }}" class="btn btn-primary btn-rounded btn-fw disabled" style="margin-top: 10px; margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah Detail</a>
            @endif
            @if (Session::has('sukses'))
                <div class="alert alert-success mb-4" role="alert" style="margin-bottom: 0px;">
                    <strong>{{ Session::get('sukses') }}</strong>
                </div>
            @endif
        </div>
        <div class="panel-body">
            <div class="body">
                <div class="tabel-responsive">
                    <table class="table table-bordered table-hover table-striped" id="dt">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            @if(Auth::user()->level == 'waiter')
                                <th>Opsi</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=1
                        @endphp
                        @foreach($data->detail_pesanan as $p)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $p->menu->nama }}</td>
                                <td>{{ $p->jumlah }}</td>
                                <td>{{ $p->menu->harga * $p->jumlah}}</td>
                                @if(Auth::user()->level == 'waiter')
                                    <td>
                                        <div class="column">
                                            @if(\App\Transaksi::where('id_pesanan', $data->id)->exists())
                                                <a href="" class="btn btn-default fa fa-pencil disabled"></a>
                                                <a class="btn btn-danger fa fa-trash disabled" data-toggle="modal" data-target="#modelId" onclick="prepare({{$p->id}})"></a>
                                            @else
                                                <a href="{{route('detail.edit',[$data->id, $p->id])}}" class="btn btn-default fa fa-pencil"></a>
                                                <a class="btn btn-danger fa fa-trash" data-toggle="modal" data-target="#modelId" onclick="prepare({{$p->id}})"></a>
                                            @endif
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <a href="{{route('pesanan.index')}}" class="btn btn-light">Kembali Ke Pesanan</a>
                </div>
            </div>
        </div>
    </div>

    {{--    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">--}}
    {{--        <div class="modal-dialog" role="document">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                    <h5 class="modal-title">Konfirmasi Hapus Menu</h5>--}}
    {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
    {{--                        <span aria-hidden="true">&times;</span>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--                <form action="{{route('menu.destroy', $m->id)}}" method="post">--}}
    {{--                    {{ csrf_field() }}--}}
    {{--                    {{ method_field('delete') }}--}}
    {{--                    <input type="hidden" name="id" id="pesananid" readonly>--}}
    {{--                    <div class="modal-body">--}}
    {{--                        Apakah anda yakin ingin menghapus pesanan <b><span id="nomer"></span></b>? Aksi ini tidak dapat di-<i>undo</i>--}}
    {{--                    </div>--}}
    {{--                    <div class="modal-footer">--}}
    {{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>--}}
    {{--                        <input type="submit" value="Hapus" class="btn btn-danger">--}}
    {{--                    </div>--}}
    {{--                </form>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

@endsection
