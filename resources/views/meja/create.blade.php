@extends('layouts.app')
@section('content')

    <form method="post" action="{{ route('meja.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Meja</h3>
                <p class="panel-subtitle">Menambahkan meja baru</p>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="no_meja" class="">Nomer Meja</label>
                    <div class="">
                        <input type="text" id="no_meja" class="form-control" name="no_meja"  required>
                        {{--                        @if ($errors->has('nama'))--}}
                        {{--                            <span class="help-block">--}}
                        {{--                                  <strong>{{ $errors->first('nama') }}</strong>--}}
                        {{--                            </span>--}}
                        {{--                        @endif--}}
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <a href="{{route('meja.index')}}" class="btn btn-light pull-right">Kembali</a>
            </div>
        </div>
    </form>
@endsection
