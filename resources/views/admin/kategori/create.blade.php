<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#2e2e2e] text-white min-h-screen flex items-center justify-center">

<div class="bg-[#1f1f1f] p-8 rounded-lg w-[400px]">
    <h1 class="text-xl font-bold mb-6 text-center">Tambah Kategori</h1>

    @if(session('success'))
        <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.kategori.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-2 text-sm">Nama Kategori</label>
            <input type="text" name="nama_kategori"
                   class="w-full px-4 py-2 rounded bg-[#2e2e2e] border border-gray-600 focus:outline-none"
                   required>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 py-2 rounded font-semibold">
            Simpan
        </button>
    </form>
</div>

</body>
</html>
