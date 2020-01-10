@extends('layouts.app')

@section('content')
    <form method="post" action="" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">User {{$user->name}}</h3>
                <p class="panel-subtitle">Info Data Pengguna</p>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="name" class="">Nama</label>
                    <div class="">
                        <input type="text" id="name" class="form-control" name="name" value="{{$user->name}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="">Email</label>
                    <div class="">
                        <input type="email" id="email" class="form-control" name="email" value="{{$user->email}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="">Username</label>
                    <div class="">
                        <input type="text" id="username" class="form-control" name="username" value="{{$user->username}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="foto" class="">Foto</label>
                    <div class="">
                        <img class="product" width="150" height="150" @if($user->foto) src="{{ asset('images/user/'.$user->foto) }}" @else src="{{ asset('images/user/default.png') }}" @endif />
{{--                        <input type="file" class="uploads form-control" style="margin-top: 20px;" name="foto" readonly>--}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="level" class="">Level</label>
                    <div class="">
                        <select name="level" id="" class="form-control" readonly>
                            <option value="{{$user->id}}">{{$user->username}}</option>
                            @foreach ($user as $u)
                                @if ($user->id != Auth::user()->level)
                                <option value="{{$user->id}}">{{$user->username}}</option>
                                @endif
                            @endforeach
                            
                        </select>
                    </div>
                </div>
{{--                <button type="submit" class="btn btn-primary" id="submit">Submit</button>--}}
                <button type="reset" class="btn btn-primary">Edit</button>
                <a href="{{url('/')}}" class="btn btn-light pull-right">Kembali</a>
            </div>
        </div>
    </form>

@endsection
