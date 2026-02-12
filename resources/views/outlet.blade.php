<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Outlet - SiTepat Digital Motoshop</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #020617 0%, #1e293b 100%);
            min-height: 100vh;
            color: #f8fafc;
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
        }

        .gradient-text {
            background: linear-gradient(90deg,#7c3aed,#0ea5e9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .gradient-bg {
            background: linear-gradient(135deg,#7c3aed,#0ea5e9);
        }

        .status-open {
            background: rgba(34,197,94,.1);
            color: #22c55e;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        .status-closed {
            background: rgba(239,68,68,.1);
            color: #ef4444;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        .outlet-image {
            width:100%;
            height:160px;
            object-fit:cover;
        }

        .outlet-card:hover {
            transform: translateY(-4px);
            transition: .3s;
        }
    </style>
</head>

<body class="p-6">

<div class="max-w-7xl mx-auto">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-8">

        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}"
               class="gradient-bg text-white px-5 py-3 rounded-xl flex items-center gap-2 shadow-lg">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>

            <div>
                <h1 class="text-3xl font-bold">
                    Data <span class="gradient-text">Outlet</span>
                </h1>
                <p class="text-slate-400 text-sm">
                    Kelola informasi outlet SiTepat
                </p>
            </div>
        </div>

        <div class="relative w-full md:w-64">
            <input type="text"
                   placeholder="Cari outlet..."
                   class="w-full px-4 py-3 pl-10 rounded-xl bg-slate-800 border border-purple-500/30 focus:outline-none">
            <i class="fas fa-search absolute left-3 top-3.5 text-slate-400"></i>
        </div>

    </div>

    <!-- TOTAL -->
    <div class="mb-6 text-slate-400 text-sm">
        <span class="text-white font-bold">{{ $outlets->count() }}</span> outlet ditemukan
    </div>

    <!-- GRID OUTLET -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($outlets as $outlet)
        <div class="glass-card rounded-2xl overflow-hidden outlet-card">

            <img src="{{ asset('uploads/outlet/'.$outlet->gambar) }}"
                 alt="{{ $outlet->nama_outlet }}"
                 class="outlet-image"
                 onerror="this.src='https://images.unsplash.com/photo-1551524165-6b6e5a6166f3?auto=format&fit=crop&w=600'">

            <div class="p-5">

                <div class="flex justify-between items-start mb-2">
                    <h3 class="font-bold text-lg">
                        {{ $outlet->nama_outlet }}
                    </h3>

                   
                </div>

                <p class="text-sm text-slate-400 mb-2">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    {{ $outlet->alamat }}
                </p>

                <!-- WA -->
                <a href="https://wa.me/62{{ ltrim($outlet->no_telp,'0') }}"
                   target="_blank"
                   class="text-green-400 text-sm flex items-center gap-2 mb-3 hover:text-green-500">
                    <i class="fab fa-whatsapp"></i>
                    {{ $outlet->no_telp }}
                </a>

                <!-- MAP -->
                @if($outlet->link_maps)
                <a href="{{ $outlet->link_maps }}"
                   target="_blank"
                   class="text-blue-400 text-sm flex items-center gap-2 hover:text-blue-500">
                    <i class="fas fa-location-dot"></i>
                    Lihat Lokasi
                </a>
                @endif

            </div>
        </div>
        @empty
            <div class="col-span-3 text-center text-slate-400">
                Belum ada data outlet.
            </div>
        @endforelse

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {

    const searchInput = document.querySelector('input[type="text"]');
    const cards = document.querySelectorAll('.outlet-card');

    searchInput.addEventListener('input', function(e){
        const keyword = e.target.value.toLowerCase();

        cards.forEach(card => {
            card.style.display =
                card.textContent.toLowerCase().includes(keyword)
                ? 'block'
                : 'none';
        });
    });

});
</script>

</body>
</html>
