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

        /* Outlet Card Premium */
        .outlet-card {
            background: linear-gradient(145deg, #1a1e26, #14181f);
            border: 1px solid rgba(59, 130, 246, 0.1);
            border-radius: 24px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .outlet-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple));
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 1;
        }

        @media (hover: hover) {
            .outlet-card:hover {
                border-color: rgba(59, 130, 246, 0.3);
                box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.8), 0 0 0 1px rgba(59, 130, 246, 0.2);
                transform: translateY(-8px) scale(1.02);
            }

            .outlet-card:hover::before {
                opacity: 1;
            }

            .outlet-card:hover .outlet-image img {
                transform: scale(1.1);
            }
        }

        .outlet-image {
            position: relative;
            overflow: hidden;
            height: 200px;
        }

        .outlet-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .outlet-image::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50px;
            background: linear-gradient(to top, #1a1e26, transparent);
            pointer-events: none;
        }

        /* Status Badge */
        .status-badge {
            background: linear-gradient(145deg, rgba(16, 185, 129, 0.15), rgba(5, 150, 105, 0.05));
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: #10b981;
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            backdrop-filter: blur(4px);
        }

        .status-badge i {
            font-size: 10px;
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

        /* Search Input */
        .search-input {
            background: rgba(26, 32, 39, 0.8);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 16px;
            padding: 14px 20px 14px 48px;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
            background: rgba(32, 38, 47, 0.95);
        }

        .search-input::placeholder {
            color: #6b7280;
        }

        .search-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            pointer-events: none;
        }

        /* Stats Card */
        .stats-card {
            background: linear-gradient(145deg, #1a1e26, #14181f);
            border: 1px solid rgba(59, 130, 246, 0.1);
            border-radius: 20px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        @media (hover: hover) {
            .stats-card:hover {
                border-color: rgba(59, 130, 246, 0.3);
                box-shadow: 0 10px 30px -10px rgba(37, 99, 235, 0.3);
                transform: translateY(-4px);
            }
        }

        /* Contact Info */
        .contact-info {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
        }

        .contact-info:last-child {
            border-bottom: none;
        }

        .contact-icon {
            width: 36px;
            height: 36px;
            background: rgba(59, 130, 246, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .outlet-card:hover .contact-icon {
            background: rgba(59, 130, 246, 0.2);
            transform: scale(1.1);
        }

        /* Grid Responsif */
        .grid-outlet {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        @media (min-width: 640px) {
            .grid-outlet {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .grid-outlet {
                grid-template-columns: repeat(3, 1fr);
                gap: 2rem;
            }
        }

        /* Scrollbar Dark */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
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

        /* Touch Optimizations */
        @media (hover: none) and (pointer: coarse) {
            .btn-gradient, 
            .btn-outline,
            .outlet-card,
            .stats-card {
                transform: none !important;
            }
            
            .btn-gradient:active {
                background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            }
            
            .btn-outline:active {
                background: rgba(59, 130, 246, 0.2);
                border-color: #3b82f6;
            }
            
            .outlet-card:active {
                background: linear-gradient(145deg, #222832, #1a1e26);
                border-color: rgba(59, 130, 246, 0.3);
            }
        }

        .touch-target {
            min-height: 44px;
            min-width: 44px;
        }
    </style>
</head>
<body class="relative overflow-x-hidden">

<!-- NAVIGATION PREMIUM DARK - SAMA DENGAN DASHBOARD -->
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
            
            <a href="{{ route('produk') }}" class="flex items-center space-x-2 text-gray-300 hover:text-white transition-colors font-medium group">
                <i class="fas fa-box text-blue-400 group-hover:text-blue-300"></i>
                <span>Produk</span>
            </a>
            
            <a href="{{ route('outlet') }}" class="flex items-center space-x-2 text-white transition-colors font-medium group relative">
                <i class="fas fa-store text-emerald-400"></i>
                <span>Outlet</span>
                <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-gradient-to-r from-blue-500 to-purple-500"></span>
            </a>
        </div>

        <!-- CTA Buttons -->
        <div class="flex items-center space-x-2 sm:space-x-4">
            <a href="{{ route('admin.dashboard') }}" 
               class="btn-gradient text-white px-4 sm:px-6 py-2 sm:py-2.5 rounded-xl font-semibold transition-all flex items-center space-x-1 sm:space-x-2 pulse-glow text-sm sm:text-base">
                <i class="fas fa-user-cog"></i>
                <span class="hidden xs:inline">Admin Panel</span>
                <span class="xs:hidden">Admin</span>
            </a>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT - HALAMAN OUTLET -->
<section class="px-4 sm:px-6 lg:px-8 py-8 sm:py-12 lg:py-16 relative overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute top-10 left-5 sm:top-20 sm:left-10 w-48 sm:w-72 h-48 sm:h-72 bg-blue-600/10 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-10 right-5 sm:bottom-20 sm:right-10 w-64 sm:w-96 h-64 sm:h-96 bg-purple-600/10 rounded-full blur-3xl animate-pulse animation-delay-2000"></div>
    
    <div class="container-responsive relative z-10">
        
        <!-- HEADER SECTION -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-8">
            <div class="flex items-center gap-4">
                <a href="{{ route('dashboard') }}" 
                   class="btn-gradient text-white px-5 py-3 rounded-xl flex items-center gap-2 shadow-lg text-sm sm:text-base">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>

                <div>
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold">
                        <span class="gradient-text-premium">Outlet</span> <span class="text-white">Kami</span>
                    </h1>
                    <p class="text-gray-400 text-xs sm:text-sm mt-1">
                        Temukan outlet SiTepat Digital Motoshop terdekat
                    </p>
                </div>
            </div>

            <!-- Search Box -->
            <div class="relative w-full md:w-72 lg:w-96">
                <i class="fas fa-search search-icon"></i>
                <input type="text"
                       id="searchInput"
                       placeholder="Cari outlet berdasarkan nama atau lokasi..."
                       class="search-input text-sm sm:text-base">
            </div>
        </div>

        <!-- STATS CARDS -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="">
                <div class="flex items-center gap-3">
                </div>
            </div>
        </div>

        <!-- RESULTS COUNT -->
        <div class="mb-6 text-gray-400 text-sm flex items-center gap-2">
            <i class="fas fa-store text-blue-400"></i>
            <span><span class="text-white font-bold" id="outletCount">{{ $outlets->count() }}</span> outlet ditemukan</span>
        </div>

        <!-- GRID OUTLET PREMIUM -->
        <div class="grid-outlet" id="outletGrid">
            @forelse($outlets as $outlet)
            <div class="outlet-card group outlet-item">
                <!-- Image -->
                <div class="outlet-image">
                    <img src="{{ asset('uploads/outlet/'.$outlet->gambar) }}" 
                         alt="{{ $outlet->nama_outlet }}"
                         onerror="this.src='https://images.unsplash.com/photo-1551524165-6b6e5a6166f3?auto=format&fit=crop&w=600'">
                    
                    
                </div>

                <!-- Content -->
                <div class="p-5 flex flex-col flex-grow">
                    <div class="flex items-start justify-between mb-3">
                        <h3 class="text-lg sm:text-xl font-bold text-white group-hover:text-blue-400 transition-colors">
                            {{ $outlet->nama_outlet }}
                        </h3>
                    </div>
                    
                    <div class="space-y-3 flex-grow">
                        <!-- Alamat -->
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt text-blue-400 text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Alamat</p>
                                <p class="text-sm text-gray-300">{{ $outlet->alamat }}</p>
                            </div>
                        </div>
                        
                        <!-- No Telepon -->
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fab fa-whatsapp text-green-400 text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">WhatsApp</p>
                                <a href="https://wa.me/62{{ ltrim($outlet->no_telp,'0') }}" 
                                   target="_blank"
                                   class="text-sm text-green-400 hover:text-green-300 transition-colors">
                                    {{ $outlet->no_telp }}
                                </a>
                            </div>
                        </div>
                        
                        <!-- Jam Operasional -->
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fas fa-clock text-emerald-400 text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Jam Operasional</p>
                                <p class="text-sm text-gray-300">08:00 - 22:00 WIB</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex gap-3 mt-4 pt-4 border-t border-white/5">
                        @if($outlet->link_maps)
                        <a href="{{ $outlet->link_maps }}"
                           target="_blank"
                           class="btn-outline flex-1 py-3 rounded-xl text-sm flex items-center justify-center gap-2">
                            <i class="fas fa-location-dot"></i>
                            <span>Lokasi</span>
                        </a>
                        @endif
                        
                        <a href="https://wa.me/62{{ ltrim($outlet->no_telp,'0') }}"
                           target="_blank"
                           class="btn-gradient flex-1 py-3 rounded-xl text-sm flex items-center justify-center gap-2">
                            <i class="fab fa-whatsapp"></i>
                            <span>Hubungi</span>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-16">
                <div class="glass-card rounded-2xl p-12">
                    <i class="fas fa-store text-5xl text-gray-600 mb-4"></i>
                    <h3 class="text-xl font-bold text-white mb-2">Belum Ada Outlet</h3>
                    <p class="text-gray-400">Saat ini belum tersedia data outlet.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- FOOTER DARK PREMIUM - SAMA DENGAN DASHBOARD -->
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

<style>
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const outletItems = document.querySelectorAll('.outlet-item');
    const outletCount = document.getElementById('outletCount');

    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const keyword = e.target.value.toLowerCase();
            let visibleCount = 0;

            outletItems.forEach(item => {
                const text = item.textContent.toLowerCase();
                if (text.includes(keyword)) {
                    item.style.display = 'flex';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            if (outletCount) {
                outletCount.textContent = visibleCount;
            }
        });
    }

    // Navbar scroll effect
    const nav = document.querySelector('nav');
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

    // Lazy loading images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.classList.add('loaded');
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img').forEach(img => {
            imageObserver.observe(img);
        });
    }
});
</script>

</body>
</html>