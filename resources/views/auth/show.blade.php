@extends('layouts.app')

@section('content')
    <form method="post" action="" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">User {{$user->name}}</h3>
                <p class="panel-subtitle">Info data user</p>
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
                    <label for="level" class="">Level</label>
                    <div class="">
                        <select name="level" id="" class="form-control" readonly>
                            <option value="Admin" @if ($user->level == 'admin') selected @endif>Admin</option>
                            <option value="Waiter" @if ($user->level == 'waiter') selected @endif>Waiter</option>
                            <option value="Kasir" @if ($user->level == 'kasir') selected @endif>Kasir</option>
                            <option value="Owner" @if ($user->level == 'owner') selected @endif>Owner</option>
                        </select>
                    </div>
                </div>
{{--                <button type="submit" class="btn btn-primary" id="submit">Submit</button>--}}
                <button type="reset" class="btn btn-danger">Edit</button>
                <a href="{{url('/')}}" class="btn btn-light pull-right">Kembali</a>
            </div>
        </div>
    </form>

@endsection
