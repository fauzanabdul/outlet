<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Outlet - Admin Panel</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                        },
                        secondary: {
                            500: '#8b5cf6',
                            600: '#7c3aed',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen flex items-center justify-center">

<div class="w-full max-w-2xl p-4">

    <!-- HEADER -->
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.outlet.index') }}"
           class="bg-white hover:bg-primary-50 px-5 py-3 rounded-xl transition
                  flex items-center gap-3 shadow border border-slate-200
                  hover:border-primary-200">
            ⬅ <span class="font-medium text-slate-700">Kembali</span>
        </a>

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                <span class="bg-gradient-to-r from-primary-600 to-secondary-500 bg-clip-text text-transparent">
                    Tambah Outlet
                </span>
            </h1>
            <p class="text-slate-500 text-sm mt-1">
                Tambahkan outlet baru ke dalam sistem
            </p>
        </div>
    </div>

    <!-- CARD -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

        <!-- CARD HEADER -->
        <div class="p-6 border-b border-slate-200 bg-slate-50">
            <h2 class="text-lg font-semibold text-slate-800">
                Form Tambah Outlet
            </h2>
        </div>

        <!-- ERROR -->
        @if ($errors->any())
            <div class="mx-6 mt-6 bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg">
                <ul class="list-disc list-inside text-sm space-y-1">
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
              class="p-6 space-y-6">

            @csrf

            <!-- GAMBAR -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Gambar Outlet
                </label>
                <input type="file"
                       name="gambar"
                       required
                       class="w-full border border-slate-300 rounded-xl px-4 py-3
                              focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
            </div>

            <!-- NAMA OUTLET -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Nama Outlet
                </label>
                <input type="text"
                       name="nama_outlet"
                       value="{{ old('nama_outlet') }}"
                       required
                       class="w-full border border-slate-300 rounded-xl px-4 py-3
                              focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
            </div>

            <!-- ALAMAT -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Alamat
                </label>
                <textarea name="alamat"
                          rows="3"
                          required
                          class="w-full border border-slate-300 rounded-xl px-4 py-3
                                 focus:outline-none focus:ring-2 focus:ring-primary-500 transition">{{ old('alamat') }}</textarea>
            </div>

            <!-- NO TELP -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    No Telp
                </label>
                <input type="text"
                       name="no_telp"
                       value="{{ old('no_telp') }}"
                       required
                       class="w-full border border-slate-300 rounded-xl px-4 py-3
                              focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
            </div>

            <!-- LINK MAPS -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Link Lokasi (Google Maps)
                </label>
                <input type="url"
                       name="link_maps"
                       value="{{ old('link_maps') }}"
                       placeholder="https://maps.google.com/..."
                       class="w-full border border-slate-300 rounded-xl px-4 py-3
                              focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                <p class="text-xs text-slate-500 mt-2">
                    Opsional, isi link Google Maps outlet
                </p>
            </div>

            <!-- BUTTON -->
            <div class="flex gap-4 pt-4 border-t border-slate-200">
                <a href="{{ route('admin.outlet.index') }}"
                   class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700
                          px-6 py-3 rounded-xl font-semibold transition text-center">
                    Batal
                </a>

                <button type="submit"
                        class="flex-1 bg-gradient-to-r from-primary-500 to-primary-600
                               hover:from-primary-600 hover:to-primary-700 text-white
                               px-6 py-3 rounded-xl font-semibold transition shadow-md">
                    Simpan Outlet
                </button>
            </div>

        </form>
    </div>
</div>

</body>
</html>
