@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('pesanan.update',$data->id) }}" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Pesanan</h3>
                <p class="panel-subtitle">Pesanan pesanan</p>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="">Nomer Meja</label>
                    <select name="id_meja" id="" class="form-control">
                        <option value="{{$data->meja->id}}">{{$data->meja->no_meja}}</option>
                        @foreach ($meja as $m)
                            @if($m->id != $data->meja->id)
                                <option value="{{ $m->id }}">{{ $m->no_meja }}</option>
                            @endif
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
