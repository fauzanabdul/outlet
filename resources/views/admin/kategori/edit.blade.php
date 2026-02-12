<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-900 text-gray-100 min-h-screen">

<div class="min-h-screen p-4 md:p-6 lg:p-8">

    <!-- HEADER SECTION -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.kategori.index') }}"
                   class="bg-gray-800 hover:bg-gray-700 px-4 py-3 rounded-lg transition-all duration-300 
                          flex items-center gap-2 group shadow-lg hover:shadow-xl"
                   title="Kembali ke daftar kategori">
                    <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                    <span>Kembali</span>
                </a>
                
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-white">Edit Kategori</h1>
                    <p class="text-gray-400 text-sm mt-1">Mengubah data kategori yang sudah ada</p>
                </div>
            </div>
            
            <div class="text-sm text-gray-400 bg-gray-800 px-4 py-2 rounded-lg">
                <i class="fas fa-hashtag mr-2"></i>
                ID: <span class="text-orange-400 font-mono">{{ $kategori->id }}</span>
            </div>
        </div>
        
        <!-- Progress Indicator -->
        <div class="flex items-center gap-2 text-sm text-gray-400 mb-6">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-orange-400 transition">Dashboard</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <a href="{{ route('admin.kategori.index') }}" class="hover:text-orange-400 transition">Kategori</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-orange-400">Edit</span>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="max-w-2xl mx-auto">
        <!-- FORM CARD -->
        <div class="bg-gray-800 rounded-xl shadow-2xl overflow-hidden border border-gray-700">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4 border-b border-gray-700">
                <div class="flex items-center gap-3">
                    <div class="bg-orange-500 p-3 rounded-lg">
                        <i class="fas fa-edit text-white text-lg"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-white">Form Edit Kategori</h2>
                        <p class="text-gray-400 text-sm">Lengkapi form di bawah untuk mengubah kategori</p>
                    </div>
                </div>
            </div>
            
            <!-- Form Content -->
            <div class="p-6">
                <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" id="editKategoriForm">
                    @csrf
                    @method('PUT')
                    
                    <!-- NAMA KATEGORI FIELD -->
                    <div class="mb-8">
                        <label class="block mb-3 font-semibold text-white">
                            <span class="flex items-center gap-2">
                                <i class="fas fa-tag text-orange-400"></i>
                                Nama Kategori
                                <span class="text-red-500">*</span>
                            </span>
                        </label>
                        
                        <div class="relative">
                            <input
                                type="text"
                                name="nama_kategori"
                                value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                                class="w-full px-4 py-3 pl-12 bg-gray-900 border border-gray-700 rounded-lg 
                                       text-white focus:outline-none focus:ring-2 focus:ring-orange-500 
                                       focus:border-transparent transition-all duration-300
                                       placeholder-gray-500"
                                placeholder="Masukkan nama kategori"
                                required
                                autocomplete="off"
                            >
                            <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <i class="fas fa-heading"></i>
                            </div>
                            
                            <!-- Character counter -->
                            <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-xs text-gray-500">
                                <span id="charCount">{{ strlen(old('nama_kategori', $kategori->nama_kategori)) }}</span>/50
                            </div>
                        </div>
                        
                        <!-- Validation message -->
                        @error('nama_kategori')
                            <div class="mt-3 p-3 bg-red-900/30 border border-red-800 rounded-lg flex items-start gap-3">
                                <i class="fas fa-exclamation-circle text-red-400 mt-1"></i>
                                <p class="text-red-300 text-sm">{{ $message }}</p>
                            </div>
                        @enderror
                        
                        

                    <!-- FORM ACTIONS -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-700">
                        <button
                            type="submit"
                            class="bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 
                                   px-6 py-3 rounded-lg font-semibold transition-all duration-300 
                                   flex items-center justify-center gap-2 shadow-lg hover:shadow-orange-500/25
                                   transform hover:-translate-y-0.5"
                            id="submitBtn">
                            <i class="fas fa-save"></i>
                            <span>Simpan Perubahan</span>
                        </button>
                        
                        <div class="flex gap-3">
                            <a href="{{ route('admin.kategori.index') }}"
                               class="bg-gray-700 hover:bg-gray-600 px-6 py-3 rounded-lg transition-all duration-300 
                                      flex items-center justify-center gap-2 border border-gray-600">
                                <i class="fas fa-times"></i>
                                <span>Batal</span>
                            </a>
                            
                        
                        </div>
                    </div>
                </form>
            </div>
            
            
            </div>
        </div>
        
        
    </div>

</div>

<!-- JavaScript untuk interaksi -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const namaInput = document.querySelector('input[name="nama_kategori"]');
        const charCount = document.getElementById('charCount');
        const previewNama = document.getElementById('previewNama');
        const previewSlug = document.getElementById('previewSlug');
        const submitBtn = document.getElementById('submitBtn');
        
        // Update karakter counter dan preview
        namaInput.addEventListener('input', function() {
            const value = this.value;
            const length = value.length;
            
            // Update character counter
            charCount.textContent = length;
            
            // Update preview
            previewNama.textContent = value || '{{ $kategori->nama_kategori }}';
            
            // Generate slug preview
            const slug = value.toLowerCase()
                .replace(/[^\w\s]/gi, '')
                .replace(/\s+/g, '-');
            previewSlug.textContent = slug || '{{ Str::slug($kategori->nama_kategori) }}';
            
            // Validasi panjang
            if (length > 50) {
                this.classList.add('border-red-500');
                charCount.classList.add('text-red-400');
            } else {
                this.classList.remove('border-red-500');
                charCount.classList.remove('text-red-400');
            }
        });
        
        // Form submission handling
        const form = document.getElementById('editKategoriForm');
        form.addEventListener('submit', function(e) {
            const value = namaInput.value.trim();
            
            if (!value) {
                e.preventDefault();
                showValidationError('Nama kategori tidak boleh kosong');
                return;
            }
            
            if (value.length > 50) {
                e.preventDefault();
                showValidationError('Nama kategori maksimal 50 karakter');
                return;
            }
            
            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
            submitBtn.disabled = true;
        });
        
        function showValidationError(message) {
            // Remove existing error if any
            const existingError = document.querySelector('.validation-error');
            if (existingError) existingError.remove();
            
            // Create error element
            const errorDiv = document.createElement('div');
            errorDiv.className = 'mt-3 p-3 bg-red-900/30 border border-red-800 rounded-lg flex items-start gap-3 validation-error';
            errorDiv.innerHTML = `
                <i class="fas fa-exclamation-circle text-red-400 mt-1"></i>
                <p class="text-red-300 text-sm">${message}</p>
            `;
            
            // Insert after input
            namaInput.parentNode.parentNode.appendChild(errorDiv);
            
            // Focus on input
            namaInput.focus();
        }
    });
</script>

<style>
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }
    ::-webkit-scrollbar-track {
        background: #1f2937;
    }
    ::-webkit-scrollbar-thumb {
        background: #4b5563;
        border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #6b7280;
    }
    
    /* Smooth transitions */
    input, button, a {
        transition: all 0.3s ease;
    }
    
    /* Focus styles */
    input:focus, button:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.2);
    }
</style>

</body>
</html>