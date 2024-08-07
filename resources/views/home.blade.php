@extends('adminlte::page')

@section('title', 'Map Kosan')

@section('content_header')
    <h1 class="m-0 text-dark">Semua Kosan</h1>
         {{-- css --}}
         <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
         integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
         crossorigin=""/>
         {{-- js --}}
         <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
         integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
         crossorigin=""></script>
         <style>
            #map {height: 500px;}
        </style>
@stop

@section('content')
<div id="map" style="height: 600px;"></div>
@stop

@push('js')
<script>
    var map = L.map('map').setView([-6.899011509193941, 107.6143129887648], 15); // Set the view to Bandung (Gedung Sate)

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    @foreach($kosans as $kosan)
        L.marker([{{ $kosan->latitude }}, {{ $kosan->longitude }}])
            .addTo(map)
            .bindPopup('{{ $kosan->nama }}');
    @endforeach

</script>
@endpush
