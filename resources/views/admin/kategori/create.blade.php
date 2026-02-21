<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori - Admin Panel</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">

<div class="min-h-screen p-4 md:p-6 lg:p-8 flex items-center justify-center">
    <div class="w-full max-w-2xl">

        <!-- HEADER -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.kategori.index') }}"
                       class="bg-white hover:bg-primary-50 px-5 py-3 rounded-xl transition-all
                              flex items-center gap-3 shadow border border-slate-200
                              hover:border-primary-200">
                        <i class="fas fa-arrow-left text-slate-500"></i>
                        <span class="font-medium text-slate-700">Kembali</span>
                    </a>

                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-slate-800">
                            <span class="bg-gradient-to-r from-primary-600 to-secondary-500 bg-clip-text text-transparent">
                                Tambah Kategori
                            </span>
                        </h1>
                        <p class="text-slate-500 mt-1">Tambahkan kategori baru untuk produk Anda</p>
                    </div>
                </div>
            </div>

            <!-- MINI CARD -->
            
        </div>

        <!-- FORM CARD -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

            <!-- FORM HEADER -->
            <div class="p-6 border-b border-slate-200 flex items-center gap-4 bg-slate-50">
                <div class="bg-primary-100 p-3 rounded-lg">
                    <i class="fas fa-plus-circle text-primary-500 text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-slate-800">Form Tambah Kategori</h2>
                    <p class="text-slate-500 text-sm mt-1">Isi data kategori dengan lengkap</p>
                </div>
            </div>

            <!-- SUCCESS -->
            @if(session('success'))
                <div class="mx-6 mt-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center gap-3">
                    <i class="fas fa-check-circle text-green-500"></i>
                    {{ session('success') }}
                </div>
            @endif

            <!-- ERROR -->
            @if($errors->any())
                <div class="mx-6 mt-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg flex items-center gap-3">
                    <i class="fas fa-exclamation-circle text-red-500"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- FORM -->
            <form action="{{ route('admin.kategori.store') }}" method="POST" class="p-6">
                @csrf

                <div class="space-y-6">

                    <!-- INPUT -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Nama Kategori <span class="text-red-500">*</span>
                        </label>

                        <input type="text"
                               name="nama_kategori"
                               id="nama_kategori"
                               value="{{ old('nama_kategori') }}"
                               class="w-full border border-slate-300 rounded-xl px-4 py-4
                                      focus:outline-none focus:ring-2 focus:ring-primary-500
                                      transition"
                               placeholder="Masukkan nama kategori"
                               required>
                    </div>

                   

                    <!-- BUTTON -->
                    <div class="flex gap-4 pt-4 border-t border-slate-200">
                        <button type="submit"
                                class="flex-1 bg-primary-600 hover:bg-primary-700 text-white
                                       px-6 py-4 rounded-xl font-semibold transition">
                            Simpan
                        </button>

                        <a href="{{ route('admin.kategori.index') }}"
                           class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700
                                  px-6 py-4 rounded-xl font-semibold transition text-center">
                            Batal
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const input = document.getElementById('nama_kategori');
    const preview = document.getElementById('previewText');

    input?.addEventListener('input', function () {
        preview.textContent = this.value.trim() || 'Nama Kategori';
    });
</script>

</body>
</html>
