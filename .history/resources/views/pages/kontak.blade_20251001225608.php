@extends('layouts.app-public')

@section('title', 'Kontak - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* Professional CSS for Kontak Page - Matching statistik.blade.php quality */

    /* Smooth gradient animation */
    .hero-gradient {
        background: linear-gradient(135deg, #0086c9 0%, #0074b3 25%, #006ba3 50%, #005b93 75%, #004d83 100%);
        background-size: 200% 200%;
        animation: gradientShift 8s ease infinite;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Enhanced card hover effects */
    .contact-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transform-origin: center;
        background: white;
        border-radius: 1.5rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.06);
        position: relative;
        overflow: hidden;
    }

    .contact-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    }

    .info-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(255, 255, 255, 0.9));
        border: 1px solid rgba(0, 0, 0, 0.06);
        border-radius: 1.25rem;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        position: relative;
        overflow: hidden;
    }

    .info-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.12);
    }

    .icon-container {
        width: 3.5rem;
        height: 3.5rem;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        transition: all 0.3s ease;
    }

    .icon-container:hover {
        transform: scale(1.1);
        box-shadow: 0 12px 35px rgba(59, 130, 246, 0.4);
    }

    /* Enhanced animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translate3d(0, 40px, 0);
        }
        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }

    /* Floating decorations */
    .floating-decoration {
        position: absolute;
        border-radius: 50%;
        filter: blur(60px);
        opacity: 0.3;
        pointer-events: none;
        z-index: -1;
    }

    /* Professional section spacing */
    .section-spacing {
        padding: 5rem 0;
    }

    /* Enhanced button styles */
    .btn-modern {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        padding: 0.875rem 2rem;
        border-radius: 0.875rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
        border: none;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(59, 130, 246, 0.4);
        color: white;
        text-decoration: none;
    }

    .btn-secondary {
        background: linear-gradient(135deg, #10b981, #059669);
        box-shadow: 0 4px 20px rgba(16, 185, 129, 0.3);
    }

    .btn-secondary:hover {
        box-shadow: 0 8px 30px rgba(16, 185, 129, 0.4);
    }

    /* Modern gradient text */
    .gradient-text {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6, #ec4899);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Enhanced visual hierarchy */
    .section-badge {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 2rem;
        font-weight: 600;
        font-size: 0.875rem;
        box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
        position: relative;
        overflow: hidden;
    }

    .section-badge::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        border-radius: 2rem;
        filter: blur(20px);
        opacity: 0.2;
        z-index: -1;
    }

    /* Professional card grid */
    .card-grid {
        display: grid;
        gap: 2rem;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    }

    @media (min-width: 1024px) {
        .card-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Map container enhancement */
    .map-container {
        background: white;
        border-radius: 1.5rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        border: 1px solid rgba(0, 0, 0, 0.06);
        position: relative;
    }

    .map-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899);
        z-index: 10;
    }

    /* Enhanced responsive design */
    @media (max-width: 768px) {
        .hero-gradient {
            min-height: calc(100vh - 6rem);
        }

        .section-spacing {
            padding: 3rem 0;
        }
    }
</style>
@endpush

@section('content')
@if($kontak)
<!-- Enhanced Hero Section -->
<section class="relative text-white overflow-hidden min-h-[calc(100vh-8rem)] md:min-h-[calc(100vh-10rem)] flex items-center hero-gradient pt-8 py-8 lg:py-12 pb-16 lg:pb-20 mb-4 md:mb-6">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Floating Decorations -->
    <div class="floating-decoration absolute top-20 left-10 w-64 h-64 bg-gradient-to-br from-blue-200/20 to-indigo-300/20" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400"></div>
    <div class="floating-decoration absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-purple-200/20 to-pink-300/20" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="600"></div>

    <!-- Particle.js Container -->
    <div id="particles-kontak" class="absolute inset-0"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-0">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10 min-h-[80vh]">
            <!-- Hero Content (Left Side) -->
            <div class="flex-1 space-y-10 relative z-10">
                <div class="space-y-8" data-aos="fade-right" data-aos-delay="100">
                    <!-- Professional Badge -->
                    <div class="inline-flex items-center gap-3 mb-5">
                        <div class="icon-container"><i class="fas fa-phone"></i></div>
                        <div>
                            <p class="text-blue-100 text-sm font-medium">Layanan Informasi</p>
                            <h2 class="text-lg font-semibold text-blue-100">Kontak Resmi Desa</h2>
                        </div>
                    </div>

                    <!-- Enhanced Title -->
                    <div class="space-y-4">
                        <h1 class="text-4xl lg:text-6xl font-black leading-tight">
                            <span class="block">Hubungi</span>
                            <span class="block bg-gradient-to-r from-blue-200 via-white to-blue-100 bg-clip-text text-transparent">
                                Pemerintah Desa
                            </span>
                        </h1>
                        <div class="w-20 h-1 bg-gradient-to-r from-white to-blue-200 rounded-full"></div>
                    </div>

                    <!-- Enhanced Description -->
                    <p class="text-blue-100 text-xl lg:text-2xl leading-relaxed max-w-2xl">
                        <span class="font-semibold text-white">Informasi lengkap kontak resmi</span> desa termasuk alamat, telepon, email, dan jam operasional kantor.
                    </p>
                </div>

                <!-- Enhanced Quick Stats - Dynamic from Database -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8" data-aos="fade-up" data-aos-delay="700">
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-4 text-center">
                        <div class="text-2xl font-black text-white mb-1">24/7</div>
                        <div class="text-blue-100 text-sm">Layanan Darurat</div>
                    </div>
                    @php
                        $jamBuka = '08:00';
                        $jamTutup = '16:00';
                        $hariKerja = 'Sen-Jum';

                        // Extract jam operasional from database if available
                        if($kontak && $kontak->jam_operasional_formatted && count($kontak->jam_operasional_formatted) > 0) {
                            // Try to extract time from first working day
                            $firstDay = $kontak->jam_operasional_formatted[0] ?? '';
                            if(preg_match('/([0-9]{2}:[0-9]{2})\s*-\s*([0-9]{2}:[0-9]{2})/', $firstDay, $matches)) {
                                $jamBuka = $matches[1];
                                $jamTutup = $matches[2];
                            }

                            // Count working days
                            $workingDays = count(array_filter($kontak->jam_operasional_formatted, function($day) {
                                return !str_contains(strtolower($day), 'tutup') && !str_contains(strtolower($day), 'libur');
                            }));

                            if($workingDays <= 5) {
                                $hariKerja = 'Sen-Jum';
                            } elseif($workingDays == 6) {
                                $hariKerja = 'Sen-Sab';
                            } else {
                                $hariKerja = 'Setiap Hari';
                            }
                        }
                    @endphp
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-4 text-center">
                        <div class="text-2xl font-black text-white mb-1">{{ $jamBuka }}</div>
                        <div class="text-blue-100 text-sm">Jam Buka</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-4 text-center">
                        <div class="text-2xl font-black text-white mb-1">{{ $jamTutup }}</div>
                        <div class="text-blue-100 text-sm">Jam Tutup</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-4 text-center">
                        <div class="text-2xl font-black text-white mb-1">{{ $hariKerja }}</div>
                        <div class="text-blue-100 text-sm">Hari Kerja</div>
                    </div>
                </div>

                <!-- Enhanced CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 relative z-10" data-aos="fade-up" data-aos-delay="800">
                    @if($kontak->telepon)
                    <a href="tel:{{ $kontak->telepon }}" class="btn-modern btn-secondary">
                        <i class="fas fa-phone"></i>
                        Hubungi Sekarang
                    </a>
                    @endif
                    @if($kontak && $kontak->email)
                    <a href="mailto:{{ $kontak->email }}" class="btn-modern">
                        <i class="fas fa-envelope"></i>
                        Kirim Email
                    </a>
                    @endif
                    @if(isset($monografi) && $monografi && $monografi->google_street_view_url)
                    <a href="{{ $monografi->google_street_view_url }}" target="_blank" class="bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/20 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 inline-flex items-center gap-2" rel="noopener">
                        <i class="fas fa-street-view"></i>
                        Lihat Street View
                    </a>
                    @endif
                </div>

                <!-- Data Freshness Indicator -->
                <div class="flex items-center gap-2 text-sm text-blue-200" data-aos="fade-up" data-aos-delay="900">
                    <i class="fas fa-clock text-blue-300"></i>
                    <span>Terakhir diperbarui: {{ now()->format('d M Y') }}</span>
                </div>
            </div>
            <!-- Right Side - Enhanced Info Card -->
            <div class="lg:w-[480px] flex-shrink-0 relative z-10" data-aos="fade-left" data-aos-delay="300">
                <!-- Professional Info Summary Card -->
                <div class="contact-card group relative bg-gradient-to-br from-white via-blue-50 to-indigo-100 backdrop-blur-sm border border-blue-200/50 rounded-3xl p-6 shadow-2xl overflow-hidden hover:shadow-3xl hover:scale-105 hover:border-blue-300/70 cursor-pointer">
                    <!-- Decorative Elements -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400/10 to-indigo-500/10 rounded-full -mr-16 -mt-16 group-hover:scale-110 transition-transform duration-500"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-purple-400/10 to-pink-500/10 rounded-full -ml-12 -mb-12 group-hover:scale-110 transition-transform duration-500"></div>

                    <!-- Header -->
                    <div class="relative z-10 mb-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center text-white">
                                <i class="fas fa-building text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Kantor Desa</h3>
                                <p class="text-gray-600 text-sm">Informasi Kontak</p>
                            </div>
                        </div>
                        <div class="w-full h-px bg-gradient-to-r from-blue-200 via-indigo-200 to-purple-200"></div>
                    </div>

                    <!-- Enhanced Contact Grid -->
                    <div class="relative z-10 grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-white/60 backdrop-blur-sm rounded-xl p-4 border border-blue-100/50">
                            <div class="flex items-center gap-2 text-blue-600 mb-2">
                                <i class="fas fa-map-marker-alt text-sm"></i>
                                <span class="text-sm font-medium">Alamat</span>
                            </div>
                            <div class="font-bold text-gray-900 text-sm leading-tight">{{ $kontak ? Str::limit($kontak->alamat_lengkap, 40) : 'Belum tersedia' }}</div>
                        </div>

                        <div class="bg-white/60 backdrop-blur-sm rounded-xl p-4 border border-green-100/50">
                            <div class="flex items-center gap-2 text-green-600 mb-2">
                                <i class="fas fa-phone text-sm"></i>
                                <span class="text-sm font-medium">Telepon</span>
                            </div>
                            <div class="font-bold text-gray-900 text-sm">{{ ($kontak && $kontak->telepon) ? $kontak->telepon : 'Belum tersedia' }}</div>
                        </div>

                        <div class="bg-white/60 backdrop-blur-sm rounded-xl p-4 border border-purple-100/50">
                            <div class="flex items-center gap-2 text-purple-600 mb-2">
                                <i class="fas fa-envelope text-sm"></i>
                                <span class="text-sm font-medium">Email</span>
                            </div>
                            <div class="font-bold text-gray-900 text-sm">{{ $kontak && $kontak->email ? Str::limit($kontak->email, 20) : 'Belum tersedia' }}</div>
                        </div>

                        <div class="bg-white/60 backdrop-blur-sm rounded-xl p-4 border border-orange-100/50">
                            <div class="flex items-center gap-2 text-orange-600 mb-2">
                                <i class="fas fa-clock text-sm"></i>
                                <span class="text-sm font-medium">Jam Kerja</span>
                            </div>
                            <div class="font-bold text-gray-900 text-sm">
                                @if($kontak && $kontak->jam_operasional_formatted && count($kontak->jam_operasional_formatted) > 0)
                                    @php
                                        $firstDay = $kontak->jam_operasional_formatted[0] ?? '';
                                        if(preg_match('/([0-9]{2}:[0-9]{2})\s*-\s*([0-9]{2}:[0-9]{2})/', $firstDay, $matches)) {
                                            echo $matches[1] . ' - ' . $matches[2];
                                        } else {
                                            echo 'Lihat jadwal lengkap';
                                        }
                                    @endphp
                                @else
                                    08:00 - 16:00
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Action Buttons -->
                    <div class="relative z-10 flex flex-col gap-3">
                        @if($kontak && $kontak->telepon)
                        <a href="tel:{{ $kontak->telepon }}" class="bg-gradient-to-r from-green-500 to-emerald-600 text-white px-4 py-3 rounded-xl font-semibold text-center transition-all duration-300 hover:shadow-lg hover:scale-105 flex items-center justify-center gap-2">
                            <i class="fas fa-phone"></i>
                            Hubungi Langsung
                        </a>
                        @endif

                        @if($kontak && $kontak->email)
                        <a href="mailto:{{ $kontak->email }}" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-3 rounded-xl font-semibold text-center transition-all duration-300 hover:shadow-lg hover:scale-105 flex items-center justify-center gap-2">
                            <i class="fas fa-envelope"></i>
                            Kirim Email
                        </a>
                        @endif
                    </div>

                    <!-- Dynamic Status Indicator -->
                    @php
                        $currentHour = now()->format('H:i');
                        $currentDay = now()->format('w'); // 0=Sunday, 1=Monday, etc
                        $isWorkingDay = $currentDay >= 1 && $currentDay <= 5; // Mon-Fri
                        $isOpen = false;
                        $statusText = 'Status tidak diketahui';
                        $statusColor = 'gray';

                        if($kontak && $kontak->jam_operasional_formatted && count($kontak->jam_operasional_formatted) > 0) {
                            $todaySchedule = '';
                            $dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                            $todayName = $dayNames[$currentDay];

                            foreach($kontak->jam_operasional_formatted as $schedule) {
                                if(str_contains($schedule, $todayName)) {
                                    $todaySchedule = $schedule;
                                    break;
                                }
                            }

                            if(empty($todaySchedule) && $isWorkingDay) {
                                // Fallback to first working day schedule
                                $todaySchedule = $kontak->jam_operasional_formatted[0] ?? '';
                            }

                            if(str_contains(strtolower($todaySchedule), 'tutup') || str_contains(strtolower($todaySchedule), 'libur')) {
                                $statusText = 'Kantor tutup hari ini';
                                $statusColor = 'red';
                            } elseif(preg_match('/([0-9]{2}:[0-9]{2})\s*-\s*([0-9]{2}:[0-9]{2})/', $todaySchedule, $matches)) {
                                $openTime = $matches[1];
                                $closeTime = $matches[2];

                                if($currentHour >= $openTime && $currentHour <= $closeTime) {
                                    $statusText = 'Kantor sedang buka';
                                    $statusColor = 'green';
                                    $isOpen = true;
                                } elseif($currentHour < $openTime) {
                                    $statusText = 'Kantor buka pukul ' . $openTime;
                                    $statusColor = 'yellow';
                                } else {
                                    $statusText = 'Kantor sudah tutup';
                                    $statusColor = 'red';
                                }
                            } else {
                                $statusText = $isWorkingDay ? 'Kantor buka hari ini' : 'Kantor tutup akhir pekan';
                                $statusColor = $isWorkingDay ? 'green' : 'red';
                            }
                        } else {
                            // Fallback untuk jam kerja default
                            if($isWorkingDay && $currentHour >= '08:00' && $currentHour <= '16:00') {
                                $statusText = 'Kantor sedang buka';
                                $statusColor = 'green';
                                $isOpen = true;
                            } elseif($isWorkingDay && $currentHour < '08:00') {
                                $statusText = 'Kantor buka pukul 08:00';
                                $statusColor = 'yellow';
                            } elseif($isWorkingDay) {
                                $statusText = 'Kantor sudah tutup';
                                $statusColor = 'red';
                            } else {
                                $statusText = 'Kantor tutup akhir pekan';
                                $statusColor = 'red';
                            }
                        }
                    @endphp
                    <div class="relative z-10 mt-4 flex items-center justify-center gap-2 text-sm text-gray-600">
                        @if($statusColor === 'green')
                            <div class="w-2 h-2 bg-green-500 rounded-full {{ $isOpen ? 'animate-pulse' : '' }}"></div>
                        @elseif($statusColor === 'yellow')
                            <div class="w-2 h-2 bg-yellow-500 rounded-full animate-pulse"></div>
                        @else
                            <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                        @endif
                        <span>{{ $statusText }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Professional Section Header -->
<section class="section-spacing bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
    <!-- Floating Decoration -->
    <div class="floating-decoration absolute top-20 left-10 w-64 h-64 bg-gradient-to-br from-blue-200/20 to-indigo-300/20" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400"></div>
    <div class="floating-decoration absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-purple-200/20 to-pink-300/20" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="600"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-lg opacity-20"></div>
                <div class="section-badge">
                    <i class="fas fa-address-card mr-2"></i>
                    Informasi Kontak Lengkap
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-4xl lg:text-5xl font-black mb-4">
                    <span class="gradient-text">
                        Detail Kontak Desa
                    </span>
                </h2>
                <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full mx-auto"></div>
            </div>

            <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="500">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Informasi lengkap kontak resmi</span> pemerintah desa yang dapat dihubungi untuk berbagai keperluan administrasi dan layanan publik.
                </p>
            </div>
        </div>

        <!-- Key Insights -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-6 text-white">
                <div class="flex items-center gap-3 mb-3">
                    <i class="fas fa-phone text-2xl text-blue-200"></i>
                    <h3 class="font-bold text-lg">Layanan Telepon</h3>
                </div>
                <p class="text-blue-100 text-sm leading-relaxed">
                    Hubungi langsung untuk konsultasi dan informasi cepat terkait layanan desa.
                </p>
            </div>

            <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-6 text-white">
                <div class="flex items-center gap-3 mb-3">
                    <i class="fas fa-envelope text-2xl text-emerald-200"></i>
                    <h3 class="font-bold text-lg">Email Resmi</h3>
                </div>
                <p class="text-emerald-100 text-sm leading-relaxed">
                    Kirim email untuk pertanyaan formal dan dokumentasi administrasi desa.
                </p>
            </div>

            <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl p-6 text-white">
                <div class="flex items-center gap-3 mb-3">
                    <i class="fas fa-clock text-2xl text-purple-200"></i>
                    <h3 class="font-bold text-lg">Jam Operasional</h3>
                </div>
                <p class="text-purple-100 text-sm leading-relaxed">
                    @if($kontak && $kontak->jam_operasional_formatted && count($kontak->jam_operasional_formatted) > 0)
                        @php
                            $workingDays = count(array_filter($kontak->jam_operasional_formatted, function($day) {
                                return !str_contains(strtolower($day), 'tutup') && !str_contains(strtolower($day), 'libur');
                            }));

                            $firstDay = $kontak->jam_operasional_formatted[0] ?? '';
                            $timeRange = '08:00-16:00';
                            if(preg_match('/([0-9]{2}:[0-9]{2})\s*-\s*([0-9]{2}:[0-9]{2})/', $firstDay, $matches)) {
                                $timeRange = $matches[1] . '-' . $matches[2];
                            }

                            if($workingDays <= 5) {
                                echo 'Senin-Jumat, ' . $timeRange . ' WIB untuk pelayanan optimal.';
                            } elseif($workingDays == 6) {
                                echo 'Senin-Sabtu, ' . $timeRange . ' WIB dengan layanan terbaik.';
                            } else {
                                echo 'Setiap hari, ' . $timeRange . ' WIB melayani masyarakat.';
                            }
                        @endphp
                    @else
                        Senin-Jumat, 08:00-16:00 WIB untuk pelayanan optimal.
                    @endif
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Info Section -->
<section class="section-spacing bg-white relative">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="card-grid">
            <!-- Left: Enhanced Quick Info Cards -->
            <div class="space-y-6" data-aos="fade-right" data-aos-delay="100">
                <div class="info-card p-8 group">
                    <div class="flex items-start gap-5">
                        <div class="icon-container group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-map-marker-alt text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 mb-2 text-lg">Alamat Kantor Desa</h3>
                            <p class="text-gray-600 leading-relaxed mb-3">{{ $kontak->alamat_lengkap }}</p>
                            <div class="inline-flex items-center gap-2 text-sm text-blue-600 font-medium">
                                <i class="fas fa-map text-xs"></i>
                                <span>Lihat di peta</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-card p-8 group">
                    <div class="flex items-start gap-5">
                        <div class="icon-container group-hover:scale-110 transition-transform duration-300" style="background: linear-gradient(135deg, #10b981, #059669);">
                            <i class="fas fa-phone text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 mb-2 text-lg">Nomor Telepon</h3>
                            <p class="text-gray-600 leading-relaxed mb-3">{{ $kontak->telepon ?: 'Belum tersedia' }}</p>
                            @if($kontak && $kontak->telepon)
                            <a href="tel:{{ $kontak->telepon }}" class="inline-flex items-center gap-2 text-sm text-emerald-600 font-medium hover:text-emerald-700 transition-colors">
                                <i class="fas fa-phone text-xs"></i>
                                <span>Hubungi sekarang</span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="info-card p-8 group">
                    <div class="flex items-start gap-5">
                        <div class="icon-container group-hover:scale-110 transition-transform duration-300" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
                            <i class="fas fa-envelope text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 mb-2 text-lg">Alamat Email</h3>
                            <p class="text-gray-600 leading-relaxed mb-3">{{ ($kontak && $kontak->email) ? $kontak->email : 'Belum tersedia' }}</p>
                            @if($kontak && $kontak->email)
                            <a href="mailto:{{ $kontak->email }}" class="inline-flex items-center gap-2 text-sm text-purple-600 font-medium hover:text-purple-700 transition-colors">
                                <i class="fas fa-envelope text-xs"></i>
                                <span>Kirim email</span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Enhanced Main Contact Card -->
            <div class="contact-card p-10" data-aos="fade-left" data-aos-delay="150">
                <!-- Professional Header -->
                <div class="text-center mb-10">
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center mx-auto mb-4 shadow-xl">
                        <i class="fas fa-building text-white text-2xl"></i>
                    </div>
                    <h3 class="text-3xl lg:text-4xl font-black mb-4">
                        <span class="gradient-text">
                            {{ $kontak->nama_desa }}
                        </span>
                    </h3>
                    <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full mx-auto mb-4"></div>
                    <p class="text-gray-600 text-lg leading-relaxed max-w-md mx-auto">
                        {{ $kontak->deskripsi ?: 'Melayani masyarakat dengan dedikasi dan transparansi untuk kemajuan bersama' }}
                    </p>
                </div>

                <!-- Enhanced Leadership Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    @if($kontak && $kontak->kepala_desa)
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-2xl p-6 text-center border border-blue-100 hover:shadow-lg transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user-tie text-white text-xl"></i>
                        </div>
                        <div class="font-bold text-gray-900 mb-1">Kepala Desa</div>
                        <div class="text-gray-700 font-medium">{{ $kontak->kepala_desa }}</div>
                    </div>
                    @endif
                    @if($kontak && $kontak->sekretaris_desa)
                    <div class="bg-gradient-to-br from-emerald-50 to-teal-100 rounded-2xl p-6 text-center border border-emerald-100 hover:shadow-lg transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user text-white text-xl"></i>
                        </div>
                        <div class="font-bold text-gray-900 mb-1">Sekretaris Desa</div>
                        <div class="text-gray-700 font-medium">{{ $kontak->sekretaris_desa }}</div>
                    </div>
                    @endif
                </div>

                <!-- Enhanced Operating Hours -->
                @if($kontak && $kontak->jam_operasional_formatted && count($kontak->jam_operasional_formatted))
                <div class="bg-gradient-to-br from-gray-50 to-slate-100 rounded-2xl p-8 border border-gray-200 mb-8">
                    <h4 class="font-bold text-gray-900 mb-6 flex items-center text-lg">
                        <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-red-600 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        Jam Operasional
                    </h4>
                    <div class="space-y-3">
                        @foreach($kontak->jam_operasional_formatted as $hari)
                        <div class="flex justify-between items-center py-3 px-4 bg-white rounded-xl border border-gray-100 shadow-sm">
                            <span class="font-medium text-gray-800">{{ $hari }}</span>
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Enhanced Action Buttons -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @if($kontak && $kontak->telepon)
                    <a href="tel:{{ $kontak->telepon }}" class="btn-modern btn-secondary text-center">
                        <i class="fas fa-phone"></i>
                        Hubungi Telepon
                    </a>
                    @endif
                    @if($kontak && $kontak->email)
                    <a href="mailto:{{ $kontak->email }}" class="btn-modern text-center">
                        <i class="fas fa-envelope"></i>
        Kirim Email
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Professional Map Section Header -->
@if((isset($monografi) && $monografi) || $mapUrl || ($kontak && $kontak->koordinat))
<section class="section-spacing bg-gradient-to-br from-slate-50 via-gray-50 to-zinc-50 relative overflow-hidden">
    <!-- Floating Decoration -->
    <div class="floating-decoration absolute top-20 left-10 w-64 h-64 bg-gradient-to-br from-slate-200/20 to-gray-300/20" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400"></div>
    <div class="floating-decoration absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-zinc-200/20 to-slate-300/20" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="600"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-full blur-lg opacity-20"></div>
                <div class="section-badge" style="background: linear-gradient(135deg, #10b981, #059669);">
                    <i class="fas fa-map-marked-alt mr-2"></i>
                    Lokasi & Navigasi
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-4xl lg:text-5xl font-black mb-4">
                    <span class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 bg-clip-text text-transparent">
                        Peta & Street View
                    </span>
                </h2>
                <div class="w-16 h-1 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full mx-auto"></div>
            </div>

            <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="500">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Temukan lokasi kantor desa</span> dengan mudah melalui peta interaktif dan jelajahi area sekitar dengan Google Street View.
                </p>
            </div>
        </div>

        <!-- Location Insights -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-6 text-white">
                <div class="flex items-center gap-3 mb-3">
                    <i class="fas fa-map text-2xl text-emerald-200"></i>
                    <h3 class="font-bold text-lg">Navigasi GPS</h3>
                </div>
                <p class="text-emerald-100 text-sm leading-relaxed">
                    Akses langsung ke Google Maps untuk navigasi yang akurat menuju kantor desa.
                </p>
            </div>

            <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-6 text-white">
                <div class="flex items-center gap-3 mb-3">
                    <i class="fas fa-street-view text-2xl text-blue-200"></i>
                    <h3 class="font-bold text-lg">Street View</h3>
                </div>
                <p class="text-blue-100 text-sm leading-relaxed">
                    Lihat kondisi nyata area kantor desa sebelum berkunjung langsung.
                </p>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Enhanced Map Section -->
@if((isset($monografi) && $monografi) || $mapUrl || ($kontak && $kontak->koordinat))
<section class="pb-20 bg-gradient-to-br from-slate-50 via-gray-50 to-zinc-50">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="map-container" data-aos="fade-up" data-aos-delay="150">
            @if(isset($embedStreetViewMapUrl) && $embedStreetViewMapUrl)
                <iframe
                    src="{{ $embedStreetViewMapUrl }}"
                    class="w-full h-[600px] border-0"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allow="accelerometer; gyroscope; payment; geolocation"
                    sandbox="allow-scripts allow-same-origin allow-popups allow-forms allow-presentation"
                    title="Google Street View Balai Desa Ketapang Baru"
                    style="border: none;"></iframe>
            @elseif($mapUrl)
                <iframe
                    src="{{ $mapUrl }}"
                    class="w-full h-[500px] border-0"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allow="accelerometer; gyroscope; payment; geolocation"
                    sandbox="allow-scripts allow-same-origin allow-popups allow-forms allow-presentation"
                    title="Peta Lokasi Kantor Desa"
                    style="border: none;"></iframe>
            @else
                <div class="h-96 bg-gradient-to-br from-gray-100 to-slate-200 flex items-center justify-center">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-gradient-to-r from-gray-400 to-slate-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-map-marked-alt text-3xl text-white"></i>
                        </div>
                        <h3 class="font-bold text-gray-700 text-lg mb-2">Koordinat Lokasi</h3>
                        <p class="text-gray-600 font-mono">{{ $kontak && $kontak->koordinat ? $kontak->koordinat : 'Koordinat tidak tersedia' }}</p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Enhanced Call to Action -->
        @if(isset($monografi) && $monografi && $monografi->google_street_view_url)
        <div class="text-center mt-8" data-aos="fade-up" data-aos-delay="200">
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 inline-block">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-street-view text-white text-lg"></i>
                    </div>
                    <div class="text-left">
                        <h4 class="font-bold text-gray-900 mb-1">Jelajahi Area Sekitar</h4>
                        <p class="text-gray-600 text-sm">Lihat kondisi nyata lokasi kantor desa</p>
                    </div>
                    <a href="{{ $monografi->google_street_view_url }}" target="_blank" class="btn-modern ml-4" rel="noopener">
                        <i class="fas fa-external-link-alt"></i>
                        Buka Street View
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@else
    <!-- Empty State - Kontak Belum Diatur -->
    <section class="section-spacing bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 relative overflow-hidden">
        <div class="relative w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Icon -->
            <div class="mb-8" data-aos="fade-up">
                <div class="w-24 h-24 mx-auto bg-gradient-to-r from-gray-400 to-gray-500 rounded-full flex items-center justify-center">
                    <i class="fas fa-address-book text-3xl text-white"></i>
                </div>
            </div>

            <!-- Content -->
            <div class="space-y-6" data-aos="fade-up" data-aos-delay="200">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800">
                    Kontak Belum Diatur
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Informasi kontak desa belum diatur oleh administrator. Silakan hubungi kantor desa secara langsung atau kembali lagi nanti.
                </p>

                <!-- Default Info -->
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 max-w-md mx-auto">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Sementara</h3>
                    <div class="space-y-3 text-gray-600">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-clock text-blue-500"></i>
                            <span>Jam Kerja: Senin - Jumat (08:00 - 16:00)</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fas fa-map-marker-alt text-red-500"></i>
                            <span>Datang langsung ke kantor desa</span>
                        </div>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="pt-6">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg hover:scale-105">
                        <i class="fas fa-home"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </section>
@endif
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    AOS.init({ duration: 900, once: true, offset: 100 });
    if (document.getElementById('particles-kontak')) {
        particlesJS('particles-kontak', { particles: { number:{ value:60, density:{ enable:true, value_area:800 } }, color:{ value:'#ffffff' }, shape:{ type:'circle' }, opacity:{ value:.4 }, size:{ value:3, random:true }, line_linked:{ enable:true, distance:150, color:'#ffffff', opacity:.3, width:1 }, move:{ enable:true, speed:1.6 } }, interactivity:{ events:{ onhover:{ enable:true, mode:'repulse' } } }, retina_detect:true });
    }
    });
    </script>
@endpush
