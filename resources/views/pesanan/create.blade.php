@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('pesanan.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Pesanan</h3>
                <p class="panel-subtitle">Menambahkan pesanan baru</p>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="">Nomer Meja</label>
                    <select name="id_meja" id="" class="form-control">
                        <option value="">-- Pilih Meja --</option>
                        @foreach ($meja as $m)
                            <option value="{{ $m->id }}">{{ $m->no_meja }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Lanjutkan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <a href="{{route('pesanan.index')}}" class="btn btn-light pull-right">Kembali</a>
            </div>
        </div>
    </form>
@endsection
