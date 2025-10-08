<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            
            // Warga fields
            $table->string('nik', 20)->unique()->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('no_kk', 20)->nullable()->index();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P', 'Laki-laki', 'Perempuan'])->nullable()->index();

            $table->text('alamat')->nullable();
            $table->string('rt_rw', 10)->nullable();
            $table->string('dusun')->nullable()->index();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();

            $table->enum('agama', ['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu','Lainnya'])->nullable()->index();
            $table->enum('status_perkawinan', ['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'])->nullable()->index();
            $table->string('pekerjaan')->nullable()->index();
            $table->enum('pendidikan', ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'SLTP', 'SLTA', 'D3', 'S1', 'S2', 'S3', 'TS'])->nullable()->index();
            $table->string('kewarganegaraan')->default('Indonesia');
            $table->string('foto')->nullable();
            $table->boolean('status_aktif')->default(true)->index();
            $table->enum('status', ['aktif', 'nonaktif', 'meninggal', 'pindah'])->default('aktif')->index();
            $table->boolean('is_kepala_keluarga')->default(false);
            
            // Status Rumah - HANYA 2 pilihan
            $table->enum('status_rumah', ['MS', 'SW'])->nullable()->index();
            
            // Status Sosial Ekonomi - ME dipindah ke sini
            $table->enum('status_sosial', ['ME', 'MSK', 'RM', 'MK', 'MISKIN'])->nullable()->index();
            
            // Kelayakan Rumah
            $table->enum('kelayakan_rumah', ['TLH', 'LH', 'SP', 'P', 'M'])->nullable()->index();
            
            // Mata Pencaharian
            $table->enum('mata_pencaharian', ['PTN', 'SWT', 'PNS', 'NLY', 'LN', 'PETANI', 'SWASTA'])->nullable()->index();
            
            // Jumlah Jiwa per KK
            $table->integer('jumlah_jiwa_kk')->nullable();
            
            // Koordinat
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
