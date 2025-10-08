<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengaduan::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('asal')) {
            $query->where('asal_pelapor', $request->asal);
        }
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function($sub) use ($q) {
                $sub->where('judul', 'like', "%$q%")
                    ->orWhere('nomor_tracking', 'like', "%$q%")
                    ->orWhere('deskripsi', 'like', "%$q%");
            });
        }

        $pengaduans = $query->orderByDesc('created_at')->paginate(20)->withQueryString();

        return view('admin.pengaduan.index', compact('pengaduans'));
    }

    public function show(int $id)
    {
        $p = Pengaduan::findOrFail($id);
        return view('admin.pengaduan.show', compact('p'));
    }

    public function update(int $id, Request $request)
    {
        $p = Pengaduan::findOrFail($id);
        $data = $request->validate([
            'status' => 'required|in:Diterima,Dalam Proses,Selesai,Ditolak',
            'catatan_petugas' => 'nullable|string',
            'petugas' => 'nullable|string|max:255',
        ]);

        $p->fill($data);
        if ($data['status'] === 'Selesai' && !$p->tanggal_selesai) {
            $p->tanggal_selesai = now();
        }
        $p->save();

        return redirect()->route('admin.pengaduan.show', $p->id)->with('success', 'Pengaduan diperbarui');
    }
}


