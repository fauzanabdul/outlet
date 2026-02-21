<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outlet - SiTepat Digital Motoshop</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Custom -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        secondary: '#1e40af',
                        accent: '#f59e0b'
                    }
                }
            }
        }
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">

<!-- HEADER -->
<header class="bg-white shadow-sm sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}"
                   class="text-gray-600 hover:text-primary transition">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">
                        Outlet Kami
                    </h1>
                    <p class="text-sm text-gray-500">
                        {{ $outlets->count() }} outlet tersedia
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- MAIN -->
<main class="flex-grow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        @if($outlets->count())

        <!-- GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            @foreach($outlets as $outlet)
            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition overflow-hidden border border-gray-100">

                <!-- IMAGE -->
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('uploads/outlet/'.$outlet->gambar) }}"
                         class="w-full h-full object-cover hover:scale-105 transition duration-500"
                         onerror="this.src='https://via.placeholder.com/400x300?text=Outlet+Image'">
                </div>

                <!-- CONTENT -->
                <div class="p-5">

                    <h3 class="font-bold text-lg text-gray-900 mb-2">
                        {{ $outlet->nama_outlet }}
                    </h3>

                    <div class="space-y-3 text-sm text-gray-600">

                        <!-- ALAMAT -->
                        <div class="flex gap-2 items-start">
                            <i class="fas fa-map-marker-alt text-primary mt-1"></i>
                            <span>{{ $outlet->alamat }}</span>
                        </div>

                        <!-- WHATSAPP -->
                        <div class="flex gap-2 items-center">
                            <i class="fab fa-whatsapp text-green-500"></i>
                            <a href="https://wa.me/62{{ ltrim($outlet->no_telp,'0') }}"
                               target="_blank"
                               class="hover:text-primary transition">
                                {{ $outlet->no_telp }}
                            </a>
                        </div>

                        <!-- JAM -->
                        <div class="flex gap-2 items-center">
                            <i class="fas fa-clock text-accent"></i>
                            <span>08:00 - 22:00 WIB</span>
                        </div>
                    </div>

                    <!-- BUTTONS -->
                    <div class="flex gap-2 mt-5">

                        @if($outlet->link_maps)
                        <a href="{{ $outlet->link_maps }}"
                           target="_blank"
                           class="flex-1 border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-center hover:bg-gray-100 transition text-sm">
                            <i class="fas fa-location-dot mr-1"></i>
                            Lokasi
                        </a>
                        @endif

                        <a href="https://wa.me/62{{ ltrim($outlet->no_telp,'0') }}"
                           target="_blank"
                           class="flex-1 bg-primary hover:bg-secondary text-white px-4 py-2 rounded-lg text-center transition text-sm">
                            <i class="fab fa-whatsapp mr-1"></i>
                            Hubungi
                        </a>
                    </div>

                </div>
            </div>
            @endforeach

        </div>

        @else

        <!-- EMPTY STATE -->
        <div class="text-center py-16">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-store text-4xl text-gray-400"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-700 mb-3">
                Belum Ada Outlet
            </h3>
            <p class="text-gray-500">
                Saat ini belum tersedia data outlet.
            </p>
        </div>

        @endif

    </div>
</main>

</body>
</html>
