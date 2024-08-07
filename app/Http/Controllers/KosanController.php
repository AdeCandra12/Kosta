<?php

namespace App\Http\Controllers;

use App\Models\Kosans;
use App\Models\Pemiliks;
use Illuminate\Http\Request;

class KosanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua data kosan
        $kosans = Kosans::all();
        return view('kosans.index', compact('kosans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemiliks = Pemiliks::all();
        return view('kosans.create', compact('pemiliks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'fasilitas' => 'required|string|max:255',
            'jmlh_kamar' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'pemilik_id' => 'required|exists:pemiliks,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Membuat instance baru dari model Kosan
        $kosans = new Kosans;
        $kosans->nama = $request->nama;
        $kosans->alamat = $request->alamat;
        $kosans->gender = $request->gender;
        $kosans->fasilitas = $request->fasilitas;
        $kosans->jmlh_kamar = $request->jmlh_kamar;
        $kosans->status = $request->status;
        $kosans->harga = $request->harga;
        $kosans->deskripsi = $request->deskripsi;
        $kosans->latitude = $request->latitude;
        $kosans->longitude = $request->longitude;
        $kosans->pemilik_id = $request->pemilik_id;

        // Menyimpan gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $kosans->image = $imagePath;
        }

        // Menyimpan data ke database
        $kosans->save();

        return redirect()->route('kosans.index')
            ->with('success', 'Kosan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kosan = Kosans::findOrFail($id);
        return view('kosans.show', compact('kosan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kosans = Kosans::findOrFail($id);
        $pemiliks = Pemiliks::all();
        return view('kosans.edit', compact('kosans', 'pemiliks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'fasilitas' => 'required|string|max:255',
            'jmlh_kamar' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'pemilik_id' => 'required|exists:pemiliks,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mengambil data kosan berdasarkan id
        $kosans = Kosans::findOrFail($id);
        $kosans->nama = $request->nama;
        $kosans->alamat = $request->alamat;
        $kosans->gender = $request->gender;
        $kosans->fasilitas = $request->fasilitas;
        $kosans->jmlh_kamar = $request->jmlh_kamar;
        $kosans->status = $request->status;
        $kosans->harga = $request->harga;
        $kosans->deskripsi = $request->deskripsi;
        $kosans->latitude = $request->latitude;
        $kosans->longitude = $request->longitude;
        $kosans->pemilik_id = $request->pemilik_id;

        // Menyimpan gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $kosans->image = $imagePath;
        }

        // Menyimpan perubahan ke database
        $kosans->save();

        return redirect()->route('kosans.index')
            ->with('success', 'Kosan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kosans = Kosans::findOrFail($id);
        $kosans->delete();

        return redirect()->route('kosans.index')
            ->with('success', 'Kosan berhasil dihapus');
    }

    public function detail($id)
    {
        $kosan = Kosans::with('gallerys')->findOrFail($id);
        // $gallerys = Gallerys::where('kosan_id', $id)->get();
        return view('detail', compact('kosan'));
    }
}
