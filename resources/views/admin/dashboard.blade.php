<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex">
    <!-- SIDEBAR -->
    <aside class="w-64 bg-gray-800 text-white min-h-screen p-4">
    <h2 class="text-xl font-bold mb-6">ADMIN SITEPAT</h2>

    <ul class="space-y-2">
        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="block p-2 hover:bg-gray-700 rounded">
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('admin.kategori.index') }}"
               class="block p-2 hover:bg-gray-700 rounded">
                Kategori
            </a>
        </li>

        <li>
            <a href="{{ route('admin.produk.index') }}"
               class="block p-2 hover:bg-gray-700 rounded">
                Produk
            </a>

            <a href="{{ route('admin.outlet.index') }}"
               class="block p-2 hover:bg-gray-700 rounded">
                Outlet
            </a>
        </li>
    </ul>

    <!-- LOGOUT -->
    <form action="{{ route('admin.logout') }}" method="POST" class="mt-6">
        @csrf
        <button type="submit"
            class="w-full p-2 bg-red-600 hover:bg-red-700 rounded">
            Logout
        </button>
    </form>
</aside>


    <!-- CONTENT -->
    <main class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">Dashboard Admin</h1>

        <div class="grid grid-cols-3 gap-4">
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-gray-500">Total Kategori</h3>
                <p class="text-2xl font-bold">10</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-gray-500">Total Produk</h3>
                <p class="text-2xl font-bold">25</p>
            </div>
        </div>
    </main>
</div>

</body>
</html>
