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
                            Data Outlet
                        </span>
                        <span class="text-sm bg-primary-100 text-primary-700 px-3 py-1.5 rounded-full font-normal">
                            <i class="fas fa-store mr-2"></i>{{ $outlets->count() }} Outlet
                        </span>
                    </h1>
                    <p class="text-slate-500 mt-2">Kelola data outlet dan cabang Anda</p>
                </div>
            </div>

            <a href="{{ route('admin.outlet.create') }}"
               class="group bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 
                      hover:to-primary-700 px-6 py-3.5 rounded-xl font-semibold text-white transition-all duration-300 
                      flex items-center justify-center gap-3 shadow-lg hover:shadow-xl hover:shadow-primary-300 
                      transform hover:-translate-y-0.5"
               title="Tambah Outlet Baru">
                <i class="fas fa-plus-circle text-lg"></i>
                <span>Tambah Outlet</span>
                <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <!-- STATISTICS CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">Total Outlet</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1">{{ $outlets->count() }}</h3>
                    </div>
                    <div class="bg-primary-100 p-3 rounded-xl">
                        <i class="fas fa-store text-primary-500 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">Aktif</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1">{{ $outlets->count() }}</h3>
                    </div>
                    <div class="bg-success-100 p-3 rounded-xl">
                        <i class="fas fa-check-circle text-success-500 text-xl"></i>
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
                    Daftar Outlet
                </h2>
                
            </div>
            
            <div class="flex items-center gap-3">
                <div class="relative">
                    <input type="text" 
                           placeholder="Cari outlet..." 
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
                        <!-- KOLOM GAMBAR -->
                        <th class="py-4 px-6 text-left font-semibold text-slate-700 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-image text-primary-500"></i>
                                <span>Gambar</span>
                            </div>
                        </th>
                        <!-- KOLOM NAMA OUTLET -->
                        <th class="py-4 px-6 text-left font-semibold text-slate-700 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-store text-primary-500"></i>
                                <span>Nama Outlet</span>
                            </div>
                        </th>
                        <!-- KOLOM ALAMAT -->
                        <th class="py-4 px-6 text-left font-semibold text-slate-700 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-map-marker-alt text-primary-500"></i>
                                <span>Alamat</span>
                            </div>
                        </th>
                        <!-- KOLOM NO TELEPON -->
                        <th class="py-4 px-6 text-left font-semibold text-slate-700 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-phone text-primary-500"></i>
                                <span>No Telepon</span>
                            </div>
                        </th>
                        <!-- KOLOM LOKASI MAPS -->
                        <th class="py-4 px-6 text-left font-semibold text-slate-700 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-map-pin text-primary-500"></i>
                                <span>Lokasi</span>
                            </div>
                        </th>
                        <!-- KOLOM AKSI -->
                        <th class="py-4 px-6 text-left font-semibold text-slate-700 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-cogs text-secondary-500"></i>
                                <span>Aksi</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody id="outletTableBody">
                    @forelse ($outlets as $outlet)
                    <tr class="border-b border-slate-100 hover:bg-blue-50/50 transition-all duration-300 
                               group" data-name="{{ strtolower($outlet->nama_outlet) }}">
                        <!-- No -->
                        <td class="py-5 px-6">
                            <div class="text-center bg-slate-100 w-10 h-10 rounded-lg 
                                        flex items-center justify-center font-mono font-bold 
                                        text-slate-600 group-hover:text-primary-500 transition-colors">
                                {{ $loop->iteration }}
                            </div>
                        </td>

                        <!-- GAMBAR -->
                        <td class="py-5 px-6">
                            <div class="flex items-center gap-4">
                                <div class="relative group/image">
                                    <img src="{{ asset('uploads/outlet/'.$outlet->gambar) }}"
                                         class="w-16 h-16 object-cover rounded-xl border-2 border-slate-200 
                                                group-hover/image:border-primary-500 transition-all duration-300
                                                shadow-sm group-hover/image:scale-110 cursor-pointer"
                                         alt="{{ $outlet->nama_outlet }}"
                                         onerror="this.src='data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"100\" height=\"100\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"%2394a3b8\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><rect x=\"3\" y=\"3\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"></rect><circle cx=\"8.5\" cy=\"8.5\" r=\"1.5\"></circle><polyline points=\"21 15 16 10 5 21\"></polyline></svg>
                                    
                                    <!-- Image Preview on Hover -->
                                    <div class="absolute left-0 bottom-full mb-2 hidden group-hover/image:block 
                                                z-50 transform -translate-x-1/4">
                                        <div class="bg-white p-2 rounded-lg shadow-xl border border-slate-200">
                                            <img src="{{ asset('uploads/outlet/'.$outlet->gambar) }}"
                                                 class="w-48 h-48 object-cover rounded-lg"
                                                 alt="Preview {{ $outlet->nama_outlet }}"
                                                 onerror="this.src='data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"200\" height=\"200\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"%2394a3b8\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><rect x=\"3\" y=\"3\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"></rect><circle cx=\"8.5\" cy=\"8.5\" r=\"1.5\"></circle><polyline points=\"21 15 16 10 5 21\"></polyline></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- NAMA OUTLET -->
                        <td class="py-5 px-6">
                            <div class="flex items-center gap-4">
                                <div class="bg-primary-100 p-3 rounded-xl">
                                    <i class="fas fa-store text-primary-500 text-lg"></i>
                                </div>
                                <div>
                                    <span class="font-semibold text-slate-800 group-hover:text-primary-600 
                                                 transition-colors block">
                                        {{ $outlet->nama_outlet }}
                                    </span>
                                    <span class="text-xs text-slate-500">
                                        ID: {{ $outlet->id }}
                                    </span>
                                </div>
                            </div>
                        </td>

                        <!-- ALAMAT -->
                        <td class="py-5 px-6 max-w-xs">
                            <div class="text-slate-700 line-clamp-2 group-hover:text-primary-700 transition-colors">
                                {{ $outlet->alamat }}
                            </div>
                            @if(strlen($outlet->alamat) > 100)
                            <button class="text-xs text-primary-600 hover:text-primary-700 mt-1 
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
                                   class="text-primary-600 hover:text-primary-700 transition-colors
                                          flex items-center gap-2 group/tel"
                                   title="Hubungi {{ $outlet->no_telp }}">
                                    <i class="fas fa-phone text-sm group-hover/tel:animate-ring"></i>
                                    <span class="font-medium">{{ $outlet->no_telp }}</span>
                                </a>
                                <span class="text-xs text-slate-500 mt-1">
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
                               class="inline-flex items-center gap-2 text-success-600 hover:text-success-700 
                                      transition-colors group/location"
                               title="Lihat di Google Maps">
                                <div class="bg-success-100 p-2 rounded-lg group-hover/location:bg-success-200 
                                          transition-colors">
                                    <i class="fas fa-map-marker-alt text-success-600"></i>
                                </div>
                                <span class="hidden sm:inline text-sm font-medium">Lokasi</span>
                                <i class="fas fa-external-link-alt text-xs opacity-0 
                                          group-hover/location:opacity-100 transition-opacity"></i>
                            </a>
                            @else
                            <span class="text-slate-400 italic text-sm">
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
                                <a href="{{ route('admin.outlet.edit', $outlet->id) }}"
                                   class="bg-blue-50 hover:bg-blue-100 
                                          text-blue-600 hover:text-blue-700 px-3.5 py-2.5 rounded-lg 
                                          transition-all duration-300 flex items-center gap-2
                                          border border-blue-200 hover:border-blue-300
                                          group/edit hover:shadow-sm"
                                   title="Edit Outlet">
                                    <i class="fas fa-edit group-hover/edit:rotate-12 transition-transform"></i>
                                    <span class="text-sm hidden sm:inline">Edit</span>
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('admin.outlet.destroy', $outlet->id) }}"
                                      method="POST" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                            onclick="confirmDelete('{{ $outlet->nama_outlet }}', this)"
                                            class="bg-red-50 hover:bg-red-100 
                                                   text-red-600 hover:text-red-700 px-3.5 py-2.5 rounded-lg 
                                                   transition-all duration-300 flex items-center gap-2
                                                   border border-red-200 hover:border-red-300
                                                   group/delete hover:shadow-sm"
                                            title="Hapus Outlet">
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
                        <td colspan="7" class="py-16 px-6">
                            <div class="text-center">
                                <div class="bg-blue-50 w-24 h-24 rounded-full flex items-center 
                                            justify-center mx-auto mb-6">
                                    <i class="fas fa-store text-4xl text-blue-400"></i>
                                </div>
                                <h3 class="text-xl font-bold text-slate-700 mb-2">
                                    Belum Ada Outlet
                                </h3>
                                <p class="text-slate-500 mb-6 max-w-md mx-auto">
                                    Anda belum menambahkan outlet apapun. Mulai dengan menambahkan outlet pertama Anda.
                                </p>
                                <a href="{{ route('admin.outlet.create') }}"
                                   class="inline-flex items-center gap-3 bg-gradient-to-r from-primary-500 
                                          to-primary-600 hover:from-primary-600 hover:to-primary-700 
                                          px-8 py-3.5 rounded-xl font-semibold text-white transition-all duration-300 
                                          shadow-lg hover:shadow-xl hover:shadow-primary-300 
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
        <div class="p-6 border-t border-slate-200 bg-slate-50 flex flex-col sm:flex-row 
                    sm:items-center justify-between gap-4">
            <div class="text-slate-600 text-sm">
                Menampilkan <span class="font-bold text-slate-800">{{ $outlets->count() }}</span> outlet
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
                    @if($outlets->hasPages())
                        {{ $outlets->links('vendor.pagination.tailwind') }}
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
                    <h3 class="text-xl font-bold text-slate-800">Hapus Outlet</h3>
                    <p class="text-slate-500 text-sm mt-1">Konfirmasi penghapusan outlet</p>
                </div>
            </div>
            
            <div class="mb-4 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                <div class="flex items-start gap-3">
                    <i class="fas fa-exclamation-circle text-yellow-500 mt-0.5"></i>
                    <div>
                        <p class="text-yellow-700 text-sm font-medium">Peringatan!</p>
                        <p class="text-yellow-600 text-sm mt-1">
                            Menghapus outlet akan menghapus semua data yang terkait dengan outlet ini.
                        </p>
                    </div>
                </div>
            </div>
            
            <p class="text-slate-700 mb-6">
                Apakah Anda yakin ingin menghapus outlet 
                <span class="font-bold text-slate-800" id="outletName"></span>?
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
        const rows = document.querySelectorAll('#outletTableBody tr[data-name]');
        
        rows.forEach(row => {
            const outletName = row.getAttribute('data-name');
            if (outletName.includes(searchTerm)) {
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
        .border-success-200 {
            border-color: #a7f3d0;
        }
        .hover\\:border-success-300:hover {
            border-color: #6ee7b7;
        }
        .bg-success-200 {
            background-color: #a7f3d0;
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

    // Add hover effects to table rows
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('#outletTableBody tr').forEach(row => {
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