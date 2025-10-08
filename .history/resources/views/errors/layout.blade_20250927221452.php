<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Smart Village Ketapang Baru</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }

        .error-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 3rem;
            text-align: center;
            max-width: 600px;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .error-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4, #ffeaa7);
        }

        .error-icon {
            font-size: 4rem;
            margin-bottom: 2rem;
            display: inline-block;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        .error-code {
            font-size: 6rem;
            font-weight: 800;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            line-height: 1;
        }

        .error-title {
            font-size: 2rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .error-message {
            font-size: 1.1rem;
            color: #7f8c8d;
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }

        .btn-group-custom {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-custom {
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 1rem;
        }

        .btn-primary-custom {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
            color: white;
        }

        .btn-secondary-custom {
            background: rgba(108, 117, 125, 0.1);
            color: #6c757d;
            border: 2px solid rgba(108, 117, 125, 0.2);
        }

        .btn-secondary-custom:hover {
            background: #6c757d;
            color: white;
            transform: translateY(-2px);
        }

        .btn-success-custom {
            background: linear-gradient(45px, #56ab2f, #a8e6cf);
            color: white;
            box-shadow: 0 4px 15px rgba(86, 171, 47, 0.4);
        }

        .btn-success-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(86, 171, 47, 0.6);
            color: white;
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .shape {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) { top: 20%; left: 10%; animation-delay: 0s; }
        .shape:nth-child(2) { top: 60%; right: 10%; animation-delay: 2s; }
        .shape:nth-child(3) { bottom: 20%; left: 20%; animation-delay: 4s; }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .footer-info {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(108, 117, 125, 0.2);
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .error-container {
                padding: 2rem 1.5rem;
                margin: 1rem;
            }
            
            .error-code {
                font-size: 4rem;
            }
            
            .error-title {
                font-size: 1.5rem;
            }
            
            .btn-group-custom {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="floating-shapes">
            <div class="shape">
                <i class="fas fa-circle" style="font-size: 2rem;"></i>
            </div>
            <div class="shape">
                <i class="fas fa-triangle" style="font-size: 1.5rem;"></i>
            </div>
            <div class="shape">
                <i class="fas fa-square" style="font-size: 1.8rem;"></i>
            </div>
        </div>

        <div class="error-icon">
            @yield('icon')
        </div>

        <div class="error-code">
            @yield('code')
        </div>

        <h1 class="error-title">
            @yield('title')
        </h1>

        <p class="error-message">
            @yield('message')
        </p>

        <div class="btn-group-custom">
            @yield('actions')
        </div>

        <div class="footer-info">
            <strong>Smart Village Ketapang Baru</strong><br>
            Kecamatan Seluma, Kabupaten Seluma, Provinsi Bengkulu
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Back to previous page function
        function goBack() {
            if (window.history.length > 1) {
                window.history.back();
            } else {
                window.location.href = '{{ route("home") }}';
            }
        }

        // Refresh page function
        function refreshPage() {
            window.location.reload();
        }

        // Go to home function
        function goHome() {
            window.location.href = '{{ route("home") }}';
        }

        // Go to dashboard if logged in
        function goDashboard() {
            @auth
                window.location.href = '{{ route("dashboard") }}';
            @else
                window.location.href = '{{ route("login") }}';
            @endauth
        }

        // Auto-refresh for certain errors (like CSRF)
        @yield('scripts')
    </script>
</body>
</html>