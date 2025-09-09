@extends('layouts.app')

@section('title', 'Tentang Desa - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center text-white">
                <h1 class="display-4 fw-bold mb-3">Tentang Desa Ketapang Baru</h1>
                <p class="lead">
                    Mengenal lebih dekat desa kami yang berkomitmen membangun masa depan yang lebih baik.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h2 class="fw-bold mb-4">Sejarah Desa</h2>
                        <p class="lead text-muted mb-4">
                            Desa Ketapang Baru didirikan pada tahun 1980 dan telah mengalami berbagai perkembangan
                            hingga menjadi desa yang maju seperti sekarang ini.
                        </p>

                        <p>
                            Desa Ketapang Baru terletak di Kecamatan Ketapang, Kabupaten Bandung, Provinsi Jawa Barat.
                            Dengan luas wilayah sekitar 250 hektar, desa ini dihuni oleh lebih dari 2.500 warga
                            yang tersebar di 8 dusun.
                        </p>

                        <p>
                            Nama "Ketapang Baru" diambil dari bahasa Sunda yang berarti "Desa yang Makmur".
                            Nama ini mencerminkan harapan para pendiri desa agar desa ini menjadi tempat
                            yang makmur dan sejahtera bagi seluruh warganya.
                        </p>

                        <h3 class="fw-bold mt-5 mb-4">Geografis</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li><strong>Luas Wilayah:</strong> 250 hektar</li>
                                    <li><strong>Jumlah Dusun:</strong> 8 dusun</li>
                                    <li><strong>Jumlah RT/RW:</strong> 25 RT / 8 RW</li>
                                    <li><strong>Ketinggian:</strong> 800-1200 mdpl</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li><strong>Iklim:</strong> Tropis</li>
                                    <li><strong>Curah Hujan:</strong> 2000-3000 mm/tahun</li>
                                    <li><strong>Suhu Rata-rata:</strong> 22-28°C</li>
                                    <li><strong>Topografi:</strong> Dataran tinggi</li>
                                </ul>
                            </div>
                        </div>

                        <h3 class="fw-bold mt-5 mb-4">Potensi Desa</h3>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="card border-0 bg-light">
                                    <div class="card-body">
                                        <h5 class="fw-bold text-primary">
                                            <i class="fas fa-seedling me-2"></i>Pertanian
                                        </h5>
                                        <p class="mb-0">
                                            Desa Ketapang Baru memiliki lahan pertanian yang subur dengan
                                            komoditas utama sayuran dan buah-buahan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card border-0 bg-light">
                                    <div class="card-body">
                                        <h5 class="fw-bold text-success">
                                            <i class="fas fa-industry me-2"></i>UMKM
                                        </h5>
                                        <p class="mb-0">
                                            Usaha Mikro Kecil Menengah berkembang pesat dengan
                                            berbagai produk kerajinan dan makanan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card border-0 bg-light">
                                    <div class="card-body">
                                        <h5 class="fw-bold text-warning">
                                            <i class="fas fa-tree me-2"></i>Pariwisata
                                        </h5>
                                        <p class="mb-0">
                                            Potensi wisata alam dengan pemandangan pegunungan
                                            dan udara yang sejuk.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card border-0 bg-light">
                                    <div class="card-body">
                                        <h5 class="fw-bold text-info">
                                            <i class="fas fa-graduation-cap me-2"></i>Pendidikan
                                        </h5>
                                        <p class="mb-0">
                                            Fasilitas pendidikan yang memadai dari tingkat
                                            PAUD hingga SMA.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="fw-bold mt-5 mb-4">Prestasi Desa</h3>
                        <div class="timeline">
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <span class="badge bg-primary">2023</span>
                                </div>
                                <div class="col-md-9">
                                    <h6 class="fw-bold">Desa Digital Terbaik</h6>
                                    <p class="text-muted mb-0">
                                        Meraih penghargaan sebagai desa digital terbaik tingkat kabupaten.
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <span class="badge bg-success">2022</span>
                                </div>
                                <div class="col-md-9">
                                    <h6 class="fw-bold">Desa Mandiri</h6>
                                    <p class="text-muted mb-0">
                                        Berhasil mencapai status desa mandiri berdasarkan indikator BPS.
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <span class="badge bg-warning">2021</span>
                                </div>
                                <div class="col-md-9">
                                    <h6 class="fw-bold">Desa Sehat</h6>
                                    <p class="text-muted mb-0">
                                        Mendapatkan sertifikasi desa sehat dari Kementerian Kesehatan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision Mission -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4" data-aos="fade-right">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h3 class="fw-bold text-primary mb-3">
                            <i class="fas fa-eye me-2"></i>Visi
                        </h3>
                        <p class="lead">
                            "Terwujudnya Desa Ketapang Baru yang maju, mandiri, dan sejahtera
                            melalui pengembangan teknologi digital dan pemberdayaan masyarakat."
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4" data-aos="fade-left">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h3 class="fw-bold text-success mb-3">
                            <i class="fas fa-bullseye me-2"></i>Misi
                        </h3>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Meningkatkan kualitas layanan administrasi desa
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Mengembangkan ekonomi masyarakat
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Meningkatkan kualitas pendidikan dan kesehatan
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Melestarikan budaya dan lingkungan
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
