<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gray-800 text-white p-4">
        <h2 class="text-xl font-bold mb-6 text-center">
            ADMIN SITEPAT
        </h2>

        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="block p-2 rounded
                   {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                    🏠 Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('admin.kategori.index') }}"
                   class="block p-2 rounded
                   {{ request()->routeIs('admin.kategori.*') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                    📂 Kategori
                </a>
            </li>

            <li>
                <a href="{{ route('admin.produk.index') }}"
                   class="block p-2 rounded
                   {{ request()->routeIs('admin.produk.*') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                    📦 Produk
                </a>
            </li>

            <li>
                <a href="{{ route('admin.outlet.index') }}"
                   class="block p-2 rounded
                   {{ request()->routeIs('admin.outlet.*') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                    🏪 Outlet
                </a>
            </li>
        </ul>

        <!-- LOGOUT -->
        <form action="{{ route('admin.logout') }}" method="POST" class="mt-6">
            @csrf
            <button type="submit"
                class="w-full p-2 bg-red-600 hover:bg-red-700 rounded">
                🚪 Logout
            </button>
        </form>
    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <!-- TOTAL KATEGORI -->
            <div class="bg-white p-5 rounded shadow hover:shadow-lg transition">
                <h3 class="text-gray-500 mb-1">Total Kategori</h3>
                <p class="text-3xl font-bold text-blue-600">
                    {{ $totalKategori }}
                </p>
            </div>

            <!-- TOTAL PRODUK -->
            <div class="bg-white p-5 rounded shadow hover:shadow-lg transition">
                <h3 class="text-gray-500 mb-1">Total Produk</h3>
                <p class="text-3xl font-bold text-green-600">
                    {{ $totalProduk }}
                </p>
            </div>

            <!-- TOTAL OUTLET -->
            <div class="bg-white p-5 rounded shadow hover:shadow-lg transition">
                <h3 class="text-gray-500 mb-1">Total Outlet</h3>
                <p class="text-3xl font-bold text-purple-600">
                    {{ $totalOutlet }}
                </p>
            </div>

        </div>
    </main>

</div>

</body>
</html>
