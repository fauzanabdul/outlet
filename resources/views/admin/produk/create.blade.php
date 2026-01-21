<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#2e2e2e] text-white p-6">

{{-- Header --}}
<div class="flex items-center gap-3 mb-6">
    <a href="{{ route('admin.produk.index') }}"
       class="bg-gray-600 px-3 py-2 rounded hover:bg-gray-700 transition">
        ← Kembali
    </a>
    <h1 class="text-2xl font-bold">Tambah Produk</h1>
</div>

{{-- Card --}}
<div class="bg-[#3a3a3a] p-6 rounded w-full max-w-xl">
    <form action="{{ route('admin.produk.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="flex flex-col gap-4">

        @csrf

        {{-- Nama Produk --}}
        <div>
            <label class="block mb-1">Nama Produk</label>
            <input type="text" name="nama"
                   value="{{ old('nama') }}"
                   class="w-full px-3 py-2 rounded bg-[#2e2e2e] border border-gray-600"
                   required>
            @error('nama')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Kategori --}}
        <div>
            <label class="block mb-1">Kategori</label>
            <select name="kategori_id"
                class="w-full px-3 py-2 rounded bg-[#2e2e2e] border border-gray-600"
                required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}"
                        {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="3"
                class="w-full px-3 py-2 rounded bg-[#2e2e2e] border border-gray-600"
                required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Gambar --}}
        <div>
            <label class="block mb-1">Gambar</label>
            <input type="file" name="gambar"
                   class="w-full text-sm bg-[#2e2e2e] border border-gray-600 rounded"
                   required>
            @error('gambar')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Button --}}
        <div class="flex gap-2 mt-4">
            <button type="submit"
                class="bg-orange-500 px-4 py-2 rounded hover:bg-orange-600 transition">
                Simpan
            </button>

            <a href="{{ route('admin.produk.index') }}"
               class="bg-gray-600 px-4 py-2 rounded hover:bg-gray-700 transition">
                Batal
            </a>
        </div>
    </form>
</div>

</body>
</html>
