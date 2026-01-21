<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kategori</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#2e2e2e] text-white">

<div class="flex justify-between items-center mb-6">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.dashboard') }}"
           class="bg-gray-600 px-3 py-2 rounded hover:bg-gray-700 transition">
           ← Dashboard
        </a>

        <h1 class="text-2xl font-bold">Kategori</h1>
    </div>

    <a href="{{ route('admin.kategori.create') }}"
       class="bg-orange-500 px-4 py-2 rounded hover:bg-orange-600 transition">
       + Tambah
    </a>
</div>


    <table class="w-full bg-[#3a3a3a] rounded">
        <tr class="bg-black text-left">
            <th class="p-3">No</th>
            <th class="p-3">Nama Kategori</th>
            <th class="p-3">Aksi</th>
        </tr>
        @foreach($kategoris as $k)
        <tr class="border-t border-gray-600">
            <td class="p-3">{{ $loop->iteration }}</td>
            <td class="p-3">{{ $k->nama_kategori }}</td>
            <td class="p-3 flex gap-2">
                <a href="{{ route('admin.kategori.edit',$k->id) }}"
                   class="bg-blue-500 px-3 py-1 rounded">Edit</a>

                <form action="{{ route('admin.kategori.destroy',$k->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="bg-red-600 px-3 py-1 rounded"
                        onclick="return confirm('Hapus data?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

</body>
</html>
