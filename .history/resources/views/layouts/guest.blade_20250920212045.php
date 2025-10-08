<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Inter:400,500,600,700,800&display=swap" rel="stylesheet" />
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <!-- Particles.js -->
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
            
            /* Glass morphism effect */
            .glass-effect {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            
            /* Modern form inputs */
            .form-input-modern {
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(10px);
                border: 2px solid rgba(59, 130, 246, 0.1);
                transition: all 0.3s ease;
            }
            
            .form-input-modern:focus {
                background: rgba(255, 255, 255, 0.95);
                border-color: rgba(59, 130, 246, 0.5);
                box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
                transform: translateY(-1px);
            }
            
            /* Gradient button */
            .btn-gradient {
                background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
                box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
                transition: all 0.3s ease;
            }
            
            .btn-gradient:hover {
                background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
                box-shadow: 0 15px 35px rgba(59, 130, 246, 0.4);
                transform: translateY(-2px);
            }
            
            /* Auth container gradient */
            .auth-container {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                position: relative;
                overflow: hidden;
            }
            
            /* Floating animation */
            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                33% { transform: translateY(-10px) rotate(1deg); }
                66% { transform: translateY(5px) rotate(-1deg); }
            }
            
            .floating-orb {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.1);
                animation: float 6s ease-in-out infinite;
            }
            
            .orb-1 {
                width: 120px;
                height: 120px;
                top: 20%;
                left: 10%;
                animation-delay: 0s;
            }
            
            .orb-2 {
                width: 80px;
                height: 80px;
                top: 60%;
                right: 15%;
                animation-delay: 2s;
            }
            
            .orb-3 {
                width: 150px;
                height: 150px;
                bottom: 20%;
                left: 20%;
                animation-delay: 4s;
            }
            
            /* Text shadow */
            .text-shadow {
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            
            /* Feature cards */
            .feature-card {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                transition: all 0.3s ease;
            }
            
            .feature-card:hover {
                background: rgba(255, 255, 255, 0.15);
                transform: translateY(-2px);
            }
            
            /* Slide in animation */
            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translateX(-30px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
            
            .slide-in {
                animation: slideIn 0.6s ease-out;
            }
            
            /* Logo animation */
            @keyframes logoFloat {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-5px); }
            }
            
            .logo-animation {
                animation: logoFloat 3s ease-in-out infinite;
            }
            
            /* Particles container */
            #particles-js {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex">
            {{ $slot }}
        </div>
    </body>
</html>
