@extends('adminlte::page')

@section('title', 'Read Data Pemilik')

@section('content_header')
    <h1 class="m-0 text-dark"></h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('pemiliks.create') }}" class="btn btn-primary mb-2">Tambah</a>
                @if (session('succes_message'))
                    <div class="alert alert-success">
                        {{ session('succes_message') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Email</th>
                                <th>Aksi</th> <!-- Kolom Aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pemiliks as $key => $pemiliks)
                            <tr>
                                <td>{{ $pemiliks->nama }}</td>
                                <td>{{ $pemiliks->alamat }}</td>
                                <td>{{ $pemiliks->no_hp }}</td>
                                <td>{{ $pemiliks->email }}</td>
                                <td>
                                    <a href="{{ route('pemiliks.show', $pemiliks->id) }}" class="btn btn-success btn-sm mb-2">Detail</a>
                                    <a href="{{ route('pemiliks.edit', $pemiliks->id) }}" class="btn btn-warning btn-sm mb-2">Edit</a>
                                    <form action="{{ route('pemiliks.destroy', $pemiliks->id) }}" method="POST" style="display: inline;">
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


