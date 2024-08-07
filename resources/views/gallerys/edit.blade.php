@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Gallery</h1>
@stop

@section('content')
<form action="{{ route('gallerys.update', $gallerys->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="overflow: auto">
                    <table style="width: 100%">
                        <tr>
                            <td><label for="kosan_id">Kosan</label></td>
                            <td>
                                <select name="kosan_id" id="kosan_id" class="form-control" required>
                                    <option value="">Pilih Kosan</option>
                                    @foreach ($kosans as $kosan)
                                        <option value="{{ $kosan->id }}" {{ $gallerys->kosan_id == $kosan->id ? 'selected' : '' }}>
                                            {{ $kosan->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="judul">Judul</label></td>
                            <td><input type="text" size="70" id="judul" placeholder="Judul" name="judul" value="{{ $gallerys->judul }}" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td><label for="foto">Foto</label></td>
                            <td>
                                <input class="form-control" type="file" size="70" id="foto" placeholder="Foto" name="foto">
                                @if($gallerys->foto)
                                    <img src="{{ asset('storage/' . $gallerys->foto) }}" alt="Foto" class="img-fluid mt-2" id="existing-foto">
                                @else
                                    No Image
                                @endif
                            </td>
                        </tr>
                    </table>
                    <br>
                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                    <a href="{{ route('gallerys') }}" class="btn btn-default mt-2">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>
@stop
