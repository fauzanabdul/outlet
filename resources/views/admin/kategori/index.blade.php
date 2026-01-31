<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-900 to-gray-800 text-gray-100 min-h-screen font-['Inter']">
    
    <div class="max-w-6xl mx-auto p-4 md:p-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.dashboard') }}"
                   class="inline-flex items-center gap-2 bg-gradient-to-r from-gray-700 to-gray-600 hover:from-gray-600 hover:to-gray-500 text-white px-4 py-3 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <i class="fas fa-chevron-left"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-amber-400 to-orange-500 bg-clip-text text-transparent">
                        Kategori
                    </h1>
                    <p class="text-gray-400 text-sm mt-1">Kelola kategori produk Anda</p>
                </div>
            </div>

            <a href="{{ route('admin.kategori.create') }}"
               class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white px-5 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 group">
                <i class="fas fa-plus group-hover:rotate-90 transition-transform duration-300"></i>
                <span>Tambah Kategori</span>
            </a>
        </div>

        <!-- Card Container -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-2xl overflow-hidden border border-gray-700">
            <!-- Table Header -->
            <div class="px-6 py-4 bg-gradient-to-r from-gray-800 to-gray-700 border-b border-gray-700">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-1 font-semibold text-gray-300">No</div>
                    <div class="col-span-8 font-semibold text-gray-300">Nama Kategori</div>
                    <div class="col-span-3 font-semibold text-gray-300 text-center">Aksi</div>
                </div>
            </div>

            <!-- Table Body -->
            <div class="divide-y divide-gray-700">
                @forelse($kategoris as $k)
                <div class="px-6 py-5 hover:bg-gray-800/50 transition-all duration-200 group">
                    <div class="grid grid-cols-12 gap-4 items-center">
                        <div class="col-span-1">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-r from-amber-500/20 to-orange-500/20 text-amber-300 font-bold">
                                {{ $loop->iteration }}
                            </div>
                        </div>
                        
                        <div class="col-span-8">
                            <div class="flex items-center gap-3">
                                <div class="p-2 rounded-lg bg-gradient-to-r from-amber-500/10 to-orange-500/10">
                                    <i class="fas fa-tag text-amber-400"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg text-white">{{ $k->nama_kategori }}</h3>
                                    <p class="text-gray-400 text-sm">Kategori produk</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-span-3">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.kategori.edit',$k->id) }}"
                                   class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-cyan-600 hover:from-blue-600 hover:to-cyan-700 text-white px-4 py-2.5 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg group/edit">
                                    <i class="fas fa-edit text-sm"></i>
                                    <span class="font-medium">Edit</span>
                                </a>

                                <form action="{{ route('admin.kategori.destroy',$k->id) }}" 
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirmDelete()">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-pink-600 hover:from-red-600 hover:to-pink-700 text-white px-4 py-2.5 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg">
                                        <i class="fas fa-trash-alt text-sm"></i>
                                        <span class="font-medium">Hapus</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <!-- Empty State -->
                <div class="px-6 py-12 text-center">
                    <div class="max-w-md mx-auto">
                        <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-r from-gray-700 to-gray-800 flex items-center justify-center mb-6">
                            <i class="fas fa-tags text-3xl text-gray-500"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-300 mb-2">Belum ada kategori</h3>
                        <p class="text-gray-500 mb-6">Tambahkan kategori pertama Anda untuk mulai mengelola produk</p>
                        <a href="{{ route('admin.kategori.create') }}"
                           class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-600 text-white px-6 py-3 rounded-xl font-medium hover:shadow-lg transition-all duration-300">
                            <i class="fas fa-plus"></i>
                            Tambah Kategori Pertama
                        </a>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Footer dengan info jumlah -->
            @if($kategoris->count() > 0)
            <div class="px-6 py-4 bg-gradient-to-r from-gray-800 to-gray-900 border-t border-gray-700">
                <div class="flex justify-between items-center">
                    <div class="text-gray-400 text-sm">
                        Menampilkan <span class="font-semibold text-amber-300">{{ $kategoris->count() }}</span> kategori
                    </div>
                    <div class="flex items-center gap-2 text-amber-400">
                        <i class="fas fa-info-circle"></i>
                        <span class="text-sm">Klik tombol aksi untuk mengelola</span>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!-- Pagination Section -->
        @if($kategoris->hasPages())
        <div class="mt-8 flex justify-center">
            <div class="inline-flex items-center gap-2 bg-gray-800/50 backdrop-blur-sm rounded-xl p-2">
                {{ $kategoris->links() }}
            </div>
        </div>
        @endif
    </div>

    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus kategori ini? Data yang dihapus tidak dapat dikembalikan.');
        }

        // Efek hover subtle
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('.group');
            rows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(4px)';
                });
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });
        });
    </script>

    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        }
        
        .shadow-custom {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }
        
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #2d3748;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #f59e0b, #f97316);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #d97706, #ea580c);
        }
    </style>

</body>
</html>