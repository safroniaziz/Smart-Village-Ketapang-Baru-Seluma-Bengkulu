<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PenerimaBantuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BantuanAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = PenerimaBantuan::with('user')->orderByDesc('created_at');

        // Filter by program
        if ($request->filled('program')) {
            $query->where('program', $request->program);
        }

        // Filter by year
        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search by name or program
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function($sub) use ($q) {
                $sub->where('program', 'like', "%$q%")
                    ->orWhere('keterangan', 'like', "%$q%")
                    ->orWhereHas('user', function($userQuery) use ($q) {
                        $userQuery->where('nama_lengkap', 'like', "%$q%")
                                  ->orWhere('nik', 'like', "%$q%");
                    });
            });
        }

        $bantuans = $query->paginate(20)->withQueryString();

        // Get distinct programs and years for filters
        $programs = PenerimaBantuan::distinct('program')->pluck('program')->sort();
        $years = PenerimaBantuan::distinct('tahun')->orderByDesc('tahun')->pluck('tahun');

        if ($request->ajax()) {
            $html = view('admin.bantuan.partials.table', compact('bantuans'))->render();
            return response()->json([
                'html' => $html,
                'total' => $bantuans->total(),
            ]);
        }

        return view('admin.bantuan.index', compact('bantuans', 'programs', 'years'));
    }

    public function create()
    {
        $wargas = User::whereNotNull('nik')->orderBy('nama_lengkap')->get();
        return view('admin.bantuan.create', compact('wargas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'program' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2020|max:' . (date('Y') + 5),
            'nominal' => 'nullable|numeric|min:0',
            'status' => 'required|in:Aktif,Tidak Aktif,Selesai',
            'keterangan' => 'nullable|string|max:500',
        ]);

        // Check if user already has this program in this year
        $exists = PenerimaBantuan::where('user_id', $request->user_id)
                                ->where('program', $request->program)
                                ->where('tahun', $request->tahun)
                                ->exists();

        if ($exists) {
            return back()->withErrors(['user_id' => 'Warga sudah terdaftar dalam program ini pada tahun yang sama.'])->withInput();
        }

        PenerimaBantuan::create($request->all());

        return redirect()->route('admin.bantuan.index')->with('success', 'Data bantuan berhasil ditambahkan!');
    }

    public function edit(PenerimaBantuan $bantuan)
    {
        $wargas = User::where('role', 'warga')->orderBy('nama_lengkap')->get();
        return view('admin.bantuan.edit', compact('bantuan', 'wargas'));
    }

    public function update(Request $request, PenerimaBantuan $bantuan)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'program' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2020|max:' . (date('Y') + 5),
            'nominal' => 'nullable|numeric|min:0',
            'status' => 'required|in:Aktif,Tidak Aktif,Selesai',
            'keterangan' => 'nullable|string|max:500',
        ]);

        // Check if user already has this program in this year (excluding current record)
        $exists = PenerimaBantuan::where('user_id', $request->user_id)
                                ->where('program', $request->program)
                                ->where('tahun', $request->tahun)
                                ->where('id', '!=', $bantuan->id)
                                ->exists();

        if ($exists) {
            return back()->withErrors(['user_id' => 'Warga sudah terdaftar dalam program ini pada tahun yang sama.'])->withInput();
        }

        $bantuan->update($request->all());

        return redirect()->route('admin.bantuan.index')->with('success', 'Data bantuan berhasil diperbarui!');
    }

    public function destroy(PenerimaBantuan $bantuan)
    {
        $bantuan->delete();
        return redirect()->route('admin.bantuan.index')->with('success', 'Data bantuan berhasil dihapus!');
    }

    public function bulkCreate()
    {
        $wargas = User::where('role', 'warga')->orderBy('nama_lengkap')->get();
        return view('admin.bantuan.bulk-create', compact('wargas'));
    }

    public function bulkStore(Request $request)
    {
        $request->validate([
            'program' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2020|max:' . (date('Y') + 5),
            'nominal' => 'nullable|numeric|min:0',
            'status' => 'required|in:Aktif,Tidak Aktif,Selesai',
            'keterangan' => 'nullable|string|max:500',
            'user_ids' => 'required|array|min:1',
            'user_ids.*' => 'exists:users,id',
        ]);

        $created = 0;
        $skipped = 0;

        foreach ($request->user_ids as $userId) {
            // Check if user already has this program in this year
            $exists = PenerimaBantuan::where('user_id', $userId)
                                    ->where('program', $request->program)
                                    ->where('tahun', $request->tahun)
                                    ->exists();

            if (!$exists) {
                PenerimaBantuan::create([
                    'user_id' => $userId,
                    'program' => $request->program,
                    'tahun' => $request->tahun,
                    'nominal' => $request->nominal,
                    'status' => $request->status,
                    'keterangan' => $request->keterangan,
                ]);
                $created++;
            } else {
                $skipped++;
            }
        }

        $message = "Berhasil menambahkan {$created} data bantuan.";
        if ($skipped > 0) {
            $message .= " {$skipped} data dilewati karena sudah ada.";
        }

        return redirect()->route('admin.bantuan.index')->with('success', $message);
    }
}
