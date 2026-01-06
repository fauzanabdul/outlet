<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#2e2e2e] text-white">

<!-- TOP INFO -->
<div class="bg-black text-center text-sm py-2">
    Halo Sobat! Selamat datang di Website Kami
</div>

<!-- NAVBAR -->
<nav class="flex items-center justify-between px-10 py-4 bg-[#3a3a3a]">
    <div class="text-2xl font-bold text-orange-500">
        SI<span class="text-white">TEPAT</span>
    </div>

    <ul class="flex gap-8 font-semibold">
        <li><a href="#" class="hover:text-orange-400">Beranda</a></li>
        <li><a href="#" class="hover:text-orange-400">Produk</a></li>
        <li><a href="#" class="hover:text-orange-400">Service</a></li>
        <li><a href="#" class="hover:text-orange-400">Outlet Kami</a></li>
    </ul>
</nav>


<!-- LOGOUT -->
        <li>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button
                    type="submit"
                    class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded text-white font-semibold"
                >
                    Logout
                </button>
            </form>
        </li>
        

<!-- HERO -->
<section class="relative bg-[#1f1f1f] px-10 py-16">
    <h1 class="text-4xl font-extrabold mb-4">
        Promo Terbaik Hari Ini
    </h1>
    <p class="text-gray-300 mb-8">
        Dapatkan layanan & produk terbaik dengan harga spesial
    </p>

    <!-- PROMO CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-black p-6 rounded-xl border-l-8 border-orange-500">
            <h3 class="text-orange-400 text-xl font-bold">PROMO BAN</h3>
            <p class="text-4xl font-extrabold mt-4">150RB*</p>
        </div>

        <div class="bg-black p-6 rounded-xl border-l-8 border-orange-500">
            <h3 class="text-orange-400 text-xl font-bold">PROMO OLI</h3>
            <p class="text-4xl font-extrabold mt-4">49RB*</p>
        </div>

        <div class="bg-black p-6 rounded-xl border-l-8 border-orange-500">
            <h3 class="text-orange-400 text-xl font-bold">PROMO AKI</h3>
            <p class="text-4xl font-extrabold mt-4">175RB*</p>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-black py-6 text-center text-gray-400 text-sm">
    © {{ date('Y') }} SiTepat Digital Motoshop
</footer>

</body>
</html>
