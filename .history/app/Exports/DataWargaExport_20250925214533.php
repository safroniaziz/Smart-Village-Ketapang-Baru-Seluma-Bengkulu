<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Illuminate\Http\Request;

class DataWargaExport implements FromCollection, WithHeadings, WithStyles, WithEvents
{
    protected $request;
    protected $groupedData;
    protected $exportData;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->prepareData();
    }

    protected function prepareData()
    {
        // Get filtered data
        $query = User::query();

        // Apply same filters as index method
        if ($this->request->filled('q')) {
            $searchTerm = $this->request->q;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('nama_lengkap', 'like', "%{$searchTerm}%")
                  ->orWhere('nik', 'like', "%{$searchTerm}%")
                  ->orWhere('no_kk', 'like', "%{$searchTerm}%");
            });
        }

        if ($this->request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $this->request->jenis_kelamin);
        }

        if ($this->request->filled('dusun')) {
            $query->where('dusun', $this->request->dusun);
        }

        if ($this->request->filled('status_aktif')) {
            $query->where('status_aktif', $this->request->status_aktif === 'aktif');
        }

        $wargas = $query->get();

        // Group by no_kk
        $this->groupedData = $wargas->groupBy('no_kk');

        // Prepare export data
        $this->exportData = collect();
        $no = 1;

        foreach ($this->groupedData as $noKk => $keluarga) {
            // Find family head
            $kepalaKeluarga = $keluarga->where('is_kepala_keluarga', true)->first();
            $namaKepala = $kepalaKeluarga ? $kepalaKeluarga->nama_lengkap : 'Tidak Ada Kepala Keluarga';

            // Add family header row
            $this->exportData->push([
                'no' => '',
                'nik' => '',
                'no_kk' => '',
                'nama_lengkap' => "KELUARGA: {$noKk} - {$namaKepala}",
                'jenis_kelamin' => '',
                'umur' => '',
                'alamat' => '',
                'rt_rw' => '',
                'dusun' => '',
                'agama' => '',
                'status_perkawinan' => '',
                'pendidikan' => '',
                'mata_pencaharian' => '',
                'status' => '',
                'kepala_keluarga' => '',
                'is_family_header' => true
            ]);

            // Sort family members: kepala keluarga first
            $sortedKeluarga = $keluarga->sortByDesc('is_kepala_keluarga');

            foreach ($sortedKeluarga as $warga) {
                $ageData = $this->extractAgeFromNIK($warga->nik);

                $this->exportData->push([
                    'no' => $no++,
                    'nik' => $warga->nik,
                    'no_kk' => $warga->no_kk,
                    'nama_lengkap' => $warga->nama_lengkap,
                    'jenis_kelamin' => $warga->jenis_kelamin,
                    'umur' => $ageData['age'] . ' tahun',
                    'alamat' => $warga->alamat ?? '-',
                    'rt_rw' => $warga->rt_rw ?? '-',
                    'dusun' => $warga->dusun ?? '-',
                    'agama' => $warga->agama ?? '-',
                    'status_perkawinan' => $warga->status_perkawinan ?? '-',
                    'pendidikan' => $warga->pendidikan ?? '-',
                    'mata_pencaharian' => $warga->mata_pencaharian ?? '-',
                    'status' => $warga->status_aktif ? 'Aktif' : 'Tidak Aktif',
                    'kepala_keluarga' => $warga->is_kepala_keluarga ? 'Ya' : 'Tidak',
                    'is_family_header' => false,
                    'is_kepala_keluarga' => $warga->is_kepala_keluarga
                ]);
            }

            // Add empty row between families
            $this->exportData->push([
                'no' => '',
                'nik' => '',
                'no_kk' => '',
                'nama_lengkap' => '',
                'jenis_kelamin' => '',
                'umur' => '',
                'alamat' => '',
                'rt_rw' => '',
                'dusun' => '',
                'agama' => '',
                'status_perkawinan' => '',
                'pendidikan' => '',
                'mata_pencaharian' => '',
                'status' => '',
                'kepala_keluarga' => '',
                'is_family_header' => false,
                'is_empty_row' => true
            ]);
        }
    }

    protected function extractAgeFromNIK($nik)
    {
        $result = ['age' => 0, 'birth_date' => null, 'birth_date_formatted' => null];

        if (empty($nik) || strlen($nik) < 16) {
            return $result;
        }

        try {
            // Extract birth date from NIK (digit 7-12: DDMMYY)
            $nikDate = substr($nik, 6, 6);
            $day = intval(substr($nikDate, 0, 2));
            $month = intval(substr($nikDate, 2, 2));
            $year = intval(substr($nikDate, 4, 2));

            // Adjust year (assume 1900-2023 range)
            $year = $year > 50 ? 1900 + $year : 2000 + $year;

            // Adjust day for female (subtract 40)
            if ($day > 31) {
                $day = $day - 40;
            }

            // Validate date components
            if ($day < 1 || $day > 31 || $month < 1 || $month > 12) {
                return $result;
            }

            // Create Carbon date
            $birthDate = \Carbon\Carbon::createFromDate($year, $month, $day);

            $result['age'] = $birthDate->age;
            $result['birth_date'] = $birthDate;
            $result['birth_date_formatted'] = $birthDate->format('d M Y');

        } catch (\Exception $e) {
            // Return default values if any error occurs
        }

        return $result;
    }

    public function collection()
    {
        return $this->exportData->map(function ($item) {
            unset($item['is_family_header'], $item['is_kepala_keluarga'], $item['is_empty_row']);
            return $item;
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'NIK',
            'No. KK',
            'Nama Lengkap',
            'Jenis Kelamin',
            'Umur',
            'Alamat',
            'RT/RW',
            'Dusun',
            'Agama',
            'Status Perkawinan',
            'Pendidikan',
            'Mata Pencaharian',
            'Status',
            'Kepala Keluarga'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Header row
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF']
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '2563EB']
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000']
                    ]
                ]
            ]
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Auto-size columns
                foreach (range('A', 'O') as $column) {
                    $sheet->getColumnDimension($column)->setAutoSize(true);
                }

                // Style family headers and kepala keluarga
                $rowIndex = 2; // Start from row 2 (after header)
                foreach ($this->exportData as $item) {
                    if (isset($item['is_family_header']) && $item['is_family_header']) {
                        // Family header styling
                        $sheet->getStyle("A{$rowIndex}:O{$rowIndex}")->applyFromArray([
                            'font' => [
                                'bold' => true,
                                'color' => ['rgb' => '1E3A8A']
                            ],
                            'fill' => [
                                'fillType' => Fill::FILL_SOLID,
                                'startColor' => ['rgb' => 'DBEAFE']
                            ],
                            'alignment' => [
                                'horizontal' => Alignment::HORIZONTAL_CENTER
                            ],
                            'borders' => [
                                'allBorders' => [
                                    'borderStyle' => Border::BORDER_THIN,
                                    'color' => ['rgb' => '000000']
                                ]
                            ]
                        ]);
                    } elseif (isset($item['is_kepala_keluarga']) && $item['is_kepala_keluarga']) {
                        // Kepala keluarga styling
                        $sheet->getStyle("A{$rowIndex}:O{$rowIndex}")->applyFromArray([
                            'fill' => [
                                'fillType' => Fill::FILL_SOLID,
                                'startColor' => ['rgb' => 'FEF3C7']
                            ],
                            'borders' => [
                                'allBorders' => [
                                    'borderStyle' => Border::BORDER_THIN,
                                    'color' => ['rgb' => '000000']
                                ]
                            ]
                        ]);
                    } elseif (!isset($item['is_empty_row'])) {
                        // Regular row styling
                        $sheet->getStyle("A{$rowIndex}:O{$rowIndex}")->applyFromArray([
                            'borders' => [
                                'allBorders' => [
                                    'borderStyle' => Border::BORDER_THIN,
                                    'color' => ['rgb' => '000000']
                                ]
                            ]
                        ]);
                    }
                    $rowIndex++;
                }
            }
        ];
    }
}
