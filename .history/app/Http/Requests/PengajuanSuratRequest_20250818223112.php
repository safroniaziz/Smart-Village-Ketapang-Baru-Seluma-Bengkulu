<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengajuanSuratRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'nik' => 'nullable|string|max:20',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'nullable|string|max:500',
            'jenis_surat' => 'required|string|max:100',
            'keperluan' => 'required|string|max:1000',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ];
    }

    public function attributes(): array
    {
        return [
            'nama' => 'nama lengkap',
            'no_hp' => 'nomor HP',
            'jenis_surat' => 'jenis surat',
        ];
    }
}


