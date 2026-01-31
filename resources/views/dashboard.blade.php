<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiTepat - Digital Motoshop Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #7c3aed;
            --primary-light: #8b5cf6;
            --secondary: #0ea5e9;
            --accent: #f59e0b;
            --dark: #0f172a;
            --darker: #020617;
            --light: #f8fafc;
            --card-bg: rgba(30, 41, 59, 0.7);
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--darker) 0%, #1e293b 100%);
            color: var(--light);
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        .glass-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }
        
        .gradient-text {
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        }
        
        .hover-grow {
            transition: transform 0.3s ease;
        }
        
        .hover-grow:hover {
            transform: translateY(-5px);
        }
        
        .product-card {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
        }
        
        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(124, 58, 237, 0.1), transparent);
            transition: left 0.7s;
        }
        
        .product-card:hover::before {
            left: 100%;
        }
        
        .stats-card {
            background: linear-gradient(145deg, #1e293b, #0f172a);
            border-radius: 16px;
            padding: 1.5rem;
            border: 1px solid rgba(124, 58, 237, 0.2);
        }
        
        .pulse-dot {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(124, 58, 237, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(124, 58, 237, 0); }
            100% { box-shadow: 0 0 0 0 rgba(124, 58, 237, 0); }
        }
        
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        
        .shimmer-text {
            background: linear-gradient(90deg, #7c3aed, #8b5cf6, #7c3aed);
            background-size: 200% 100%;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shimmer 3s infinite linear;
        }
        
        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        
        .scrollbar-hidden {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        .scrollbar-hidden::-webkit-scrollbar {
            display: none;
        }
        
        .nav-blur {
            backdrop-filter: blur(20px);
            background: rgba(15, 23, 42, 0.8);
            border-bottom: 1px solid rgba(124, 58, 237, 0.2);
        }
        
        .feature-icon {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.1), rgba(14, 165, 233, 0.1));
            border-radius: 16px;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }
        
        .gradient-border {
            position: relative;
            border-radius: 20px;
        }
        
        .gradient-border::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--primary), var(--secondary), var(--accent));
            border-radius: 22px;
            z-index: -1;
            opacity: 0.5;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">



<!-- NAVIGATION -->
<nav class="nav-blur sticky top-0 z-50 py-4 px-6 md:px-12">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center space-x-3">
            <div class="gradient-bg p-3 rounded-2xl">
                <i class="fas fa-motorcycle text-white text-2xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold">
                    <span class="text-white">Si</span><span class="gradient-text">Tepat</span>
                </h1>
                <p class="text-xs text-slate-400">Digital Motoshop</p>
            </div>
        </div>

        <!-- Navigation Links -->
        <div class="hidden md:flex items-center space-x-8">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 text-slate-300 hover:text-white transition-colors font-medium group">
                <i class="fas fa-home text-purple-400 group-hover:text-purple-300 transition-colors"></i>
                <span>Beranda</span>
            </a>
            <a href="{{ route('produk') }}" class="flex items-center space-x-2 text-slate-300 hover:text-white transition-colors font-medium group">
                <i class="fas fa-tools text-blue-400 group-hover:text-blue-300 transition-colors"></i>
                <span>Produk</span>
            </a>
            <a href="{{ route('outlet') }}" class="flex items-center space-x-2 text-slate-300 hover:text-white transition-colors font-medium group">
                <i class="fas fa-store text-green-400 group-hover:text-green-300 transition-colors"></i>
                <span>Outlet</span>
            </a>
            <a href="#" class="flex items-center space-x-2 text-slate-300 hover:text-white transition-colors font-medium group">
                <i class="fas fa-headset text-yellow-400 group-hover:text-yellow-300 transition-colors"></i>
                <span>Bantuan</span>
            </a>
        </div>

        <!-- CTA Buttons -->
        <div class="flex items-center space-x-4">
            <button class="md:hidden text-slate-300 hover:text-white text-xl">
                <i class="fas fa-bars"></i>
            </button>
            <a href="{{ route('admin.dashboard') }}" 
               class="gradient-bg hover:opacity-90 text-white px-5 py-2.5 rounded-xl font-semibold transition-all flex items-center space-x-2 shadow-lg shadow-purple-500/30">
                <i class="fas fa-user-cog"></i>
                <span>Admin Panel</span>
            </a>
        </div>
    </div>
</nav>

<!-- HERO SECTION -->
<section class="px-6 md:px-12 py-12 md:py-20 relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl"></div>
    <div class="absolute top-1/2 left-1/4 w-64 h-64 bg-yellow-500/5 rounded-full blur-3xl"></div>
    
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div>
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-purple-500/10 to-blue-500/10 border border-purple-500/20 text-purple-300 font-medium mb-6">
                    <span class="w-2 h-2 bg-purple-400 rounded-full mr-2 pulse-dot"></span>
                    PROMO AKHIR TAHUN 2024
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    Upgrade <span class="shimmer-text">Performance</span><br>Motor Anda
                </h1>
                
                <p class="text-slate-300 text-lg mb-8 max-w-xl">
                    Temukan produk dan layanan terbaik untuk motor Anda dengan harga spesial. 
                    Kualitas premium, garansi resmi, dan layanan purna jual terpercaya.
                </p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('produk') }}" 
                       class="gradient-bg hover:shadow-xl hover:shadow-purple-500/30 text-white px-8 py-3.5 rounded-xl font-bold transition-all flex items-center space-x-3">
                        <i class="fas fa-bolt"></i>
                        <span>Jelajahi Produk</span>
                    </a>
                    <a href="{{ route('outlet') }}" 
                       class="glass-card hover:bg-slate-800/50 border border-slate-700 text-white px-8 py-3.5 rounded-xl font-bold transition-all flex items-center space-x-3">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Cari Outlet Terdekat</span>
                    </a>
                </div>
                
               
            
           
                
                
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="px-6 md:px-12 py-12">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Produk <span class="gradient-text">Unggulan</span></h2>
            <p class="text-slate-400 max-w-2xl mx-auto">Produk terbaik pilihan tim kami dengan kualitas premium dan harga terbaik</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($produks as $produk)
            <div class="product-card glass-card hover-grow p-6">
                <!-- Product Badge -->
                <div class="absolute top-4 right-4">
                    <span class="gradient-bg text-white text-xs font-bold px-3 py-1.5 rounded-full">
                        -{{ rand(15, 35) }}%
                    </span>
                </div>
                
                <!-- Product Image -->
                <div class="mb-6 overflow-hidden rounded-2xl">
                    <img src="{{ asset('storage/'.$produk->gambar) }}" 
                         class="w-full h-56 object-cover transition-transform duration-500 hover:scale-110">
                </div>
                
                <!-- Product Info -->
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-xl font-bold text-white">{{ $produk->nama_produk }}</h3>
                        <div class="flex items-center text-yellow-400">
                            <i class="fas fa-star text-sm"></i>
                            <span class="ml-1 text-sm font-bold">4.8</span>
                        </div>
                    </div>
                    <p class="text-slate-400 text-sm">{{ Str::limit($produk->deskripsi, 90) }}</p>
                </div>
                
                <!-- Price & CTA -->
                <div class="flex items-center justify-between mt-6">
                    <div>
                        <div class="text-sm text-slate-400">Harga Mulai</div>
                        <div class="text-2xl font-bold gradient-text">Rp {{ number_format($produk->harga ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <a href="{{ route('produk') }}" 
                       class="gradient-bg hover:shadow-lg hover:shadow-purple-500/30 text-white px-5 py-2.5 rounded-xl font-medium transition-all flex items-center space-x-2">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Beli Sekarang</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
       
            </div>
        </div>
    </div>
</section>

<!-- FEATURES SECTION -->
<section class="px-6 md:px-12 py-16 bg-gradient-to-b from-slate-900/50 to-slate-950/50">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Mengapa Memilih <span class="gradient-text">SiTepat</span>?</h2>
            <p class="text-slate-400 max-w-2xl mx-auto">Kami memberikan pengalaman berbelanja terbaik dengan layanan premium</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Feature 2 -->
            <div class="glass-card p-6 rounded-2xl hover-grow">
                <div class="feature-icon mx-auto">
                    <i class="fas fa-shield-alt text-2xl text-blue-400"></i>
                </div>
                <h4 class="text-xl font-bold text-center mb-3">Garansi Resmi</h4>
                <p class="text-slate-400 text-center text-sm">
                    Semua produk dilengkapi garansi resmi dari distributor dan produsen
                </p>
            </div>
            
            <!-- Feature 3 -->
            <div class="glass-card p-6 rounded-2xl hover-grow">
                <div class="feature-icon mx-auto">
                    <i class="fas fa-headset text-2xl text-green-400"></i>
                </div>
                <h4 class="text-xl font-bold text-center mb-3">Support 24/7</h4>
                <p class="text-slate-400 text-center text-sm">
                    Tim customer service siap membantu Anda kapan saja via chat, telepon, atau email
                </p>
            </div>
            
            <!-- Feature 4 -->
            <div class="glass-card p-6 rounded-2xl hover-grow">
                <div class="feature-icon mx-auto">
                    <i class="fas fa-store text-2xl text-yellow-400"></i>
                </div>
                <h4 class="text-xl font-bold text-center mb-3">Outlet Tersebar</h4>
                <p class="text-slate-400 text-center text-sm">
                    12+ outlet tersebar di Jakarta, Tangerang, Bekasi, Depok, dan Bogor
                </p>
            </div>
        </div>
    </div>
</section>

<!-- BRANDS SECTION -->
<section class="px-6 md:px-12 py-12">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-10">
            <h3 class="text-2xl font-bold mb-4">Brand <span class="gradient-text">Terpercaya</span></h3>
            <p class="text-slate-400">Kami bekerja sama dengan brand-brand terbaik di industri otomotif</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
            @foreach(['Yamaha', 'Honda', 'Michelin', 'Bridgestone', 'Bosch', 'NGK'] as $brand)
            <div class="glass-card p-6 rounded-xl flex items-center justify-center hover:bg-slate-800/50 transition-colors">
                <div class="text-center">
                    <div class="text-2xl mb-2">🏍️</div>
                    <div class="font-bold text-slate-300">{{ $brand }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-slate-950 border-t border-slate-800 mt-auto">
    <div class="max-w-7xl mx-auto px-6 md:px-12 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
            <!-- Company Info -->
            <div>
                <div class="flex items-center space-x-3 mb-6">
                    <div class="gradient-bg p-2 rounded-xl">
                        <i class="fas fa-motorcycle text-white"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">
                            <span class="text-white">Si</span><span class="gradient-text">Tepat</span>
                        </h2>
                        <p class="text-sm text-slate-400">Digital Motoshop</p>
                    </div>
                </div>
                <p class="text-slate-400 text-sm mb-6">
                    Solusi lengkap untuk kebutuhan motor Anda. Produk berkualitas, layanan terpercaya, harga terjangkau.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="bg-slate-800 hover:bg-purple-600 text-white w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="bg-slate-800 hover:bg-blue-600 text-white w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="bg-slate-800 hover:bg-green-600 text-white w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="#" class="bg-slate-800 hover:bg-red-500 text-white w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
            
           
            
            <!-- Contact -->
            <div>
                <h3 class="text-lg font-bold mb-6">Kontak Kami</h3>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <i class="fas fa-phone text-purple-400 mt-1 mr-3"></i>
                        <div>
                            <div class="font-medium">Telepon</div>
                            <div class="text-slate-400 text-sm">+62 895-3802-56094</div>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-envelope text-blue-400 mt-1 mr-3"></i>
                        <div>
                            <div class="font-medium">Email</div>
                            <div class="text-slate-400 text-sm">support@sitepat.com</div>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-clock text-yellow-400 mt-1 mr-3"></i>
                        <div>
                            <div class="font-medium">Jam Operasional</div>
                            <div class="text-slate-400 text-sm">08:00 - 22:00 WIB</div>
                        </div>
                    </li>
                </ul>
            </div>
            
            <!-- Newsletter -->
            <div>
                <h3 class="text-lg font-bold mb-6">Newsletter</h3>
                <p class="text-slate-400 text-sm mb-4">Dapatkan promo dan update terbaru langsung ke email Anda</p>
                <div class="flex">
                    <input type="email" placeholder="Email Anda" 
                           class="bg-slate-800 border border-slate-700 text-white px-4 py-3 rounded-l-xl w-full focus:outline-none focus:border-purple-500">
                    <button class="gradient-bg text-white px-4 py-3 rounded-r-xl font-medium hover:opacity-90 transition-opacity">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="border-t border-slate-800 mt-10 pt-8 text-center">
            <p class="text-slate-500 text-sm">
                © {{ date('Y') }} SiTepat Digital Motoshop. All rights reserved. 
               <span class="block md:inline mt-2 md:mt-0 md:ml-2">Crafted by Team Fauzan · Fadlan · Rizky</span>
            </p>
        </div>
    </div>
</footer>

<!-- JavaScript for Interactive Elements -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('bg-slate-950/95');
                nav.classList.add('shadow-2xl');
            } else {
                nav.classList.remove('bg-slate-950/95');
                nav.classList.remove('shadow-2xl');
            }
        });

        // Animate stats counters
        const animateCounters = () => {
            const counters = document.querySelectorAll('.text-3xl.font-bold.gradient-text');
            counters.forEach(counter => {
                const target = parseInt(counter.textContent.replace('+', '').replace('K', '000').replace(',', ''));
                const increment = target / 200;
                let current = 0;
                
                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        const displayValue = counter.textContent.includes('K') 
                            ? (current / 1000).toFixed(0) + 'K' 
                            : Math.floor(current).toLocaleString();
                        
                        if (counter.textContent.includes('+')) {
                            counter.textContent = displayValue + '+';
                        } else {
                            counter.textContent = displayValue;
                        }
                        requestAnimationFrame(updateCounter);
                    }
                };
                
                updateCounter();
            });
        };

        // Initialize counters when section is in view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        const heroSection = document.querySelector('section:nth-of-type(2)');
        if (heroSection) observer.observe(heroSection);

        // Countdown timer
        function updateCountdown() {
            const countdownElement = document.querySelector('.text-3xl.font-bold.mt-2');
            if (!countdownElement) return;

            const hours = countdownElement.querySelector('div:nth-child(1)');
            const minutes = countdownElement.querySelector('div:nth-child(3)');
            const seconds = countdownElement.querySelector('div:nth-child(5)');

            let h = parseInt(hours.textContent);
            let m = parseInt(minutes.textContent);
            let s = parseInt(seconds.textContent);

            if (s > 0) {
                s--;
            } else {
                s = 59;
                if (m > 0) {
                    m--;
                } else {
                    m = 59;
                    if (h > 0) {
                        h--;
                    } else {
                        h = 23;
                        m = 59;
                        s = 59;
                    }
                }
            }

            hours.textContent = h.toString().padStart(2, '0');
            minutes.textContent = m.toString().padStart(2, '0');
            seconds.textContent = s.toString().padStart(2, '0');
        }

        setInterval(updateCountdown, 1000);

        // Add hover effect to product cards
        const productCards = document.querySelectorAll('.product-card');
        productCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-8px)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });
    });
</script>

</body>
</html>