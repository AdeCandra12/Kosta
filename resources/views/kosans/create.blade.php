@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Data Kosan</h1>
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
<form action="{{route('kosans.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="overflow: auto">
                    <table style="width: 100%">
                        
                        <tr>
                            <td><label for="pemilik_id">Pilih Pemilik</label></td>
                            <td>
                                <select name="pemilik_id" id="pemilik_id" class="form-control full-width" required>
                                    <option value="">-- Pilih Pemilik --</option>
                                    @foreach($pemiliks as $pemilik)
                                        <option value="{{ $pemilik->id }}">{{ $pemilik->nama }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>

                        <tr>
                            <td><label for="labelNama">Nama Kosan</label></td>
                            <td><input type="text" size="70" id="nama" placeholder="Nama Kosan" name="nama" class="form-control full-width"></td>
                        <tr>
                            <td><label for="labelAlamat">Alamat</label></td>
                            <td><input type="text" size="70" id="alamat" placeholder="Alamat" name="alamat" class="form-control full-width"></td>
                        </tr>
                        <tr>
                            <td><label for="InputGender">Gender</label></td>
                            <td>
                                    <select name="gender" id="InputGender" class="form-control full-width" required>
                                        <option value="">-- Pilih Gender --</option>
                                        <option value="pria">khusus pria</option>
                                        <option value="perempuan">khusus perempuan</option>
                                        <option value="campur">campur</option>
                                    </select>                    
                            </td>
                        </tr>
                        <tr>
                            <td><label for="labelFasilitas">Fasilitas kamar</label></td>
                            <td><textarea name="fasilitas" id="fasilitas" cols="70" rows="10" class="form-control full-width"></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="labelJumlahKamar">Jumlah Kamar</label></td>
                            <td><input type="number" size="70" id="jumlah_kamar" placeholder="Jumlah Kamar" name="jmlh_kamar" class="form-control full-width"></td>
                        </tr>
                        <tr>
                            <td><label for="InputStatus">Status</label></td>
                            <td>
                                <select name="status" id="InputStatus" class="form-control full-width" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="tersedia">tersedia</option>
                                    <option value="penuh">penuh</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="labelHarga">Harga</label></td>
                            <td><input type="number" size="70" id="harga" placeholder="Harga" name="harga" class="form-control full-width"></td> 
                        </tr>
                        <tr>
                            <td><label for="labelDeskripsi">Deskripsi</label></td>
                            <td><textarea name="deskripsi" id="deskripsi" cols="70" rows="10" placeholder="Deskripsi" class="form-control full-width"></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="labelLatitude">Latitude</label></td>
                            <td><input type="text" size="70" id="latitude" placeholder="Latitude" name="latitude" class="form-control full-width"></td>
                        </tr>
                        <tr>
                            <td><label for="labelLongitude">Longitude</label></td>
                            <td><input type="text" size="70" id="longitude" placeholder="Longitude" name="longitude" class="form-control full-width"></td>
                        </tr>
                        <tr>
                            <td><label for="labelFoto">Foto</label></td>
                            <td><input type="file" name="image" id="image"></td>
                    </table>
                    <br>
                    <div id="map" class="mt-2"></div>
                    <br>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                    <a href="{{route('kosans.index')}}" class="btn btn-default mt-2">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>
@stop

@push('js')
<script>
    var map = L.map('map').setView([-6.8931149, 107.6090784], 15);

    L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3'] 
    }).addTo(map);


    // Define a click event handler
    var marker;
    function onMapClick(e) {
    // alert("Latitude: " + e.latlng.lat + "\nLongitude: " + e.latlng.lng);
    document.getElementById('latitude').value = e.latlng.lat;
    document.getElementById('longitude').value = e.latlng.lng;

    if (marker) {
        map.removeLayer(marker);
    }

    marker = L.marker(e.latlng).addTo(map)
        .bindPopup("Koordinat: " + e.latlng.toString())
        .openPopup();

    marker.on('click', function(e) {
        map.removeLayer(marker);
        document.getElementById('latitude').value = null;
        document.getElementById('longitude').value = null;
    });
}

// Add a click event listener to the map
map.on('click', onMapClick);

</script>        

@endpush
