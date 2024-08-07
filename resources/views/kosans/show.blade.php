@extends('adminlte::page')

@section('title', 'Detail Kosan')

@section('content_header')
    <h1 class="m-0 text-dark">Detail Kosan</h1>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

@stop

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="card-title" style="font-size: 2.5rem; color: #000000;">{{ $kosan->nama }}</h1>
        <br>
        <p class="card-text"><img src="{{asset('storage/'.$kosan->image)}}" alt="" width="500px"></p>
    
        <p class="card-text"><strong>pemilik:</strong> {{ $kosan->pemilik->nama }}</p>
        <p class="card-text"><strong>Alamat:</strong> {{ $kosan->alamat }}</p>
        <p class="card-text"><strong>Gender:</strong> {{ $kosan->gender }}</p>
        <p class="card-text"><strong>Fasilitas:</strong> {{ $kosan->fasilitas }}</p>
        <p class="card-text"><strong>Jumlah Kamar:</strong> {{ $kosan->jmlh_kamar }}</p>
        <p class="card-text"><strong>status:</strong> {{ $kosan->status }}</p>
        <p class="card-text"><strong>Harga:</strong> {{ $kosan->harga }}</p>
        <p class="card-text"><strong>deskripsi:</strong> {{ $kosan->deskripsi }}</p>
        <p class="card-text"><strong>Latitude:</strong> {{ $kosan->latitude }}</p>
        <p class="card-text"><strong>Longitude:</strong> {{ $kosan->longitude }}</p>
        <div id="map" style="height: 400px; margin-bottom: 20px;"></div>
        <a href="{{ route('kosans.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@stop

@push('js')
<script>
    var map = L.map('map').setView([{{ $kosan->latitude }}, {{ $kosan->longitude }}], 15);

    var kosanIcon = L.icon({
        iconUrl: "{{ asset('assets/img/marker.png') }}",
        iconSize: [50, 50],
        iconAnchor: [25, 50],
        popupAnchor: [0, -50]
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $kosan->latitude }}, {{ $kosan->longitude }}], {icon: kosanIcon}).addTo(map)
        .bindPopup('{{ $kosan->nama }}')
        .openPopup();

</script>
@endpush
