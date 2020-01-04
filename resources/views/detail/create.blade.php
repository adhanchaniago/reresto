@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('detail.store',$id) }}" enctype="multipart/form-data">
        @csrf
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Detail</h3>
                <p class="panel-subtitle">Menambahkan detail pesanan baru</p>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="">Nama Menu</label>
                    <select name="id_menu" id="" class="form-control">
                        <option value="">-- Pilih Menu --</option>
                        @foreach ($data as $m)
                            <option value="{{ $m->id }}">{{ $m->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Tambahkan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <a href="{{route('detail.index', $data2->id)}}" class="btn btn-light pull-right">Kembali</a>
            </div>
        </div>
    </form>
@endsection
