@extends('layouts.app')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading" style="padding-bottom: 0px">
            <h3 class="panel-title">Transaksi</h3>
            <p class="panel-subtitle">Melakukan pembayaran setelah pemesanan</p>
            @if(Auth::user()->level == 'kasir')
                <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-rounded btn-fw" style="margin-top: 10px; margin-bottom: -10px;"><i class="fa fa-plus"></i> Tambah Transaksi</a>
                <br>
                <br>
            @else
                <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-rounded btn-fw disabled" style="margin-top: 10px; margin-bottom: -10px;"><i class="fa fa-plus"></i> Tambah Transaksi</a>
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

                            <th>Nomer Pesanan</th>
                            <th>Total</th>
                            <th>Bayar</th>
                            <th>Kembali</th>
                            <th>Tanggal</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach($data as $t)
                            @foreach($t->pesanan->detail_pesanan as $d)
                                @php
                                    $d = $total += $d->menu->harga * $d->jumlah
                                @endphp
                            @endforeach
                            <tr>
                                <td>{{ $t->id_pesanan }}</td>
                                <td>{{ $total }}</td>
                                <td>{{ $t->bayar }}</td>
                                <td>{{ $t->bayar - $total}}</td>
                                <td>{{ $t->created_at }}</td>
                            </tr>
                            @php
                                $total = 0
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
