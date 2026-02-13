<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk - Admin Panel</title>
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
<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">

<div class="min-h-screen p-4 md:p-6 lg:p-8">

    <!-- HEADER SECTION -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.dashboard') }}"
                   class="group bg-white hover:bg-primary-50 px-5 py-3 rounded-xl transition-all duration-300 
                          flex items-center gap-3 shadow-md hover:shadow-lg border border-slate-200 
                          hover:border-primary-200 hover:-translate-x-1"
                   title="Kembali ke Dashboard">
                    <i class="fas fa-arrow-left text-slate-500 group-hover:text-primary-500 
                              transition-transform"></i>
                    <span class="font-medium text-slate-700 group-hover:text-primary-600">Dashboard</span>
                </a>

                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-slate-800 flex items-center gap-3">
                        <span class="bg-gradient-to-r from-primary-600 to-secondary-500 bg-clip-text text-transparent">
                            Data Produk
                        </span>
                        <span class="text-sm bg-primary-100 text-primary-700 px-3 py-1.5 rounded-full font-normal">
                            <i class="fas fa-box-open mr-2"></i>{{ $produks->count() }} Produk
                        </span>
                    </h1>
                    <p class="text-slate-500 mt-2">Kelola data produk dan inventaris Anda</p>
                </div>
            </div>

            <a href="{{ route('admin.produk.create') }}"
               class="group bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 
                      hover:to-primary-700 px-6 py-3.5 rounded-xl font-semibold text-white transition-all duration-300 
                      flex items-center justify-center gap-3 shadow-lg hover:shadow-xl hover:shadow-primary-300 
                      transform hover:-translate-y-0.5"
               title="Tambah Produk Baru">
                <i class="fas fa-plus-circle text-lg"></i>
                <span>Tambah Produk</span>
                <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <!-- STATISTICS CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">Total Produk</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1">{{ $produks->count() }}</h3>
                    </div>
                    <div class="bg-primary-100 p-3 rounded-xl">
                        <i class="fas fa-boxes text-primary-500 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">Aktif</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1">{{ $produks->count() }}</h3>
                    </div>
                    <div class="bg-success-100 p-3 rounded-xl">
                        <i class="fas fa-check-circle text-success-500 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="">
                <div class="flex items-center justify-between">
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        
        <!-- Table Header -->
        <div class="p-6 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center 
                    justify-between gap-4 bg-gradient-to-r from-white to-slate-50">
            <div>
                <h2 class="text-xl font-bold text-slate-800 flex items-center gap-3">
                    <div class="bg-primary-100 p-2 rounded-lg">
                        <i class="fas fa-list-ul text-primary-500"></i>
                    </div>
                    Daftar Produk
                </h2>
                <p class="text-slate-500 text-sm mt-1">
                    Klik edit atau hapus untuk mengelola data produk
                </p>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="relative">
                    <input type="text" 
                           placeholder="Cari produk..." 
                           class="bg-white border border-slate-300 rounded-xl pl-12 pr-4 py-3 
                                  text-slate-700 placeholder-slate-400 focus:outline-none 
                                  focus:ring-2 focus:ring-primary-500 focus:border-transparent
                                  w-full sm:w-64 shadow-sm"
                           id="searchInput">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 
                              text-slate-400"></i>
                </div>
            </div>
        </div>

        <!-- Table Container -->
        <div class="overflow-x-auto">
            <table class="w-full min-w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-slate-50 to-blue-50 border-b border-slate-200">
                        <th class="py-4 px-6 text-left font-semibold text-slate-700 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <span>No</span>
                                <i class="fas fa-sort text-xs text-slate-400"></i>
                            </div>
                        </th>
                        <!-- KOLOM GAMBAR DIURUTKAN SEBELUM NAMA PRODUK -->
                        <th class="py-4 px-6 text-left font-semibold text-slate-700 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-image text-primary-500"></i>
                                <span>Gambar</span>
                            </div>
                        </th>
                        <th class="py-4 px-6 text-left font-semibold text-slate-700 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-tag text-primary-500"></i>
                                <span>Nama Produk</span>
                            </div>
                        </th>
                        <th class="py-4 px-6 text-left font-semibold text-slate-700 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-align-left text-primary-500"></i>
                                <span>Deskripsi</span>
                            </div>
                        </th>
                        <th class="py-4 px-6 text-left font-semibold text-slate-700 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-cogs text-secondary-500"></i>
                                <span>Aksi</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody id="productTableBody">
                    @forelse ($produks as $produk)
                    <tr class="border-b border-slate-100 hover:bg-blue-50/50 transition-all duration-300 
                               group" data-name="{{ strtolower($produk->nama_produk) }}">
                        <!-- No -->
                        <td class="py-5 px-6">
                            <div class="text-center bg-slate-100 w-10 h-10 rounded-lg 
                                        flex items-center justify-center font-mono font-bold 
                                        text-slate-600 group-hover:text-primary-500 transition-colors">
                                {{ $loop->iteration }}
                            </div>
                        </td>

                        <!-- GAMBAR (SEBELUM NAMA PRODUK) -->
                        <td class="py-5 px-6">
                            <div class="flex items-center gap-4">
                                <div class="relative group/image">
                                    <img src="{{ asset('storage/'.$produk->gambar) }}"
                                         class="w-16 h-16 object-cover rounded-xl border-2 border-slate-200 
                                                group-hover/image:border-primary-500 transition-all duration-300
                                                shadow-sm group-hover/image:scale-110 cursor-pointer"
                                         alt="{{ $produk->nama_produk }}"
                                         onerror="this.src='data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"100\" height=\"100\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"%2394a3b8\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><rect x=\"3\" y=\"3\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"></rect><circle cx=\"8.5\" cy=\"8.5\" r=\"1.5\"></circle><polyline points=\"21 15 16 10 5 21\"></polyline></svg>
                                    
                                    <!-- Image Preview on Hover -->
                                    <div class="absolute left-0 bottom-full mb-2 hidden group-hover/image:block 
                                                z-50 transform -translate-x-1/4">
                                        <div class="bg-white p-2 rounded-lg shadow-xl border border-slate-200">
                                            <img src="{{ asset('storage/'.$produk->gambar) }}"
                                                 class="w-48 h-48 object-cover rounded-lg"
                                                 alt="Preview {{ $produk->nama_produk }}"
                                                 onerror="this.src='data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"200\" height=\"200\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"%2394a3b8\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><rect x=\"3\" y=\"3\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"></rect><circle cx=\"8.5\" cy=\"8.5\" r=\"1.5\"></circle><polyline points=\"21 15 16 10 5 21\"></polyline></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- NAMA PRODUK (SETELAH GAMBAR) -->
                        <td class="py-5 px-6">
                            <div class="flex items-center gap-4">
                                <div class="bg-primary-100 p-3 rounded-xl">
                                    <i class="fas fa-box text-primary-500 text-lg"></i>
                                </div>
                                <div>
                                    <span class="font-semibold text-slate-800 group-hover:text-primary-600 
                                                 transition-colors block">
                                        {{ $produk->nama_produk }}
                                    </span>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-xs text-slate-500">
                                            ID: {{ $produk->id }}
                                        </span>
                                        @if($produk->kategori)
                                        <span class="text-xs bg-primary-100 text-primary-700 px-2 py-0.5 rounded-full">
                                            <i class="fas fa-tag mr-1"></i>{{ $produk->kategori->nama_kategori }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Deskripsi -->
                        <td class="py-5 px-6 max-w-xs">
                            <div class="text-slate-700 line-clamp-2 group-hover:text-primary-700 transition-colors">
                                {{ $produk->deskripsi }}
                            </div>
                            @if(strlen($produk->deskripsi) > 100)
                            <button class="text-xs text-primary-600 hover:text-primary-700 mt-1 
                                        flex items-center gap-1 transition-colors"
                                    onclick="toggleDescription(this)">
                                <span>Selengkapnya</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            @endif
                        </td>

                        <!-- Aksi -->
                        <td class="py-5 px-6">
                            <div class="flex items-center gap-3">
                                <!-- View Button -->
                                <a href="#"
                                   class="bg-slate-100 hover:bg-slate-200 
                                          text-slate-600 hover:text-slate-700 px-3.5 py-2.5 rounded-lg 
                                          transition-all duration-300 flex items-center gap-2
                                          border border-slate-300 hover:border-slate-400
                                          group/view hover:shadow-sm"
                                   title="Lihat Detail">
                                    <i class="fas fa-eye group-hover/view:scale-110 transition-transform"></i>
                                    <span class="text-sm hidden sm:inline">Detail</span>
                                </a>

                                <!-- Edit Button -->
                                <a href="{{ route('admin.produk.edit', $produk->id) }}"
                                   class="bg-blue-50 hover:bg-blue-100 
                                          text-blue-600 hover:text-blue-700 px-3.5 py-2.5 rounded-lg 
                                          transition-all duration-300 flex items-center gap-2
                                          border border-blue-200 hover:border-blue-300
                                          group/edit hover:shadow-sm"
                                   title="Edit Produk">
                                    <i class="fas fa-edit group-hover/edit:rotate-12 transition-transform"></i>
                                    <span class="text-sm hidden sm:inline">Edit</span>
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('admin.produk.destroy', $produk->id) }}"
                                      method="POST" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                            onclick="confirmDelete('{{ $produk->nama_produk }}', this)"
                                            class="bg-red-50 hover:bg-red-100 
                                                   text-red-600 hover:text-red-700 px-3.5 py-2.5 rounded-lg 
                                                   transition-all duration-300 flex items-center gap-2
                                                   border border-red-200 hover:border-red-300
                                                   group/delete hover:shadow-sm"
                                            title="Hapus Produk">
                                        <i class="fas fa-trash-alt group-hover/delete:shake"></i>
                                        <span class="text-sm hidden sm:inline">Hapus</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <!-- Empty State -->
                    <tr>
                        <td colspan="5" class="py-16 px-6">
                            <div class="text-center">
                                <div class="bg-blue-50 w-24 h-24 rounded-full flex items-center 
                                            justify-center mx-auto mb-6">
                                    <i class="fas fa-box-open text-4xl text-blue-400"></i>
                                </div>
                                <h3 class="text-xl font-bold text-slate-700 mb-2">
                                    Belum Ada Produk
                                </h3>
                                <p class="text-slate-500 mb-6 max-w-md mx-auto">
                                    Anda belum menambahkan produk apapun. Mulai dengan menambahkan produk pertama Anda.
                                </p>
                                <a href="{{ route('admin.produk.create') }}"
                                   class="inline-flex items-center gap-3 bg-gradient-to-r from-primary-500 
                                          to-primary-600 hover:from-primary-600 hover:to-primary-700 
                                          px-8 py-3.5 rounded-xl font-semibold text-white transition-all duration-300 
                                          shadow-lg hover:shadow-xl hover:shadow-primary-300 
                                          transform hover:-translate-y-0.5">
                                    <i class="fas fa-plus-circle"></i>
                                    <span>Tambah Produk Pertama</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        @if($produks->count() > 0)
        <div class="p-6 border-t border-slate-200 bg-slate-50 flex flex-col sm:flex-row 
                    sm:items-center justify-between gap-4">
            <div class="text-slate-600 text-sm">
                Menampilkan <span class="font-bold text-slate-800">{{ $produks->count() }}</span> produk
            </div>
            
            <!-- Additional Actions -->
            <div class="flex items-center gap-3">
                <button class="text-slate-600 hover:text-primary-600 transition-colors text-sm 
                               flex items-center gap-2 hover:underline">
                    <i class="fas fa-download"></i>
                    <span>Ekspor Data</span>
                </button>
                <div class="w-px h-6 bg-slate-300"></div>
                <div class="flex items-center gap-2">
                    @if($produks->hasPages())
                        {{ $produks->links('vendor.pagination.tailwind') }}
                    @else
                        <button class="bg-white border border-slate-300 hover:bg-slate-50 px-4 py-2 rounded-lg transition-colors 
                                       disabled:opacity-50 disabled:cursor-not-allowed hover:shadow-sm"
                                id="prevBtn" disabled>
                            <i class="fas fa-chevron-left text-slate-600"></i>
                        </button>
                        
                        <div class="flex gap-1">
                            <span class="bg-primary-500 text-white px-3 py-2 rounded-lg shadow-sm">1</span>
                        </div>
                        
                        <button class="bg-white border border-slate-300 hover:bg-slate-50 px-4 py-2 rounded-lg transition-colors 
                                       hover:shadow-sm"
                                id="nextBtn">
                            <i class="fas fa-chevron-right text-slate-600"></i>
                        </button>
                    @endif
                </div>
            </div>
        </div>
        @endif
    </div>

</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center p-4 z-50">
    <div class="bg-white rounded-2xl border border-slate-200 
                max-w-md w-full transform scale-95 transition-transform duration-300 shadow-2xl"
         id="modalContent">
        <div class="p-6">
            <div class="flex items-center gap-4 mb-6">
                <div class="bg-red-100 p-3 rounded-xl">
                    <i class="fas fa-exclamation-triangle text-red-500 text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-slate-800">Hapus Produk</h3>
                    <p class="text-slate-500 text-sm mt-1">Konfirmasi penghapusan produk</p>
                </div>
            </div>
            
            <div class="mb-4 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                <div class="flex items-start gap-3">
                    <i class="fas fa-exclamation-circle text-yellow-500 mt-0.5"></i>
                    <div>
                        <p class="text-yellow-700 text-sm font-medium">Peringatan!</p>
                        <p class="text-yellow-600 text-sm mt-1">
                            Menghapus produk akan menghapus semua data yang terkait dengan produk ini.
                        </p>
                    </div>
                </div>
            </div>
            
            <p class="text-slate-700 mb-6">
                Apakah Anda yakin ingin menghapus produk 
                <span class="font-bold text-slate-800" id="productName"></span>?
                Tindakan ini tidak dapat dibatalkan.
            </p>
            
            <div class="flex gap-3">
                <button onclick="closeModal()"
                        class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700 px-6 py-3 rounded-xl 
                               font-medium transition-colors border border-slate-300 hover:border-slate-400">
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="flex-1 m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-red-500 to-red-600 
                                   hover:from-red-600 hover:to-red-700 text-white px-6 py-3 rounded-xl 
                                   font-medium transition-all duration-300 shadow-md hover:shadow-lg">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Image Preview Modal -->
<div id="imageModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center p-4 z-50 backdrop-blur-sm">
    <div class="relative max-w-4xl w-full">
        <button onclick="closeImageModal()"
                class="absolute -top-12 right-0 text-white bg-black/30 hover:bg-black/50 rounded-full p-2 transition-colors">
            <i class="fas fa-times text-2xl"></i>
        </button>
        <img id="modalImage" class="w-full h-auto rounded-2xl border-4 border-white shadow-2xl" src="" alt="Preview">
    </div>
</div>

<script>
    // Search Functionality
    document.getElementById('searchInput')?.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const rows = document.querySelectorAll('#productTableBody tr[data-name]');
        
        rows.forEach(row => {
            const productName = row.getAttribute('data-name');
            if (productName.includes(searchTerm)) {
                row.classList.remove('hidden');
                row.style.opacity = '1';
            } else {
                row.classList.add('hidden');
                row.style.opacity = '0.5';
            }
        });
    });

    // Toggle Description
    function toggleDescription(button) {
        const cell = button.closest('td');
        const desc = cell.querySelector('.line-clamp-2');
        
        if (desc.classList.contains('line-clamp-2')) {
            desc.classList.remove('line-clamp-2');
            button.innerHTML = '<span>Sembunyikan</span><i class="fas fa-chevron-up text-xs"></i>';
        } else {
            desc.classList.add('line-clamp-2');
            button.innerHTML = '<span>Selengkapnya</span><i class="fas fa-chevron-down text-xs"></i>';
        }
    }

    // Image Modal
    function openImageModal(imgSrc) {
        document.getElementById('modalImage').src = imgSrc;
        document.getElementById('imageModal').classList.remove('hidden');
    }
    
    function closeImageModal() {
        document.getElementById('imageModal').classList.add('hidden');
    }

    // Delete Confirmation Modal
    let deleteForm = null;
    
    function confirmDelete(productName, button) {
        deleteForm = button.closest('form');
        document.getElementById('productName').textContent = productName;
        document.getElementById('deleteForm').action = deleteForm.action;
        
        const modal = document.getElementById('deleteModal');
        const modalContent = document.getElementById('modalContent');
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            modalContent.classList.remove('scale-95');
            modalContent.classList.add('scale-100');
        }, 10);
    }
    
    function closeModal() {
        const modal = document.getElementById('deleteModal');
        const modalContent = document.getElementById('modalContent');
        
        modalContent.classList.remove('scale-100');
        modalContent.classList.add('scale-95');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    // Close modals on outside click
    document.getElementById('deleteModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
    
    document.getElementById('imageModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeImageModal();
        }
    });

    // Add animation to delete icon
    const style = document.createElement('style');
    style.textContent = `
        @keyframes shake {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-5deg); }
            75% { transform: rotate(5deg); }
        }
        .group\\/delete:hover i.shake {
            animation: shake 0.5s ease-in-out;
        }
        
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        #deleteModal, #imageModal {
            backdrop-filter: blur(4px);
        }
        
        /* Responsive table adjustments */
        @media (max-width: 768px) {
            table th:nth-child(3),
            table td:nth-child(3) {
                min-width: 200px;
            }
        }

        .bg-success-100 {
            background-color: #d1fae5;
        }
        .text-success-500 {
            color: #10b981;
        }
        .text-success-600 {
            color: #059669;
        }
        .hover\\:text-success-700:hover {
            color: #047857;
        }
        .bg-secondary-100 {
            background-color: #ede9fe;
        }
        .text-secondary-500 {
            color: #8b5cf6;
        }
    `;
    document.head.appendChild(style);

    // Make table rows clickable for better UX
    document.querySelectorAll('#productTableBody tr').forEach(row => {
        if (!row.querySelector('td:empty')) {
            row.style.cursor = 'pointer';
            row.addEventListener('click', function(e) {
                // Don't trigger if clicked on action buttons
                if (!e.target.closest('a') && !e.target.closest('button') && !e.target.closest('form')) {
                    const editLink = this.querySelector('a[href*="edit"]');
                    if (editLink) {
                        window.location.href = editLink.href;
                    }
                }
            });
        }
    });

    // Add hover effects to table rows
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('#productTableBody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 4px 12px rgba(14, 165, 233, 0.1)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = 'none';
            });
        });

        // Image error handler
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('error', function() {
                this.style.opacity = '0.7';
            });
            
            // Make images clickable for larger view
            img.addEventListener('click', function(e) {
                e.stopPropagation();
                if (this.src && !this.src.includes('data:image/svg+xml')) {
                    openImageModal(this.src);
                }
            });
        });
        
        // Add shake animation class to delete icons
        document.querySelectorAll('.group\\/delete i').forEach(icon => {
            icon.classList.add('shake');
        });
    });

    // Pagination buttons (placeholder functionality)
    document.getElementById('prevBtn')?.addEventListener('click', () => {
        // Implement previous page logic
    });
    
    document.getElementById('nextBtn')?.addEventListener('click', () => {
        // Implement next page logic
    });
</script>

</body>
</html>