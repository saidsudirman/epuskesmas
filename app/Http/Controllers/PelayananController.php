<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelayanans = Pelayanan::latest()->get();
        $title = 'Manajemen Pelayanan';
        
        if(request()->is('admin*')) {
            return view('pages.pelayanan.index', compact('pelayanans', 'title'));
        }
        
        return view('pengunjung.index', compact('pelayanans', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Pelayanan Baru';
        return view('pages.pelayanan.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_layanan' => 'required|string|max:255|unique:pelayanan,nama_layanan',
            'waktu_layanan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ], [
            'nama_layanan.required' => 'Nama layanan wajib diisi',
            'waktu_layanan.unique' => 'Nama layanan sudah ada',
            'deskripsi.required' => 'Waktu layanan wajib diisi',
        ]);

        try {
            Pelayanan::create($validatedData);
            
            return redirect()->route('pelayanan.index')
                ->with('success', 'Pelayanan berhasil ditambahkan');
            
        } catch (\Exception $e) {
            Log::error('Error in PelayananController@store: '.$e->getMessage());
            return back()
                ->withInput()
                ->with('error', 'Gagal menambahkan pelayanan. Silakan coba lagi.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data = Pelayanan::findOrFail($id);
            $title = 'Edit Pelayanan';
            
            return view('pages.pelayanan.edit', compact('data', 'title'));
            
        } catch (\Exception $e) {
            Log::error('Error in PelayananController@edit: '.$e->getMessage());
            return redirect()->route('pelayanan.index')
                ->with('error', 'Pelayanan tidak ditemukan');
        }
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
        $validatedData = $request->validate([
            'nama_layanan' => 'required|string|max:255|unique:pelayanan,nama_layanan,'.$id,
            'waktu_layanan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ], [
            'nama_layanan.required' => 'Nama layanan wajib diisi',
            'waktu_layanan.unique' => 'waktu layanan sudah ada',
            'deskripsi.required' => 'deskripsi wajib di isi',
        ]);

        try {
            $layanan = Pelayanan::findOrFail($id);
            $layanan->update($validatedData);

            return redirect()->route('pelayanan.index')
                ->with('success', 'Pelayanan berhasil diperbarui');
                
        } catch (\Exception $e) {
            Log::error('Error in PelayananController@update: '.$e->getMessage());
            return back()
                ->withInput()
                ->with('error', 'Gagal memperbarui pelayanan. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $layanan = Pelayanan::findOrFail($id);
            $layanan->delete();

            return redirect()->route('pelayanan.index')
                ->with('success', 'Pelayanan berhasil dihapus');
                
        } catch (\Exception $e) {
            Log::error('Error in PelayananController@destroy: '.$e->getMessage());
            return redirect()->route('pelayanan.index')
                ->with('error', 'Gagal menghapus pelayanan. Silakan coba lagi.');
        }
    }

    public function tampilkanLayanan()
    {
        $pelayanans = Pelayanan::all(); // Or use Pelayanan::latest()->get() for ordered results
        $pelayanans = Pelayanan::all(); // Or use Pelayanan::latest()->get() for ordered results
        $title = 'Layanan Kesehatan';
        
        return view('pengunjung.index', compact('pelayanans', 'title'));
    }
}