<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengunjung;
use App\Models\Poli;
use App\Models\User;
use App\Models\Pelayanan;
use App\Models\Artikel;
use Carbon\Carbon;

class PengunjungController extends Controller
{
    public function index()
    {
        $hari = Carbon::today();
        $besok = Carbon::today()->addDay();
        $pengunjung = Pengunjung::whereDate('tgl_kunjung', $hari)->count();
        $pengunjungbesok = Pengunjung::whereDate('tgl_kunjung', $besok)->count();
        $semuapengunjung = Pengunjung::count();
        $artikels = Artikel::latest()->take(3)->get();
        $pelayanans = Pelayanan::latest()->take(6)->get(); 

        return view('pengunjung.index', [
            "title" => "Beranda"
        ], compact('pengunjung', 'pengunjungbesok', 'semuapengunjung', 'artikels', 'pelayanans'));
    }

    public function create()
    {
        $polis = Poli::all();
        return view('pengunjung.pendaftaran', [
            "title" => "Pendaftaran Pasien"
        ], compact('polis'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|digits:16|unique:pengunjungs|numeric',
            'nama' => 'required|string|max:255',
            'telepon' => 'required|numeric',
            'alamat' => 'required|string',
            'tgl_kunjung' => 'required|date|after_or_equal:today',
            'poli_id' => 'required|exists:polis,id',
        ], [
            'tgl_kunjung.after_or_equal' => 'Tanggal kunjungan tidak boleh sebelum hari ini',
            'nik.unique' => 'NIK sudah terdaftar',
            'poli_id.exists' => 'Poli yang dipilih tidak valid'
        ]);

        Pengunjung::create($validatedData);

        return redirect()->route('pengunjung.create')
            ->with('success', 'Pendaftaran Berhasil!');
    }


    public function service()
    {
        $pelayanans = Pelayanan::latest()->get();
        return view('pengunjung.service', [
            "title" => "Layanan Kami",
            "pelayanans" => $pelayanans
        ]);
    }

    public function dokter()
    {
        $dokters = User::where('role', 'dokter')->get();
        return view('pengunjung.dokter', [
            "title" => "Tenaga Medis Kami",
            "dokters" => $dokters
        ]);
    }

    public function contact()
    {
        return view('pengunjung.contact', [
            "title" => "Hubungi Kami"
        ]);
    }

    public function about()
    {
        return view('pengunjung.about', ["title" => "Tentang Kami"]);
    }

    public function tampilkanArtikel()
    {
        $artikels = Artikel::latest()->paginate(6);

        return view('pengunjung.artikel.index', [
            "title" => "Artikel Kesehatan",
            "artikels" => $artikels
        ]);
    }


    public function detailArtikel($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikelTerbaru = Artikel::where('id', '!=', $id)
            ->latest()
            ->take(3)
            ->get();

        return view('pengunjung.artikel.index', [
            "title" => $artikel->judul,
            "artikel" => $artikel,
            "artikelTerbaru" => $artikelTerbaru
        ]);
    }

}