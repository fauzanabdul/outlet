<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-800 flex items-center justify-center">

    <div class="w-full max-w-md">
        <!-- CARD -->
        <div class="bg-white/95 backdrop-blur rounded-2xl shadow-2xl p-8">

            <!-- HEADER -->
            <div class="text-center mb-8">
                <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center rounded-full bg-blue-600 text-white text-xl font-bold">
                    A
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Admin Login</h2>
                <p class="text-sm text-gray-500">Masuk ke dashboard admin</p>
            </div>

            <!-- FORM -->
            <form method="POST" action="{{ route('admin.login') }}" class="space-y-5">
                @csrf

                <!-- EMAIL -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                    <input type="email" name="email" placeholder="admin@email.com"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                        required>
                </div>

                <!-- PASSWORD -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Password</label>
                    <input type="password" name="password" placeholder="••••••••"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                        required>
                </div>

                <!-- ERROR -->
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror

                <!-- BUTTON -->
                <button
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-lg font-semibold transition">
                    Login
                </button>
            </form>

            <!-- REGISTER -->
            <p class="text-center text-sm text-gray-600 mt-6">
                Belum punya akun?
                <a href="{{ route('admin.register') }}"
                   class="text-blue-600 hover:underline font-semibold">
                    Daftar
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
