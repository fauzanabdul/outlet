<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5, user-scalable=yes">
    <title>Outlet Premium • Digital Motoshop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg-primary: #0a0c0f;
            --bg-secondary: #11161c;
            --bg-card: #1a1e26;
            --bg-card-hover: #222832;
            --border-subtle: rgba(255, 255, 255, 0.03);
            --border-hover: rgba(59, 130, 246, 0.3);
            --text-primary: #ffffff;
            --text-secondary: #9ca3af;
            --text-muted: #6b7280;
            --accent-blue: #3b82f6;
            --accent-blue-dark: #2563eb;
            --accent-green: #10b981;
            --accent-purple: #8b5cf6;
            --accent-orange: #f59e0b;
            --gradient-primary: linear-gradient(135deg, #2563eb, #3b82f6);
            --gradient-premium: linear-gradient(135deg, #2563eb, #8b5cf6);
            --gradient-dark: linear-gradient(145deg, #1a1e26, #11161c);
            --shadow-card: 0 10px 30px -10px rgba(0, 0, 0, 0.5);
            --shadow-hover: 0 20px 40px -15px rgba(0, 0, 0, 0.8);
            --glow-blue: 0 0 20px rgba(59, 130, 246, 0.2);
            --glow-purple: 0 0 20px rgba(139, 92, 246, 0.2);
        }

        body {
            background: var(--bg-primary);
            color: var(--text-primary);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
            width: 100%;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 30%, rgba(37, 99, 235, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(139, 92, 246, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 40% 90%, rgba(16, 185, 129, 0.03) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }

        /* Container Responsif */
        .container-responsive {
            width: 100%;
            max-width: 1280px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        @media (min-width: 640px) {
            .container-responsive {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
        }

        @media (min-width: 1024px) {
            .container-responsive {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }

        /* Glassmorphism Dark Responsif */
        .glass-dark {
            background: rgba(18, 22, 28, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.03);
        }

        .glass-card {
            background: linear-gradient(145deg, rgba(26, 32, 39, 0.95), rgba(18, 22, 28, 0.98));
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.03);
            box-shadow: var(--shadow-card);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @media (hover: hover) {
            .glass-card:hover {
                background: linear-gradient(145deg, rgba(32, 38, 47, 0.95), rgba(22, 28, 36, 0.98));
                border-color: rgba(59, 130, 246, 0.2);
                box-shadow: var(--shadow-hover), var(--glow-blue);
                transform: translateY(-6px);
            }
        }

        /* Navigation Premium Responsif */
        .nav-premium {
            background: rgba(10, 12, 15, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(59, 130, 246, 0.1);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 50;
            width: 100%;
        }

        /* Mobile Menu */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 80%;
            max-width: 320px;
            height: 100vh;
            background: rgba(10, 12, 15, 0.98);
            backdrop-filter: blur(20px);
            border-left: 1px solid rgba(59, 130, 246, 0.1);
            transition: right 0.3s ease-in-out;
            z-index: 100;
            padding: 2rem 1.5rem;
            overflow-y: auto;
        }

        .mobile-menu.active {
            right: 0;
        }

        .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            z-index: 99;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .mobile-menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #60a5fa, #a78bfa);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        .gradient-text-premium {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6, #ec4899);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 200% 200%;
            animation: gradient-shift 8s ease infinite;
        }

        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        /* Product Card Responsif */
        .product-card {
            background: linear-gradient(145deg, #1a1e26, #14181f);
            border: 1px solid rgba(59, 130, 246, 0.1);
            border-radius: 24px;
            padding: 1.25rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        @media (min-width: 640px) {
            .product-card {
                padding: 1.5rem;
            }
        }

        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple));
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        @media (hover: hover) {
            .product-card:hover {
                border-color: rgba(59, 130, 246, 0.3);
                box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.8), 0 0 0 1px rgba(59, 130, 246, 0.2);
                transform: translateY(-8px) scale(1.02);
            }

            .product-card:hover::before {
                opacity: 1;
            }

            .product-card:hover .product-image img {
                transform: scale(1.1);
            }
        }

        .product-image {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            background: linear-gradient(145deg, #222832, #1a1e26);
            padding: 0.5rem;
        }

        .product-image img {
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 12px;
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        @media (min-width: 768px) {
            .product-image img {
                height: 200px;
            }
        }

        @media (min-width: 1024px) {
            .product-image img {
                height: 220px;
            }
        }

        /* Feature Icon Responsif */
        .feature-icon {
            background: linear-gradient(145deg, rgba(59, 130, 246, 0.1), rgba(139, 92, 246, 0.05));
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 18px;
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.4s ease;
        }

        @media (min-width: 768px) {
            .feature-icon {
                width: 64px;
                height: 64px;
            }
        }

        @media (hover: hover) {
            .glass-card:hover .feature-icon {
                background: linear-gradient(145deg, rgba(59, 130, 246, 0.2), rgba(139, 92, 246, 0.1));
                border-color: rgba(59, 130, 246, 0.4);
                transform: scale(1.1) rotate(5deg);
            }

            .glass-card:hover .feature-icon i {
                transform: scale(1.1);
                color: white !important;
            }
        }

        /* Button Gradient Responsif */
        .btn-gradient {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            position: relative;
            overflow: hidden;
            z-index: 1;
            transition: all 0.4s ease;
            border: none;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-gradient::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            opacity: 0;
            z-index: -1;
            transition: opacity 0.4s ease;
        }

        @media (hover: hover) {
            .btn-gradient:hover::before {
                opacity: 1;
            }

            .btn-gradient:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(59, 130, 246, 0.5);
            }
        }

        .btn-outline {
            background: transparent;
            border: 1.5px solid rgba(59, 130, 246, 0.5);
            color: white;
            transition: all 0.4s ease;
            backdrop-filter: blur(4px);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        @media (hover: hover) {
            .btn-outline:hover {
                background: rgba(59, 130, 246, 0.1);
                border-color: #3b82f6;
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
                transform: translateY(-2px);
            }
        }

        /* Hero Section Responsif */
        .hero-title {
            font-size: 2.5rem;
            line-height: 1.2;
        }

        @media (min-width: 640px) {
            .hero-title {
                font-size: 3rem;
            }
        }

        @media (min-width: 768px) {
            .hero-title {
                font-size: 3.5rem;
            }
        }

        @media (min-width: 1024px) {
            .hero-title {
                font-size: 4rem;
            }
        }

        @media (min-width: 1280px) {
            .hero-title {
                font-size: 4.5rem;
            }
        }

        /* Brand Card Responsif */
        .brand-card {
            background: linear-gradient(145deg, #1a1e26, #14181f);
            border: 1px solid rgba(255, 255, 255, 0.03);
            border-radius: 20px;
            padding: 1.25rem;
            transition: all 0.4s ease;
            height: 100%;
        }

        @media (min-width: 640px) {
            .brand-card {
                padding: 1.5rem;
            }
        }

        @media (hover: hover) {
            .brand-card:hover {
                border-color: rgba(59, 130, 246, 0.3);
                box-shadow: 0 10px 30px -10px rgba(37, 99, 235, 0.3);
                transform: translateY(-4px) scale(1.05);
            }
        }

        /* Footer Dark Responsif */
        .footer-dark {
            background: linear-gradient(180deg, #0f1217, #0a0c0f);
            border-top: 1px solid rgba(59, 130, 246, 0.1);
            position: relative;
            width: 100%;
        }

        .footer-dark::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #3b82f6, #8b5cf6, transparent);
        }

        .social-icon {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.4s ease;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (min-width: 768px) {
            .social-icon {
                width: 44px;
                height: 44px;
            }
        }

        @media (hover: hover) {
            .social-icon:hover {
                background: var(--gradient-premium);
                border-color: transparent;
                transform: translateY(-4px);
            }

            .social-icon:hover i {
                color: white !important;
            }
        }

        /* Dropdown Mobile */
        .dropdown-mobile {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .dropdown-mobile.active {
            max-height: 300px;
            transition: max-height 0.5s ease-in;
        }

        /* Grid Responsif */
        .grid-responsive {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        @media (min-width: 640px) {
            .grid-responsive {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }
        }

        @media (min-width: 1024px) {
            .grid-responsive {
                grid-template-columns: repeat(3, 1fr);
                gap: 2rem;
            }
        }

        .grid-features {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        @media (min-width: 640px) {
            .grid-features {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .grid-features {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .grid-brands {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        @media (min-width: 640px) {
            .grid-brands {
                grid-template-columns: repeat(3, 1fr);
                gap: 1.25rem;
            }
        }

        @media (min-width: 1024px) {
            .grid-brands {
                grid-template-columns: repeat(6, 1fr);
                gap: 1.5rem;
            }
        }

        .grid-footer {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2.5rem;
        }

        @media (min-width: 768px) {
            .grid-footer {
                grid-template-columns: repeat(2, 1fr);
                gap: 2.5rem;
            }
        }

        @media (min-width: 1024px) {
            .grid-footer {
                grid-template-columns: repeat(4, 1fr);
                gap: 3rem;
            }
        }

        /* Scrollbar Dark */
        ::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }

        @media (min-width: 768px) {
            ::-webkit-scrollbar {
                width: 8px;
                height: 8px;
            }
        }

        ::-webkit-scrollbar-track {
            background: #0f1217;
        }

        ::-webkit-scrollbar-thumb {
            background: #2d3748;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #4a5568;
        }

        /* Pulse Animation */
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.3); }
            50% { box-shadow: 0 0 30px 5px rgba(59, 130, 246, 0.2); }
        }

        .pulse-glow {
            animation: pulse-glow 3s infinite;
        }

        /* Floating Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .float {
            animation: float 6s ease-in-out infinite;
        }

        /* Touch Optimizations */
        @media (hover: none) and (pointer: coarse) {
            .btn-gradient, 
            .btn-outline,
            .product-card,
            .brand-card,
            .social-icon {
                transform: none !important;
            }
            
            .btn-gradient:active {
                background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            }
            
            .btn-outline:active {
                background: rgba(59, 130, 246, 0.2);
                border-color: #3b82f6;
            }
            
            .product-card:active {
                background: linear-gradient(145deg, #222832, #1a1e26);
                border-color: rgba(59, 130, 246, 0.3);
            }
        }

        /* Utility Classes */
        .touch-target {
            min-height: 44px;
            min-width: 44px;
        }

        .text-responsive {
            font-size: clamp(0.875rem, 2vw, 1rem);
        }

        .heading-responsive {
            font-size: clamp(1.5rem, 5vw, 2.5rem);
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="relative overflow-x-hidden">

<!-- Mobile Menu Overlay -->
<div id="mobileMenuOverlay" class="mobile-menu-overlay"></div>

<!-- Mobile Menu -->
<div id="mobileMenu" class="mobile-menu">
    <div class="flex justify-between items-center mb-8">
        <div class="flex items-center space-x-3">
            <div class="bg-gradient-to-br from-blue-600 to-purple-600 p-2 rounded-xl">
                <i class="fas fa-motorcycle text-white text-xl"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold">
                    <span class="gradient-text-premium">Outlet</span>
                </h2>
            </div>
        </div>
        <button id="closeMobileMenu" class="text-gray-400 hover:text-white text-2xl touch-target">
            <i class="fas fa-times"></i>
        </button>
    </div>
    
    <div class="space-y-6">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 text-gray-300 hover:text-white py-3 px-4 rounded-xl hover:bg-white/5 transition-all">
            <i class="fas fa-home text-blue-400 w-5"></i>
            <span class="font-medium">Beranda</span>
        </a>
        
        <div>
            <button id="mobileProdukDropdown" class="flex items-center justify-between w-full text-gray-300 hover:text-white py-3 px-4 rounded-xl hover:bg-white/5 transition-all">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-box text-blue-400 w-5"></i>
                    <span class="font-medium">Produk</span>
                </div>
                <i class="fas fa-chevron-down text-xs transition-transform duration-300" id="dropdownIcon"></i>
            </button>
            
            <div id="mobileDropdownMenu" class="dropdown-mobile ml-12 mt-2 space-y-2">
                @forelse ($kategoris as $kategori)
                    <a href="/kategori/{{ $kategori->id }}" class="block py-2 px-4 text-gray-400 hover:text-white hover:bg-white/5 rounded-lg text-sm">
                        <i class="fas fa-tag text-xs text-blue-400 mr-2"></i>
                        {{ $kategori->nama_kategori }}
                    </a>
                @empty
                    <span class="block py-2 px-4 text-gray-500 text-sm">
                        <i class="fas fa-info-circle mr-2"></i>
                        Kategori belum ada
                    </span>
                @endforelse
            </div>
        </div>
        
        <a href="{{ route('outlet') }}" class="flex items-center space-x-3 text-gray-300 hover:text-white py-3 px-4 rounded-xl hover:bg-white/5 transition-all">
            <i class="fas fa-store text-emerald-400 w-5"></i>
            <span class="font-medium">Outlet</span>
        </a>
        
        <div class="pt-6 mt-6 border-t border-white/10">
            <a href="{{ route('admin.dashboard') }}" class="btn-gradient text-white px-6 py-3 rounded-xl font-semibold flex items-center justify-center space-x-2 w-full">
                <i class="fas fa-user-cog"></i>
                <span>Admin Panel</span>
            </a>
        </div>
    </div>
</div>

<!-- NAVIGATION PREMIUM DARK - RESPONSIF -->
<nav class="nav-premium py-3 md:py-4 px-4 sm:px-6 lg:px-8">
    <div class="container-responsive flex items-center justify-between">
        <!-- Logo Premium -->
        <div class="flex items-center space-x-2 sm:space-x-3 group">
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl sm:rounded-2xl blur-lg opacity-50 group-hover:opacity-80 transition-opacity"></div>
                <div class="relative bg-gradient-to-br from-blue-600 to-purple-600 p-2 sm:p-3 rounded-xl sm:rounded-2xl shadow-lg shadow-blue-600/30">
                    <i class="fas fa-motorcycle text-white text-lg sm:text-xl md:text-2xl"></i>
                </div>
            </div>
            <div>
                <h1 class="text-xl sm:text-2xl font-bold tracking-tight">
                    <span class="gradient-text-premium">Outlet</span>
                </h1>
                <p class="text-[10px] sm:text-xs text-gray-400 tracking-wider hidden xs:block">DIGITAL MOTOSHOP</p>
            </div>
        </div>

        <!-- Desktop Navigation Links -->
        <div class="hidden md:flex items-center space-x-6 lg:space-x-8">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 text-gray-300 hover:text-white transition-colors font-medium group relative">
                <i class="fas fa-home text-blue-400 group-hover:text-blue-300 transition-colors"></i>
                <span>Beranda</span>
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-purple-500 group-hover:w-full transition-all duration-300"></span>
            </a>
            
            <!-- Produk Dropdown Premium Desktop -->
            <div class="relative group">
                <button class="flex items-center space-x-2 text-gray-300 hover:text-white font-medium py-2">
                    <i class="fas fa-box text-blue-400"></i>
                    <span>Produk</span>
                    <i class="fas fa-chevron-down text-xs text-gray-400 group-hover:text-blue-400 transition-all group-hover:rotate-180"></i>
                </button>

                <div class="absolute left-0 mt-2 w-56 lg:w-64 dropdown-premium opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 overflow-hidden rounded-xl">
                    @forelse ($kategoris as $kategori)
                        <a href="/kategori/{{ $kategori->id }}"
                           class="block px-5 py-2.5 lg:px-6 lg:py-3 {{ $loop->first ? 'pt-3 lg:pt-4' : '' }} {{ $loop->last ? 'pb-3 lg:pb-4' : '' }} hover:bg-blue-600/10 text-gray-300 hover:text-white flex items-center gap-3 text-sm lg:text-base">
                            <i class="fas fa-tag text-xs text-blue-400"></i>
                            {{ $kategori->nama_kategori }}
                        </a>
                    @empty
                        <span class="block px-6 py-4 text-gray-400 text-sm">
                            <i class="fas fa-info-circle mr-2"></i>
                            Kategori belum ada
                        </span>
                    @endforelse
                </div>
            </div>
            
            <a href="{{ route('outlet') }}" class="flex items-center space-x-2 text-gray-300 hover:text-white transition-colors font-medium group">
                <i class="fas fa-store text-emerald-400 group-hover:text-emerald-300"></i>
                <span>Outlet</span>
            </a>
        </div>

        <!-- CTA Buttons -->
        <div class="flex items-center space-x-2 sm:space-x-4">
            <button id="menuToggle" class="md:hidden text-gray-300 hover:text-white text-xl sm:text-2xl touch-target w-10 h-10 flex items-center justify-center">
                <i class="fas fa-bars"></i>
            </button>
            <a href="{{ route('admin.dashboard') }}" 
               class="btn-gradient text-white px-4 sm:px-6 py-2 sm:py-2.5 rounded-xl font-semibold transition-all flex items-center space-x-1 sm:space-x-2 pulse-glow text-sm sm:text-base">
                <i class="fas fa-user-cog"></i>
                <span class="hidden xs:inline">Admin Panel</span>
                <span class="xs:hidden">Admin</span>
            </a>
        </div>
    </div>
</nav>

<!-- HERO SECTION DARK PREMIUM - RESPONSIF -->
<section class="px-4 sm:px-6 lg:px-8 py-12 sm:py-16 md:py-20 lg:py-24 relative overflow-hidden">
    <!-- Animated Background Responsif -->
    <div class="absolute top-10 left-5 sm:top-20 sm:left-10 w-48 sm:w-72 h-48 sm:h-72 bg-blue-600/10 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-10 right-5 sm:bottom-20 sm:right-10 w-64 sm:w-96 h-64 sm:h-96 bg-purple-600/10 rounded-full blur-3xl animate-pulse animation-delay-2000"></div>
    <div class="absolute top-1/2 left-1/4 w-48 sm:w-64 h-48 sm:h-64 bg-emerald-600/5 rounded-full blur-3xl"></div>
    
    <div class="container-responsive relative z-10">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <!-- Left Content -->
            <div class="space-y-6 sm:space-y-8 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 glass-card px-3 py-1.5 sm:px-4 sm:py-2 rounded-full text-xs sm:text-sm mx-auto lg:mx-0">
                    <span class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-green-500 rounded-full animate-pulse"></span>
                    <span class="text-gray-300">Premium Motoshop • Since 2024</span>
                </div>
                
                <h1 class="hero-title font-bold leading-tight">
                    <span class="text-white">Upgrade</span><br>
                    <span class="gradient-text-premium">Performance</span><br>
                    <span class="text-white">Motor Anda</span>
                </h1>
                
                <p class="text-gray-400 text-sm sm:text-base md:text-lg max-w-xl leading-relaxed mx-auto lg:mx-0">
                    Temukan produk dan layanan terbaik untuk motor Anda dengan harga spesial. 
                    Kualitas premium, garansi resmi, dan layanan purna jual terpercaya.
                </p>
                
                <div class="flex flex-wrap gap-3 sm:gap-5 justify-center lg:justify-start">
                    <a href="{{ route('produk') }}" 
                       class="btn-gradient text-white px-6 sm:px-8 py-3 sm:py-4 rounded-xl font-bold transition-all flex items-center space-x-2 sm:space-x-3 text-sm sm:text-base">
                        <i class="fas fa-bolt group-hover:rotate-12 transition-transform"></i>
                        <span>Jelajahi Produk</span>
                    </a>
                    <a href="{{ route('outlet') }}" 
                       class="btn-outline px-6 sm:px-8 py-3 sm:py-4 rounded-xl font-bold flex items-center space-x-2 sm:space-x-3 text-sm sm:text-base">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Cari Outlet</span>
                    </a>
                </div>
                
                <!-- Stats Mobile -->
                <div class="grid grid-cols-3 gap-4 pt-6 sm:pt-8 lg:hidden">
                    <div class="text-center">
                        <p class="text-2xl sm:text-3xl font-bold text-white">500+</p>
                        <p class="text-xs sm:text-sm text-gray-400">Produk</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl sm:text-3xl font-bold text-white">12K+</p>
                        <p class="text-xs sm:text-sm text-gray-400">Pelanggan</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl sm:text-3xl font-bold text-white">15+</p>
                        <p class="text-xs sm:text-sm text-gray-400">Outlet</p>
                    </div>
                </div>
            </div>
            
            <!-- Right Content - Hero Image (Desktop Only) -->
            <div class="relative hidden lg:block">
                <div class="relative z-10 float">
                    <div class="glass-card p-5 lg:p-6 rounded-2xl lg:rounded-3xl transform rotate-2 lg:rotate-3 hover:rotate-0 transition-all duration-500">
                        <div class="rounded-xl lg:rounded-2xl overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1558981806-ec527fa84c39?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" 
                                 alt="Motorcycle" 
                                 class="w-full h-auto rounded-xl lg:rounded-2xl">
                        </div>
                    </div>
                </div>
                <div class="absolute -bottom-8 lg:-bottom-10 -left-8 lg:-left-10 w-32 lg:w-40 h-32 lg:h-40 bg-gradient-to-r from-blue-600/30 to-purple-600/30 rounded-full blur-3xl"></div>
            </div>
        </div>
    </div>
</section>

<!-- FEATURED PRODUCTS DARK - RESPONSIF -->
<section class="px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20 relative">
    <div class="container-responsive">
        <div class="text-center mb-8 sm:mb-10 lg:mb-12">
           
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-3 sm:mb-4 mt-2">
                Produk <span class="gradient-text-premium">Kami</span>
            </h2>
            <p class="text-gray-400 text-sm sm:text-base md:text-lg max-w-2xl mx-auto px-4">
                Pilihan terbaik dari brand ternama dengan kualitas dan performa terbaik
            </p>
        </div>
        
        <div class="grid-responsive">
            @foreach($produks as $produk)
            <div class="product-card group">
                <!-- Product Image -->
                <div class="product-image mb-4 sm:mb-5">
                    <img src="{{ asset('storage/'.$produk->gambar) }}" 
                         alt="{{ $produk->nama_produk }}"
                         class="w-full h-48 sm:h-56 object-cover"
                         loading="lazy">
                    <div class="absolute top-3 right-3 text-white px-2 py-1 rounded-full text-[10px] sm:text-xs font-semibold">
                    
                    </div>
                </div>
                
                <!-- Product Info -->
                <div class="space-y-2 sm:space-y-3 flex-grow">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg sm:text-xl font-bold text-white group-hover:text-blue-400 transition-colors">
                            {{ $produk->nama_produk }}
                        </h3>
                    </div>
                </div>
                
                <!-- Price & CTA -->
                <div class="flex items-center justify-between mt-4 sm:mt-6 pt-3 sm:pt-4 border-t border-white/5">
                    <div>
                        
                    </div>
                    <a href="{{ route('produk.kategori', $produk->id) }}"
                       class="btn-gradient text-white px-4 sm:px-5 py-2 sm:py-2.5 rounded-xl font-medium transition-all flex items-center space-x-1 sm:space-x-2 text-xs sm:text-sm">
                        <i class="fas fa-eye"></i>
                        <span>Lihat Produk</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        
    </div>
</section>


        </div>
        
        <div class="grid-features">
           
        </div>
    </div>
</section>

<!-- BRANDS SECTION DARK - RESPONSIF -->
<section class="px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
    <div class="container-responsive">
        <div class="text-center mb-8 sm:mb-10 lg:mb-12">
            <span class="text-gray-400 text-xs sm:text-sm tracking-wider uppercase">Official Partner</span>
            <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-2 mt-2 text-white">
                Brand <span class="gradient-text-premium">Terpercaya</span>
            </h3>
        </div>
        
        <div class="grid-brands">
            @foreach(['Yamaha', 'Honda', 'Michelin', 'Bridgestone', 'Bosch', 'NGK'] as $brand)
            <div class="brand-card group">
                <div class="text-center">
                    <div class="text-3xl sm:text-4xl mb-2 sm:mb-3 filter grayscale group-hover:grayscale-0 transition-all">
                        🏍️
                    </div>
                    <div class="font-bold text-white group-hover:text-blue-400 transition-colors text-base sm:text-lg">
                        {{ $brand }}
                    </div>
                    <div class="text-[10px] sm:text-xs text-gray-500 mt-1">Official Partner</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- FOOTER DARK PREMIUM - RESPONSIF -->
<footer class="footer-dark relative z-10 mt-16 sm:mt-20">
    <div class="container-responsive py-12 sm:py-16">
        <div class="grid-footer">
            <!-- Company Info -->
            <div class="space-y-4 sm:space-y-6">
                <div class="flex items-center space-x-3 group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl sm:rounded-2xl blur-md opacity-50"></div>
                        <div class="relative bg-gradient-to-br from-blue-600 to-purple-600 p-2 sm:p-2.5 rounded-xl sm:rounded-2xl">
                            <i class="fas fa-motorcycle text-white text-lg sm:text-xl"></i>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-xl sm:text-2xl font-bold">
                            <span class="text-white">Si</span><span class="gradient-text-premium">Tepat</span>
                        </h2>
                        <p class="text-[10px] sm:text-xs text-gray-400 tracking-wider">Since 2024</p>
                    </div>
                </div>
                <p class="text-gray-400 text-xs sm:text-sm leading-relaxed">
                    Solusi lengkap untuk kebutuhan motor Anda. Produk berkualitas premium, layanan terpercaya, dan harga terbaik.
                </p>
                <div class="flex space-x-2 sm:space-x-3">
                    <a href="#" class="social-icon">
                        <i class="fab fa-instagram text-gray-400 text-sm sm:text-base"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f text-gray-400 text-sm sm:text-base"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-whatsapp text-gray-400 text-sm sm:text-base"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-youtube text-gray-400 text-sm sm:text-base"></i>
                    </a>
                </div>
            </div>
            
            <!-- Contact -->
            <div>
                <h3 class="text-base sm:text-lg font-bold mb-4 sm:mb-6 text-white flex items-center gap-2">
                    <i class="fas fa-headset text-blue-400 text-sm sm:text-base"></i>
                    Kontak Kami
                </h3>
                <ul class="space-y-3 sm:space-y-4">
                    <li class="flex items-start gap-3 sm:gap-4 group">
                        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-blue-600/20 transition-colors">
                            <i class="fas fa-phone text-blue-400 text-xs sm:text-sm"></i>
                        </div>
                        <div>
                            <div class="font-medium text-white text-sm sm:text-base">Telepon</div>
                            <div class="text-gray-400 text-xs sm:text-sm">+62 895-3802-56094</div>
                        </div>
                    </li>
                    <li class="flex items-start gap-3 sm:gap-4 group">
                        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-purple-600/20 transition-colors">
                            <i class="fas fa-envelope text-purple-400 text-xs sm:text-sm"></i>
                        </div>
                        <div>
                            <div class="font-medium text-white text-sm sm:text-base">Email</div>
                            <div class="text-gray-400 text-xs sm:text-sm">support@sitepat.com</div>
                        </div>
                    </li>
                    <li class="flex items-start gap-3 sm:gap-4 group">
                        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-emerald-600/20 transition-colors">
                            <i class="fas fa-clock text-emerald-400 text-xs sm:text-sm"></i>
                        </div>
                        <div>
                            <div class="font-medium text-white text-sm sm:text-base">Jam Operasional</div>
                            <div class="text-gray-400 text-xs sm:text-sm">Senin - Minggu, 08:00 - 22:00</div>
                        </div>
                    </li>
                </ul>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h3 class="text-base sm:text-lg font-bold mb-4 sm:mb-6 text-white flex items-center gap-2">
                    <i class="fas fa-link text-amber-400 text-sm sm:text-base"></i>
                    Tautan Cepat
                </h3>
                <ul class="space-y-2 sm:space-y-3">
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group text-sm sm:text-base">
                            <i class="fas fa-chevron-right text-xs text-blue-400 group-hover:translate-x-1 transition-transform"></i>
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group text-sm sm:text-base">
                            <i class="fas fa-chevron-right text-xs text-blue-400 group-hover:translate-x-1 transition-transform"></i>
                            Karir
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group text-sm sm:text-base">
                            <i class="fas fa-chevron-right text-xs text-blue-400 group-hover:translate-x-1 transition-transform"></i>
                            Kebijakan Privasi
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group text-sm sm:text-base">
                            <i class="fas fa-chevron-right text-xs text-blue-400 group-hover:translate-x-1 transition-transform"></i>
                            Syarat & Ketentuan
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Newsletter -->
            <div>
                <h3 class="text-base sm:text-lg font-bold mb-4 sm:mb-6 text-white flex items-center gap-2">
                    <i class="fas fa-newspaper text-pink-400 text-sm sm:text-base"></i>
                    Newsletter
                </h3>
                <p class="text-gray-400 text-xs sm:text-sm mb-4 sm:mb-5">
                    Dapatkan promo spesial dan update produk terbaru.
                </p>
                <form class="space-y-3">
                    <div class="relative">
                        <input type="email" 
                               placeholder="Email Anda" 
                               class="w-full px-4 sm:px-5 py-3 sm:py-4 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all text-sm sm:text-base">
                        <button class="absolute right-1.5 sm:right-2 top-1/2 -translate-y-1/2 btn-gradient text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg text-xs sm:text-sm">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                    <p class="text-[10px] sm:text-xs text-gray-500">
                        *Dapatkan voucher 50K untuk member baru
                    </p>
                </form>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="border-t border-white/5 mt-10 sm:mt-12 pt-6 sm:pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-3 sm:gap-4">
                <p class="text-gray-400 text-xs sm:text-sm order-2 md:order-1 text-center md:text-left">
                    © {{ date('Y') }} <span class="text-white">SiTepat Digital Motoshop</span>. All rights reserved.
                </p>
                <p class="text-gray-500 text-[10px] sm:text-xs flex items-center gap-1 sm:gap-2 order-1 md:order-2">
                    <i class="fas fa-code text-blue-400"></i>
                    Crafted with <i class="fas fa-heart text-red-500 mx-0.5 sm:mx-1"></i> by 
                    <span class="text-white font-medium">Fauzan</span> · 
                    <span class="text-white font-medium">Fadlan</span> · 
                    <span class="text-white font-medium">Rizky</span>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- JavaScript for Interactive Elements - Responsif -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // DOM Elements
        const menuToggle = document.getElementById('menuToggle');
        const closeMenu = document.getElementById('closeMobileMenu');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileOverlay = document.getElementById('mobileMenuOverlay');
        const mobileProdukDropdown = document.getElementById('mobileProdukDropdown');
        const mobileDropdownMenu = document.getElementById('mobileDropdownMenu');
        const dropdownIcon = document.getElementById('dropdownIcon');
        const nav = document.querySelector('nav');
        
        // Toggle Mobile Menu
        if (menuToggle && mobileMenu && mobileOverlay && closeMenu) {
            menuToggle.addEventListener('click', function() {
                mobileMenu.classList.add('active');
                mobileOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
            
            function closeMobileMenu() {
                mobileMenu.classList.remove('active');
                mobileOverlay.classList.remove('active');
                document.body.style.overflow = '';
                
                // Reset dropdown
                if (mobileDropdownMenu) {
                    mobileDropdownMenu.classList.remove('active');
                }
                if (dropdownIcon) {
                    dropdownIcon.style.transform = 'rotate(0deg)';
                }
            }
            
            closeMenu.addEventListener('click', closeMobileMenu);
            mobileOverlay.addEventListener('click', closeMobileMenu);
        }
        
        // Mobile Produk Dropdown
        if (mobileProdukDropdown && mobileDropdownMenu && dropdownIcon) {
            mobileProdukDropdown.addEventListener('click', function(e) {
                e.preventDefault();
                mobileDropdownMenu.classList.toggle('active');
                
                if (mobileDropdownMenu.classList.contains('active')) {
                    dropdownIcon.style.transform = 'rotate(180deg)';
                } else {
                    dropdownIcon.style.transform = 'rotate(0deg)';
                }
            });
        }
        
        // Navbar scroll effect with throttle for performance
        let ticking = false;
        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    if (window.scrollY > 50) {
                        nav.style.background = 'rgba(10, 12, 15, 0.95)';
                        nav.style.borderBottom = '1px solid rgba(59, 130, 246, 0.2)';
                    } else {
                        nav.style.background = 'rgba(10, 12, 15, 0.85)';
                        nav.style.borderBottom = '1px solid rgba(59, 130, 246, 0.1)';
                    }
                    ticking = false;
                });
                ticking = true;
            }
        });
        
        // Product cards parallax effect - disable on mobile
        if (window.innerWidth > 1024) {
            const productCards = document.querySelectorAll('.product-card');
            productCards.forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    
                    const xCenter = rect.width / 2;
                    const yCenter = rect.height / 2;
                    
                    const xRotate = (y - yCenter) / 20;
                    const yRotate = (xCenter - x) / 20;
                    
                    card.style.transform = `perspective(1000px) rotateX(${xRotate}deg) rotateY(${yRotate}deg) translateY(-8px)`;
                });
                
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0)';
                });
            });
        }
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Close mobile menu on window resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if (window.innerWidth >= 768 && mobileMenu && mobileMenu.classList.contains('active')) {
                    mobileMenu.classList.remove('active');
                    mobileOverlay.classList.remove('active');
                    document.body.style.overflow = '';
                    
                    if (mobileDropdownMenu) {
                        mobileDropdownMenu.classList.remove('active');
                    }
                    if (dropdownIcon) {
                        dropdownIcon.style.transform = 'rotate(0deg)';
                    }
                }
            }, 250);
        });
        
        // Touch optimization for mobile
        if ('ontouchstart' in window) {
            document.body.classList.add('touch-device');
            
            // Remove hover effects on touch devices
            const hoverElements = document.querySelectorAll('.product-card, .brand-card, .btn-gradient, .btn-outline');
            hoverElements.forEach(el => {
                el.addEventListener('touchstart', function() {
                    // Add active state on touch
                    this.classList.add('touch-active');
                });
                
                el.addEventListener('touchend', function() {
                    setTimeout(() => {
                        this.classList.remove('touch-active');
                    }, 100);
                });
            });
        }
        
        // Lazy loading for images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src || img.src;
                        img.classList.add('loaded');
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    });
</script>

<!-- Add responsive meta tags and viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5, user-scalable=yes">
<meta name="theme-color" content="#0a0c0f">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

</body>
</html>