<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $kategori->nama_kategori }} - SiTepat Digital Motoshop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lihat produk {{ $kategori->nama_kategori }} di SiTepat Digital Motoshop">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Tailwind Customization -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        secondary: '#1e40af',
                        accent: '#f59e0b'
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(10px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        .product-card {
            transition: all 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .image-container {
            position: relative;
            overflow: hidden;
        }
        .image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.1), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .product-card:hover .image-overlay {
            opacity: 1;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">

<!-- HEADER -->
<header class="bg-white shadow-sm sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-primary transition">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-900 flex items-center gap-2">
                        <span class="text-primary">
                            <i class="fas fa-tags"></i>
                        </span>
                        {{ $kategori->nama_kategori }}
                    </h1>
                    <p class="text-sm text-gray-500 mt-1">
                        <i class="fas fa-boxes mr-1"></i>
                        {{ $kategori->produks->count() }} produk tersedia
                    </p>
                </div>
            </div>
            
            <div class="flex items-center gap-4">
                <a href="{{ route('dashboard') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition duration-200 text-sm font-medium">
                    <i class="fas fa-home"></i>
                    Beranda
                </a>
            </div>
        </div>
    </div>
</header>

<!-- BREADCRUMB -->
<nav class="bg-white border-y">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <div class="flex items-center text-sm text-gray-600">
            <a href="{{ route('dashboard') }}" class="hover:text-primary transition">
                Beranda
            </a>
            <i class="fas fa-chevron-right mx-2 text-xs"></i>
            <span class="text-primary font-medium">{{ $kategori->nama_kategori }}</span>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<main class="flex-grow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        @if($kategori->produks->count())
            <!-- FILTER/SORT SECTION (Optional - bisa dikembangkan) -->
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        Semua Produk <span class="text-primary">({{ $kategori->produks->count() }})</span>
                    </h2>
                </div>
                <div class="relative">
                    
                </div>
            </div>

            <!-- PRODUCT GRID -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 animate-fade-in">
                @foreach($kategori->produks as $produk)
                <div class="product-card bg-white rounded-xl shadow-lg hover:shadow-2xl overflow-hidden border border-gray-100 animate-slide-up">
                    <!-- BADGE (jika ada) -->
                    @if($produk->stok < 10)
                    <div class="absolute top-3 left-3 z-20">
                        
                    </div>
                    @endif
                    
                    <!-- IMAGE -->
                    <div class="image-container h-48 relative">
                        <img
                            src="{{ asset('storage/'.$produk->gambar) }}"
                            alt="{{ $produk->nama_produk }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                            onerror="this.src='https://via.placeholder.com/400x300?text=Product+Image'"
                        >
                        <div class="image-overlay"></div>
                        
                        <!-- QUICK VIEW BUTTON -->
                        <button class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm w-10 h-10 rounded-full flex items-center justify-center text-gray-700 hover:text-primary hover:bg-white transition opacity-0 group-hover:opacity-100">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>

                    <!-- PRODUCT INFO -->
                    <div class="p-5">
                        <div class="mb-3">
                            <h3 class="font-bold text-gray-900 text-lg mb-1 line-clamp-1">
                                {{ $produk->nama_produk }}
                            </h3>
                            <div class="flex items-center text-sm text-gray-500 mb-2">
                                <i class="fas fa-tag mr-1 text-xs"></i>
                                <span class="truncate">{{ $kategori->nama_kategori }}</span>
                            </div>
                        </div>

                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            {{ Str::limit($produk->deskripsi, 100) }}
                        </p>

                        <!-- STOCK & PRICE -->
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                @if($produk->stok > 0)
                                <span class="text-xs text-green-600 bg-green-50 px-2 py-1 rounded">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Stok: {{ $produk->stok }}
                                </span>
                                @else
                                
                                @endif
                            </div>
                            @if($produk->harga)
                            <div class="text-right">
                                <p class="text-lg font-bold text-primary">
                                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                </p>
                            </div>
                            @endif
                        </div>

                        <!-- ACTION BUTTONS -->
                        <div class="flex gap-2">
                            <a href="#"
                               class="flex-1 bg-primary hover:bg-secondary text-white px-4 py-3 rounded-lg font-medium text-center transition duration-200 flex items-center justify-center gap-2">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Detail Produk</span>
                            </a>
                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        @else
            <!-- EMPTY STATE -->
            <div class="text-center py-16 animate-fade-in">
                <div class="max-w-md mx-auto">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-box-open text-4xl text-gray-400"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-700 mb-3">
                        Kategori Kosong
                    </h3>
                    <p class="text-gray-500 mb-8">
                        Belum ada produk dalam kategori {{ $kategori->nama_kategori }}.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('dashboard') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-white rounded-lg hover:bg-secondary transition font-medium">
                            <i class="fas fa-arrow-left"></i>
                            Kembali ke Beranda
                        </a>
                        <button class="inline-flex items-center gap-2 px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium">
                            <i class="fas fa-sync-alt"></i>
                            Muat Ulang
                        </button>
                    </div>
                </div>
            </div>
        @endif

    </div>
</main>

<!-- FOOTER -->
<footer class="bg-white border-t mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="text-center">
            <div class="mb-4">
                <span class="text-xl font-bold text-primary">SiTepat</span>
                <span class="text-gray-700">Digital Motoshop</span>
            </div>
            <p class="text-gray-500 text-sm mb-4">
                <i class="fas fa-map-marker-alt mr-2"></i>
                Jl. Otomotif No. 123, Jakarta
            </p>
            <div class="flex justify-center gap-4 mb-4">
                <a href="#" class="text-gray-400 hover:text-primary transition">
                    <i class="fab fa-whatsapp text-lg"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-primary transition">
                    <i class="fab fa-instagram text-lg"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-primary transition">
                    <i class="fab fa-facebook text-lg"></i>
                </a>
            </div>
            <p class="text-gray-400 text-sm">
                © {{ date('Y') }} SiTepat Digital Motoshop. All rights reserved.
            </p>
        </div>
    </div>
</footer>

<!-- BACK TO TOP -->
<button id="backToTop" class="fixed bottom-6 right-6 w-12 h-12 bg-primary text-white rounded-full shadow-lg hover:bg-secondary transition duration-200 hidden items-center justify-center">
    <i class="fas fa-chevron-up"></i>
</button>

<script>
    // Back to Top Button
    const backToTop = document.getElementById('backToTop');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTop.classList.remove('hidden');
            backToTop.classList.add('flex');
        } else {
            backToTop.classList.add('hidden');
            backToTop.classList.remove('flex');
        }
    });

    backToTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Product card hover effect enhancement
    document.querySelectorAll('.product-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.boxShadow = '0 20px 40px rgba(0,0,0,0.1)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.boxShadow = '';
        });
    });
</script>

</body>
</html>