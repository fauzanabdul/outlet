<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Produk - {{ $produk->nama_produk }}</title>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Tailwind CDN (kalau dashboard kamu pakai Tailwind) --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-6xl mx-auto px-6 py-10">

    {{-- Breadcrumb --}}
    <div class="mb-6 text-sm text-gray-500">
        <a href="{{ route('dashboard') }}" class="hover:text-primary">Dashboard</a>
        <span class="mx-2">/</span>
        <a href="{{ route('produk') }}" class="hover:text-primary">Produk</a>
        <span class="mx-2">/</span>
        <span class="text-gray-700 font-medium">Detail Produk</span>
    </div>

    {{-- Card --}}
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- GAMBAR --}}
        <div class="p-6 flex items-center justify-center bg-gray-50">
            @if($produk->gambar)
                <img src="{{ asset('storage/' . $produk->gambar) }}"
                     alt="{{ $produk->nama_produk }}"
                     class="rounded-xl max-h-[400px] object-contain">
            @else
                <div class="text-gray-400 text-center">
                    <i class="fas fa-image text-5xl mb-3"></i>
                    <p>Gambar tidak tersedia</p>
                </div>
            @endif
        </div>

        {{-- DETAIL --}}
        <div class="p-8 flex flex-col justify-between">

            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">
                    {{ $produk->nama_produk }}
                </h1>
                
                <div class="mb-6">
                    <p class="text-gray-600 leading-relaxed">
                        {{ $produk->deskripsi ?? 'Tidak ada deskripsi produk.' }}
                    </p>
                </div>

                <div class="flex items-center space-x-6 text-sm">
                  
                </div>
            </div>

            {{-- ACTION --}}
            <div class="mt-8 flex space-x-4">
                <a href="{{ route('dashboard') }}"
                   class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
        </div>
    </div>
</div>

</body>
</html>
