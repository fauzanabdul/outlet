<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Produk - SiTepat Digital Motoshop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="p-6 bg-slate-900 text-slate-100 font-[Poppins]">

<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold">
                Data <span class="text-purple-500">Produk</span>
            </h1>
            <p class="text-slate-400">Kelola produk dan layanan bengkel SiTepat</p>
        </div>

        <a href="{{ route('dashboard') }}"
           class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded-lg">
            ← Kembali
        </a>
    </div>

    {{-- TOTAL PRODUK --}}
    <div class="bg-slate-800 p-6 rounded-xl mb-6">
        <p class="text-slate-400">Total Produk</p>
        <h2 class="text-3xl font-bold">{{ $produks->count() }}</h2>
    </div>

    {{-- TABLE --}}
    <div class="bg-slate-800 rounded-xl overflow-hidden">
        <div class="p-4 border-b border-slate-700 flex justify-between">
            <h3 class="font-bold">Daftar Produk</h3>
            <span class="text-slate-400 text-sm">
                {{ $produks->count() }} produk ditemukan
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-700 text-slate-300">
                    <tr>
                        <th class="p-4 text-left">No</th>
                        <th class="p-4 text-left">Nama Produk</th>
                        <th class="p-4 text-left">Kategori</th>
                        <th class="p-4 text-left">Gambar</th>
                        <th class="p-4 text-left">Deskripsi</th>
                        
                    </tr>
                </thead>

                <tbody>
                    @forelse($produks as $index => $produk)
                        <tr class="border-b border-slate-700 hover:bg-slate-700/40">
                            
                            {{-- NO --}}
                            <td class="p-4">
                                {{ $index + 1 }}
                            </td>

                            {{-- NAMA --}}
                            <td class="p-4 font-medium">
                                {{ $produk->nama_produk }}
                            </td>

                            {{-- KATEGORI --}}
                            <td class="p-4">
                                <span class="px-3 py-1 bg-purple-600/20 text-purple-400 rounded-full text-xs">
                                    {{ $produk->kategori->nama_kategori ?? 'Tidak Ada Kategori' }}
                                </span>
                            </td>

                            {{-- GAMBAR --}}
                            <td class="p-4">
                                @if($produk->gambar)
                                    <img src="{{ asset('storage/'.$produk->gambar) }}"
                                         class="w-16 h-16 object-cover rounded-lg border border-purple-500/30">
                                @else
                                    <span class="text-slate-500 text-xs">Tidak ada gambar</span>
                                @endif
                            </td>

                            {{-- DESKRIPSI --}}
                            <td class="p-4 max-w-xs truncate">
                                {{ $produk->deskripsi ?? '-' }}
                            </td>

                            

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-slate-400">
                                Belum ada data produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

    {{-- FOOTER --}}
    <div class="mt-6 text-slate-400 text-sm">
        Terakhir diperbarui: {{ now()->format('d M Y H:i') }}
    </div>

</div>

</body>
</html>
