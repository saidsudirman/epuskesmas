<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Post::all();
        $title = 'Daftar Artikel'; 
        return view('pages.artikel.index', compact('artikels, title'));
    }

    public function create()
    {
        return view('pages.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'          => 'required|string|max:255',
            'isi'            => 'required',
            'penulis'        => 'nullable|string|max:100',
            'tanggal_terbit' => 'nullable|date',
            'gambar'         => 'nullable|image',
        ]);

        $data = $request->only('judul', 'isi', 'penulis', 'tanggal_terbit');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        Artikel::create($data);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $title = 'Edit Artikel'; 
        return view('pages.admin.artikel.edit', compact('artikel', 'title'));
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
            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update($data);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        if ($artikel->gambar) {
            Storage::disk('public')->delete($artikel->gambar);
        }
        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
