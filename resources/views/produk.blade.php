<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Produk - SiTepat Digital Motoshop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #7c3aed;
            --primary-light: #8b5cf6;
            --secondary: #0ea5e9;
            --accent: #f59e0b;
            --dark: #0f172a;
            --darker: #020617;
            --light: #f8fafc;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--darker) 0%, #1e293b 100%);
            min-height: 100vh;
            color: var(--light);
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
        
        .category-chip {
            background: rgba(124, 58, 237, 0.1);
            border: 1px solid rgba(124, 58, 237, 0.3);
            color: var(--primary);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .status-available {
            background: rgba(34, 197, 94, 0.1);
            color: #22c55e;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
        }
        
        .status-limited {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
        }
        
        .hover-grow {
            transition: transform 0.3s ease;
        }
        
        .hover-grow:hover {
            transform: translateY(-2px);
        }
        
        .search-box {
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid rgba(124, 58, 237, 0.3);
            transition: all 0.3s ease;
        }
        
        .search-box:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
        }
        
        .filter-btn {
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .filter-btn:hover {
            border-color: var(--primary);
        }
        
        .table-header {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
        }
        
        .table-row {
            transition: background-color 0.2s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .table-row:hover {
            background: rgba(124, 58, 237, 0.05);
        }
        
        .pagination-btn {
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .pagination-btn:hover {
            background: rgba(124, 58, 237, 0.2);
            border-color: var(--primary);
        }
        
        .pagination-active {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border-color: transparent;
        }
        
        .product-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid rgba(124, 58, 237, 0.3);
        }
        
        .price-tag {
            font-weight: 700;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="p-6">

<!-- Header Section -->
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <a href="{{ route('dashboard') }}"
                   class="gradient-bg hover:opacity-90 text-white px-4 py-2.5 rounded-xl font-medium transition-all flex items-center gap-2 shadow-lg shadow-purple-500/30">
                   <i class="fas fa-arrow-left"></i>
                   Kembali ke Beranda
                </a>
                
                <div class="text-sm text-slate-400 hidden md:block">
                    <i class="fas fa-chevron-right mx-2"></i>
                    <span>Manajemen Produk</span>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="gradient-bg p-3 rounded-2xl">
                    <i class="fas fa-tools text-white text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-bold">Data <span class="gradient-text">Produk</span></h1>
                    <p class="text-slate-400">Kelola produk dan layanan bengkel SiTepat</p>
                </div>
            </div>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="relative">
                <input type="text" 
                       placeholder="Cari produk..." 
                       class="search-box px-4 py-3 pl-12 rounded-xl w-full sm:w-64 focus:outline-none">
                <i class="fas fa-search absolute left-4 top-3.5 text-slate-400"></i>
            </div>
            
            <button class="filter-btn px-4 py-3 rounded-xl flex items-center gap-2">
                <i class="fas fa-filter"></i>
                <span>Filter</span>
            </button>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="glass-card p-6 rounded-2xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-sm mb-1">Total Produk</p>
                    <p class="text-3xl font-bold">{{ count($produks) + 8 }}</p>
                </div>
                <div class="gradient-bg p-4 rounded-xl">
                    <i class="fas fa-boxes text-white text-2xl"></i>
                </div>
            </div>
            <div class="mt-4 text-sm text-green-400">
                <i class="fas fa-arrow-up mr-1"></i>
                <span>12 produk baru bulan ini</span>
            </div>
        </div>
        
        <div class="glass-card p-6 rounded-2xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-sm mb-1">Kategori</p>
                    <p class="text-3xl font-bold">6</p>
                </div>
                <div class="bg-blue-500/20 p-4 rounded-xl">
                    <i class="fas fa-tags text-blue-400 text-2xl"></i>
                </div>
            </div>
            <div class="mt-4 text-sm text-slate-400">
                <i class="fas fa-circle text-green-400 text-xs mr-1"></i>
                <span>Semua kategori tersedia</span>
            </div>
        </div>
        
        <div class="glass-card p-6 rounded-2xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-sm mb-1">Stok Tersedia</p>
                    <p class="text-3xl font-bold">245</p>
                </div>
                <div class="bg-green-500/20 p-4 rounded-xl">
                    <i class="fas fa-check-circle text-green-400 text-2xl"></i>
                </div>
            </div>
            <div class="mt-4 text-sm text-slate-400">
                <i class="fas fa-circle text-yellow-400 text-xs mr-1"></i>
                <span>3 produk stok terbatas</span>
            </div>
        </div>
    </div>

    <!-- Product Categories -->
    <div class="mb-8">
        <h2 class="text-xl font-bold mb-4">Kategori <span class="gradient-text">Produk</span></h2>
        <div class="flex flex-wrap gap-3">
            <button class="gradient-bg text-white px-5 py-2.5 rounded-xl font-medium flex items-center gap-2">
                <i class="fas fa-layer-group"></i>
                <span>Semua</span>
            </button>
            <button class="filter-btn px-5 py-2.5 rounded-xl font-medium flex items-center gap-2 hover-grow">
                <i class="fas fa-oil-can"></i>
                <span>Oli & Pelumas</span>
            </button>
            <button class="filter-btn px-5 py-2.5 rounded-xl font-medium flex items-center gap-2 hover-grow">
                <i class="fas fa-tire"></i>
                <span>Ban & Velg</span>
            </button>
            <button class="filter-btn px-5 py-2.5 rounded-xl font-medium flex items-center gap-2 hover-grow">
                <i class="fas fa-cogs"></i>
                <span>Spare Part</span>
            </button>
            <button class="filter-btn px-5 py-2.5 rounded-xl font-medium flex items-center gap-2 hover-grow">
                <i class="fas fa-tools"></i>
                <span>Perlengkapan</span>
            </button>
            <button class="filter-btn px-5 py-2.5 rounded-xl font-medium flex items-center gap-2 hover-grow">
                <i class="fas fa-wrench"></i>
                <span>Layanan Bengkel</span>
            </button>
        </div>
    </div>

    <!-- Products Table -->
    <div class="glass-card rounded-2xl overflow-hidden mb-8">
        <div class="table-header p-6 border-b border-slate-800">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-bold">Daftar <span class="gradient-text">Produk</span></h3>
                <div class="text-slate-400 text-sm">
                    <span class="text-white">{{ count($produks) + 8 }}</span> produk ditemukan
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="table-header text-left">
                        <th class="p-4 font-medium text-slate-300">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-hashtag"></i>
                                <span>No</span>
                            </div>
                        </th>
                        <th class="p-4 font-medium text-slate-300">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-cube"></i>
                                <span>Produk</span>
                            </div>
                        </th>
                        <th class="p-4 font-medium text-slate-300">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-tag"></i>
                                <span>Kategori</span>
                            </div>
                        </th>
                        <th class="p-4 font-medium text-slate-300">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-image"></i>
                                <span>Gambar</span>
                            </div>
                        </th>
                        
                        <th class="p-4 font-medium text-slate-300">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-info-circle"></i>
                                <span>Deskripsi</span>
                            </div>
                        </th>
                        <th class="p-4 font-medium text-slate-300">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-box"></i>
                                <span>Status</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sampleProducts = [
                            [
                                'nama' => 'Oli Mesin Yamaha 1L',
                                'kategori' => 'Oli & Pelumas',
                                'gambar' => 'https://images.unsplash.com/photo-1629198720835-2807c8a7b57b?auto=format&fit=crop&w=300',
                                'harga' => 'Rp 125.000',
                                'deskripsi' => 'Oli mesin premium untuk motor Yamaha',
                                'status' => 'available'
                            ],
                            [
                                'nama' => 'Ban Tubeless Michelin',
                                'kategori' => 'Ban & Velg',
                                'gambar' => 'https://images.unsplash.com/photo-1619380063505-846c8c2aee39?auto=format&fit=crop&w=300',
                                'harga' => 'Rp 450.000',
                                'deskripsi' => 'Ban tubeless ukuran 80/90-14',
                                'status' => 'available'
                            ],
                            [
                                'nama' => 'Kampas Rem Belakang',
                                'kategori' => 'Spare Part',
                                'gambar' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w-300',
                                'harga' => 'Rp 85.000',
                                'deskripsi' => 'Kampas rem belakang merek Bosch',
                                'status' => 'limited'
                            ],
                            [
                                'nama' => 'Helm Bogo Full Face',
                                'kategori' => 'Perlengkapan',
                                'gambar' => 'https://images.unsplash.com/photo-1551216223-37c8d1dbec5c?auto=format&fit=crop&w=300',
                                'harga' => 'Rp 350.000',
                                'deskripsi' => 'Helm full face dengan visor ganda',
                                'status' => 'available'
                            ],
                            [
                                'nama' => 'Service Rutin Ringan',
                                'kategori' => 'Layanan Bengkel',
                                'gambar' => 'https://images.unsplash.com/photo-1593941707882-a5bba5338fe2?auto=format&fit=crop&w=300',
                                'harga' => 'Rp 150.000',
                                'deskripsi' => 'Service ringan + ganti oli mesin',
                                'status' => 'available'
                            ],
                            [
                                'nama' => 'Aki GS Astra Maintenance Free',
                                'kategori' => 'Spare Part',
                                'gambar' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?auto=format&fit=crop&w=300',
                                'harga' => 'Rp 280.000',
                                'deskripsi' => 'Aki maintenance free 12V 5AH',
                                'status' => 'available'
                            ],
                            [
                                'nama' => 'Jaket Racing Alpinestars',
                                'kategori' => 'Perlengkapan',
                                'gambar' => 'https://images.unsplash.com/photo-1622434641406-a158123450f9?auto=format&fit=crop&w=300',
                                'harga' => 'Rp 1.250.000',
                                'deskripsi' => 'Jaket racing dengan proteksi siku dan punggung',
                                'status' => 'limited'
                            ],
                            [
                                'nama' => 'Paket Tune Up Mesin',
                                'kategori' => 'Layanan Bengkel',
                                'gambar' => 'https://images.unsplash.com/photo-1551524165-6b6e5a6166f3?auto=format&fit=crop&w=300',
                                'harga' => 'Rp 300.000',
                                'deskripsi' => 'Service lengkap + tune up karburator',
                                'status' => 'available'
                            ]
                        ];
                    @endphp

                    @foreach(array_merge($produks->toArray(), $sampleProducts) as $index => $produk)
                    <tr class="table-row hover-grow">
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 gradient-bg rounded-lg flex items-center justify-center">
                                    <span class="font-bold text-white">{{ $index + 1 }}</span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="p-4">
                            <div class="font-medium">{{ $produk['nama_produk'] ?? $produk['nama'] }}</div>
                        </td>
                        
                        <td class="p-4">
                            <span class="category-chip">
                                {{ $produk['kategori'] ?? 'Produk' }}
                            </span>
                        </td>
                        
                        <td class="p-4">
                            <img src="{{ isset($produk['gambar']) ? (str_starts_with($produk['gambar'], 'http') ? $produk['gambar'] : asset('storage/'.$produk['gambar'])) : $produk['gambar'] }}" 
                                 class="product-image"
                                 alt="{{ $produk['nama_produk'] ?? $produk['nama'] }}">
                        </td>
                        
                        <td class="p-4">
                           
                        </td>
                        
                        <td class="p-4">
                            <div class="text-sm text-slate-300 max-w-xs">
                                {{ $produk['deskripsi'] ?? '-' }}
                            </div>
                        </td>
                        
                        <td class="p-4">
                            @if(($produk['status'] ?? 'available') == 'available')
                                <span class="status-available flex items-center gap-2">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Tersedia</span>
                                </span>
                            @else
                                <span class="status-limited flex items-center gap-2">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    <span>Terbatas</span>
                                </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Table Footer -->
        <div class="table-header p-4 border-t border-slate-800">
            <div class="flex justify-between items-center">
                <div class="text-slate-400 text-sm">
                    Menampilkan <span class="text-white">{{ count($produks) + 8 }}</span> dari <span class="text-white">{{ count($produks) + 8 }}</span> produk
                </div>
                
                <div class="flex gap-2">
                    <button class="pagination-btn w-10 h-10 rounded-lg flex items-center justify-center">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="pagination-btn w-10 h-10 rounded-lg flex items-center justify-center pagination-active">
                        1
                    </button>
                    <button class="pagination-btn w-10 h-10 rounded-lg flex items-center justify-center">
                        2
                    </button>
                    <button class="pagination-btn w-10 h-10 rounded-lg flex items-center justify-center">
                        3
                    </button>
                    <button class="pagination-btn w-10 h-10 rounded-lg flex items-center justify-center">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-between items-center">
        <div class="text-slate-400 text-sm">
            <i class="fas fa-info-circle mr-2"></i>
            Terakhir diperbarui: {{ date('d M Y H:i') }}
        </div>
        
        <div class="flex gap-3">
            <button class="filter-btn px-5 py-2.5 rounded-xl font-medium flex items-center gap-2">
                <i class="fas fa-download"></i>
                <span>Export CSV</span>
            </button>
            <button class="gradient-bg hover:opacity-90 text-white px-5 py-2.5 rounded-xl font-medium flex items-center gap-2">
                <i class="fas fa-plus"></i>
                <span>Tambah Produk</span>
            </button>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality
        const searchInput = document.querySelector('input[type="text"]');
        const tableRows = document.querySelectorAll('tbody tr');
        
        searchInput?.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            
            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
        
        // Filter category buttons
        const categoryButtons = document.querySelectorAll('.filter-btn');
        categoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                categoryButtons.forEach(btn => {
                    btn.classList.remove('gradient-bg', 'text-white');
                    btn.classList.add('filter-btn');
                });
                
                this.classList.remove('filter-btn');
                this.classList.add('gradient-bg', 'text-white');
                
                // Here you would implement actual filtering
                // For now, just show all rows
                tableRows.forEach(row => {
                    row.style.display = '';
                });
            });
        });
        
        // Pagination buttons
        const paginationButtons = document.querySelectorAll('.pagination-btn');
        paginationButtons.forEach(button => {
            button.addEventListener('click', function() {
                paginationButtons.forEach(btn => {
                    btn.classList.remove('pagination-active');
                    btn.classList.add('pagination-btn');
                });
                
                this.classList.remove('pagination-btn');
                this.classList.add('pagination-active');
            });
        });
        
        // Hover effect for table rows
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.backgroundColor = 'rgba(124, 58, 237, 0.05)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
            });
        });
    });
</script>

</body>
</html>