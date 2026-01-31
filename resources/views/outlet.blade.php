<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Outlet - SiTepat Digital Motoshop</title>
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
        
        .status-open {
            background: rgba(34, 197, 94, 0.1);
            color: #22c55e;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .status-closed {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .hover-grow {
            transition: transform 0.3s ease;
        }
        
        .hover-grow:hover {
            transform: translateY(-3px);
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
        
        .map-pin {
            position: absolute;
            top: -20px;
            right: 10px;
            background: var(--primary);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.4);
        }
        
        .outlet-card {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
        }
        
        .outlet-image {
            width: 100%;
            height: 160px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .outlet-card:hover .outlet-image {
            transform: scale(1.05);
        }
        
        .region-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: rgba(15, 23, 42, 0.9);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            backdrop-filter: blur(10px);
        }
        
        .rating-stars {
            color: #f59e0b;
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
        
        .contact-btn {
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .contact-btn:hover {
            background: rgba(124, 58, 237, 0.2);
            border-color: var(--primary);
        }
    </style>
</head>
<body class="p-4 md:p-6">

<div class="max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 mb-8">
        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}"
               class="gradient-bg hover:opacity-90 text-white px-5 py-3 rounded-xl font-medium transition-all flex items-center gap-3 shadow-lg shadow-purple-500/30">
               <i class="fas fa-arrow-left"></i>
               <span class="hidden sm:inline">Kembali ke Beranda</span>
               <span class="sm:hidden">Beranda</span>
            </a>
            
            <div class="flex items-center gap-3">
                <div class="gradient-bg p-3 rounded-2xl">
                    <i class="fas fa-store text-white text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-bold">Data <span class="gradient-text">Outlet</span></h1>
                    <p class="text-slate-400">Kelola informasi outlet SiTepat di berbagai daerah</p>
                </div>
            </div>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
            <div class="relative flex-1 sm:flex-none">
                <input type="text" 
                       placeholder="Cari outlet..." 
                       class="search-box px-4 py-3 pl-12 rounded-xl w-full focus:outline-none">
                <i class="fas fa-search absolute left-4 top-3.5 text-slate-400"></i>
            </div>
            
            <button class="filter-btn px-5 py-3 rounded-xl font-medium flex items-center justify-center gap-2">
                <i class="fas fa-filter"></i>
                <span class="hidden sm:inline">Filter</span>
            </button>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="glass-card p-6 rounded-2xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-sm mb-1">Total Outlet</p>
                    <p class="text-3xl font-bold">{{ count($outlets) + 10 }}</p>
                </div>
                <div class="gradient-bg p-4 rounded-xl">
                    <i class="fas fa-store text-white text-2xl"></i>
                </div>
            </div>
            <div class="mt-4 text-sm text-green-400">
                <i class="fas fa-arrow-up mr-1"></i>
                <span>3 outlet baru bulan ini</span>
            </div>
        </div>
        
        <div class="glass-card p-6 rounded-2xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-sm mb-1">Kota Tersedia</p>
                    <p class="text-3xl font-bold">8</p>
                </div>
                <div class="bg-blue-500/20 p-4 rounded-xl">
                    <i class="fas fa-map-marker-alt text-blue-400 text-2xl"></i>
                </div>
            </div>
            <div class="mt-4 text-sm text-slate-400">
                <i class="fas fa-circle text-green-400 text-xs mr-1"></i>
                <span>Jabodetabek + Bandung</span>
            </div>
        </div>
        
        <div class="glass-card p-6 rounded-2xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-sm mb-1">Outlet Buka</p>
                    <p class="text-3xl font-bold">{{ count($outlets) + 9 }}</p>
                </div>
                <div class="bg-green-500/20 p-4 rounded-xl">
                    <i class="fas fa-door-open text-green-400 text-2xl"></i>
                </div>
            </div>
            <div class="mt-4 text-sm text-slate-400">
                <i class="fas fa-circle text-yellow-400 text-xs mr-1"></i>
                <span>1 outlet tutup sementara</span>
            </div>
        </div>
        
        <div class="glass-card p-6 rounded-2xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-sm mb-1">Rating Rata-rata</p>
                    <p class="text-3xl font-bold">4.7</p>
                </div>
                <div class="bg-yellow-500/20 p-4 rounded-xl">
                    <i class="fas fa-star text-yellow-400 text-2xl"></i>
                </div>
            </div>
            <div class="mt-4 text-sm text-slate-400">
                <i class="fas fa-circle text-green-400 text-xs mr-1"></i>
                <span>Dari 2.4k+ review</span>
            </div>
        </div>
    </div>

    <!-- Region Filter -->
    <div class="mb-8">
        <h2 class="text-xl font-bold mb-4">Filter berdasarkan <span class="gradient-text">Daerah</span></h2>
        <div class="flex flex-wrap gap-3">
            <button class="gradient-bg text-white px-5 py-2.5 rounded-xl font-medium flex items-center gap-2">
                <i class="fas fa-globe"></i>
                <span>Semua Daerah</span>
            </button>
            <button class="filter-btn px-5 py-2.5 rounded-xl font-medium flex items-center gap-2 hover-grow">
                <i class="fas fa-city"></i>
                <span>Jakarta</span>
            </button>
            <button class="filter-btn px-5 py-2.5 rounded-xl font-medium flex items-center gap-2 hover-grow">
                <i class="fas fa-building"></i>
                <span>Tangerang</span>
            </button>
            <button class="filter-btn px-5 py-2.5 rounded-xl font-medium flex items-center gap-2 hover-grow">
                <i class="fas fa-university"></i>
                <span>Bekasi</span>
            </button>
            <button class="filter-btn px-5 py-2.5 rounded-xl font-medium flex items-center gap-2 hover-grow">
                <i class="fas fa-home"></i>
                <span>Depok</span>
            </button>
            <button class="filter-btn px-5 py-2.5 rounded-xl font-medium flex items-center gap-2 hover-grow">
                <i class="fas fa-mountain"></i>
                <span>Bandung</span>
            </button>
        </div>
    </div>

    <!-- Outlets Grid View -->
    <div class="mb-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Daftar <span class="gradient-text">Outlet</span></h2>
            <div class="text-slate-400 text-sm">
                <span class="text-white">{{ count($outlets) + 10 }}</span> outlet ditemukan
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $sampleOutlets = [
                    [
                        'nama' => 'SiTepat Jakarta Pusat',
                        'alamat' => 'Jl. Thamrin No. 123, Jakarta Pusat',
                        'telepon' => '(021) 1234-5678',
                        'gambar' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=600',
                        'kota' => 'Jakarta',
                        'status' => 'open',
                        'rating' => 4.8,
                        'jam_operasional' => '08:00 - 22:00',
                        'layanan' => ['Service Motor', 'Penjualan Sparepart', 'Cuci Motor']
                    ],
                    [
                        'nama' => 'SiTepat Tangerang City',
                        'alamat' => 'Jl. MH. Thamrin No. 45, Tangerang',
                        'telepon' => '(021) 8765-4321',
                        'gambar' => 'https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?auto=format&fit=crop&w=600',
                        'kota' => 'Tangerang',
                        'status' => 'open',
                        'rating' => 4.6,
                        'jam_operasional' => '08:00 - 21:00',
                        'layanan' => ['Full Service', 'Pengecatan', 'Modifikasi']
                    ],
                    [
                        'nama' => 'SiTepat Bekasi Barat',
                        'alamat' => 'Jl. Jend. Sudirman No. 78, Bekasi Barat',
                        'telepon' => '(021) 2345-6789',
                        'gambar' => 'https://images.unsplash.com/photo-1593941707882-a5bba5338fe2?auto=format&fit=crop&w=600',
                        'kota' => 'Bekasi',
                        'status' => 'open',
                        'rating' => 4.7,
                        'jam_operasional' => '07:30 - 20:30',
                        'layanan' => ['Bengkel Umum', 'Penjualan Aksesoris', 'Dynotest']
                    ],
                    [
                        'nama' => 'SiTepat Depok Town',
                        'alamat' => 'Jl. Margonda Raya No. 56, Depok',
                        'telepon' => '(021) 3456-7890',
                        'gambar' => 'https://images.unsplash.com/photo-1551524165-6b6e5a6166f3?auto=format&fit=crop&w=600',
                        'kota' => 'Depok',
                        'status' => 'open',
                        'rating' => 4.9,
                        'jam_operasional' => '09:00 - 21:00',
                        'layanan' => ['Service Khusus Matic', 'Audio Mobil', 'Ban & Velg']
                    ],
                    [
                        'nama' => 'SiTepat Bandung Utara',
                        'alamat' => 'Jl. Dago No. 89, Bandung',
                        'telepon' => '(022) 1234-5678',
                        'gambar' => 'https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?auto=format&fit=crop&w=600',
                        'kota' => 'Bandung',
                        'status' => 'open',
                        'rating' => 4.5,
                        'jam_operasional' => '08:30 - 19:30',
                        'layanan' => ['Modifikasi Racing', 'Service Besar', 'Pemasangan Alarm']
                    ],
                    [
                        'nama' => 'SiTepat Jakarta Selatan',
                        'alamat' => 'Jl. TB Simatupang No. 12, Jakarta Selatan',
                        'telepon' => '(021) 4567-8901',
                        'gambar' => 'https://images.unsplash.com/photo-1599389878506-af7cb7e6d1a6?auto=format&fit=crop&w=600',
                        'kota' => 'Jakarta',
                        'status' => 'closed',
                        'rating' => 4.6,
                        'jam_operasional' => '09:00 - 20:00',
                        'layanan' => ['Bengkel Resmi', 'Sparepart Original', 'Service Elektrik']
                    ],
                    [
                        'nama' => 'SiTepat Tangerang Selatan',
                        'alamat' => 'Jl. Raya Serpong No. 34, Tangerang Selatan',
                        'telepon' => '(021) 5678-9012',
                        'gambar' => 'https://images.unsplash.com/photo-1629198720835-2807c8a7b57b?auto=format&fit=crop&w=600',
                        'kota' => 'Tangerang',
                        'status' => 'open',
                        'rating' => 4.8,
                        'jam_operasional' => '08:00 - 22:00',
                        'layanan' => ['Service Rutin', 'Pengecekan Gratis', 'Cuci Khusus']
                    ],
                    [
                        'nama' => 'SiTepat Bogor City',
                        'alamat' => 'Jl. Pajajaran No. 67, Bogor',
                        'telepon' => '(0251) 2345-6789',
                        'gambar' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?auto=format&fit=crop&w=600',
                        'kota' => 'Bogor',
                        'status' => 'open',
                        'rating' => 4.4,
                        'jam_operasional' => '08:00 - 19:00',
                        'layanan' => ['Service Harian', 'Penjualan Oli', 'Ganti Kampas Rem']
                    ],
                    [
                        'nama' => 'SiTepat Cikarang',
                        'alamat' => 'Jl. Industri No. 23, Cikarang',
                        'telepon' => '(021) 6789-0123',
                        'gambar' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=600',
                        'kota' => 'Bekasi',
                        'status' => 'open',
                        'rating' => 4.7,
                        'jam_operasional' => '08:00 - 20:00',
                        'layanan' => ['Service Berat', 'Pemasangan AC', 'Body Repair']
                    ],
                    [
                        'nama' => 'SiTepat Bandung Timur',
                        'alamat' => 'Jl. Soekarno Hatta No. 45, Bandung',
                        'telepon' => '(022) 2345-6789',
                        'gambar' => 'https://images.unsplash.com/photo-1619380063505-846c8c2aee39?auto=format&fit=crop&w=600',
                        'kota' => 'Bandung',
                        'status' => 'open',
                        'rating' => 4.9,
                        'jam_operasional' => '07:00 - 21:00',
                        'layanan' => ['Tune Up Mesin', 'Modifikasi Eksterior', 'Service Karburator']
                    ]
                ];
            @endphp

            <!-- Existing Outlets -->
            @foreach($outlets as $outlet)
            <div class="outlet-card glass-card hover-grow">
                <div class="relative">
                    <div class="region-badge">Jakarta</div>
                    <img src="{{ asset('uploads/outlet/'.$outlet->gambar) }}" 
                         alt="{{ $outlet->nama_outlet }}"
                         class="outlet-image"
                         onerror="this.src='https://images.unsplash.com/photo-1551524165-6b6e5a6166f3?auto=format&fit=crop&w=600'">
                </div>
                
                <div class="p-5">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-lg font-bold">{{ $outlet->nama_outlet }}</h3>
                        <span class="status-open flex items-center gap-1">
                            <i class="fas fa-circle text-xs"></i>
                            <span>Buka</span>
                        </span>
                    </div>
                    
                    <div class="flex items-center gap-2 text-slate-400 text-sm mb-3">
                        <i class="fas fa-house"></i>
                        <span class="line-clamp-1">{{ $outlet->alamat }}</span>
                    </div>
                    
                        <a href="https://wa.me/62{{ ltrim($outlet->no_telp, '0') }}?text=Halo%20saya%20mau%20tanya%20tentang%20outlet%20{{ urlencode($outlet->nama_outlet) }}"
                        target="_blank"
                        class="flex items-center gap-2 text-slate-400 text-sm mb-4 hover:text-green-600">
                            <i class="fab fa-whatsapp text-green-500"></i>
                            <span>{{ $outlet->no_telp }}</span>
                        </a>


                    
                    <td class="p-4 text-center">
                        @if($outlet->link_maps)
                            <a href="{{ $outlet->link_maps }}"
                            target="_blank"
                            class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800">
                                <i class="fas fa-map-marker-alt"></i>
                                <span class="hidden sm:inline">Lokasi</span>
                            </a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>

                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-1">
                            <div class="rating-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-sm text-slate-400 ml-1">4.5</span>
                        </div>
                        <div class="flex gap-2">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Sample Outlets -->
            @foreach($sampleOutlets as $outlet)
            <div class="outlet-card glass-card hover-grow">
                <div class="relative">
                    <div class="region-badge">{{ $outlet['kota'] }}</div>
                    <img src="{{ $outlet['gambar'] }}" 
                         alt="{{ $outlet['nama'] }}"
                         class="outlet-image">
                </div>
                
                <div class="p-5">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-lg font-bold">{{ $outlet['nama'] }}</h3>
                        @if($outlet['status'] == 'open')
                            <span class="status-open flex items-center gap-1">
                                <i class="fas fa-circle text-xs"></i>
                                <span>Buka</span>
                            </span>
                        @else
                            <span class="status-closed flex items-center gap-1">
                                <i class="fas fa-circle text-xs"></i>
                                <span>Tutup</span>
                            </span>
                        @endif
                    </div>
                    
                    <div class="flex items-center gap-2 text-slate-400 text-sm mb-3">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="line-clamp-1">{{ $outlet['alamat'] }}</span>
                    </div>
                    
                    <div class="flex items-center gap-2 text-slate-400 text-sm mb-4">
                        <i class="fas fa-phone"></i>
                        <span>{{ $outlet['telepon'] }}</span>
                    </div>
                    
                    <div class="mb-4">
                        <div class="text-sm text-slate-400 mb-1">Layanan:</div>
                        <div class="flex flex-wrap gap-1">
                            @foreach(array_slice($outlet['layanan'], 0, 2) as $layanan)
                            <span class="text-xs bg-slate-800 text-slate-300 px-2 py-1 rounded">
                                {{ $layanan }}
                            </span>
                            @endforeach
                            @if(count($outlet['layanan']) > 2)
                            <span class="text-xs bg-slate-800 text-slate-300 px-2 py-1 rounded">
                                +{{ count($outlet['layanan']) - 2 }} more
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <div class="rating-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-sm text-slate-400">{{ $outlet['rating'] }}</span>
                        </div>
                        
                        <div class="flex gap-2">
                            <button class="contact-btn px-3 py-2 rounded-lg text-sm flex items-center gap-2">
                                <i class="fas fa-directions"></i>
                            </button>
                            <a href="tel:{{ $outlet['telepon'] }}"
                               class="contact-btn px-3 py-2 rounded-lg text-sm flex items-center gap-2">
                                <i class="fas fa-phone"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center">
        <div class="text-slate-400 text-sm">
            <i class="fas fa-info-circle mr-2"></i>
            Menampilkan <span class="text-white">{{ count($outlets) + 10 }}</span> dari <span class="text-white">{{ count($outlets) + 10 }}</span> outlet
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

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality
        const searchInput = document.querySelector('input[type="text"]');
        const outletCards = document.querySelectorAll('.outlet-card');
        
        searchInput?.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            
            outletCards.forEach(card => {
                const text = card.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
        
        // Filter region buttons
        const regionButtons = document.querySelectorAll('.filter-btn');
        regionButtons.forEach(button => {
            button.addEventListener('click', function() {
                regionButtons.forEach(btn => {
                    btn.classList.remove('gradient-bg', 'text-white');
                    btn.classList.add('filter-btn');
                });
                
                this.classList.remove('filter-btn');
                this.classList.add('gradient-bg', 'text-white');
                
                // Filter functionality would go here
                // For now, just show all cards
                outletCards.forEach(card => {
                    card.style.display = 'block';
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
        
        // Hover effects for cards
        outletCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.boxShadow = '0 20px 40px rgba(124, 58, 237, 0.2)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.boxShadow = '';
            });
        });
        
        // Handle image errors
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('error', function() {
                this.src = 'https://images.unsplash.com/photo-1551524165-6b6e5a6166f3?auto=format&fit=crop&w=600';
            });
        });
    });
</script>

</body>
</html>