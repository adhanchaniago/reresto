@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('transaksi.store') }}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Transaksi</h3>
                <p class="panel-subtitle">Menambahkan transaksi baru</p>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="">Nomer Pesanan</label>
                    <select name="id_pesanan" id="pesanan" class="form-control" onchange="prepare()">
                        <option value="">-- Pilih Nomer Pesanan --</option>
                        @foreach ($data as $pesanan)
                            @if (!\App\Transaksi::where('id_pesanan', $pesanan->id)->exists())
                                <option value="{{ $pesanan->id }}">Nomer : {{ $pesanan->id }}, Meja : {{ $pesanan->meja->no_meja }}, Waktu : {{ $pesanan->created_at }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Total</label>
                    <input type="text" name="total" id="total" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="">Bayar</label>
                    <input type="number" name="bayar" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Bayar</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <a href="{{route('transaksi.index')}}" class="btn btn-light pull-right">Kembali</a>
            </div>
        </div>
    </form>

    <script>
        function prepare() {
            var idPesanan = $('#pesanan').val()
            var siteUrl = "{{ url('pesanan/total', 'id') }}"
            siteUrl = siteUrl.replace('id', idPesanan)

            $.getJSON(siteUrl, function (data) {
                $('#total').val(data)
            })
        }
    </script>
@endsection
