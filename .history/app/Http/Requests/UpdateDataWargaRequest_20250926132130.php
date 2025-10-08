<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDataWargaRequest extends FormRequest
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
        $userId = $this->route('data_warga')->id;

        return [
            'nik' => ['required', 'string', 'max:50', 'regex:/^[0-9]+$/', Rule::unique('users')->ignore($userId)],
            'nama_lengkap' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'no_kk' => 'nullable|string|max:20|regex:/^[0-9]+$/',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date|before:today',
            'jenis_kelamin' => 'nullable|in:L,P,Laki-laki,Perempuan',
            'alamat' => 'nullable|string|max:1000',
            'rt_rw' => 'nullable|string|max:10|regex:/^[0-9]{1,3}\/[0-9]{1,3}$/',
            'dusun' => 'nullable|string|max:255',
            'desa' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
            'provinsi' => 'nullable|string|max:255',
            'agama' => 'nullable|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu,Lainnya',
            'status_perkawinan' => 'nullable|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pekerjaan' => 'nullable|string|max:255',
            'pendidikan' => 'nullable|in:Tidak Sekolah,SD,SMP,SMA,SLTP,SLTA,D3,DIPLOMA,S1,S2,S3,TS',
            'kewarganegaraan' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email' => ['nullable', 'email', 'max:255', Rule::unique('users')->ignore($userId)],
            'password' => 'nullable|string|min:8|confirmed',
            'is_kepala_keluarga' => 'boolean',
            'status_rumah' => 'nullable|string|max:255',
            'status_sosial' => 'nullable|string|max:255',
            'kelayakan_rumah' => 'nullable|string|max:255',
            'mata_pencaharian' => 'nullable|string|max:255',
        ];
    }

    /**
     * Get custom validation messages.
     */
    public function messages(): array
    {
        return [
            'nik.required' => 'NIK wajib diisi.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'nik.max' => 'NIK maksimal 16 karakter.',
            'nik.regex' => 'NIK hanya boleh berisi angka.',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'nama_lengkap.regex' => 'Nama lengkap hanya boleh berisi huruf dan spasi.',
            'no_kk.regex' => 'No. KK hanya boleh berisi angka.',
            'tanggal_lahir.before' => 'Tanggal lahir harus sebelum hari ini.',
            'rt_rw.regex' => 'Format RT/RW harus seperti: 001/002.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar harus JPEG, PNG, atau JPG.',
            'foto.max' => 'Ukuran gambar maksimal 2MB.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'is_kepala_keluarga' => $this->boolean('is_kepala_keluarga'),
        ]);
    }
}