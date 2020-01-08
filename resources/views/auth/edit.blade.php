@extends('layouts.app')

@section('content')
    <form method="post" action="" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Edit User {{$user->name}}</h3>
                <p class="panel-subtitle">Mengubah data user</p>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="no_meja" class="">Nomer Meja</label>
                    <div class="">
                        <input type="text" id="no_meja" class="form-control" name="no_meja" value="{{$data->no_meja}}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <a href="{{url('/')}}" class="btn btn-light pull-right">Kembali</a>
            </div>
        </div>
    </form>

@endsection
