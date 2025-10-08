<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Smart Village') }} - Authentication</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Inter:400,500,600,700,800&display=swap" rel="stylesheet" />
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
            
            .auth-gradient {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }
            
            .auth-pattern {
                background-image: 
                    radial-gradient(circle at 25% 25%, rgba(255,255,255,0.1) 2px, transparent 2px),
                    radial-gradient(circle at 75% 75%, rgba(255,255,255,0.1) 2px, transparent 2px);
                background-size: 60px 60px;
            }
            
            .floating-elements {
                position: absolute;
                inset: 0;
                overflow: hidden;
            }
            
            .floating-elements::before {
                content: '';
                position: absolute;
                top: 20%;
                right: 10%;
                width: 200px;
                height: 200px;
                background: rgba(255,255,255,0.1);
                border-radius: 50%;
                animation: float 6s ease-in-out infinite;
            }
            
            .floating-elements::after {
                content: '';
                position: absolute;
                bottom: 20%;
                left: 10%;
                width: 150px;
                height: 150px;
                background: rgba(255,255,255,0.08);
                border-radius: 50%;
                animation: float 8s ease-in-out infinite reverse;
            }
            
            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(10deg); }
            }
            
            .form-input {
                transition: all 0.3s ease;
                border: 2px solid #e5e7eb;
            }
            
            .form-input:focus {
                border-color: #667eea;
                box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
                transform: translateY(-1px);
            }
            
            .auth-button {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                transition: all 0.3s ease;
            }
            
            .auth-button:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex">
            {{ $slot }}
        </div>
    </body>
</html>
