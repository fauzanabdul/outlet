<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Outlet</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen p-4 md:p-6">

<div class="max-w-7xl mx-auto">
    <!-- Header dengan judul dan actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Data Outlet</h1>
            <p class="text-gray-600 mt-1">Kelola informasi outlet Anda</p>
        </div>
        
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.dashboard') }}"
               class="inline-flex items-center gap-2 bg-gray-700 text-white px-4 py-2.5 rounded-lg hover:bg-gray-800 transition-colors shadow-sm">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali ke Dashboard</span>
            </a>

            <a href="{{ route('admin.outlet.create') }}"
               class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2.5 rounded-lg hover:bg-blue-700 transition-colors shadow-sm">
                <i class="fas fa-plus"></i>
                <span>Tambah Outlet Baru</span>
            </a>
        </div>
    </div>

    <!-- Card untuk tabel -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- Responsive table container -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr class="text-left">
                        <th class="p-4 font-semibold text-gray-700">No</th>
                        <th class="p-4 font-semibold text-gray-700">Gambar</th>
                        <th class="p-4 font-semibold text-gray-700">Nama Outlet</th>
                        <th class="p-4 font-semibold text-gray-700">Alamat</th>
                        <th class="p-4 font-semibold text-gray-700">No Telepon</th>
                        <th class="p-4 font-semibold text-gray-700 text-center">Lokasi</th>
                        <th class="p-4 font-semibold text-gray-700 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($outlets as $index => $outlet)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-gray-700 font-medium">{{ $index + 1 }}</td>

                        <td class="p-4">
                            <div class="w-20 h-20 md:w-24 md:h-24 rounded-lg overflow-hidden border border-gray-200">
                                <img src="{{ asset('uploads/outlet/'.$outlet->gambar) }}"
                                     alt="{{ $outlet->nama_outlet }}"
                                     class="w-full h-full object-cover hover:scale-105 transition-transform"
                                     onerror="this.src='https://via.placeholder.com/96?text=No+Image'">
                            </div>
                        </td>

                        <td class="p-4">
                            <div class="font-semibold text-gray-800">{{ $outlet->nama_outlet }}</div>
                        </td>

                        <td class="p-4">
                            <div class="text-gray-700 max-w-xs line-clamp-2">{{ $outlet->alamat }}</div>
                        </td>

                        <td class="p-4">
                            <div class="text-gray-700">
                                <a href="tel:{{ $outlet->no_telp }}" 
                                   class="hover:text-blue-600 hover:underline transition-colors">
                                    {{ $outlet->no_telp }}
                                </a>
                            </div>
                        </td>


                        <td class="p-4 text-center">
                        @if($outlet->link_maps)
                            <a href="{{ $outlet->link_maps }}"
                            target="_blank"
                            class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800">
                                <i class="fas fa-map-marker-alt"></i>
                                <span class="hidden sm:inline">Lokasi</span>
                            </a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>


                        <td class="p-4">
                            <div class="flex justify-center gap-3">
                                <a href="{{ route('admin.outlet.edit', $outlet->id) }}"
                                   class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-4 py-2 rounded-lg hover:bg-blue-100 transition-colors"
                                   title="Edit Outlet">
                                    <i class="fas fa-edit"></i>
                                    <span class="hidden sm:inline">Edit</span>
                                </a>

                                <form action="{{ route('admin.outlet.destroy', $outlet->id) }}"
                                      method="POST"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                            onclick="confirmDelete(this)"
                                            class="inline-flex items-center gap-2 bg-red-50 text-red-700 px-4 py-2 rounded-lg hover:bg-red-100 transition-colors"
                                            title="Hapus Outlet">
                                        <i class="fas fa-trash"></i>
                                        <span class="hidden sm:inline">Hapus</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                    @if($outlets->isEmpty())
                    <tr>
                        <td colspan="7" class="p-8 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center py-8">
                                <i class="fas fa-store text-4xl text-gray-300 mb-3"></i>
                                <p class="text-lg">Belum ada data outlet</p>
                                <p class="text-sm mt-1">Klik "Tambah Outlet Baru" untuk menambahkan data</p>
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination (jika menggunakan pagination) -->
    @if($outlets->hasPages())
    <div class="mt-6 flex justify-center">
        <div class="inline-flex rounded-lg shadow-sm">
            {{ $outlets->links() }}
        </div>
    </div>
    @endif
</div>

<script>
function confirmDelete(button) {
    if (confirm('Apakah Anda yakin ingin menghapus outlet ini? Tindakan ini tidak dapat dibatalkan.')) {
        button.closest('form').submit();
    }
}

// Hover effect untuk gambar
document.querySelectorAll('img').forEach(img => {
    img.addEventListener('error', function() {
        this.src = 'https://via.placeholder.com/96?text=No+Image';
    });
});
</script>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

@media (max-width: 768px) {
    table {
        font-size: 0.875rem;
    }
    
    .p-4 {
        padding: 0.75rem;
    }
}
</style>

</body>
</html>