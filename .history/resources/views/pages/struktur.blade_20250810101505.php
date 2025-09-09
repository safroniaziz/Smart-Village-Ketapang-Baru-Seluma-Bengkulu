@extends('layouts.app')

@section('title', 'Struktur Organisasi - Desa Ketapang Baru')

@push('styles')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/orgchart@4.0.1/dist/css/jquery.orgchart.min.css">
<style>
    .orgchart {
        background: transparent !important;
    }

    .orgchart .node {
        border-radius: 12px !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
        border: 2px solid #e5e7eb !important;
        background: white !important;
        min-width: 200px !important;
        padding: 16px !important;
    }

    .orgchart .node.kepala-desa {
        border: 3px solid #3b82f6 !important;
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%) !important;
    }

    .orgchart .node.ketua-bpd {
        border: 3px solid #8b5cf6 !important;
        background: linear-gradient(135deg, #f3e8ff 0%, #e9d5ff 100%) !important;
    }

    .orgchart .node.sekretaris {
        border: 2px solid #10b981 !important;
        background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%) !important;
    }

    .orgchart .node.kasi-kaur {
        border: 2px solid #f59e0b !important;
        background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%) !important;
    }

    .orgchart .node.kepala-dusun {
        border: 2px solid #ef4444 !important;
        background: linear-gradient(135deg, #fef2f2 0%, #fecaca 100%) !important;
    }

    .orgchart .node.bpd-member {
        border: 2px solid #6b7280 !important;
        background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%) !important;
    }

    .orgchart .lines .topLine {
        border-top: 2px solid #6b7280 !important;
    }

    .orgchart .lines .rightLine, .orgchart .lines .leftLine {
        border-right: 2px solid #6b7280 !important;
        border-left: 2px solid #6b7280 !important;
    }

    .orgchart .lines .downLine {
        border-left: 2px solid #6b7280 !important;
    }

    /* Special dotted line for BPD connection */
    .bpd-connection {
        border-left: 3px dashed #8b5cf6 !important;
        border-top: 3px dashed #8b5cf6 !important;
    }

    .node-photo {
        width: 60px;
        height: 60px;
        border-radius: 8px;
        object-fit: cover;
        border: 2px solid #e5e7eb;
        margin: 0 auto 12px;
        display: block;
    }

    .node-title {
        font-weight: bold;
        font-size: 14px;
        color: #1f2937;
        margin-bottom: 4px;
    }

    .node-name {
        font-size: 13px;
        color: #4b5563;
        margin-bottom: 4px;
    }

    .node-role {
        font-size: 11px;
        color: #6b7280;
        background: #f3f4f6;
        padding: 2px 8px;
        border-radius: 12px;
        display: inline-block;
    }

    .crown-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        width: 24px;
        height: 24px;
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }
</style>
@endpush

@section('content')
<!-- Particles Background -->
<div id="particles-struktur" class="fixed inset-0 z-0"></div>

<!-- Hero Section -->
<section class="relative pt-20 pb-20 bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>

    <div class="relative z-10 w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <div class="inline-flex items-center justify-center bg-white/20 backdrop-blur-sm rounded-full px-6 py-3 mb-6">
                <i class="fas fa-sitemap text-white mr-3"></i>
                <span class="text-white font-semibold">Struktur Organisasi</span>
            </div>

            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6" data-aos="fade-up" data-aos-duration="800">
                Struktur Organisasi
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-blue-300">
                    Desa Ketapang Baru
                </span>
            </h1>

            <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Struktur organisasi pemerintahan Desa Ketapang Baru yang terdiri dari Pemerintah Desa dan Badan Permusyawaratan Desa (BPD)
            </p>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12 mb-8" data-aos="fade-up" data-aos-delay="400">
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 text-center border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">1</div>
                <div class="text-blue-200 text-sm">Kepala Desa</div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 text-center border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">6</div>
                <div class="text-blue-200 text-sm">Aparatur Desa</div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 text-center border border-white/20">
                <div class="text-3xl font-bold text-white mb-2">5</div>
                <div class="text-blue-200 text-sm">Anggota BPD</div>
            </div>
        </div>
    </div>
</section>

<!-- Main Organizational Chart Section -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-white to-blue-50">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center justify-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-full px-6 py-3 mb-6 shadow-lg">
                <i class="fas fa-sitemap text-white mr-3"></i>
                <span class="font-bold text-lg">Struktur Organisasi</span>
            </div>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
                Bagan <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Organisasi</span>
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-blue-500 mx-auto rounded-full"></div>
            <p class="text-lg text-gray-600 mt-6 max-w-3xl mx-auto leading-relaxed">
                Struktur organisasi lengkap dengan hubungan koordinatif antara Pemerintah Desa dan BPD
            </p>
        </div>

        <!-- Organizational Chart Container -->
        <div class="bg-white rounded-3xl p-8 shadow-2xl border border-gray-100" data-aos="fade-up" data-aos-duration="800">
            <div id="organization-chart" class="min-h-[600px]"></div>
        </div>

    </div>
</section>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/orgchart@4.0.1/dist/js/jquery.orgchart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });

    // Organization Data Structure
    const orgData = {
        'name': 'H. Ahmad Supriyadi, S.Pd',
        'title': '👑 Kepala Desa',
        'role': 'Periode: 2021-2027',
        'photo': '{{ asset("images/struktur/zultan.jpg") }}',
        'className': 'kepala-desa',
        'children': [
            {
                'name': 'Merianto',
                'title': 'Sekretaris Desa',
                'role': 'Administrasi & Koordinasi',
                'photo': '{{ asset("images/struktur/merianto.jpg") }}',
                'className': 'sekretaris',
                'children': [
                    {
                        'name': 'Sapta Adi',
                        'title': 'Kaur Keuangan',
                        'role': 'Pengelolaan Keuangan',
                        'photo': '{{ asset("images/struktur/sapta.jpg") }}',
                        'className': 'kasi-kaur'
                    },
                    {
                        'name': 'Marlan',
                        'title': 'Kaur Perencanaan',
                        'role': 'Perencanaan Pembangunan',
                        'photo': '{{ asset("images/struktur/marlan.jpg") }}',
                        'className': 'kasi-kaur'
                    },
                    {
                        'name': 'Desmerti',
                        'title': 'Kasi Pemerintahan',
                        'role': 'Administrasi Pemerintahan',
                        'photo': '{{ asset("images/struktur/desmerti.jpg") }}',
                        'className': 'kasi-kaur'
                    },
                    {
                        'name': 'Rozi',
                        'title': 'Kasi Kesejahteraan',
                        'role': 'Kesejahteraan Masyarakat',
                        'photo': '{{ asset("images/struktur/rozi.jpg") }}',
                        'className': 'kasi-kaur'
                    }
                ]
            },
            {
                'name': 'Ajasseriani',
                'title': 'Kepala Dusun 1',
                'role': 'Koordinasi Wilayah',
                'photo': '{{ asset("images/struktur/ajasseriani.jpg") }}',
                'className': 'kepala-dusun'
            },
            {
                'name': 'Meri',
                'title': 'Kepala Dusun 2',
                'role': 'Koordinasi Wilayah',
                'photo': '{{ asset("images/struktur/meri.jpg") }}',
                'className': 'kepala-dusun'
            },
            {
                'name': 'Basri',
                'title': 'Kepala Dusun 3',
                'role': 'Koordinasi Wilayah',
                'photo': '{{ asset("images/struktur/basri.jpg") }}',
                'className': 'kepala-dusun'
            }
        ]
    };

    // BPD Data Structure (Separate)
    const bpdData = {
        'name': 'Bahirman',
        'title': '👑 Ketua BPD',
        'role': 'Periode: 2021-2027',
        'photo': '{{ asset("images/struktur/bahirman.jpg") }}',
        'className': 'ketua-bpd',
        'children': [
            {
                'name': 'Halintarman',
                'title': 'Wakil Ketua BPD',
                'role': 'Koordinasi & Pengawasan',
                'photo': '{{ asset("images/struktur/halintarman.jpg") }}',
                'className': 'bpd-member'
            },
            {
                'name': 'Kebat S',
                'title': 'Sekretaris BPD',
                'role': 'Dokumentasi & Notulensi',
                'photo': '{{ asset("images/struktur/kebat.jpg") }}',
                'className': 'bpd-member'
            },
            {
                'name': 'Susti',
                'title': 'Anggota BPD',
                'role': 'Aspirasi Masyarakat',
                'photo': '{{ asset("images/struktur/susti.jpg") }}',
                'className': 'bpd-member'
            },
            {
                'name': 'Dhesty C',
                'title': 'Anggota BPD',
                'role': 'Aspirasi Masyarakat',
                'photo': '{{ asset("images/struktur/dhesty.jpg") }}',
                'className': 'bpd-member'
            }
        ]
    };

    // Initialize Government Structure Chart
    const govChart = $('#organization-chart').orgchart({
        'data': orgData,
        'nodeContent': 'title',
        'createNode': function($node, data) {
            const photoUrl = data.photo || '{{ asset("images/struktur/default-person.png") }}';
            const crownHtml = data.className === 'kepala-desa' || data.className === 'ketua-bpd' ?
                '<div class="crown-badge"><i class="fas fa-crown text-white text-xs"></i></div>' : '';

            $node.html(`
                <div class="relative">
                    ${crownHtml}
                    <img src="${photoUrl}" alt="${data.name}" class="node-photo"
                         onerror="this.src='{{ asset("images/struktur/default-person.png") }}'; this.onerror=null;">
                    <div class="node-title">${data.title}</div>
                    <div class="node-name">${data.name}</div>
                    <div class="node-role">${data.role}</div>
                </div>
            `);
        },
        'exportButton': false,
        'pan': true,
        'zoom': true,
        'direction': 't2b',
        'verticalLevel': 1,
        'visibleLevel': 4
    });

    // Add BPD Chart as separate parallel structure
    setTimeout(() => {
        // Create BPD container
        const $bpdContainer = $('<div id="bpd-chart" style="margin-top: 40px; border-top: 3px dashed #8b5cf6; padding-top: 20px;"></div>');
        $('#organization-chart').append($bpdContainer);

        // Add coordination label
        const $coordinationLabel = $(`
            <div style="text-align: center; margin-bottom: 20px;">
                <div style="display: inline-flex; align-items: center; background: linear-gradient(135deg, #f3e8ff, #e9d5ff);
                            border: 2px dashed #8b5cf6; border-radius: 20px; padding: 8px 16px;">
                    <i class="fas fa-handshake" style="color: #8b5cf6; margin-right: 8px;"></i>
                    <span style="color: #7c3aed; font-weight: bold; font-size: 14px;">MITRA KERJA & PENGAWASAN</span>
                </div>
            </div>
        `);
        $bpdContainer.append($coordinationLabel);

        // Initialize BPD Chart
        const $bpdChartContainer = $('<div id="bpd-org-chart"></div>');
        $bpdContainer.append($bpdChartContainer);

        $bpdChartContainer.orgchart({
            'data': bpdData,
            'nodeContent': 'title',
            'createNode': function($node, data) {
                const photoUrl = data.photo || '{{ asset("images/struktur/default-person.png") }}';
                const crownHtml = data.className === 'ketua-bpd' ?
                    '<div class="crown-badge"><i class="fas fa-crown text-white text-xs"></i></div>' : '';

                $node.html(`
                    <div class="relative">
                        ${crownHtml}
                        <img src="${photoUrl}" alt="${data.name}" class="node-photo"
                             onerror="this.src='{{ asset("images/struktur/default-person.png") }}'; this.onerror=null;">
                        <div class="node-title">${data.title}</div>
                        <div class="node-name">${data.name}</div>
                        <div class="node-role">${data.role}</div>
                    </div>
                `);
            },
            'exportButton': false,
            'pan': true,
            'zoom': true,
            'direction': 't2b',
            'verticalLevel': 1,
            'visibleLevel': 3
        });
    }, 1000);

    // Initialize Particles.js for Struktur page - SUBTLE
    if (document.getElementById('particles-struktur')) {
        particlesJS('particles-struktur', {
            particles: {
                number: {
                    value: 30,
                    density: {
                        enable: true,
                        value_area: 1000
                    }
                },
                color: {
                    value: '#3b82f6'
                },
                shape: {
                    type: 'circle'
                },
                opacity: {
                    value: 0.3,
                    random: true
                },
                size: {
                    value: 4,
                    random: true
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#3b82f6',
                    opacity: 0.2,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 1,
                    direction: 'none',
                    random: false,
                    straight: false,
                    out_mode: 'out',
                    bounce: false
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: false
                    },
                    onclick: {
                        enable: false
                    },
                    resize: true
                }
            },
            retina_detect: true
        });
    }
});
</script>
@endpush

