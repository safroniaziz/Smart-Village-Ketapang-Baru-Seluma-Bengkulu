<?php

namespace App\Http\Controllers;

use App\Models\APBDes;
use App\Models\PaguEarmark;
use App\Models\BltDd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggaranController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));
        
        // Data APBDes
        $apbdes = APBDes::byYear($tahun)->get();
        $pendapatan = $apbdes->where('jenis_anggaran', 'pendapatan');
        $belanja = $apbdes->where('jenis_anggaran', 'belanja');
        
        $totalPendapatan = $pendapatan->sum('anggaran');
        $totalBelanja = $belanja->sum('anggaran');
        $surplus = $totalPendapatan - $totalBelanja;
        
        // Data Pagu Earmark
        $paguEarmarks = PaguEarmark::byYear($tahun)
                                  ->orderBy('jumlah_pagu', 'desc')
                                  ->get();
        
        // Data BLT-DD
        $bltDds = BltDd::byYear($tahun)->get();
        $totalPenerimaBlt = $bltDds->count();
        $totalBantuanBlt = $bltDds->sum('nominal_bantuan');
        
        // Stats untuk grafik
        $chartData = $this->getChartData($tahun);
        
        // Available years
        $availableYears = APBDes::select('tahun_anggaran')
                                ->distinct()
                                ->orderBy('tahun_anggaran', 'desc')
                                ->pluck('tahun_anggaran');
        
        return view('pages.anggaran', compact(
            'tahun',
            'pendapatan',
            'belanja',
            'totalPendapatan',
            'totalBelanja',
            'surplus',
            'paguEarmarks',
            'bltDds',
            'totalPenerimaBlt',
            'totalBantuanBlt',
            'chartData',
            'availableYears'
        ));
    }
    
    private function getChartData($tahun)
    {
        // Data untuk chart APBDes
        $apbdesData = APBDes::byYear($tahun)
                           ->select('jenis_anggaran', DB::raw('SUM(anggaran) as total'))
                           ->groupBy('jenis_anggaran')
                           ->get()
                           ->pluck('total', 'jenis_anggaran');
        
        // Data untuk chart Pagu Earmark (top 10)
        $paguData = PaguEarmark::byYear($tahun)
                              ->orderBy('jumlah_pagu', 'desc')
                              ->limit(10)
                              ->get()
                              ->map(function($item) {
                                  return [
                                      'kegiatan' => $item->kegiatan,
                                      'pagu' => $item->jumlah_pagu
                                  ];
                              });
        
        // Data demografi BLT-DD
        $bltDemografi = BltDd::byYear($tahun)
                            ->select('jenis_kelamin', DB::raw('COUNT(*) as jumlah'))
                            ->groupBy('jenis_kelamin')
                            ->get()
                            ->pluck('jumlah', 'jenis_kelamin');
        
        return [
            'apbdes' => $apbdesData,
            'pagu' => $paguData,
            'demografi' => $bltDemografi
        ];
    }
    
    public function getApiData(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));
        return response()->json($this->getChartData($tahun));
    }
}
