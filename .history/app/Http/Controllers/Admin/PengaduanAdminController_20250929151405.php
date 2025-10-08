<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\PengaduanFollowup;
use Illuminate\Http\Request;

class PengaduanAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengaduan::query()->withCount('followups');

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

        // Filter followup: fu=has|none
        if ($request->filled('fu')) {
            if ($request->fu === 'has') {
                $query->whereHas('followups');
            } elseif ($request->fu === 'none') {
                $query->whereDoesntHave('followups');
            }
        }

        // Sorting: sort=latest|fu_desc|fu_asc
        $sort = $request->get('sort', 'latest');
        if ($sort === 'fu_desc') {
            $query->orderByDesc('followups_count')->orderByDesc('created_at');
        } elseif ($sort === 'fu_asc') {
            $query->orderBy('followups_count')->orderByDesc('created_at');
        } else {
            $query->orderByDesc('created_at');
        }

        $pengaduans = $query->paginate(20)->withQueryString();

        if ($request->ajax()) {
            $html = view('admin.pengaduan.partials.table', compact('pengaduans'))->render();
            return response()->json([
                'html' => $html,
                'total' => $pengaduans->total(),
            ]);
        }

        return view('admin.pengaduan.index', compact('pengaduans'));
    }

    public function show(int $id)
    {
        $p = Pengaduan::findOrFail($id);
        $followups = PengaduanFollowup::where('pengaduan_id', $id)->orderBy('created_at')->get();
        return view('admin.pengaduan.show', compact('p', 'followups'));
    }

    public function update(int $id, Request $request)
    {
        $p = Pengaduan::findOrFail($id);
        $data = $request->validate([
            'status' => 'required|in:Diterima,Dalam Proses,Selesai,Ditolak',
            'catatan_petugas' => 'nullable|string',
            'petugas_id' => 'nullable|integer|exists:users,id',
        ]);

        $p->fill([
            'status' => $data['status'],
            'catatan_petugas' => $data['catatan_petugas'] ?? null,
            'petugas' => optional(\App\Models\User::find($data['petugas_id'] ?? null))->nama_lengkap,
        ]);
        if ($data['status'] === 'Selesai' && !$p->tanggal_selesai) {
            $p->tanggal_selesai = now();
        }
        $p->save();

        // Add followup entry
        PengaduanFollowup::create([
            'pengaduan_id' => $p->id,
            'status' => $data['status'],
            'catatan' => $data['catatan_petugas'] ?? null,
            'petugas_id' => $data['petugas_id'] ?? null,
        ]);

        return redirect()->route('admin.pengaduan.show', $p->id)->with('success', 'Pengaduan diperbarui');
    }
}


