@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Kosan</h1>
    {{-- css --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin="" />
    {{-- js --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
    <style>
        #map {
            height: 500px;
        }
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('kosans.update', $kosans->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body" style="overflow: auto">
                            <table style="width: 100%">
                                <tr>
                                    <td><label for="pemilik_id">Pilih Pemilik</label></td>
                                    <td>
                                        <select name="pemilik_id" id="pemilik_id" class="form-control full-width" required>
                                            <option value="">-- Pilih Pemilik --</option>
                                            @foreach($pemiliks as $pemilik)
                                                <option value="{{ $pemilik->id }}" {{ $kosans->pemilik_id == $pemilik->id ? 'selected' : '' }}>{{ $pemilik->nama }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Nama Kosan</label></td>
                                    <td><input type="text" size="70" name="nama" value="{{ $kosans->nama }}" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label>Alamat</label></td>
                                    <td><input type="text" size="70" name="alamat" value="{{ $kosans->alamat }}" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label for="InputGender">Gender</label></td>
                                    <td>
                                        <select name="gender" id="InputGender" class="form-control full-width" required>
                                            <option value="">-- Pilih Gender --</option>
                                            <option value="pria" {{ $kosans->gender == 'khusus pria' ? 'selected' : '' }}>Pria</option>
                                            <option value="perempuan" {{ $kosans->gender == 'khusus perempuan' ? 'selected' : '' }}>Perempuan</option>
                                            <option value="campur" {{ $kosans->gender == 'campur' ? 'selected' : '' }}>Campur</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Fasilitas</label></td>
                                    <td><input type="text" size="70" name="fasilitas" value="{{ $kosans->fasilitas }}" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label>Jumlah Kamar</label></td>
                                    <td><input type="number" size="70" name="jmlh_kamar" value="{{ $kosans->jmlh_kamar }}" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label for="InputStatus">Status</label></td>
                                    <td>
                                        <select name="status" id="InputStatus" class="form-control full-width" required>
                                            <option value="">-- Pilih Status --</option>
                                            <option value="tersedia" {{ $kosans->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                            <option value="penuh" {{ $kosans->status == 'penuh' ? 'selected' : '' }}>Penuh</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Harga</label></td>
                                    <td><input type="number" size="70" name="harga" value="{{ $kosans->harga }}" class="form-control"></td>
                                <tr>
                                    <td><label>Deskripsi</label></td>
                                    <td><textarea name="deskripsi" id="deskripsi" cols="70" rows="10" class="form-control">{{ $kosans->deskripsi }}</textarea></td>
                                <tr>
                                    <td><label>Latitude</label></td>
                                    <td><input id="latitude" size="70" type="text" name="latitude" value="{{ $kosans->latitude }}" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label>Longitude</label></td>
                                    <td><input id="longitude" size="70" type="text" name="longitude" value="{{ $kosans->longitude }}" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label for="image" class="form-label">Foto Kosan</label></td>
                                    <td> <input class="form-control mb-3" type="file" id="image" name="image" onchange="previewImage(event)"></td>
                                    <img id="image-preview" class="img-fluid" style="display: none;">
                                    @if($kosans->image)
                                        <img src="{{ asset('storage/' . $kosans->image) }}" alt="image" class="img-fluid" id="existing-image">
                                    @else
                                        No Image
                                    @endif
                                </tr>
                            </table>
                        </div>
                        <br>
                        <div id="map" class="mt-2"></div>
                        <br>
                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                        <a href="{{route('kosans.index')}}" class="btn btn-default mt-2">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script>
        var map = L.map('map').setView([{{ $kosans->latitude }}, {{ $kosans->longitude }}], 15);

        var kosanIcon = L.icon({
            iconUrl: "{{ asset('assets/img/marker.png') }}",
            iconSize: [50, 50],
            iconAnchor: [25, 50],
            popupAnchor: [0, -50]
        });

        L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        // create marker from id
        var marker = L.marker([{{ $kosans->latitude }}, {{ $kosans->longitude }}], {icon: kosanIcon}).addTo(map);

        function onMapClick(e) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = new L.marker(e.latlng, {icon: kosanIcon}).addTo(map);
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
        }

        map.on('click', onMapClick);

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var preview = document.getElementById('image-preview');
                var existingImage = document.getElementById('existing-image');
                if (existingImage) {
                    existingImage.style.display = 'none';
                }
                preview.src = reader.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
