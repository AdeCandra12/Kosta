@extends('adminlte::page')

@section('title', 'tambah pemilik')

@section('content_header')
    <h1 class="m-0 text-dark">Data pemilik</h1>
@stop

@section('content')
<form action="{{route('pemiliks.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="overflow: auto">
                    <table style="width: 100%">
                        <tr>
                            <td><label for="labelNama">Nama pemilik</label></td>
                            <td><input type="text" size="70" id="nama" placeholder="Nama pemilik" name="nama" class="form-control full-width"></td>
                        </tr>
                        <tr>
                            <td><label for="labelAlamat">Alamat</label></td>
                            <td><input type="text" size="70" id="alamat" placeholder="Alamat" name="alamat"  class="form-control full-width"></td>
                        </tr>
                        <tr>
                            <td><label for="labelNoHp">Nomor Telepon</label></td>
                            <td><input name="no_hp" id="no_hp" placeholder="0897654321" cols="70" rows="10"  class="form-control full-width"></input></td>
                        </tr>
                        <tr>
                            <td><label for="labelEmail">E-mail</label></td>
                            <td><input type="email" size="70" id="email" placeholder="E-mail" name="email"  class="form-control full-width"></td>
                        </tr> 
                    </table>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                    <a href="{{route('pemiliks.index')}}" class="btn btn-default mt-2">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>
@stop
