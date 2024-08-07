<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallerys;
use App\Models\Kosans;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gallerys.index', [
            'gallerys' => Gallerys::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kosans = Kosans::all();
        return view('gallerys.create', compact('kosans'));
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
            'kosan_id' => 'required|exists:kosans,id',
            'judul' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Membuat instance baru dari model Gallery
        $gallery = new Gallerys;
        $gallery->kosan_id = $request->kosan_id;
        $gallery->judul = $request->judul;

        if ($request->hasFile('foto')) {
            $imagepath = $request->file('foto')->store('gallery', 'public');
            $gallery->foto = $imagepath;
        }
        $gallery->save();

        return redirect()->route('gallerys')->with('success', 'Gallery berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = gallerys::findOrFail($id);
        return view('gallerys.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallerys = Gallerys::findOrFail($id);
        $kosans = Kosans::all();
        return view('gallerys.edit', compact('gallerys', 'kosans'));
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
            'kosan_id' => 'required|exists:kosans,id',
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mengambil data gallery berdasarkan id
        $gallerys = Gallerys::findOrFail($id);
        $gallerys->kosan_id = $request->kosan_id;
        $gallerys->judul = $request->judul;

        if ($request->hasFile('foto')) {
            $imagepath = $request->file('foto')->store('gallery', 'public');
            $gallerys->foto = $imagepath;
        }
        $gallerys->save();

        return redirect()->route('gallerys')->with('success', 'Gallery berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallerys = Gallerys::findOrFail($id);
        $gallerys->delete();

        return redirect()->route('gallerys')
            ->with('success', 'Gallery berhasil dihapus');
    }
}
