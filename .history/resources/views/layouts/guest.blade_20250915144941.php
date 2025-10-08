<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Clean Professional Font Stack */
            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Helvetica, Arial, sans-serif;
            }

            .auth-container {
                background: linear-gradient(135deg, #22c55e 0%, #16a34a 50%, #15803d 100%);
                position: relative;
                overflow: hidden;
            }

            .auth-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background:
                    radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                    radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 40% 40%, rgba(120, 119, 198, 0.2) 0%, transparent 50%);
                animation: aurora 8s ease-in-out infinite;
            }

            @keyframes aurora {
                0%, 100% {
                    opacity: 1;
                    transform: rotate(0deg);
                }
                50% {
                    opacity: 0.8;
                    transform: rotate(1deg);
                }
            }

            .floating-orb {
                position: absolute;
                border-radius: 50%;
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.05));
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            .orb-1 {
                width: 100px;
                height: 100px;
                top: 10%;
                right: 15%;
                animation: float-orb-1 6s ease-in-out infinite;
            }

            .orb-2 {
                width: 60px;
                height: 60px;
                top: 60%;
                right: 80%;
                animation: float-orb-2 8s ease-in-out infinite reverse;
            }

            .orb-3 {
                width: 80px;
                height: 80px;
                bottom: 20%;
                left: 10%;
                animation: float-orb-3 7s ease-in-out infinite;
            }

            @keyframes float-orb-1 {
                0%, 100% { transform: translate(0, 0) rotate(0deg); }
                33% { transform: translate(30px, -30px) rotate(120deg); }
                66% { transform: translate(-20px, 20px) rotate(240deg); }
            }

            @keyframes float-orb-2 {
                0%, 100% { transform: translate(0, 0) scale(1); }
                50% { transform: translate(-40px, -60px) scale(1.2); }
            }

            @keyframes float-orb-3 {
                0%, 100% { transform: translate(0, 0) rotate(0deg); }
                25% { transform: translate(20px, -40px) rotate(90deg); }
                50% { transform: translate(40px, 0px) rotate(180deg); }
                75% { transform: translate(20px, 40px) rotate(270deg); }
            }

            .glass-effect {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                box-shadow:
                    0 25px 50px -12px rgba(0, 0, 0, 0.25),
                    0 0 0 1px rgba(255, 255, 255, 0.05);
            }

            .form-input-modern {
                background: rgba(249, 250, 251, 0.8);
                backdrop-filter: blur(10px);
                border: 2px solid rgba(229, 231, 235, 0.6);
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                font-family: inherit;
            }

            .form-input-modern:focus {
                background: rgba(255, 255, 255, 0.95);
                border-color: #667eea;
                box-shadow:
                    0 0 0 4px rgba(102, 126, 234, 0.1),
                    0 10px 25px -5px rgba(102, 126, 234, 0.2);
                transform: translateY(-2px);
            }

            .btn-gradient {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                background-size: 200% 200%;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: 0 10px 25px -5px rgba(102, 126, 234, 0.4);
                font-family: inherit;
                font-weight: 600;
                letter-spacing: 0.005em;
            }

            .btn-gradient:hover {
                background-position: right center;
                transform: translateY(-3px);
                box-shadow: 0 20px 40px -5px rgba(102, 126, 234, 0.6);
            }

            .feature-card {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .feature-card:hover {
                transform: translateY(-5px);
                background: rgba(255, 255, 255, 0.15);
                box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.2);
            }

            .logo-animation {
                animation: pulse-glow 2s ease-in-out infinite;
            }

            @keyframes pulse-glow {
                0%, 100% {
                    box-shadow: 0 0 20px rgba(102, 126, 234, 0.5);
                    transform: scale(1);
                }
                50% {
                    box-shadow: 0 0 30px rgba(102, 126, 234, 0.8);
                    transform: scale(1.05);
                }
            }

            .text-shadow {
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .slide-in {
                animation: slideInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            }

            @keyframes slideInUp {
                from {
                    opacity: 0;
                    transform: translate3d(0, 100px, 0);
                }
                to {
                    opacity: 1;
                    transform: translate3d(0, 0, 0);
                }
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen flex">
            {{ $slot }}
        </div>
    </body>
</html>
