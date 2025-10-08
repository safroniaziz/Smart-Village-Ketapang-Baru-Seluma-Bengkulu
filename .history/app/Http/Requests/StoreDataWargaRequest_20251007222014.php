<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDataWargaRequest extends FormRequest
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
            'nik' => 'required|string|unique:users,nik|max:50|regex:/^[0-9]+$/',
            'nama_lengkap' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'no_kk' => 'nullable|string|max:20|regex:/^[0-9]*$/',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date|before:today',
            'jenis_kelamin' => 'required|in:L,P,Laki-laki,Perempuan',
            'alamat' => 'nullable|string|max:1000',
            'no_hp' => 'nullable|string|max:20|regex:/^[0-9+\-\s]*$/',
            'rt_rw' => 'nullable|string|max:10',
            'dusun' => 'nullable|string|max:255',
            'desa' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
            'provinsi' => 'nullable|string|max:255',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu,Lainnya',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'mata_pencaharian' => 'required|in:PTN,SWT,PNS,NLY,LN,PETANI,SWASTA,NELAYAN,DLL',
            'pendidikan' => 'required|in:Tidak Sekolah,SD,SMP,SMA,SLTP,SLTA,D3,DIPLOMA,S1,S2,S3,TS',
            'kewarganegaraan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'nullable|email|unique:users,email|max:255',
            'password' => 'required|string|min:8',
            'is_kepala_keluarga' => 'boolean',
            'status_rumah' => 'required|in:MS,SW',
            'status_sosial' => 'required|in:ME,MSK,RM,MK,MISKIN',
            'kelayakan_rumah' => 'required|in:TLH,LH,SP,P,M'
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
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.before' => 'Tanggal lahir harus sebelum hari ini.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'alamat.required' => 'Alamat wajib diisi.',
            'rt_rw.regex' => 'Format RT/RW harus seperti: 001/002.',
            'dusun.required' => 'Dusun wajib diisi.',
            'desa.required' => 'Desa wajib diisi.',
            'kecamatan.required' => 'Kecamatan wajib diisi.',
            'kabupaten.required' => 'Kabupaten wajib diisi.',
            'provinsi.required' => 'Provinsi wajib diisi.',
            'agama.required' => 'Agama wajib dipilih.',
            'status_perkawinan.required' => 'Status perkawinan wajib dipilih.',
            'mata_pencaharian.required' => 'Pekerjaan wajib dipilih.',
            'mata_pencaharian.in' => 'Pilihan pekerjaan tidak valid.',
            'pendidikan.required' => 'Pendidikan terakhir wajib dipilih.',
            'pendidikan.in' => 'Pilihan pendidikan tidak valid.',
            'kewarganegaraan.required' => 'Kewarganegaraan wajib diisi.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar harus JPEG, PNG, atau JPG.',
            'foto.max' => 'Ukuran gambar maksimal 2MB.',
            'foto.dimensions' => 'Foto akan otomatis dipotong ke ukuran optimal saat disimpan.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'status_rumah.required' => 'Status rumah wajib diisi.',
            'status_rumah.in' => 'Status rumah tidak valid.',
            'status_sosial.required' => 'Status sosial ekonomi wajib diisi.',
            'status_sosial.in' => 'Status sosial ekonomi tidak valid.',
            'kelayakan_rumah.required' => 'Kelayakan rumah wajib diisi.',
            'kelayakan_rumah.in' => 'Kelayakan rumah tidak valid.',
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
