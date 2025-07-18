<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengunjung;
use App\Models\Poli;
use App\Models\User;
use App\Models\Pelayanan;
use App\Models\Artikel;
use App\Models\Dokter;
use App\Models\Informasi;
use Carbon\Carbon;

class PengunjungController extends Controller
{
public function index()
{
    $hari = Carbon::today();
    $besok = Carbon::tomorrow();
    
    $pengunjung = Pengunjung::whereDate('tgl_kunjung', $hari)->count();
    $pengunjungbesok = Pengunjung::whereDate('tgl_kunjung', $besok)->count();
    $semuapengunjung = Pengunjung::count();

    $artikels = Artikel::all();
    $dokters = Dokter::all();
    $pelayanans = Pelayanan::all();
    $informasi = Informasi::first();

    return view('pengunjung.index', [
        "title" => "Beranda",
        "pengunjung" => $pengunjung,
        "pengunjungbesok" => $pengunjungbesok,
        "semuapengunjung" => $semuapengunjung,
        "artikels" => $artikels,
        "pelayanans" => $pelayanans,
        "informasi" => $informasi,
        "dokters" => $dokters
    ]);
}


    public function create()
    {
        $polis = Poli::all();
        return view('pengunjung.pendaftaran', [
            "title" => "Pendaftaran Pasien",
            "polis" => $polis
        ]);
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
        $pelayanans = Pelayanan::all();
        return view('pengunjung.service', [
            "title" => "Layanan Kami",
            "pelayanans" => $pelayanans
        ]);
    }

    public function dokter()
    {
        $dokters = Dokter::all();
        return view('pengunjung.dokter', [
            'title' => 'Tenaga Medis',
            'dokters' => $dokters
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
        $artikels = Artikel::all();
        return view('pengunjung.about', [
            'title' => 'Tentang Kami',
            'artikels' => $artikels
        ]);
    }

    public function tampilkanArtikel()
    {
        $artikels = Artikel::all();

        return view('pengunjung.index', [
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

    public function tampilkanDokter()
    {
        $dokters = Dokter::all();

        return view('pengunjung.dokter', [
            "title" => "Dokter Kesehatan",
            "dokters" => $dokters
        ]);
    }

    public function detailDokter($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokterTerbaru = Dokter::where('id', '!=', $id)
            ->latest()
            ->take(3)
            ->get();
        return view('dokters.index', [
            "title" => $dokter->nama,
            "dokter" => $dokter,
            "dokterTerbaru" => $dokterTerbaru
        ]);
    }
}
