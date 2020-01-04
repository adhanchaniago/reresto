@extends('layouts.app')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading" style="padding-bottom: 0px">
            <h3 class="panel-title">Meja</h3>
            <p class="panel-subtitle">Menampilkan meja yang sudah disediakan dan siap digunakan</p>
            @if(Auth::user()->level == 'admin')
                <a href="{{route('meja.create')}}" class="btn btn-primary btn-rounded btn-fw" style="margin-top: 10px; margin-bottom: -10px;"><i class="fa fa-plus"></i> Tambah Meja</a>
                <br>
                <br>
            @else
                <a href="" class="btn btn-primary btn-rounded btn-fw disabled" style="margin-top: 10px; margin-bottom: -10px;"><i class="fa fa-plus"></i> Tambah Meja</a>
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
                            <th>Nomer Meja</th>
                            @if(Auth::user()->level == 'admin')
                                <th>Opsi</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $m)
                            <tr>
                                <td>{{ $m->no_meja }}</td>
                                @if(Auth::user()->level == 'admin')
                                    <td>
                                        <div class="columns">
                                            <a href="{{route('meja.edit',$m->id)}}" class="btn btn-default fa fa-pencil"></a>
                                            <a class="btn btn-danger fa fa-trash" data-toggle="modal" data-target="#modelId" onclick="prepare({{$m->id}})"></a>
                                        </div>
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
                    <h5 class="modal-title">Konfirmasi Hapus Meja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('meja.destroy',$m->id)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <input type="hidden" name="id" id="mejaid" readonly>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus meja nomer <b><span id="nomer">{{$m->no_meja}}</span></b>? Aksi ini tidak dapat di-<i>undo</i>
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
