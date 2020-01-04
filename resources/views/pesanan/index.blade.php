@extends('layouts.app')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading" style="padding-bottom: 0px">
            <h3 class="panel-title">Pesanan</h3>
            <p class="panel-subtitle">Melakukan pemesanan makanan</p>
            @if(Auth::user()->level == 'waiter')
                <a href="{{ route('pesanan.create') }}" class="btn btn-primary btn-rounded btn-fw" style="margin-top: 10px; margin-bottom: -10px;"><i class="fa fa-plus"></i> Tambah Pesanan</a>
                <br>
                <br>
            @else
                <a href="{{ route('pesanan.create') }}" class="btn btn-primary btn-rounded btn-fw disabled" style="margin-top: 10px; margin-bottom: -10px;"><i class="fa fa-plus"></i> Tambah Pesanan</a>
                <br>
                <br>
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
                            <th>Nama User</th>
                            <th>Nomer Meja</th>
                            <th>Total</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach($data as $p)
                            @foreach($p->detail_pesanan as $d)
                                @php
                                   $d = $total += $d->menu->harga * $d->jumlah
                                @endphp
                            @endforeach
                            <tr>
                                <td>{{ $p->user->username }}</td>
                                <td>{{ $p->meja->no_meja }}</td>
                                <td>{{ $total }}</td>
                                @if(Auth::user()->level == 'waiter')
                                    <td>
                                        <div class="column">
                                            <a href="{{route('detail.index',$p->id)}}" class="btn btn-info fa fa-info"></a>
                                            @if (!\App\Transaksi::where('id_pesanan', $p->id)->exists())
                                                <a href="{{route('pesanan.edit',$p->id)}}" class="btn btn-default fa fa-pencil"></a>
                                                <a class="btn btn-danger fa fa-trash" data-toggle="modal" data-target="#modelId" onclick="prepare({{$p->id}})"></a>
                                            @else
                                                <a href="{{route('pesanan.edit',$p->id)}}" class="btn btn-default fa fa-pencil disabled"></a>
                                                <a class="btn btn-danger fa fa-trash disabled" data-toggle="modal" data-target="#modelId" onclick="prepare({{$p->id}})"></a>
                                            @endif
                                        </div>
                                    </td>
                                    @else
                                    <td>
                                        <div class="column">
                                            <a href="{{route('detail.index',$p->id)}}" class="btn btn-info fa fa-info"></a>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                            @php
                                $total = 0;
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('pesanan.destroy', $p->id)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="id" id="pesananid" readonly>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data pesanan <b><span id="nomer">{{$p->id}}</span></b>? Aksi ini tidak dapat di-<i>undo</i>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <input type="submit" value="Hapus" class="btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--    {{route('menu.destroy', $m->id)}}--}}
{{--    {{route('pesanan.destroy', $p->id)}}--}}
{{--    {{$p->id}}--}}

@endsection
