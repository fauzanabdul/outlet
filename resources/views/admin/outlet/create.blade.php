<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Outlet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-xl bg-white p-6 rounded shadow">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl font-bold">Tambah Outlet</h1>

        <a href="{{ route('admin.outlet.index') }}"
           class="text-sm bg-gray-700 text-white px-3 py-2 rounded hover:bg-gray-800">
            ⬅ Kembali
        </a>
    </div>

    <!-- ERROR VALIDASI -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- FORM -->
    <form action="{{ route('admin.outlet.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-4">

        @csrf

        <!-- GAMBAR -->
        <div>
            <label class="block font-semibold mb-1">Gambar Outlet</label>
            <input type="file"
                   name="gambar"
                   required
                   class="w-full border rounded p-2">
        </div>

        <!-- NAMA OUTLET -->
        <div>
            <label class="block font-semibold mb-1">Nama Outlet</label>
            <input type="text"
                   name="nama_outlet"
                   value="{{ old('nama_outlet') }}"
                   required
                   class="w-full border rounded p-2">
        </div>

        <!-- ALAMAT -->
        <div>
            <label class="block font-semibold mb-1">Alamat</label>
            <textarea name="alamat"
                      rows="3"
                      required
                      class="w-full border rounded p-2">{{ old('alamat') }}</textarea>
        </div>

        <!-- NO TELP -->
        <div>
            <label class="block font-semibold mb-1">No Telp</label>
            <input type="text"
                   name="no_telp"
                   value="{{ old('no_telp') }}"
                   required
                   class="w-full border rounded p-2">
        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.outlet.index') }}"
               class="px-4 py-2 rounded bg-gray-500 text-white hover:bg-gray-600">
                Batal
            </a>

            <button type="submit"
                    class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">
                Simpan Outlet
            </button>
        </div>

    </form>

</div>

</body>
</html>
