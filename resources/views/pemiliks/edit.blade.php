@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Data Pemilik</h1>
@stop

@section('content')
<form action="{{ route('pemiliks.update', $pemilik->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="overflow: auto">
                    <table style="width: 100%">
                        <tr>
                            <td><label for="labelNama">Nama pemilik</label></td>
                            <td><input type="text" size="70" id="nama" placeholder="Nama pemilik" name="nama" class="form-control full-width" value="{{ $pemilik->nama }}"></td>
                        </tr>
                        <tr>
                            <td><label for="labelAlamat">Alamat</label></td>
                            <td><input type="text" size="70" id="alamat" placeholder="Alamat" name="alamat" class="form-control full-width" value="{{ $pemilik->alamat }}"></td>
                        </tr>
                        <tr>
                            <td><label for="labelNoHp">Nomor Telepon</label></td>
                            <td><input name="no_hp" id="no_hp" placeholder="0897654321" class="form-control full-width" value="{{ $pemilik->no_hp }}"></td>
                        </tr>
                        <tr>
                            <td><label for="labelEmail">E-mail</label></td>
                            <td><input type="email" size="70" id="email" placeholder="E-mail" name="email" class="form-control full-width" value="{{ $pemilik->email }}"></td>
                        </tr> 
                    </table>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                    <a href="{{ route('pemiliks.index') }}" class="btn btn-default mt-2">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>
@stop
