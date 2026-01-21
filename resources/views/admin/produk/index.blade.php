<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#2e2e2e] text-white p-6">

<div class="flex justify-between items-center mb-6">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.dashboard') }}"
           class="bg-gray-600 px-3 py-2 rounded hover:bg-gray-700 transition">
           ← Dashboard
        </a>

        <h1 class="text-2xl font-bold">Produk</h1>
    </div>

    <a href="{{ route('admin.produk.create') }}"
       class="bg-orange-500 px-4 py-2 rounded hover:bg-orange-600 transition">
       + Tambah
    </a>
</div>

<table class="w-full bg-[#3a3a3a] rounded overflow-hidden">
    <thead>
        <tr class="bg-black text-left">
            <th class="p-3">No</th>
            <th class="p-3">Nama Produk</th>
            <th class="p-3">Gambar</th>
            <th class="p-3">Deskripsi</th>
            <th class="p-3">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($produks as $produk)
        <tr class="border-t border-gray-600">
            <td class="p-3">{{ $loop->iteration }}</td>

            <td class="p-3">{{ $produk->nama_produk }}</td>

            <td class="p-3">
                <img src="{{ asset('storage/'.$produk->gambar) }}"
                     class="w-16 h-16 object-cover rounded">
            </td>

            <td class="p-3">{{ $produk->deskripsi }}</td>

            <td class="p-3 flex gap-2">
                <a href="{{ route('admin.produk.edit', $produk->id) }}"
                   class="bg-blue-500 px-3 py-1 rounded hover:bg-blue-600">
                   Edit
                </a>

                <form action="{{ route('admin.produk.destroy', $produk->id) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 px-3 py-1 rounded hover:bg-red-700"
                        onclick="return confirm('Hapus data?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="p-4 text-center text-gray-400">
                Data produk kosong
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>
