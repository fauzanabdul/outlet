<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori - Admin Panel</title>

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
            <div class="flex items-center gap-4 mb-6">
                <a href="{{ route('admin.kategori.index') }}"
                   class="bg-white hover:bg-primary-50 px-5 py-3 rounded-xl transition
                          flex items-center gap-3 shadow border border-slate-200
                          hover:border-primary-200">
                    <i class="fas fa-arrow-left text-slate-500"></i>
                    <span class="font-medium text-slate-700">Kembali</span>
                </a>

                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-slate-800">
                        <span class="bg-gradient-to-r from-primary-600 to-secondary-500 bg-clip-text text-transparent">
                            Edit Kategori
                        </span>
                    </h1>
                    <p class="text-slate-500 mt-1">Mengubah data kategori yang sudah ada</p>
                </div>
            </div>
        </div>

        <!-- FORM CARD -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

            <!-- HEADER CARD -->
            <div class="p-6 border-b border-slate-200 flex items-center gap-4 bg-slate-50">
                <div class="bg-primary-100 p-3 rounded-lg">
                    <i class="fas fa-edit text-primary-500 text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-slate-800">Form Edit Kategori</h2>
                    <p class="text-slate-500 text-sm mt-1">Lengkapi form di bawah untuk mengubah kategori</p>
                </div>
            </div>

            <!-- FORM -->
            <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="space-y-6">

                    <!-- INPUT -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Nama Kategori <span class="text-red-500">*</span>
                        </label>

                        <input type="text"
                               name="nama_kategori"
                               value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                               class="w-full border border-slate-300 rounded-xl px-4 py-4
                                      focus:outline-none focus:ring-2 focus:ring-primary-500
                                      transition"
                               placeholder="Masukkan nama kategori"
                               required>
                        
                        @error('nama_kategori')
                            <div class="mt-3 p-3 bg-red-50 border border-red-200 rounded-lg flex items-center gap-2">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    
                    <!-- BUTTON -->
                    <div class="flex gap-4 pt-4 border-t border-slate-200">
                        <button type="submit"
                                class="flex-1 bg-gradient-to-r from-primary-500 to-primary-600
                                       hover:from-primary-600 hover:to-primary-700 text-white
                                       px-6 py-4 rounded-xl font-semibold transition shadow-md">
                            Simpan Perubahan
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
    const input = document.querySelector('input[name="nama_kategori"]');
    const preview = document.getElementById('previewText');

    input?.addEventListener('input', function () {
        preview.textContent = this.value.trim() || '{{ $kategori->nama_kategori }}';
    });
</script>

</body>
</html>
