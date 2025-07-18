<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Dokter;
use App\Models\Informasi;
use App\Models\Pelayanan;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikelCount = Artikel::count();
        $informasiCount = Informasi::count();
        $pelayananCount = Pelayanan::count();
        $userCount = User::count();
        $dokterCount = Dokter::count();
        $title = 'DASHBOARD';
        return view('pages.dashboard.index', compact('artikelCount', 'informasiCount', 'pelayananCount', 'userCount', 'dokterCount', 'title')); 

    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Implement your store logic here

        return response()->json(['message' => 'Not implemented'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // You can customize this response as needed
        return response()->json(['message' => 'Not implemented'], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
