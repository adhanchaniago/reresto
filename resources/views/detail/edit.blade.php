@extends('layouts.app')

@section('content')
    <form method="post" action="{{route('detail.update', [$id_pesanan, $data->id])}}" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Detail</h3>
                <p class="panel-subtitle">Mengubah detail pesanan</p>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="">Nama Menu</label>
                    <select name="id_menu" id="" class="form-control">
                        <option value="{{$data->menu->id}}">{{$data->menu->nama}}</option>
                        @foreach ($menu as $m)
                            @if($m->id != $data->menu->id)
                                <option value="{{ $m->id }}">{{ $m->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Jumlah</label>
                    <input type="number" value="{{$data->jumlah}}" name="jumlah" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Tambahkan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <a href="{{route('detail.index','id')}}" class="btn btn-light pull-right">Kembali</a>
            </div>
        </div>
    </form>
@endsection
