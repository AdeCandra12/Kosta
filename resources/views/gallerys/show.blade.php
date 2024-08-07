@extends('adminlte::page')

@section('title', 'Detail Gallery')

@section('content_header')
    <h1 class="m-0 text-dark">Detail Gallery</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="card-title" style="font-size: 2.5rem; color: #000000;">{{ $gallery->judul }}</h1>
        <br>
        <p class="card-text"><strong>Kosan:</strong> {{ $gallery->kosan->nama }}</p>
        <p class="card-text"><strong>Foto:</strong></p>
        <div>
            @if($gallery->foto)
                <img src="{{ asset('storage/' . $gallery->foto) }}" alt="Foto" class="img-fluid" style="max-width: 100%;">
            @else
                No Image
            @endif
        </div>
        <br>
        <a href="{{ route('gallerys') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@stop
