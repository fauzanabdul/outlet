<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SITEPAT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .sidebar-link.active {
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.1) 0%, rgba(59, 130, 246, 0.05) 100%);
            border-left: 4px solid #3b82f6;
            color: #3b82f6;
        }
        
        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        .stat-card {
            transition: all 0.3s ease;
            border-top: 4px solid;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .dashboard-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gray-900 text-white flex flex-col">
        <!-- Logo & Brand -->
        <div class="p-6 border-b border-gray-800">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                    <i class="fas fa-cube text-white"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold">SITEPAT</h1>
                    <p class="text-xs text-gray-400">Admin Panel</p>
                </div>
            </div>
        </div>

        <!-- User Profile -->
        <div class="p-6 border-b border-gray-800">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-cyan-400 flex items-center justify-center">
                    <i class="fas fa-user text-white"></i>
                </div>
                <div>
                    <h3 class="font-medium">Administrator</h3>
                    <p class="text-sm text-gray-400">admin@sitepat.com</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link flex items-center space-x-3 p-3 rounded-lg
               {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt w-5 text-center"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.kategori.index') }}"
               class="sidebar-link flex items-center space-x-3 p-3 rounded-lg
               {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
                <i class="fas fa-folder w-5 text-center"></i>
                <span>Kategori</span>
            </a>

            <a href="{{ route('admin.produk.index') }}"
               class="sidebar-link flex items-center space-x-3 p-3 rounded-lg
               {{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
                <i class="fas fa-box-open w-5 text-center"></i>
                <span>Produk</span>
            </a>

            <a href="{{ route('admin.outlet.index') }}"
               class="sidebar-link flex items-center space-x-3 p-3 rounded-lg
               {{ request()->routeIs('admin.outlet.*') ? 'active' : '' }}">
                <i class="fas fa-store w-5 text-center"></i>
                <span>Outlet</span>
            </a>
        </nav>

        <!-- Logout -->
        <div class="p-6 border-t border-gray-800">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="flex items-center justify-center space-x-3 w-full p-3 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 rounded-lg transition-all duration-300">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 overflow-auto">
        <!-- Header -->
        <header class="dashboard-header text-white p-6 shadow-lg">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold">Dashboard Admin</h1>
                    <p class="text-blue-100">Selamat datang kembali, Administrator</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                    </div>
                    <div class="hidden md:block">
                        <p class="font-medium">{{ now()->format('l, d F Y') }}</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Stats Cards -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Kategori -->
                <div class="stat-card bg-white p-6 rounded-xl shadow border-t-4 border-blue-500">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Kategori</p>
                            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalKategori }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-folder text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Produk -->
                <div class="stat-card bg-white p-6 rounded-xl shadow border-t-4 border-green-500">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Produk</p>
                            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalProduk }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center">
                            <i class="fas fa-box-open text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Outlet -->
                <div class="stat-card bg-white p-6 rounded-xl shadow border-t-4 border-purple-500">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Outlet</p>
                            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalOutlet }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center">
                            <i class="fas fa-store text-purple-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                
                    </div>
                </div>
            </div>

            <!-- Additional Content -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Activity -->
                <div class="bg-white rounded-xl shadow p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold">Aktivitas Terbaru</h2>
                        <a href="#" class="text-blue-600 text-sm font-medium">Lihat Semua</a>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3 p-3 hover:bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                <i class="fas fa-plus text-blue-600"></i>
                            </div>
                            <div>
                                <p class="font-medium">Produk baru ditambahkan</p>
                                <p class="text-gray-500 text-sm">"Produk A" telah ditambahkan ke kategori elektronik</p>
                                <p class="text-gray-400 text-xs mt-1">2 jam yang lalu</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3 p-3 hover:bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                                <i class="fas fa-edit text-green-600"></i>
                            </div>
                            <div>
                                <p class="font-medium">Kategori diperbarui</p>
                                <p class="text-gray-500 text-sm">Kategori "Pakaian" telah diperbarui</p>
                                <p class="text-gray-400 text-xs mt-1">5 jam yang lalu</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3 p-3 hover:bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center">
                                <i class="fas fa-store text-purple-600"></i>
                            </div>
                            <div>
                                <p class="font-medium">Outlet baru terdaftar</p>
                                <p class="text-gray-500 text-sm">Outlet "SITEPAT Cabang Surabaya" telah terdaftar</p>
                                <p class="text-gray-400 text-xs mt-1">Kemarin, 14:30</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h2 class="text-xl font-bold mb-6">Aksi Cepat</h2>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('admin.produk.create') }}"
                           class="bg-gradient-to-r from-blue-50 to-blue-100 border border-blue-200 p-4 rounded-xl flex flex-col items-center justify-center hover:from-blue-100 hover:to-blue-200 transition">
                            <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center mb-3">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                            <p class="font-medium text-center">Tambah Produk</p>
                        </a>
                        
                        <a href="{{ route('admin.kategori.create') }}"
                           class="bg-gradient-to-r from-green-50 to-green-100 border border-green-200 p-4 rounded-xl flex flex-col items-center justify-center hover:from-green-100 hover:to-green-200 transition">
                            <div class="w-12 h-12 rounded-full bg-green-500 flex items-center justify-center mb-3">
                                <i class="fas fa-folder-plus text-white"></i>
                            </div>
                            <p class="font-medium text-center">Tambah Kategori</p>
                        </a>
                        
                        <a href="{{ route('admin.outlet.create') }}"
                           class="bg-gradient-to-r from-purple-50 to-purple-100 border border-purple-200 p-4 rounded-xl flex flex-col items-center justify-center hover:from-purple-100 hover:to-purple-200 transition">
                            <div class="w-12 h-12 rounded-full bg-purple-500 flex items-center justify-center mb-3">
                                <i class="fas fa-store-alt text-white"></i>
                            </div>
                            <p class="font-medium text-center">Tambah Outlet</p>
                        </a>
                        
                        <a href="#"
                           class="bg-gradient-to-r from-orange-50 to-orange-100 border border-orange-200 p-4 rounded-xl flex flex-col items-center justify-center hover:from-orange-100 hover:to-orange-200 transition">
                            <div class="w-12 h-12 rounded-full bg-orange-500 flex items-center justify-center mb-3">
                                <i class="fas fa-chart-line text-white"></i>
                            </div>
                            <p class="font-medium text-center">Lihat Laporan</p>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-8 text-center text-gray-500 text-sm">
                <p>© {{ date('Y') }} SITEPAT Admin Dashboard. Seluruh hak cipta dilindungi.</p>
                <p class="mt-1">Versi 2.1.0 | Terakhir diperbarui: 15 Oktober 2023</p>
            </div>
        </div>
    </main>
</div>

<!-- Script for interactive elements -->
<script>
    // Highlight current page in sidebar
    document.addEventListener('DOMContentLoaded', function() {
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.sidebar-link');
        
        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
        
        // Add animation to stat cards on load
        const statCards = document.querySelectorAll('.stat-card');
        statCards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.classList.add('animate__animated', 'animate__fadeInUp');
        });
    });
</script>

<!-- Optional: Add animate.css for animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

</body>
</html>