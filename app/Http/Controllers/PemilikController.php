<?php

namespace App\Http\Controllers;

use App\Models\Pemiliks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua data pemilik
        $pemiliks = Pemiliks::all();
        return view('pemiliks.index', compact('pemiliks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemiliks.create');
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
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:pemiliks,email',
        ]);

        // Membuat instance baru dari model Pemilik
        $pemiliks = new Pemiliks;
        $pemiliks->nama = $request->nama;
        $pemiliks->alamat = $request->alamat;
        $pemiliks->no_hp = $request->no_hp;
        $pemiliks->email = $request->email;

        // Menyimpan data ke database
        $pemiliks->save();

        return redirect()->route('pemiliks.index')
            ->with('success', 'Pemilik berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemilik = Pemiliks::findOrFail($id);
        return view('pemiliks.show', compact('pemilik'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemilik = Pemiliks::findOrFail($id);
        return view('pemiliks.edit', compact('pemilik'));
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
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:pemiliks,email,' . $id,
        ]);

        // Mengambil data pemilik berdasarkan id
        $pemiliks = Pemiliks::findOrFail($id);
        $pemiliks->nama = $request->nama;
        $pemiliks->alamat = $request->alamat;
        $pemiliks->no_hp = $request->no_hp;
        $pemiliks->email = $request->email;

        // Menyimpan perubahan ke database
        $pemiliks->save();

        return redirect()->route('pemiliks.index')
            ->with('success', 'Pemilik berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemiliks = Pemiliks::findOrFail($id);
        $pemiliks->delete();

        return redirect()->route('pemiliks.index')
            ->with('success', 'Pemilik berhasil dihapus');
    }
}
