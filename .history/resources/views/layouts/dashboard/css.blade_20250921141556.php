    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('assets/src/images/logo_unib.png') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('assets/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/assets/plugins/custom/vis-timeline/vis-timeline.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <style>
        .button-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Menjaga tombol agar rata tengah */
            gap: 8px; /* Memberikan jarak antar tombol */
        }

        .button-container .btn {
            flex: 1 1 auto; /* Tombol bisa menyusut dan berkembang */
            min-width: 80px; /* Tentukan lebar minimum tombol */
            max-width: 150; /* Menambahkan batasan lebar maksimum */
        }

        @media (max-width: 576px) {
            .button-container {
                flex-direction: column; /* Pada layar kecil, tombol ditata dalam kolom */
                align-items: center; /* Rata tengah secara vertikal */
            }

            .button-container .btn {
                width: auto; /* Tombol akan mengambil lebar yang sesuai dengan kontennya */
                max-width: 150px; /* Membatasi lebar tombol pada layar kecil */
            }
        }

        .custom-swal-button {
            padding-top: .8rem;
            padding-bottom: .8rem;
        }
        }

        .activity-item:hover {
            background-color: #f8f9fa;
            border-left-color: #007bff;
            transform: translateX(5px);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .activity-item.unread {
            background-color: #e8f5e8;
            border-left-color: #28a745;
            border: 1px solid #c3e6c3;
        }

        .activity-time {
            font-size: 0.75rem;
            color: #6c757d;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            border: 1px solid #e9ecef;
        }

        /* Fix for header background issues */
        #kt_app_header {
            background: transparent !important;
            backdrop-filter: none !important;
            box-shadow: none !important;
        }

        #kt_app_header.app-header-minimize {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px) !important;
            box-shadow: 0 1px 10px rgba(0, 0, 0, 0.1) !important;
        }

        /* Ensure header container has transparent background */
        #kt_app_header_container {
            background: transparent !important;
        }

        /* Remove any double backgrounds */
        .app-header-menu {
            background: transparent !important;
        }
    </style>
