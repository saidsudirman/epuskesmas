<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $datas = Artikel::all();
        $title = 'Daftar Artikel';
        return view('pages.artikel.index', compact('datas', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Artikel';
        return view('pages.artikel.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'gambar' => 'nullable|image',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'penulis' => 'Puskesmas Kalosi',
            'gambar' => null,
        ];

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = date('Ymd_His') . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('upload/artikel'), $filename);
            $data['gambar'] = 'upload/artikel/' . $filename;
        }

        Artikel::create($data);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Artikel::findOrFail($id);
        $title = 'Edit Artikel';
        return view('pages.artikel.edit', compact('data', 'title'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'judul'          => 'required|string|max:255',
            'isi'            => 'required',
            'penulis'        => 'nullable|string|max:100',
            'tanggal_terbit' => 'nullable|date',
            'gambar'         => 'nullable|image',
        ]);

        $data = $request->only('judul', 'isi', 'penulis', 'tanggal_terbit');

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar && file_exists(public_path($artikel->gambar))) {
                unlink(public_path($artikel->gambar));
            }

            $gambar = $request->file('gambar');
            $filename = date('Ymd_His') . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('upload/artikel'), $filename);
            $data['gambar'] = 'upload/artikel/' . $filename;
        }

        $artikel->update($data);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->gambar && file_exists(public_path($artikel->gambar))) {
            unlink(public_path($artikel->gambar));
        }

        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
