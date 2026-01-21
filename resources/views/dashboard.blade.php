<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiTepat - Digital Motoshop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-[#2e2e2e] text-white min-h-screen flex flex-col">

<!-- TOP INFO -->
<div class="bg-gradient-to-r from-orange-600 to-orange-500 text-center text-sm py-2">
    🎉 Halo Sobat! Selamat datang di Website Kami - Gratis biaya pemasangan untuk pembelian ban!
</div>

<!-- NAVBAR -->
<nav class="flex items-center justify-between px-4 md:px-10 py-4 bg-[#3a3a3a] sticky top-0 z-10 shadow-lg">
    <div class="text-2xl font-bold text-orange-500">
        <i class="fas fa-motorcycle mr-2"></i>
        SI<span class="text-white">TEPAT</span>
    </div>

    <ul class="hidden md:flex gap-8 font-semibold">
        <li><a href="#" class="hover:text-orange-400 transition-colors duration-300"><i class="fas fa-home mr-2"></i>Beranda</a></li>
        <li><a href="#" class="hover:text-orange-400 transition-colors duration-300"><i class="fas fa-tools mr-2"></i>Produk</a></li>
        <li><a href="#" class="hover:text-orange-400 transition-colors duration-300"><i class="fas fa-concierge-bell mr-2"></i>Service</a></li>
        <li><a href="#" class="hover:text-orange-400 transition-colors duration-300"><i class="fas fa-store mr-2"></i>Outlet Kami</a></li>
    </ul>

    <div class="flex items-center gap-4">
        <button class="md:hidden text-white text-xl">
            <i class="fas fa-bars"></i>
        </button>
        <a href="{{ route('admin.dashboard') }}"
           class="bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white px-4 py-2 rounded-lg font-bold transition-all duration-300 shadow-lg hover:shadow-orange-500/30">
            <i class="fas fa-user-shield mr-2"></i>Mode Admin
        </a>
    </div>
</nav>

<!-- HERO -->
<section class="flex-grow px-4 md:px-10 py-12 md:py-16 bg-gradient-to-br from-[#1f1f1f] to-[#2a2a2a]">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl md:text-4xl font-extrabold mb-4">
            Promo Terbaik <span class="text-orange-400">Hari Ini</span>
        </h1>
        <p class="text-gray-300 mb-8 max-w-2xl">
            Dapatkan layanan & produk terbaik dengan harga spesial. Promo terbatas hanya untuk bulan ini!
        </p>

        <!-- PROMO CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Promo Ban -->
            <div class="bg-gradient-to-br from-black to-gray-900 p-6 rounded-xl border-l-8 border-orange-500 hover:scale-[1.02] transition-transform duration-300 shadow-xl">
                <div class="flex justify-between items-start">
                    <h3 class="text-orange-400 text-xl font-bold">PROMO BAN</h3>
                    <span class="bg-orange-500 text-black text-xs font-bold px-3 py-1 rounded-full">TERLARIS</span>
                </div>
                <p class="text-4xl font-extrabold mt-4">150RB<span class="text-lg">*</span></p>
                <p class="text-gray-400 mt-2 text-sm">Mulai dari ban dalam & luar</p>
                <button class="mt-6 w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded-lg transition-colors">
                    <i class="fas fa-shopping-cart mr-2"></i>Pesan Sekarang
                </button>
            </div>

            <!-- Promo Oli -->
            <div class="bg-gradient-to-br from-black to-gray-900 p-6 rounded-xl border-l-8 border-orange-500 hover:scale-[1.02] transition-transform duration-300 shadow-xl">
                <div class="flex justify-between items-start">
                    <h3 class="text-orange-400 text-xl font-bold">PROMO OLI</h3>
                    <span class="bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full">HOT</span>
                </div>
                <p class="text-4xl font-extrabold mt-4">49RB<span class="text-lg">*</span></p>
                <p class="text-gray-400 mt-2 text-sm">Oli mesin premium</p>
                <button class="mt-6 w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded-lg transition-colors">
                    <i class="fas fa-shopping-cart mr-2"></i>Pesan Sekarang
                </button>
            </div>

            <!-- Promo Aki -->
            <div class="bg-gradient-to-br from-black to-gray-900 p-6 rounded-xl border-l-8 border-orange-500 hover:scale-[1.02] transition-transform duration-300 shadow-xl">
                <div class="flex justify-between items-start">
                    <h3 class="text-orange-400 text-xl font-bold">PROMO AKI</h3>
                    <span class="bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">BARU</span>
                </div>
                <p class="text-4xl font-extrabold mt-4">175RB<span class="text-lg">*</span></p>
                <p class="text-gray-400 mt-2 text-sm">Garansi 1 tahun</p>
                <button class="mt-6 w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded-lg transition-colors">
                    <i class="fas fa-shopping-cart mr-2"></i>Pesan Sekarang
                </button>
            </div>
        </div>

        <!-- CATATAN PROMO -->
        <div class="mt-8 p-4 bg-black/50 rounded-lg border border-gray-700">
            <p class="text-gray-400 text-sm">
                <span class="text-orange-400 font-bold">Catatan:</span> * Harga dapat berubah sesuai jenis dan merk produk. Promo berlaku sampai 30 November 2024.
            </p>
        </div>

        <!-- FITUR LAINNYA -->
        <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="text-center p-4 bg-black/30 rounded-lg">
                <i class="fas fa-shipping-fast text-orange-400 text-2xl mb-2"></i>
                <p class="font-semibold">Gratis Ongkir</p>
            </div>
            <div class="text-center p-4 bg-black/30 rounded-lg">
                <i class="fas fa-shield-alt text-orange-400 text-2xl mb-2"></i>
                <p class="font-semibold">Garansi Resmi</p>
            </div>
            <div class="text-center p-4 bg-black/30 rounded-lg">
                <i class="fas fa-headset text-orange-400 text-2xl mb-2"></i>
                <p class="font-semibold">Customer Service</p>
            </div>
            <div class="text-center p-4 bg-black/30 rounded-lg">
                <i class="fas fa-store text-orange-400 text-2xl mb-2"></i>
                <p class="font-semibold">10+ Outlet</p>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-black py-8 text-gray-400">
    <div class="max-w-7xl mx-auto px-4 md:px-10">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-6 md:mb-0">
                <div class="text-2xl font-bold text-orange-500 mb-2">
                    SI<span class="text-white">TEPAT</span>
                </div>
                <p class="text-sm">Digital Motoshop Terpercaya</p>
            </div>
            
            <div class="flex gap-6 mb-6 md:mb-0">
                <a href="#" class="hover:text-orange-400 text-xl"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-orange-400 text-xl"><i class="fab fa-facebook"></i></a>
                <a href="#" class="hover:text-orange-400 text-xl"><i class="fab fa-whatsapp"></i></a>
            </div>
            
            <div class="text-center md:text-right">
                <p class="font-bold text-white">Hubungi Kami</p>
                <p class="text-sm">📞 (021) 1234-5678</p>
                <p class="text-sm">📧 info@sitepat.com</p>
            </div>
        </div>
        
        <div class="border-t border-gray-800 mt-6 pt-6 text-center text-sm">
            © {{ date('Y') }} SiTepat Digital Motoshop. All rights reserved.
        </div>
    </div>
</footer>

</body>
</html>