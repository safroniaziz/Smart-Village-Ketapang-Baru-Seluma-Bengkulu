<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratController extends Controller
{
    public function index()
    {
        $surat = Surat::with('pemohon')->latest()->paginate(10);
        return view('surat.index', compact('surat'));
    }

    public function create()
    {
        $jenisSurat = [
            'surat_pengantar' => 'Surat Pengantar',
            'surat_keterangan' => 'Surat Keterangan',
            'surat_rekomendasi' => 'Surat Rekomendasi',
            'surat_izin' => 'Surat Izin',
            'surat_pernyataan' => 'Surat Pernyataan'
        ];

        $warga = Warga::where('status_aktif', true)->get();

        return view('surat.create', compact('jenisSurat', 'warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required|string',
            'nik_pemohon' => 'required|string',
            'keperluan' => 'required|string',
            'tanggal_surat' => 'required|date'
        ]);

        DB::beginTransaction();
        try {
            $warga = Warga::where('nik', $request->nik_pemohon)->firstOrFail();

            $nomorSurat = $this->generateNomorSurat($request->jenis_surat);

            $surat = Surat::create([
                'nomor_surat' => $nomorSurat,
                'jenis_surat' => $request->jenis_surat,
                'tanggal_surat' => $request->tanggal_surat,
                'data_pemohon' => [
                    'nik' => $warga->nik,
                    'nama' => $warga->nama_lengkap,
                    'tempat_lahir' => $warga->tempat_lahir,
                    'tanggal_lahir' => $warga->tanggal_lahir->format('Y-m-d'),
                    'jenis_kelamin' => $warga->jenis_kelamin,
                    'alamat' => $warga->alamat_lengkap,
                    'agama' => $warga->agama,
                    'pekerjaan' => $warga->pekerjaan
                ],
                'isi_surat' => [
                    'keperluan' => $request->keperluan,
                    'keterangan_tambahan' => $request->keterangan_tambahan ?? ''
                ],
                'status' => 'draft',
                'created_by' => auth()->id()
            ]);

            DB::commit();

            return redirect()->route('surat.show', $surat->id)
                           ->with('success', 'Surat berhasil dibuat!');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show(Surat $surat)
    {
        return view('surat.show', compact('surat'));
    }

    public function print(Surat $surat)
    {
        $pdf = PDF::loadView('surat.template.' . $surat->jenis_surat, compact('surat'));
        return $pdf->stream($surat->nomor_surat . '.pdf');
    }

    public function approve(Surat $surat)
    {
        $surat->update([
            'status' => 'approved',
            'approved_by' => auth()->id(),
            'tanggal_approval' => now()
        ]);

        return back()->with('success', 'Surat berhasil disetujui!');
    }

    private function generateNomorSurat($jenisSurat)
    {
        $prefix = match($jenisSurat) {
            'surat_pengantar' => 'SP',
            'surat_keterangan' => 'SK',
            'surat_rekomendasi' => 'SR',
            'surat_izin' => 'SI',
            'surat_pernyataan' => 'SPT',
            default => 'SUR'
        };

        $tahun = date('Y');
        $bulan = date('m');

        $lastSurat = Surat::where('jenis_surat', $jenisSurat)
                         ->whereYear('created_at', $tahun)
                         ->whereMonth('created_at', $bulan)
                         ->latest()
                         ->first();

        $urutan = $lastSurat ? (int)substr($lastSurat->nomor_surat, -3) + 1 : 1;

        return sprintf('%s/%03d/%s/%s', $prefix, $urutan, $bulan, $tahun);
    }
}
