@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Data Gallery</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('gallerys.create') }}" class="btn btn-primary mb-2">Tambah</a>
                @if (session('success_message'))
                    <div class="alert alert-success">
                        {{ session('success_message') }}
                    </div>
                @endif
                <table class="table table-hover table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama Kosan</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gallerys as $gallery)
                            <tr>
                                <td><img src="{{ asset('storage/'.$gallery->foto) }}" alt="" style="width: 100px"></td>
                                <td>{{ $gallery->kosan->nama }}</td>
                                <td>{{ $gallery->judul }}</td>
                                <td>
                                    <a href="{{ route('gallerys.show', $gallery->id) }}" class="btn btn-success mb-2">Detail</a>
                                    <a href="{{ route('gallerys.edit', $gallery->id) }}" class="btn btn-warning mb-2">Edit</a>
                                    <form action="{{ route('gallerys.destroy', $gallery->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Are you sure?')">Delete</button>
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
@stop

@push('js')
    <script>
        $(function () {
            $('#table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@endpush
