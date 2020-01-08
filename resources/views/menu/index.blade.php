@extends('layouts.app')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading" style="padding-bottom: 0px">
            <h3 class="panel-title">Menu</h3>
            <p class="panel-subtitle">Menampilkan berbagai menu pilihan yang disajikan oleh restoran</p>
            @if(Auth::user()->level == 'admin' || Auth::user()->level == 'waiter')
                <a href="{{ route('menu.create') }}" class="btn btn-primary btn-rounded btn-fw" style="margin-top: 10px; margin-bottom: -10px;"><i class="fa fa-plus"></i> Tambah Menu</a>
                <br>
                <br>
            @else
                <a href="" class="btn btn-primary btn-rounded btn-fw disabled" style="margin-top: 10px; margin-bottom: -10px;"><i class="fa fa-plus"></i> Tambah Menu</a>
                <br>
                <br>
            @endif

            @if (Session::has('sukses'))
                <div class="alert alert-success mb-4" role="alert" style="margin-bottom: 0px;">
                    <strong>{{ Session::get('sukses') }}</strong>
                </div>
            @endif
        </div>
        <div class="panel-body">
            <div class="body">
                    <div class="tabel-responsive">
                        <table class="table table-bordered table-hover table-striped" id="dt">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Jenis Menu</th>
                                @if(Auth::user()->level == 'admin' || Auth::user()->level == 'waiter')
                                <th>Opsi</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1
                            @endphp
                            @foreach($data as $m)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $m->nama }}</td>
                                    <td>{{ $m->harga }}</td>
                                    <td>{{ $m->jenis_menu}}</td>
                                    @if(Auth::user()->level == 'admin' || Auth::user()->level == 'waiter')
                                    <td>
                                        <div class="column">
                                            <a href="{{route('menu.edit',$m->id)}}" class="btn btn-default fa fa-pencil"></a>
                                            <a class="btn btn-danger fa fa-trash" data-toggle="modal" data-target="#modelId" onclick="prepare({{$m->id}})"></a>                                        </div>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('menu.destroy', $m->id)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <input type="hidden" name="id" id="menuid" readonly>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus menu <b><span id="nomer">{{$m->nama}}</span></b>? Aksi ini tidak dapat di-<i>undo</i>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <input type="submit" value="Hapus" class="btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
{{--@section('js')--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            $('#dt').DataTable({--}}
{{--                'paging'      : true,--}}
{{--                'lengthChange': true,--}}
{{--                'searching'   : true,--}}
{{--                'ordering'    : true,--}}
{{--                'info'        : true,--}}
{{--                'autoWidth'   : true--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}
{{--@endsection--}}
