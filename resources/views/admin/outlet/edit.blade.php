<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Outlet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">

    <h2 class="text-2xl font-bold mb-4">✏️ Edit Outlet</h2>

    <form action="{{ route('admin.outlet.update', $outlet->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- GAMBAR --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Gambar Outlet</label>
            <img src="{{ asset('uploads/outlet/'.$outlet->gambar) }}"
                 class="w-32 h-32 object-cover rounded mb-2">
            <input type="file" name="gambar"
                   class="w-full border p-2 rounded">
            <small class="text-gray-500">Kosongkan jika tidak diganti</small>
        </div>

        {{-- NAMA --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Nama Outlet</label>
            <input type="text"
                   name="nama_outlet"
                   value="{{ old('nama_outlet', $outlet->nama_outlet) }}"
                   class="w-full border p-2 rounded"
                   required>
        </div>

        {{-- ALAMAT --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Alamat</label>
            <textarea name="alamat"
                      class="w-full border p-2 rounded"
                      required>{{ old('alamat', $outlet->alamat) }}</textarea>
        </div>

        {{-- NO TELP --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">No Telp</label>
            <input type="text"
                   name="no_telp"
                   value="{{ old('no_telp', $outlet->no_telp) }}"
                   class="w-full border p-2 rounded"
                   required>
        </div>

        {{-- LINK MAPS --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">
                Link Lokasi (Google Maps)
            </label>
            <input type="url"
                name="link_maps"
                value="{{ old('link_maps', $outlet->link_maps) }}"
                class="w-full border p-2 rounded"
                placeholder="https://maps.google.com/...">
            <small class="text-gray-500">
                Kosongkan jika tidak ada
            </small>
        </div>


        {{-- TOMBOL --}}
        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                💾 Update
            </button>

            <a href="{{ route('admin.outlet.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                ↩ Kembali
            </a>
        </div>

    </form>

</div>

</body>
</html>
