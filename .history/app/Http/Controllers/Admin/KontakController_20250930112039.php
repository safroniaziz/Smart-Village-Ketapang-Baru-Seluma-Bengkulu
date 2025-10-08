<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontak = Kontak::orderBy('created_at', 'desc')->get();
        return view('admin.kontak.index', compact('kontak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kontak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_desa' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kode_pos' => 'nullable|string|max:10',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'kepala_desa' => 'nullable|string|max:255',
            'sekretaris_desa' => 'nullable|string|max:255',
            'bendahara_desa' => 'nullable|string|max:255',
            'latitude' => 'nullable|string|max:20',
            'longitude' => 'nullable|string|max:20',
            'deskripsi' => 'nullable|string',
            'aktif' => 'boolean',
        ]);

        $kontak = new Kontak();
        $kontak->nama_desa = $request->nama_desa;
        $kontak->alamat = $request->alamat;
        $kontak->kode_pos = $request->kode_pos;
        $kontak->telepon = $request->telepon;
        $kontak->email = $request->email;
        $kontak->website = $request->website;
        $kontak->kepala_desa = $request->kepala_desa;
        $kontak->sekretaris_desa = $request->sekretaris_desa;
        $kontak->bendahara_desa = $request->bendahara_desa;
        $kontak->jam_operasional = $request->jam_operasional;
        $kontak->latitude = $request->latitude;
        $kontak->longitude = $request->longitude;
        $kontak->deskripsi = $request->deskripsi;
        $kontak->aktif = $request->has('aktif');
        $kontak->save();

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Kontak desa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('admin.kontak.show', compact('kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('admin.kontak.edit', compact('kontak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kontak = Kontak::findOrFail($id);
        
        $request->validate([
            'nama_desa' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kode_pos' => 'nullable|string|max:10',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'kepala_desa' => 'nullable|string|max:255',
            'sekretaris_desa' => 'nullable|string|max:255',
            'bendahara_desa' => 'nullable|string|max:255',
            'latitude' => 'nullable|string|max:20',
            'longitude' => 'nullable|string|max:20',
            'deskripsi' => 'nullable|string',
            'aktif' => 'boolean',
        ]);

        $kontak->nama_desa = $request->nama_desa;
        $kontak->alamat = $request->alamat;
        $kontak->kode_pos = $request->kode_pos;
        $kontak->telepon = $request->telepon;
        $kontak->email = $request->email;
        $kontak->website = $request->website;
        $kontak->kepala_desa = $request->kepala_desa;
        $kontak->sekretaris_desa = $request->sekretaris_desa;
        $kontak->bendahara_desa = $request->bendahara_desa;
        $kontak->jam_operasional = $request->jam_operasional;
        $kontak->latitude = $request->latitude;
        $kontak->longitude = $request->longitude;
        $kontak->deskripsi = $request->deskripsi;
        $kontak->aktif = $request->has('aktif');
        $kontak->save();

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Kontak desa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Kontak desa berhasil dihapus!');
    }
}