<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center">
            <div style="
                background: linear-gradient(145deg, #ffffff, #f0f0f0);
                padding: 6px;
                border-radius: 12px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                transition: transform 0.3s ease;
            " onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                <img alt="Logo" src="{{ asset('assets/images/seluma.png') }}" class="h-50px app-sidebar-logo-default" />
            </div>
            <img alt="Logo" src="{{ asset('assets/images/seluma.png') }}" class="h-35px app-sidebar-logo-minimize d-none" />
            <div class="d-flex flex-column ms-3 app-sidebar-logo-default">
                <span class="fs-3 fw-bolder text-uppercase" style="letter-spacing: 1px; font-family: 'Segoe UI', sans-serif; color: #ffffff; text-shadow: 0 0 10px rgba(255,255,255,0.3);">Smart Village</span>
                <span class="fs-8 fw-light" style="margin-top: -4px; letter-spacing: 0.5px; color: rgba(255,255,255,0.9); text-shadow: 0 0 5px rgba(255,255,255,0.2);">Ketapang Baru</span>
            </div>
        </a>

        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <!--begin::Scroll wrapper-->
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-3 mx-3" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
                <!--begin::Menu-->
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                    <!--begin:Menu item-->
                    <div class="menu-item ">
                        <!--begin:Menu content-->
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">MENU UTAMA</span>
                        </div>
                        <!--end:Menu content-->
                    </div>
                    <!--end:Menu item-->
                                <span class="menu-icon">
                                    <i class="fas fa-users fs-4"></i>
                                </span>
                                <span class="menu-title">Data Warga</span>
                            </a>
                        </div>

                        <div class="menu-item {{ Route::is('tentang') ? 'show' : '' }}">
                            <a class="menu-link {{ Route::is('tentang') ? 'active' : '' }}" href="{{ route('tentang') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-home fs-4"></i>
                                </span>
                                <span class="menu-title">Profil Desa</span>
                            </a>
                        </div>

                        <div class="menu-item {{ Route::is('struktur') ? 'show' : '' }}">
                            <a class="menu-link {{ Route::is('struktur') ? 'active' : '' }}" href="{{ route('struktur') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-sitemap fs-4"></i>
                                </span>
                                <span class="menu-title">Struktur Organisasi</span>
                            </a>
                        </div>

                        <div class="menu-item {{ Route::is('statistik') ? 'show' : '' }}">
                            <a class="menu-link {{ Route::is('statistik') ? 'active' : '' }}" href="{{ route('statistik') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-chart-pie fs-4"></i>
                                </span>
                                <span class="menu-title">Statistik Desa</span>
                            </a>
                        </div>

                        <div class="menu-item ">
                            <!--begin:Menu content-->
                            <div class="menu-content">
                                <span class="menu-heading fw-bold text-uppercase fs-7">LAYANAN</span>
                            </div>
                            <!--end:Menu content-->
                        </div>

                        <div class="menu-item {{ Route::is('pengaduan') ? 'show' : '' }}">
                            <a class="menu-link {{ Route::is('pengaduan') ? 'active' : '' }}" href="{{ route('pengaduan') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-exclamation-triangle fs-4"></i>
                                </span>
                                <span class="menu-title">Pengaduan</span>
                            </a>
                        </div>

                        <div class="menu-item {{ Route::is('surat.online') ? 'show' : '' }}">
                            <a class="menu-link {{ Route::is('surat.online') ? 'active' : '' }}" href="{{ route('surat.online') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-file-alt fs-4"></i>
                                </span>
                                <span class="menu-title">Surat Online</span>
                            </a>
                        </div>

                        <div class="menu-item ">
                            <!--begin:Menu content-->
                            <div class="menu-content">
                                <span class="menu-heading fw-bold text-uppercase fs-7">INFORMASI</span>
                            </div>
                            <!--end:Menu content-->
                        </div>

                        <div class="menu-item {{ Route::is('berita') ? 'show' : '' }}">
                            <a class="menu-link {{ Route::is('berita') ? 'active' : '' }}" href="{{ route('berita') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-newspaper fs-4"></i>
                                </span>
                                <span class="menu-title">Berita</span>
                            </a>
                        </div>

                        <div class="menu-item {{ Route::is('pengumuman') ? 'show' : '' }}">
                            <a class="menu-link {{ Route::is('pengumuman') ? 'active' : '' }}" href="{{ route('pengumuman') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-bullhorn fs-4"></i>
                                </span>
                                <span class="menu-title">Pengumuman</span>
                            </a>
                        </div>

                        <div class="menu-item {{ Route::is('peta.desa') ? 'show' : '' }}">
                            <a class="menu-link {{ Route::is('peta.desa') ? 'active' : '' }}" href="{{ route('peta.desa') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-map fs-4"></i>
                                </span>
                                <span class="menu-title">Peta Desa</span>
                            </a>
                        </div>

                    </div>
                    <!--end:Menu items-->
                </div>
                <!--end:Menu wrapper-->
            </ul>
            <!--end:Menu Nav-->
        </div>
        <!--end:Aside Menu-->
    </div>
    <!--end:Aside menu-->
</div>
<!--end:Aside menu-->
