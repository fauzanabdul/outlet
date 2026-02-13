<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Admin Panel</title>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Custom Config --}}
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
                        },
                        success: {
                            500: '#10b981',
                            600: '#059669',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen antialiased">

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">

        {{-- HEADER SECTION --}}
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    {{-- Tombol Kembali --}}
                    <a href="{{ route('admin.produk.index') }}"
                       class="group bg-white hover:bg-primary-50 px-5 py-3 rounded-xl transition-all duration-300 
                              flex items-center gap-3 shadow-md hover:shadow-lg border border-slate-200 
                              hover:border-primary-200 hover:-translate-x-1"
                       title="Kembali ke Data Produk">
                        <i class="fas fa-arrow-left text-slate-500 group-hover:text-primary-500 
                                  transition-transform"></i>
                        <span class="font-medium text-slate-700 group-hover:text-primary-600">Kembali</span>
                    </a>

                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-slate-800 flex items-center gap-3">
                            <span class="bg-gradient-to-r from-primary-600 to-secondary-500 bg-clip-text text-transparent">
                                Edit Produk
                            </span>
                            <span class="text-sm bg-primary-100 text-primary-700 px-3 py-1.5 rounded-full font-normal">
                                <i class="fas fa-box mr-2"></i>Edit
                            </span>
                        </h1>
                        <p class="text-slate-500 mt-2">Edit data produk dan inventaris Anda</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Error Validation --}}
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 p-5 rounded-2xl shadow-sm">
                <div class="flex items-center gap-3 mb-2">
                    <div class="bg-red-100 p-2 rounded-lg">
                        <i class="fas fa-exclamation-circle text-red-500"></i>
                    </div>
                    <h3 class="font-semibold text-red-800">Terdapat kesalahan pada input</h3>
                </div>
                <ul class="list-disc ml-11 text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li class="text-red-600">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM SECTION --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            
            {{-- Form Header --}}
            <div class="p-6 border-b border-slate-200 bg-gradient-to-r from-white to-slate-50">
                <div class="flex items-center gap-3">
                    <div class="bg-primary-100 p-2 rounded-lg">
                        <i class="fas fa-pen text-primary-500"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-800">Form Edit Produk</h2>
                        <p class="text-slate-500 text-sm mt-1">
                            Lengkapi data produk dengan benar
                        </p>
                    </div>
                </div>
            </div>

            {{-- Form Body --}}
            <form action="{{ route('admin.produk.update', $produk->id) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="p-6 space-y-6">

                @csrf
                @method('PUT')

                {{-- Nama Produk --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        <i class="fas fa-tag text-primary-500 mr-2"></i>
                        Nama Produk
                    </label>
                    <input type="text"
                           name="nama_produk"
                           value="{{ old('nama_produk', $produk->nama_produk) }}"
                           class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 
                                  text-slate-700 placeholder-slate-400 focus:outline-none 
                                  focus:ring-2 focus:ring-primary-500 focus:border-transparent
                                  shadow-sm transition-all duration-200"
                           placeholder="Masukkan nama produk"
                           required>
                </div>

                {{-- Kategori --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        <i class="fas fa-folder text-primary-500 mr-2"></i>
                        Kategori
                    </label>
                    <select name="kategori_id"
                            class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 
                                   text-slate-700 focus:outline-none focus:ring-2 
                                   focus:ring-primary-500 focus:border-transparent shadow-sm
                                   transition-all duration-200"
                            required>
                        <option value="" class="text-slate-400">-- Pilih Kategori --</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ $produk->kategori_id == $kategori->id ? 'selected' : '' }}
                                class="text-slate-700">
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        <i class="fas fa-align-left text-primary-500 mr-2"></i>
                        Deskripsi
                    </label>
                    <textarea name="deskripsi"
                              rows="5"
                              class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 
                                     text-slate-700 placeholder-slate-400 focus:outline-none 
                                     focus:ring-2 focus:ring-primary-500 focus:border-transparent
                                     shadow-sm transition-all duration-200 resize-y"
                              placeholder="Masukkan deskripsi produk"
                              required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                </div>

                {{-- Gambar --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        <i class="fas fa-image text-primary-500 mr-2"></i>
                        Gambar Produk
                    </label>
                    
                    <div class="bg-slate-50 p-5 rounded-xl border border-slate-200">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
                            {{-- Preview Gambar --}}
                            @if ($produk->gambar)
                                <div class="relative group">
                                    <div class="bg-white p-2 rounded-xl border border-slate-200 shadow-sm">
                                        <img src="{{ asset('storage/' . $produk->gambar) }}"
                                             alt="Produk"
                                             class="w-32 h-32 object-cover rounded-lg border-2 border-white">
                                    </div>
                                    <span class="absolute -top-2 -right-2 bg-success-100 text-success-600 
                                                 text-xs px-2 py-1 rounded-full border border-success-200">
                                        <i class="fas fa-check-circle mr-1"></i>Current
                                    </span>
                                </div>
                            @endif

                            <div class="flex-1 w-full">
                                <div class="relative">
                                    <input type="file"
                                           name="gambar"
                                           class="block w-full text-sm text-slate-500
                                                  file:mr-4 file:py-2.5 file:px-5
                                                  file:rounded-lg file:border-0
                                                  file:text-sm file:font-medium
                                                  file:bg-primary-50 file:text-primary-700
                                                  hover:file:bg-primary-100
                                                  file:cursor-pointer file:transition-colors
                                                  file:border file:border-primary-200
                                                  cursor-pointer"
                                           accept="image/*">
                                </div>
                                <div class="flex items-center gap-2 mt-3 text-xs text-slate-500">
                                    <i class="fas fa-info-circle"></i>
                                    <span>Kosongkan jika tidak ingin mengganti gambar</span>
                                </div>
                                <div class="flex items-center gap-2 mt-2 text-xs text-slate-400">
                                    <i class="fas fa-file-image"></i>
                                    <span>Format: JPG, PNG, GIF. Maks: 2MB</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-6 border-t border-slate-200">
                    <a href="{{ route('admin.produk.index') }}"
                       class="px-6 py-3 rounded-xl border border-slate-300 
                              text-slate-700 bg-white hover:bg-slate-50 
                              transition-all duration-200 flex items-center justify-center gap-2
                              hover:border-slate-400 shadow-sm hover:shadow-md
                              group">
                        <i class="fas fa-times text-slate-500 group-hover:text-slate-700"></i>
                        <span class="font-medium">Batal</span>
                    </a>

                    <button type="submit"
                            class="px-6 py-3 rounded-xl bg-gradient-to-r from-primary-500 to-primary-600 
                                   hover:from-primary-600 hover:to-primary-700 
                                   text-white font-medium transition-all duration-200 
                                   flex items-center justify-center gap-2
                                   shadow-lg hover:shadow-xl hover:shadow-primary-300 
                                   transform hover:-translate-y-0.5">
                        <i class="fas fa-save"></i>
                        <span>Simpan Perubahan</span>
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </div>
            </form>
        </div>

        {{-- INFO CARD --}}
        <div class="mt-6 bg-white rounded-xl border border-slate-200 p-4 shadow-sm">
            <div class="flex items-center gap-3 text-sm text-slate-600">
                <div class="bg-primary-100 p-2 rounded-lg">
                    <i class="fas fa-info-circle text-primary-500"></i>
                </div>
                <span>Pastikan data produk yang Anda masukkan sudah benar sebelum menyimpan.</span>
            </div>
        </div>

    </div>

    {{-- Custom Styles --}}
    <style>
        /* Custom focus styles */
        input:focus, select:focus, textarea:focus {
            box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.1);
        }
        
        /* Custom file input */
        input[type="file"]::file-selector-button {
            transition: all 0.2s ease;
        }
        
        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 200ms;
        }
        
        /* Custom border radius */
        .rounded-xl {
            border-radius: 0.875rem;
        }
        
        /* Custom shadow */
        .shadow-lg {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
        }
        
        /* Hover effect for buttons */
        .hover\:shadow-xl:hover {
            box-shadow: 0 20px 30px -10px rgba(14, 165, 233, 0.25);
        }
        
        /* Background gradient utilities */
        .bg-gradient-to-r {
            background-image: linear-gradient(to right, var(--tw-gradient-stops));
        }
    </style>

    {{-- Script for image preview --}}
    <script>
        // Image preview functionality
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.querySelector('input[name="gambar"]');
            const previewContainer = document.querySelector('.flex-col.sm\\:flex-row .relative.group');
            
            if (fileInput) {
                fileInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            // Create preview if doesn't exist
                            let previewDiv = document.querySelector('.preview-image');
                            if (!previewDiv) {
                                const container = document.createElement('div');
                                container.className = 'relative group preview-image';
                                container.innerHTML = `
                                    <div class="bg-white p-2 rounded-xl border border-slate-200 shadow-sm">
                                        <img src="${e.target.result}" 
                                             alt="Preview" 
                                             class="w-32 h-32 object-cover rounded-lg border-2 border-white">
                                    </div>
                                    <span class="absolute -top-2 -right-2 bg-blue-100 text-blue-600 
                                                 text-xs px-2 py-1 rounded-full border border-blue-200">
                                        <i class="fas fa-eye mr-1"></i>Preview
                                    </span>
                                `;
                                
                                if (previewContainer) {
                                    previewContainer.parentNode.insertBefore(container, previewContainer.nextSibling);
                                } else {
                                    document.querySelector('.bg-slate-50 .flex-col').prepend(container);
                                }
                            } else {
                                previewDiv.querySelector('img').src = e.target.result;
                            }
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>

</body>
</html>