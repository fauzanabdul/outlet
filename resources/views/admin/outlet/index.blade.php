<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Outlet - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            500: '#f97316',
                            600: '#ea580c',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-gray-900 to-gray-800 min-h-screen">

<div class="min-h-screen p-4 md:p-6 lg:p-8">

    <!-- HEADER SECTION -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.dashboard') }}"
                   class="group bg-gray-800 hover:bg-gray-700 px-5 py-3 rounded-xl transition-all duration-300 
                          flex items-center gap-3 shadow-lg hover:shadow-xl border border-gray-700 
                          hover:border-gray-600"
                   title="Kembali ke Dashboard">
                    <i class="fas fa-arrow-left text-gray-300 group-hover:text-primary-500 
                              group-hover:-translate-x-1 transition-transform"></i>
                    <span class="font-medium">Dashboard</span>
                </a>

                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-white flex items-center gap-3">
                        <span class="bg-gradient-to-r from-primary-500 to-orange-400 bg-clip-text text-transparent">
                            Data Outlet
                        </span>
                        <span class="text-sm bg-gray-800 px-3 py-1.5 rounded-full font-normal">
                            <i class="fas fa-store mr-2"></i>{{ $outlets->count() }} Outlet
                        </span>
                    </h1>
                    <p class="text-gray-400 mt-2">Kelola data outlet dan cabang Anda</p>
                </div>
            </div>

            <a href="{{ route('admin.outlet.create') }}"
               class="group bg-gradient-to-r from-primary-500 to-orange-600 hover:from-primary-600 
                      hover:to-orange-700 px-6 py-3.5 rounded-xl font-semibold transition-all duration-300 
                      flex items-center justify-center gap-3 shadow-lg hover:shadow-xl hover:shadow-primary-500/20 
                      transform hover:-translate-y-0.5 border border-primary-500/20"
               title="Tambah Outlet Baru">
                <i class="fas fa-plus-circle text-lg"></i>
                <span>Tambah Outlet</span>
                <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <!-- STATISTICS CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 p-5 rounded-2xl border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Total Outlet</p>
                        <h3 class="text-2xl font-bold text-white mt-1">{{ $outlets->count() }}</h3>
                    </div>
                    <div class="bg-primary-500/20 p-3 rounded-xl">
                        <i class="fas fa-store text-primary-400 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 p-5 rounded-2xl border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Aktif</p>
                        <h3 class="text-2xl font-bold text-white mt-1">{{ $outlets->count() }}</h3>
                    </div>
                    <div class="bg-green-500/20 p-3 rounded-xl">
                        <i class="fas fa-check-circle text-green-400 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 p-5 rounded-2xl border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Terakhir Ditambah</p>
                        <h3 class="text-lg font-bold text-white mt-1">
                            @if($outlets->count() > 0)
                                {{ $outlets->first()->created_at->format('d M') }}
                            @else
                                -
                            @endif
                        </h3>
                    </div>
                    <div class="bg-blue-500/20 p-3 rounded-xl">
                        <i class="fas fa-history text-blue-400 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="bg-gradient-to-br from-gray-800/50 to-gray-900/50 backdrop-blur-sm 
                rounded-2xl border border-gray-700/50 shadow-2xl overflow-hidden">
        
        <!-- Table Header -->
        <div class="p-6 border-b border-gray-700/50 flex flex-col sm:flex-row sm:items-center 
                    justify-between gap-4 bg-gray-800/30">
            <div>
                <h2 class="text-xl font-bold text-white flex items-center gap-3">
                    <i class="fas fa-list-ul text-primary-400"></i>
                    Daftar Outlet
                </h2>
                <p class="text-gray-400 text-sm mt-1">
                    Klik edit atau hapus untuk mengelola data outlet
                </p>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="relative">
                    <input type="text" 
                           placeholder="Cari outlet..." 
                           class="bg-gray-900 border border-gray-700 rounded-xl pl-12 pr-4 py-3 
                                  text-white placeholder-gray-500 focus:outline-none 
                                  focus:ring-2 focus:ring-primary-500 focus:border-transparent
                                  w-full sm:w-64"
                           id="searchInput">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 
                              text-gray-400"></i>
                </div>
            </div>
        </div>

        <!-- Table Container -->
        <div class="overflow-x-auto">
            <table class="w-full min-w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-900 to-gray-800 border-b border-gray-700/50">
                        <th class="py-4 px-6 text-left font-semibold text-gray-300 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <span>No</span>
                                <i class="fas fa-sort text-xs text-gray-500"></i>
                            </div>
                        </th>
                        <!-- KOLOM GAMBAR -->
                        <th class="py-4 px-6 text-left font-semibold text-gray-300 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-image"></i>
                                <span>Gambar</span>
                            </div>
                        </th>
                        <!-- KOLOM NAMA OUTLET -->
                        <th class="py-4 px-6 text-left font-semibold text-gray-300 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-store"></i>
                                <span>Nama Outlet</span>
                            </div>
                        </th>
                        <!-- KOLOM ALAMAT -->
                        <th class="py-4 px-6 text-left font-semibold text-gray-300 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Alamat</span>
                            </div>
                        </th>
                        <!-- KOLOM NO TELEPON -->
                        <th class="py-4 px-6 text-left font-semibold text-gray-300 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-phone"></i>
                                <span>No Telepon</span>
                            </div>
                        </th>
                        <!-- KOLOM LOKASI MAPS -->
                        <th class="py-4 px-6 text-left font-semibold text-gray-300 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-map-pin"></i>
                                <span>Lokasi</span>
                            </div>
                        </th>
                        <!-- KOLOM AKSI -->
                        <th class="py-4 px-6 text-left font-semibold text-gray-300 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-cogs"></i>
                                <span>Aksi</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody id="outletTableBody">
                    @forelse ($outlets as $outlet)
                    <tr class="border-b border-gray-700/30 hover:bg-gray-800/50 transition-all duration-300 
                               group" data-name="{{ strtolower($outlet->nama_outlet) }}">
                        <!-- No -->
                        <td class="py-5 px-6">
                            <div class="text-center bg-gray-800/50 w-10 h-10 rounded-lg 
                                        flex items-center justify-center font-mono font-bold 
                                        text-gray-300 group-hover:text-primary-400 transition-colors">
                                {{ $loop->iteration }}
                            </div>
                        </td>

                        <!-- GAMBAR -->
                        <td class="py-5 px-6">
                            <div class="relative group/image">
                                <img src="{{ asset('uploads/outlet/'.$outlet->gambar) }}"
                                     class="w-20 h-20 object-cover rounded-xl border-2 border-gray-700 
                                            group-hover/image:border-primary-500 transition-all duration-300
                                            shadow-lg group-hover/image:scale-110 cursor-pointer"
                                     alt="{{ $outlet->nama_outlet }}"
                                     onerror="this.src='data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"100\" height=\"100\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"%239ca3af\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><rect x=\"3\" y=\"3\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"></rect><circle cx=\"8.5\" cy=\"8.5\" r=\"1.5\"></circle><polyline points=\"21 15 16 10 5 21\"></polyline></svg>'">
                                
                                <!-- Image Preview on Hover -->
                                <div class="absolute left-0 bottom-full mb-2 hidden group-hover/image:block 
                                            z-50 transform -translate-x-1/4">
                                    <div class="bg-gray-900 p-2 rounded-lg shadow-2xl border border-gray-700">
                                        <img src="{{ asset('uploads/outlet/'.$outlet->gambar) }}"
                                             class="w-48 h-48 object-cover rounded-lg"
                                             alt="Preview {{ $outlet->nama_outlet }}"
                                             onerror="this.src='data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"200\" height=\"200\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"%239ca3af\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><rect x=\"3\" y=\"3\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"></rect><circle cx=\"8.5\" cy=\"8.5\" r=\"1.5\"></circle><polyline points=\"21 15 16 10 5 21\"></polyline></svg>'">
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- NAMA OUTLET -->
                        <td class="py-5 px-6">
                            <div class="flex flex-col">
                                <span class="font-semibold text-white group-hover:text-primary-300 
                                             transition-colors">
                                    {{ $outlet->nama_outlet }}
                                </span>
                                <div class="flex items-center gap-2 mt-2">
                                    <span class="text-xs text-gray-400 bg-gray-800 px-2 py-1 rounded">
                                        ID: <span class="font-mono">{{ $outlet->id }}</span>
                                    </span>
                                </div>
                            </div>
                        </td>

                        <!-- ALAMAT -->
                        <td class="py-5 px-6 max-w-xs">
                            <div class="text-gray-300 line-clamp-2 group-hover:text-gray-200 transition-colors">
                                {{ $outlet->alamat }}
                            </div>
                            @if(strlen($outlet->alamat) > 100)
                            <button class="text-xs text-primary-400 hover:text-primary-300 mt-1 
                                        flex items-center gap-1 transition-colors"
                                    onclick="toggleDescription(this)">
                                <span>Selengkapnya</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            @endif
                        </td>

                        <!-- NO TELEPON -->
                        <td class="py-5 px-6">
                            <div class="flex flex-col">
                                <a href="tel:{{ $outlet->no_telp }}"
                                   class="text-blue-400 hover:text-blue-300 transition-colors
                                          flex items-center gap-2 group/tel"
                                   title="Hubungi {{ $outlet->no_telp }}">
                                    <i class="fas fa-phone text-sm group-hover/tel:animate-ring"></i>
                                    <span class="font-medium">{{ $outlet->no_telp }}</span>
                                </a>
                                <span class="text-xs text-gray-400 mt-1">
                                    <i class="fas fa-clock mr-1"></i>
                                    {{ $outlet->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </td>

                        <!-- LOKASI MAPS -->
                        <td class="py-5 px-6">
                            @if($outlet->link_maps)
                            <a href="{{ $outlet->link_maps }}"
                               target="_blank"
                               class="inline-flex items-center gap-2 text-green-400 hover:text-green-300 
                                      transition-colors group/location"
                               title="Lihat di Google Maps">
                                <div class="bg-green-500/20 p-2 rounded-lg group-hover/location:bg-green-500/30 
                                          transition-colors">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <span class="hidden sm:inline">Lokasi</span>
                                <i class="fas fa-external-link-alt text-xs opacity-0 
                                          group-hover/location:opacity-100 transition-opacity"></i>
                            </a>
                            @else
                            <span class="text-gray-500 italic text-sm">
                                <i class="fas fa-map-marker-alt-slash mr-2"></i>
                                Tidak tersedia
                            </span>
                            @endif
                        </td>

                        <!-- AKSI -->
                        <td class="py-5 px-6">
                            <div class="flex items-center gap-3">
                                <!-- View Button -->
                                <a href="#"
                                   class="bg-gradient-to-r from-gray-700/20 to-gray-800/20 
                                          hover:from-gray-700/30 hover:to-gray-800/30 
                                          text-gray-300 hover:text-white px-3.5 py-2.5 rounded-xl 
                                          transition-all duration-300 flex items-center gap-2
                                          border border-gray-600/30 hover:border-gray-500/50
                                          group/view"
                                   title="Lihat Detail">
                                    <i class="fas fa-eye group-hover/view:scale-110 transition-transform"></i>
                                </a>

                                <!-- Edit Button -->
                                <a href="{{ route('admin.outlet.edit', $outlet->id) }}"
                                   class="bg-gradient-to-r from-blue-500/20 to-blue-600/20 
                                          hover:from-blue-500/30 hover:to-blue-600/30 
                                          text-blue-400 hover:text-blue-300 px-3.5 py-2.5 rounded-xl 
                                          transition-all duration-300 flex items-center gap-2
                                          border border-blue-500/30 hover:border-blue-400/50
                                          group/edit"
                                   title="Edit Outlet">
                                    <i class="fas fa-edit group-hover/edit:rotate-12 transition-transform"></i>
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('admin.outlet.destroy', $outlet->id) }}"
                                      method="POST" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                            onclick="confirmDelete('{{ $outlet->nama_outlet }}', this)"
                                            class="bg-gradient-to-r from-red-500/20 to-red-600/20 
                                                   hover:from-red-500/30 hover:to-red-600/30 
                                                   text-red-400 hover:text-red-300 px-3.5 py-2.5 rounded-xl 
                                                   transition-all duration-300 flex items-center gap-2
                                                   border border-red-500/30 hover:border-red-400/50
                                                   group/delete"
                                            title="Hapus Outlet">
                                        <i class="fas fa-trash-alt group-hover/delete:shake"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <!-- Empty State -->
                    <tr>
                        <td colspan="7" class="py-16 px-6">
                            <div class="text-center">
                                <div class="bg-gray-800/50 w-24 h-24 rounded-full flex items-center 
                                            justify-center mx-auto mb-6">
                                    <i class="fas fa-store text-4xl text-gray-500"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-300 mb-2">
                                    Belum Ada Outlet
                                </h3>
                                <p class="text-gray-500 mb-6 max-w-md mx-auto">
                                    Anda belum menambahkan outlet apapun. Mulai dengan menambahkan outlet pertama Anda.
                                </p>
                                <a href="{{ route('admin.outlet.create') }}"
                                   class="inline-flex items-center gap-3 bg-gradient-to-r from-primary-500 
                                          to-orange-600 hover:from-primary-600 hover:to-orange-700 
                                          px-8 py-3.5 rounded-xl font-semibold transition-all duration-300 
                                          shadow-lg hover:shadow-xl hover:shadow-primary-500/20 
                                          transform hover:-translate-y-0.5">
                                    <i class="fas fa-plus-circle"></i>
                                    <span>Tambah Outlet Pertama</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        @if($outlets->count() > 0)
        <div class="p-6 border-t border-gray-700/50 bg-gray-800/30 flex flex-col sm:flex-row 
                    sm:items-center justify-between gap-4">
            <div class="text-gray-400 text-sm">
                Menampilkan <span class="font-bold text-white">{{ $outlets->count() }}</span> outlet
            </div>
            
            <!-- Additional Actions -->
            <div class="flex items-center gap-3">
                <button class="text-gray-400 hover:text-white transition-colors text-sm 
                               flex items-center gap-2">
                    <i class="fas fa-download"></i>
                    <span>Ekspor</span>
                </button>
                <div class="w-px h-6 bg-gray-700"></div>
                <!-- Pagination -->
                <div class="flex items-center gap-2">
                    @if($outlets->hasPages())
                        {{ $outlets->links('vendor.pagination.tailwind') }}
                    @else
                        <button class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-lg transition-colors 
                                       border border-gray-700 disabled:opacity-50 disabled:cursor-not-allowed"
                                id="prevBtn" disabled>
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        
                        <div class="flex gap-1">
                            <span class="bg-primary-500 text-white px-3 py-2 rounded-lg">1</span>
                        </div>
                        
                        <button class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-lg transition-colors 
                                       border border-gray-700"
                                id="nextBtn">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    @endif
                </div>
            </div>
        </div>
        @endif
    </div>

</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black/70 hidden items-center justify-center p-4 z-50">
    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl border border-gray-700 
                max-w-md w-full transform scale-95 transition-transform duration-300"
         id="modalContent">
        <div class="p-6">
            <div class="flex items-center gap-4 mb-6">
                <div class="bg-red-500/20 p-3 rounded-xl">
                    <i class="fas fa-exclamation-triangle text-red-400 text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Hapus Outlet</h3>
                    <p class="text-gray-400 text-sm mt-1">Konfirmasi penghapusan outlet</p>
                </div>
            </div>
            
            <p class="text-gray-300 mb-6">
                Apakah Anda yakin ingin menghapus outlet 
                <span class="font-bold text-white" id="outletName"></span>?
                Tindakan ini tidak dapat dibatalkan.
            </p>
            
            <div class="flex gap-3">
                <button onclick="closeModal()"
                        class="flex-1 bg-gray-700 hover:bg-gray-600 px-6 py-3 rounded-xl 
                               font-medium transition-colors border border-gray-600">
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="flex-1 m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-red-500 to-red-600 
                                   hover:from-red-600 hover:to-red-700 px-6 py-3 rounded-xl 
                                   font-medium transition-all duration-300">
                        Hapus Outlet
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Image Preview Modal -->
<div id="imageModal" class="fixed inset-0 bg-black/90 hidden items-center justify-center p-4 z-50">
    <div class="relative max-w-4xl w-full">
        <button onclick="closeImageModal()"
                class="absolute -top-12 right-0 text-white hover:text-primary-400 text-2xl">
            <i class="fas fa-times"></i>
        </button>
        <img id="modalImage" class="w-full h-auto rounded-2xl" src="" alt="Preview">
    </div>
</div>

<script>
    // Search Functionality
    document.getElementById('searchInput')?.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const rows = document.querySelectorAll('#outletTableBody tr[data-name]');
        
        rows.forEach(row => {
            const outletName = row.getAttribute('data-name');
            if (outletName.includes(searchTerm)) {
                row.classList.remove('hidden');
            } else {
                row.classList.add('hidden');
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
    
    function confirmDelete(outletName, button) {
        deleteForm = button.closest('form');
        document.getElementById('outletName').textContent = outletName;
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

    // Add custom styles and animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes shake {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-5deg); }
            75% { transform: rotate(5deg); }
        }
        
        @keyframes ring {
            0%, 100% { transform: rotate(0deg); }
            15% { transform: rotate(-15deg); }
            30% { transform: rotate(10deg); }
            45% { transform: rotate(-10deg); }
            60% { transform: rotate(6deg); }
            75% { transform: rotate(-4deg); }
        }
        
        .group\\/delete:hover i.shake {
            animation: shake 0.5s ease-in-out;
        }
        
        .group-hover\\/tel:animate-ring {
            animation: ring 0.5s ease-in-out;
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
        
        /* Custom pagination styles for Laravel pagination */
        .pagination {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }
        
        .pagination .page-item .page-link {
            background: #1f2937;
            border: 1px solid #374151;
            color: #9ca3af;
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            transition: all 0.3s;
        }
        
        .pagination .page-item.active .page-link {
            background: #f97316;
            border-color: #f97316;
            color: white;
        }
        
        .pagination .page-item:not(.disabled) .page-link:hover {
            background: #374151;
            color: white;
        }
        
        .pagination .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
        }
    `;
    document.head.appendChild(style);

    // Make table rows clickable for better UX
    document.querySelectorAll('#outletTableBody tr').forEach(row => {
        if (!row.querySelector('td:empty')) {
            row.style.cursor = 'pointer';
            row.addEventListener('click', function(e) {
                // Don't trigger if clicked on action buttons, links, or images
                if (!e.target.closest('a') && !e.target.closest('button') && 
                    !e.target.closest('form') && !e.target.closest('img')) {
                    const editLink = this.querySelector('a[href*="edit"]');
                    if (editLink) {
                        window.location.href = editLink.href;
                    }
                }
            });
        }
    });

    // Image error handler
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('error', function() {
                this.style.opacity = '0.5';
            });
            
            // Make images clickable for larger view
            img.addEventListener('click', function() {
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
</script>

</body>
</html>