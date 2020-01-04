@extends('layouts.app')
@section('content')

    <form method="post" action="{{ route('menu.update', $data->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Menu {{$data->nama}}</h3>
                <p class="panel-subtitle">Mengubah menu ini</p>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="nama" class="">Nama</label>
                    <div class="">
                        <input type="text" id="nama" class="form-control" name="nama" value="{{$data->nama}}" required>
                        {{--                        @if ($errors->has('nama'))--}}
                        {{--                            <span class="help-block">--}}
                        {{--                                  <strong>{{ $errors->first('nama') }}</strong>--}}
                        {{--                            </span>--}}
                        {{--                        @endif--}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="harga" class="">Harga</label>
                    <div class="">
                        <input type="text" id="harga" class="form-control" name="harga" value="{{$data->harga}}" required>
                        {{--                        @if ($errors->has('harga'))--}}
                        {{--                            <span class="help-block">--}}
                        {{--                                  <strong>{{ $errors->first('harga') }}</strong>--}}
                        {{--                            </span>--}}
                        {{--                        @endif--}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="jenis_menu" class="">Jenis Menu</label>
                    <div class="">
                        <select name="jenis_menu" id="" class="form-control">
                            <option value="Makanan" @if ($data->jenis_menu == 'Makanan') selected @endif>Makanan</option>
                            <option value="Minuman" @if ($data->jenis_menu == 'Minuman') selected @endif>Minuman</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <a href="{{route('menu.index')}}" class="btn btn-light pull-right">Kembali</a>
            </div>
        </div>
    </form>
@endsection
