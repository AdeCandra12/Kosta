@extends('adminlte::page')

@section('title', 'Detail Pemilik')

@section('content_header')
    

@section('content')
<h1 class="m-0 text-dark ">Detail Pemilik</h1>
<div class="card">
    <div class="card-body">
        <h1 class="card-title" style="font-size: 2.5rem; color: #000000;">{{ $pemilik->nama }}</h1>
        <br>
        <p class="card-text"><strong>Alamat:</strong> {{ $pemilik->alamat }}</p>
        <p class="card-text"><strong>Nomor Telepon:</strong> {{ $pemilik->no_hp }}</p>
        <p class="card-text"><strong>Email:</strong> {{ $pemilik->email }}</p>
        <a href="{{ route('pemiliks.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@stop