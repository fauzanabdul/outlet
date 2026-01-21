<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#2e2e2e] text-white">

<div class="min-h-screen p-6">

    <!-- HEADER -->
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.kategori.index') }}"
           class="bg-gray-600 px-3 py-2 rounded hover:bg-gray-700 transition">
            ← Kembali
        </a>

        <h1 class="text-2xl font-bold">Edit Kategori</h1>
    </div>

    <!-- FORM -->
    <div class="bg-[#3a3a3a] p-6 rounded shadow-md max-w-lg">
        <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- NAMA KATEGORI -->
            <div class="mb-4">
                <label class="block mb-2 font-semibold">Nama Kategori</label>
                <input
                    type="text"
                    name="nama_kategori"
                    value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                    class="w-full px-4 py-2 rounded bg-[#2e2e2e] border border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-500"
                    required
                >

                @error('nama_kategori')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- BUTTON -->
            <div class="flex gap-3">
                <button
                    type="submit"
                    class="bg-orange-500 px-6 py-2 rounded hover:bg-orange-600 transition">
                    Update
                </button>

                <a href="{{ route('admin.kategori.index') }}"
                   class="bg-gray-500 px-6 py-2 rounded hover:bg-gray-600 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>

</div>

</body>
</html>
