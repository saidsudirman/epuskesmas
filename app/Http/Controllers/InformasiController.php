<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informasi;

class InformasiController extends Controller
{
    public function index(Request $request)
    {
        // Fitur Search
        $query = Informasi::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('jam_operasional', 'like', "%$search%")
                ->orWhere('visi', 'like', "%$search%")
                ->orWhere('misi', 'like', "%$search%")
                ->orWhere('layanan', 'like', "%$search%")
                ->orWhere('pengumuman', 'like', "%$search%");
        }

        $informasi = $query->latest()->paginate(10);
        $title = 'Daftar Informasi'; 
        return view('pages.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('pages.admin.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jam_operasional' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'layanan' => 'required',
            'pengumuman' => 'required',
        ]);

        Informasi::create($request->all());
        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        $title = 'Edit Informasi'; 
        return view('pages.admin.informasi.edit', compact('informasi', 'title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jam_operasional' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'layanan' => 'required',
            'pengumuman' => 'required',
        ]);

        $informasi = Informasi::findOrFail($id);
        $informasi->update($request->all());
        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();
        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil dihapus.');
    }
}
