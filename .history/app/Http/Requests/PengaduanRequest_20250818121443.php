<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengaduanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'nik' => 'nullable|string|max:16',
            'email' => 'required|email|max:255',
            'telepon' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:500',
            'jenis_pengaduan' => 'required|string|max:100',
            'prioritas' => 'required|string|max:50',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'lokasi' => 'required|string|max:500',
            'tanggal_kejadian' => 'required|date',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
            'anonim' => 'boolean'
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'nama.required' => 'Nama lengkap wajib diisi',
            'nama.string' => 'Nama harus berupa teks',
            'nama.max' => 'Nama maksimal 255 karakter',

            'nik.max' => 'NIK maksimal 16 karakter',

            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',

            'telepon.max' => 'Nomor telepon maksimal 15 karakter',

            'alamat.string' => 'Alamat harus berupa teks',
            'alamat.max' => 'Alamat maksimal 500 karakter',

            'jenis_pengaduan.required' => 'Jenis pengaduan wajib dipilih',
            'jenis_pengaduan.string' => 'Jenis pengaduan harus berupa teks',
            'jenis_pengaduan.max' => 'Jenis pengaduan maksimal 100 karakter',

            'prioritas.required' => 'Prioritas wajib dipilih',
            'prioritas.string' => 'Prioritas harus berupa teks',
            'prioritas.max' => 'Prioritas maksimal 50 karakter',

            'judul.required' => 'Judul pengaduan wajib diisi',
            'judul.string' => 'Judul harus berupa teks',
            'judul.max' => 'Judul maksimal 255 karakter',

            'deskripsi.required' => 'Deskripsi pengaduan wajib diisi',
            'deskripsi.string' => 'Deskripsi harus berupa teks',
            'deskripsi.max' => 'Deskripsi maksimal 1000 karakter',

            'lokasi.required' => 'Lokasi kejadian wajib diisi',
            'lokasi.string' => 'Lokasi harus berupa teks',
            'lokasi.max' => 'Lokasi maksimal 500 karakter',

            'tanggal_kejadian.required' => 'Tanggal kejadian wajib diisi',
            'tanggal_kejadian.date' => 'Format tanggal tidak valid',

            'bukti.file' => 'Bukti harus berupa file',
            'bukti.mimes' => 'Format file tidak didukung. Gunakan: JPG, PNG, PDF, DOC, DOCX',
            'bukti.max' => 'Ukuran file maksimal 5MB'
        ];
    }
}
