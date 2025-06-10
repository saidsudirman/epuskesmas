<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $datas = Informasi::latest()->get(); // Tambahkan latest() untuk urutan terbaru
        $title = 'Informasi';
        return view('pages.informasi.index', compact('datas', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Informasi'; // Judul lebih deskriptif
        return view('pages.informasi.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jam_operasional' => 'required|string|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'layanan' => 'required|string',
            'pengumuman' => 'nullable|string',
        ]);

        // Simpan data sekaligus
        Informasi::create($validatedData);

        return redirect()->route('informasi.index')
                        ->with('success', 'Informasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Informasi::findOrFail($id); // Konsistensi penamaan variabel
        $title = 'Edit Informasi';
        return view('pages.informasi.edit', compact('data', 'title'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'jam_operasional' => 'required|string|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'layanan' => 'required|string',
            'pengumuman' => 'nullable|string',
        ]);

        $informasi = Informasi::findOrFail($id);
        $informasi->update($validatedData);

        return redirect()->route('informasi.index')
                        ->with('success', 'Informasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();

        return redirect()->route('informasi.index')
                        ->with('success', 'Informasi berhasil dihapus');
    }
}