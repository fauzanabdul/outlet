<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-800 flex items-center justify-center">

    <div class="w-full max-w-md">
        <!-- CARD -->
        <div class="bg-white/95 backdrop-blur rounded-2xl shadow-2xl p-8">

            <!-- HEADER -->
            <div class="text-center mb-8">
                <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center rounded-full bg-green-600 text-white text-xl font-bold">
                    A
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Register Admin</h2>
                <p class="text-sm text-gray-500">Buat akun admin baru</p>
            </div>

            <!-- FORM -->
            <form method="POST" action="{{ route('admin.register') }}" class="space-y-4">
                @csrf

                <!-- NAMA -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        placeholder="Nama Lengkap"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                        required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- EMAIL -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        placeholder="admin@email.com"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                        required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- PASSWORD -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Password</label>
                    <input type="password" name="password"
                        placeholder="••••••••"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                        required>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- KONFIRMASI PASSWORD -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation"
                        placeholder="••••••••"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                        required>
                </div>

                <!-- BUTTON -->
                <button
                    class="w-full bg-green-600 hover:bg-green-700 text-white py-2.5 rounded-lg font-semibold transition">
                    Daftar
                </button>
            </form>

            <!-- LOGIN LINK -->
            <p class="text-center text-sm text-gray-600 mt-6">
                Sudah punya akun?
                <a href="{{ route('admin.login') }}"
                   class="text-blue-600 hover:underline font-semibold">
                    Login
                </a>
            </p>
        </div>

        <!-- FOOTER -->
        <p class="text-center text-xs text-gray-400 mt-6">
            © {{ date('Y') }} Admin Panel
        </p>
    </div>

</body>
</html>
