<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori - Admin Panel</title>
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
                            Data Kategori
                        </span>
                        <span class="text-sm bg-primary-100 text-primary-700 px-3 py-1.5 rounded-full font-normal">
                            <i class="fas fa-tags mr-2"></i>{{ $kategoris->count() }} Kategori
                        </span>
                    </h1>
                    <p class="text-slate-500 mt-2">Kelola kategori produk Anda dengan mudah</p>
                </div>
            </div>

            <a href="{{ route('admin.kategori.create') }}"
               class="group bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 
                      hover:to-primary-700 px-6 py-3.5 rounded-xl font-semibold text-white transition-all duration-300 
                      flex items-center justify-center gap-3 shadow-lg hover:shadow-xl hover:shadow-primary-300 
                      transform hover:-translate-y-0.5"
               title="Tambah Kategori Baru">
                <i class="fas fa-plus-circle text-lg"></i>
                <span>Tambah Kategori</span>
                <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <!-- STATISTICS CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">Total Kategori</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1">{{ $kategoris->count() }}</h3>
                    </div>
                    <div class="bg-primary-100 p-3 rounded-xl">
                        <i class="fas fa-tags text-primary-500 text-xl"></i>
                    </div>
                </div>
            </div>
            
           
            
            <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">Tindakan</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1">Kelola</h3>
                    </div>
                    <div class="bg-secondary-100 p-3 rounded-xl">
                        <i class="fas fa-cogs text-secondary-500 text-xl"></i>
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
                    Daftar Kategori
                </h2>
                <p class="text-slate-500 text-sm mt-1">
                    Klik edit atau hapus untuk mengelola data kategori
                </p>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="relative">
                    <input type="text" 
                           placeholder="Cari kategori..." 
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
                        <th class="py-4 px-6 text-left font-semibold text-slate-700 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-tag text-primary-500"></i>
                                <span>Nama Kategori</span>
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
                <tbody id="categoryTableBody">
                    @forelse ($kategoris as $kategori)
                    <tr class="border-b border-slate-100 hover:bg-blue-50/50 transition-all duration-300 
                               group" data-name="{{ strtolower($kategori->nama_kategori) }}">
                        <!-- No -->
                        <td class="py-5 px-6">
                            <div class="text-center bg-slate-100 w-10 h-10 rounded-lg 
                                        flex items-center justify-center font-mono font-bold 
                                        text-slate-600 group-hover:text-primary-500 transition-colors">
                                {{ $loop->iteration }}
                            </div>
                        </td>

                        <!-- NAMA KATEGORI -->
                        <td class="py-5 px-6">
                            <div class="flex items-center gap-4">
                                <div class="bg-primary-100 p-3 rounded-xl">
                                    <i class="fas fa-tag text-primary-500 text-lg"></i>
                                </div>
                                <div>
                                    <span class="font-semibold text-slate-800 group-hover:text-primary-600 
                                                 transition-colors block">
                                        {{ $kategori->nama_kategori }}
                                    </span>
                                    <span class="text-xs text-slate-500">
                                        {{ $kategori->produks_count ?? 0 }} produk
                                    </span>
                                </div>
                            </div>
                        </td>

                        
                        
                        <!-- AKSI -->
                        <td class="py-5 px-6">
                            <div class="flex items-center gap-3">
                                <!-- View Button -->
                               
                                <!-- Edit Button -->
                                <a href="{{ route('admin.kategori.edit', $kategori->id) }}"
                                   class="bg-blue-50 hover:bg-blue-100 
                                          text-blue-600 hover:text-blue-700 px-3.5 py-2.5 rounded-lg 
                                          transition-all duration-300 flex items-center gap-2
                                          border border-blue-200 hover:border-blue-300
                                          group/edit hover:shadow-sm"
                                   title="Edit Kategori">
                                    <i class="fas fa-edit group-hover/edit:rotate-12 transition-transform"></i>
                                    <span class="text-sm hidden sm:inline">Edit</span>
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('admin.kategori.destroy', $kategori->id) }}"
                                      method="POST" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                            onclick="confirmDelete('{{ $kategori->nama_kategori }}', this)"
                                            class="bg-red-50 hover:bg-red-100 
                                                   text-red-600 hover:text-red-700 px-3.5 py-2.5 rounded-lg 
                                                   transition-all duration-300 flex items-center gap-2
                                                   border border-red-200 hover:border-red-300
                                                   group/delete hover:shadow-sm"
                                            title="Hapus Kategori">
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
                                    <i class="fas fa-tags text-4xl text-blue-400"></i>
                                </div>
                                <h3 class="text-xl font-bold text-slate-700 mb-2">
                                    Belum Ada Kategori
                                </h3>
                                <p class="text-slate-500 mb-6 max-w-md mx-auto">
                                    Anda belum menambahkan kategori apapun. Mulai dengan menambahkan kategori pertama Anda.
                                </p>
                                <a href="{{ route('admin.kategori.create') }}"
                                   class="inline-flex items-center gap-3 bg-gradient-to-r from-primary-500 
                                          to-primary-600 hover:from-primary-600 hover:to-primary-700 
                                          px-8 py-3.5 rounded-xl font-semibold text-white transition-all duration-300 
                                          shadow-lg hover:shadow-xl hover:shadow-primary-300 
                                          transform hover:-translate-y-0.5">
                                    <i class="fas fa-plus-circle"></i>
                                    <span>Tambah Kategori Pertama</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        @if($kategoris->count() > 0)
        <div class="p-6 border-t border-slate-200 bg-slate-50 flex flex-col sm:flex-row 
                    sm:items-center justify-between gap-4">
            <div class="text-slate-600 text-sm">
                Menampilkan <span class="font-bold text-slate-800">{{ $kategoris->count() }}</span> kategori
            </div>
            
            <!-- Additional Actions -->
            <div class="flex items-center gap-3">
                <button class="text-slate-600 hover:text-primary-600 transition-colors text-sm 
                               flex items-center gap-2 hover:underline">
                    <i class="fas fa-download"></i>
                    <span>Ekspor Data</span>
                </button>
                <div class="w-px h-6 bg-slate-300"></div>
                <!-- Pagination -->
                <div class="flex items-center gap-2">
                    @if($kategoris->hasPages())
                        {{ $kategoris->links('vendor.pagination.tailwind') }}
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
                    <h3 class="text-xl font-bold text-slate-800">Hapus Kategori</h3>
                    <p class="text-slate-500 text-sm mt-1">Konfirmasi penghapusan kategori</p>
                </div>
            </div>
            
            <div class="mb-4 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                <div class="flex items-start gap-3">
                    <i class="fas fa-exclamation-circle text-yellow-500 mt-0.5"></i>
                    <div>
                        <p class="text-yellow-700 text-sm font-medium">Peringatan!</p>
                        <p class="text-yellow-600 text-sm mt-1">
                            Menghapus kategori juga akan menghapus semua produk yang terkait dengan kategori ini.
                        </p>
                    </div>
                </div>
            </div>
            
            <p class="text-slate-700 mb-6">
                Apakah Anda yakin ingin menghapus kategori 
                <span class="font-bold text-slate-800" id="categoryName"></span>?
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

<script>
    // Search Functionality
    document.getElementById('searchInput')?.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const rows = document.querySelectorAll('#categoryTableBody tr[data-name]');
        
        rows.forEach(row => {
            const categoryName = row.getAttribute('data-name');
            if (categoryName.includes(searchTerm)) {
                row.classList.remove('hidden');
                row.style.opacity = '1';
            } else {
                row.classList.add('hidden');
                row.style.opacity = '0.5';
            }
        });
    });

    // Delete Confirmation Modal
    let deleteForm = null;
    
    function confirmDelete(categoryName, button) {
        deleteForm = button.closest('form');
        document.getElementById('categoryName').textContent = categoryName;
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

    // Close modal on outside click
    document.getElementById('deleteModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
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
        
        #deleteModal {
            backdrop-filter: blur(4px);
        }
        
        /* Custom pagination styles for Laravel pagination */
        .pagination {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }
        
        .pagination .page-item .page-link {
            background: white;
            border: 1px solid #e2e8f0;
            color: #64748b;
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            transition: all 0.3s;
        }
        
        .pagination .page-item.active .page-link {
            background: #0ea5e9;
            border-color: #0ea5e9;
            color: white;
        }
        
        .pagination .page-item:not(.disabled) .page-link:hover {
            background: #f1f5f9;
            color: #0f172a;
            border-color: #cbd5e1;
        }
        
        .pagination .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
            background: #f8fafc;
        }
    `;
    document.head.appendChild(style);

    // Make table rows clickable for better UX
    document.querySelectorAll('#categoryTableBody tr').forEach(row => {
        if (!row.querySelector('td:empty')) {
            row.style.cursor = 'pointer';
            row.addEventListener('click', function(e) {
                // Don't trigger if clicked on action buttons or links
                if (!e.target.closest('a') && !e.target.closest('button') && !e.target.closest('form')) {
                    const editLink = this.querySelector('a[href*="edit"]');
                    if (editLink) {
                        window.location.href = editLink.href;
                    }
                }
            });
        }
    });

    // Add shake animation class to delete icons
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.group\\/delete i').forEach(icon => {
            icon.classList.add('shake');
        });
        
        // Add hover effects to table rows
        document.querySelectorAll('#categoryTableBody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 4px 12px rgba(14, 165, 233, 0.1)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = 'none';
            });
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