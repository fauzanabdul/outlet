<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-5xl mx-auto px-6 py-10">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-pen mr-2 text-primary"></i> Edit Produk
        </h1>
        <a href="{{ route('admin.produk.index') }}"
           class="px-4 py-2 rounded-lg border text-gray-600 hover:bg-gray-100 transition">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
        </a>
    </div>

    {{-- Error --}}
    @if ($errors->any())
        <div class="mb-5 bg-red-100 border border-red-200 text-red-700 p-4 rounded-xl">
            <ul class="list-disc ml-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('admin.produk.update', $produk->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-2xl shadow-lg p-8 space-y-6">

        @csrf
        @method('PUT')

        {{-- Nama Produk --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Nama Produk
            </label>
            <input type="text"
                   name="nama_produk"
                   value="{{ old('nama_produk', $produk->nama_produk) }}"
                   class="w-full rounded-xl border-gray-300 focus:ring-primary focus:border-primary"
                   required>
        </div>

        {{-- Kategori --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Kategori
            </label>
            <select name="kategori_id"
                    class="w-full rounded-xl border-gray-300 focus:ring-primary focus:border-primary"
                    required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}"
                        {{ $produk->kategori_id == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Deskripsi
            </label>
            <textarea name="deskripsi"
                      rows="4"
                      class="w-full rounded-xl border-gray-300 focus:ring-primary focus:border-primary"
                      required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
        </div>

        {{-- Gambar --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Gambar Produk
            </label>

            <div class="flex items-center gap-6">
                {{-- Preview lama --}}
                @if ($produk->gambar)
                    <img src="{{ asset('storage/' . $produk->gambar) }}"
                         alt="Produk"
                         class="w-32 h-32 object-cover rounded-xl border">
                @endif

                <input type="file"
                       name="gambar"
                       class="block w-full text-sm text-gray-600">
            </div>

            <p class="text-xs text-gray-500 mt-2">
                Kosongkan jika tidak ingin mengganti gambar
            </p>
        </div>

        {{-- Action --}}
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.produk.index') }}"
               class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                Batal
            </a>

            <button type="submit"
                    class="gradient-bg px-6 py-2.5 rounded-xl text-white font-medium hover:shadow-lg hover:shadow-blue-500/30 transition">
                <i class="fas fa-save mr-2"></i> Simpan Perubahan
            </button>
        </div>

    </form>

</div>

</body>
</html>
