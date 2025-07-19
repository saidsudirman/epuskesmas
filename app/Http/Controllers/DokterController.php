<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::latest()->get();
        $title = 'Dokter';

        return view('pages.dokter.index', compact('dokters', 'title'));
    }


    public function create()
    {
        $title = 'Tambah Dokter';
        return view('pages.dokter.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'nip'       => 'required|unique:dokters,nip',
            'email'     => 'required|email|unique:dokters,email',
            'whatsapp'  => 'nullable|string|max:20',
            'spesialis' => 'required|string|max:100',
            'jam_kerja' => 'required|string|max:100',
            'foto'      => 'nullable|image|',
        ]);

        try {
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $filename = $this->generateFilename($foto);
                $foto->move(public_path('upload/dokter'), $filename);
                $validated['foto'] = 'upload/dokter/' . $filename;
            }

            Dokter::create($validated);
            
            return redirect()->route('dokter.index')
                ->with('success', 'Dokter berhasil ditambahkan');
                
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Gagal menambahkan dokter: '.$e->getMessage());
        }
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        $title = 'Edit Dokter';
        return view('pages.dokter.edit', compact('dokter', 'title'));
    }

    public function update(Request $request, $id)
    {
        $dokter = Dokter::findOrFail($id);

        $request->validate([
            'nama'      => 'required|string|max:255',
            'nip'       => 'required|unique:dokters,nip,' . $id,
            'email'     => 'required|email|unique:dokters,email,' . $id,
            'whatsapp'  => 'nullable|string|max:20',
            'spesialis' => 'required|string|max:100',
            'jam_kerja' => 'required|string|max:100',
            'foto'      => 'nullable|image',
        ]);

        $data = $request->only('nama', 'nip', 'email', 'whatsapp', 'spesialis', 'jam_kerja');

        if ($request->hasFile('foto')) {
            if ($dokter->foto && file_exists(public_path($dokter->foto))) {
                unlink(public_path($dokter->foto));
            }

            $foto = $request->file('foto');
            $filename = date('Ymd_His') . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('upload/dokter'), $filename);
            $data['foto'] = 'upload/dokter/' . $filename;
        }

        $dokter->update($data);

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dokter = dokter::findOrFail($id);

        if ($dokter->gambar && file_exists(public_path($dokter->gambar))) {
            unlink(public_path($dokter->gambar));
        }

        $dokter->delete();

        return redirect()->route('dokter.index')->with('success', 'dokter berhasil dihapus.');
    }


    public function show($id)
    {
        $dokter = Dokter::findOrFail($id);
        $title = 'Detail Dokter';
        return view('pages.dokter.detail', compact('dokter', 'title'));
    }

    /**
     * Generate unique filename for photo
     */
    private function generateFilename($file)
    {
        return date('Ymd_His') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    }

    /**
     * Delete old photo file if exists
     */
    private function deleteOldPhoto($photoPath)
    {
        if ($photoPath && file_exists(public_path($photoPath))) {
            unlink(public_path($photoPath));
        }
    }

        public function dokter()
    {
        $dokters = \App\Models\Dokter::latest()->get(); 
        $title = 'dokter';
        return view('pengunjung.index', compact('datas', 'title'));
    }

        public function tampilkanDokter()
    {
        $dokters = Dokter::all();
        $title = 'Dokter Kesehatan';
        
        return view('pengunjung.dokter', compact('dokters', 'title'));
    }

    public function chat()
    {
        return view('dokter.chat', [
            'chats' => ChatMessage::where('dokter_id', auth()->id())->get()
        ]);
    }
    
}