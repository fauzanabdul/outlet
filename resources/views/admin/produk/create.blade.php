<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - SiTepat Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: #0a0c0f;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(37, 99, 235, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(139, 92, 246, 0.05) 0%, transparent 50%);
            min-height: 100vh;
            position: relative;
        }

        /* Glassmorphism Effect */
        .glass-card {
            background: linear-gradient(145deg, rgba(26, 32, 39, 0.95), rgba(18, 22, 28, 0.98));
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.03);
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-card:hover {
            border-color: rgba(59, 130, 246, 0.2);
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.8), 0 0 20px rgba(59, 130, 246, 0.2);
        }

        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6, #ec4899);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 200% 200%;
            animation: gradient-shift 8s ease infinite;
        }

        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        /* Gradient Background */
        .gradient-bg {
            background: linear-gradient(135deg, #2563eb, #8b5cf6);
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .gradient-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }

        .gradient-bg:hover::before {
            left: 100%;
        }

        .gradient-bg:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.4);
        }

        /* Form Input Styles */
        .form-input {
            background: rgba(26, 32, 39, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            color: white;
            transition: all 0.3s ease;
            padding: 0.75rem 1rem;
            width: 100%;
            font-size: 0.95rem;
        }

        .form-input:hover {
            background: rgba(32, 38, 47, 0.9);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            background: rgba(26, 32, 39, 0.95);
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: #9ca3af;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-label i {
            color: #3b82f6;
            font-size: 0.875rem;
        }

        /* Select Input */
        .form-select {
            background: rgba(26, 32, 39, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            color: white;
            transition: all 0.3s ease;
            padding: 0.75rem 1rem;
            width: 100%;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%239ca3af' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3E%3C/svg%3E");
            background-position: right 1rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        .form-select:hover {
            background-color: rgba(32, 38, 47, 0.9);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .form-select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-select option {
            background: #1a1e26;
            color: white;
            padding: 0.5rem;
        }

        /* File Input */
        .form-file {
            background: rgba(26, 32, 39, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            color: #9ca3af;
            transition: all 0.3s ease;
            padding: 0.75rem 1rem;
            width: 100%;
            cursor: pointer;
        }

        .form-file:hover {
            background: rgba(32, 38, 47, 0.9);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .form-file::-webkit-file-upload-button {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin-right: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-file::-webkit-file-upload-button:hover {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        /* Button Styles */
        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            color: #9ca3af;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(59, 130, 246, 0.3);
            color: white;
            transform: translateY(-2px);
        }

        /* Error Message */
        .error-message {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.375rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .error-message i {
            font-size: 0.75rem;
        }

        /* Back Button */
        .back-btn {
            background: rgba(26, 32, 39, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.05);
            color: #9ca3af;
            padding: 0.625rem 1.25rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: rgba(32, 38, 47, 0.9);
            border-color: rgba(59, 130, 246, 0.3);
            color: white;
            transform: translateX(-4px);
        }

        .back-btn i {
            transition: transform 0.3s ease;
        }

        .back-btn:hover i {
            transform: translateX(-4px);
        }

        /* Divider */
        .divider {
            border-color: rgba(255, 255, 255, 0.05);
            margin: 1.5rem 0;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #0f1217;
        }

        ::-webkit-scrollbar-thumb {
            background: #2d3748;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #4a5568;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .glass-card {
                padding: 1.25rem;
            }
            
            .btn-primary, .btn-secondary {
                width: 100%;
                justify-content: center;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease;
        }

        /* Pulse Animation */
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.3); }
            50% { box-shadow: 0 0 20px 5px rgba(59, 130, 246, 0.2); }
        }

        .pulse-glow {
            animation: pulse-glow 3s infinite;
        }

        /* Icon Container */
        .icon-container {
            background: linear-gradient(145deg, rgba(59, 130, 246, 0.1), rgba(139, 92, 246, 0.05));
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 14px;
            padding: 0.75rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .icon-container i {
            color: #3b82f6;
            font-size: 1.25rem;
        }
    </style>
</head>
<body class="p-4 md:p-6 lg:p-8">

<div class="max-w-3xl mx-auto fade-in">

    <!-- Header dengan Premium Design -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.produk.index') }}"
               class="back-btn">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
            <div class="h-8 w-px bg-white/10 hidden sm:block"></div>
            <div class="flex items-center gap-3">
                <div class="icon-container">
                    <i class="fas fa-box"></i>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold">
                        Tambah <span class="gradient-text">Produk</span>
                    </h1>
                    <p class="text-xs text-gray-500 mt-1">Isi form untuk menambahkan produk baru</p>
                </div>
            </div>
        </div>
        
        <!-- Status Indicator -->
        <div class="flex items-center gap-2 bg-white/5 px-3 py-2 rounded-xl">
            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
            <span class="text-xs text-gray-400">Form Active</span>
        </div>
    </div>

    <!-- Main Card -->
    <div class="glass-card rounded-2xl p-6 md:p-8 relative overflow-hidden">
        
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-blue-600/5 to-purple-600/5 rounded-full blur-3xl -mr-20 -mt-20 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-gradient-to-tr from-purple-600/5 to-blue-600/5 rounded-full blur-3xl -ml-20 -mb-20 pointer-events-none"></div>
        
        <!-- Form -->
        <form action="{{ route('admin.produk.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="relative z-10 space-y-6">

            @csrf

            <!-- Nama Produk -->
            <div>
                <label class="form-label">
                    <i class="fas fa-tag"></i>
                    Nama Produk <span class="text-red-400">*</span>
                </label>
                <input type="text" 
                       name="nama_produk"
                       value="{{ old('nama_produk') }}"
                       placeholder="Masukkan nama produk"
                       class="form-input"
                       required>
                @error('nama_produk')
                    <p class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </p>
                @enderror
                <p class="text-xs text-gray-600 mt-1">Minimal 3 karakter, maksimal 100 karakter</p>
            </div>

            <!-- Kategori -->
            <div>
                <label class="form-label">
                    <i class="fas fa-folder"></i>
                    Kategori <span class="text-red-400">*</span>
                </label>
                <select name="kategori_id" 
                        class="form-select"
                        required>
                    <option value="" disabled selected>-- Pilih Kategori --</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}"
                            {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <p class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="form-label">
                    <i class="fas fa-align-left"></i>
                    Deskripsi <span class="text-red-400">*</span>
                </label>
                <textarea name="deskripsi" 
                          rows="4"
                          placeholder="Masukkan deskripsi produk"
                          class="form-input resize-none"
                          required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </p>
                @enderror
                <p class="text-xs text-gray-600 mt-1">Deskripsikan produk secara detail</p>
            </div>

           

            

            <!-- Gambar -->
            <div>
                <label class="form-label">
                    <i class="fas fa-image"></i>
                    Gambar Produk <span class="text-red-400">*</span>
                </label>
                
                <!-- Preview Image Area -->
                <div class="mb-3 hidden" id="previewContainer">
                    <div class="relative inline-block">
                        <img id="imagePreview" src="#" alt="Preview" 
                             class="w-32 h-32 object-cover rounded-xl border-2 border-blue-500/30">
                        <button type="button" 
                                onclick="clearImagePreview()"
                                class="absolute -top-2 -right-2 w-6 h-6 bg-red-500/90 rounded-full flex items-center justify-center hover:bg-red-600 transition-colors">
                            <i class="fas fa-times text-xs text-white"></i>
                        </button>
                    </div>
                </div>

                <input type="file" 
                       name="gambar"
                       id="gambarInput"
                       accept="image/jpeg,image/png,image/jpg,image/webp"
                       class="form-file"
                       required
                       onchange="previewImage(this)">
                
                @error('gambar')
                    <p class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </p>
                @enderror
                
                <div class="flex items-center gap-2 mt-2">
                    <i class="fas fa-info-circle text-xs text-gray-600"></i>
                    <p class="text-xs text-gray-600">
                        Format: JPG, PNG, WEBP. Maksimal 2MB. Ukuran optimal 500x500px
                    </p>
                </div>
            </div>

            <!-- Divider -->
            <div class="divider"></div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-2">
                <button type="submit"
                        class="btn-primary flex-1 pulse-glow">
                    <i class="fas fa-save"></i>
                    <span>Simpan Produk</span>
                </button>

                <a href="{{ route('admin.produk.index') }}"
                   class="btn-secondary flex-1">
                    <i class="fas fa-times-circle"></i>
                    <span>Batal</span>
                </a>
            </div>

            <!-- Form Footer -->
            <div class="flex items-center justify-center gap-2 mt-4">
                <i class="fas fa-shield-alt text-xs text-gray-600"></i>
                <p class="text-xs text-gray-600">Data akan diverifikasi sebelum dipublikasikan</p>
            </div>
        </form>
    </div>

    
    </div>
</div>

<!-- JavaScript for Image Preview -->
<script>
    function previewImage(input) {
        const previewContainer = document.getElementById('previewContainer');
        const imagePreview = document.getElementById('imagePreview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                previewContainer.classList.remove('hidden');
                
                // Optional: Check file size
                const fileSize = input.files[0].size / 1024 / 1024; // in MB
                if (fileSize > 2) {
                    alert('Ukuran file terlalu besar! Maksimal 2MB.');
                    input.value = '';
                    previewContainer.classList.add('hidden');
                }
                
                // Check file type
                const fileType = input.files[0].type;
                if (!fileType.match('image.*')) {
                    alert('Hanya file gambar yang diperbolehkan!');
                    input.value = '';
                    previewContainer.classList.add('hidden');
                }
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    function clearImagePreview() {
        const previewContainer = document.getElementById('previewContainer');
        const gambarInput = document.getElementById('gambarInput');
        const imagePreview = document.getElementById('imagePreview');
        
        imagePreview.src = '#';
        previewContainer.classList.add('hidden');
        gambarInput.value = '';
    }

    // Form validation
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.style.borderColor = '#ef4444';
                    isValid = false;
                    
                    // Add shake animation
                    field.classList.add('shake');
                    setTimeout(() => {
                        field.classList.remove('shake');
                    }, 500);
                } else {
                    field.style.borderColor = 'rgba(255, 255, 255, 0.05)';
                }
            });
            
            if (!isValid) {
                e.preventDefault();
            }
        });

        // Remove error border on input
        const inputs = form.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                this.style.borderColor = 'rgba(255, 255, 255, 0.05)';
            });
        });
    });

    // Shake animation CSS
    const style = document.createElement('style');
    style.textContent = `
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        .shake {
            animation: shake 0.3s ease-in-out;
        }
    `;
    document.head.appendChild(style);
</script>

<!-- Optional: Add animate.css for animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

</body>
</html>