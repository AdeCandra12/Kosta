@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark"></h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('kosans.create') }}" class="btn btn-primary mb-2">Tambah</a>
                @if (session('succes_message'))
                    <div class="alert alert-success">
                        {{ session('succes_message') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Pemilik</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Gender</th>
                                <th>Fasilitas</th>
                                <th>Jumlah Kamar</th>
                                <th>Status</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Aksi</th> <!-- Kolom Aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kosans as $key => $kosans)
                            <tr>
                                <td><img src="{{ asset('storage/'.$kosans->image) }}" alt="" style="width: 100px"></td>
                                <td>{{ $kosans->Pemilik->nama }}</td>
                                <td>{{ $kosans->nama }}</td>
                                <td>{{ $kosans->alamat }}</td>
                                <td>{{ $kosans->gender }}</td>
                                <td>{{ $kosans->fasilitas }}</td>
                                <td>{{ $kosans->jmlh_kamar }}</td>
                                <td>{{ $kosans->status }}</td>
                                <td>{{ $kosans->harga }}</td>
                                <td>{{ $kosans->deskripsi }}</td>
                                <td>{{ $kosans->latitude }}</td>
                                <td>{{ $kosans->longitude }}</td>
                                <td>
                                    <a href="{{ route('kosans.show', $kosans->id) }}" class="btn btn-success btn-sm mb-2">Detail</a>
                                    <a href="{{ route('kosans.edit', $kosans->id) }}" class="btn btn-warning btn-sm mb-2">Edit</a>
                                    <form action="{{ route('kosans.destroy', $kosans->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mb-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
