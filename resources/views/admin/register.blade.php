<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

<form method="POST" action="{{ route('admin.register') }}" class="bg-white p-6 rounded w-96">
    @csrf

    <h2 class="text-xl font-bold mb-4 text-center">Register Admin</h2>

    <!-- NAMA -->
    <input type="text"
           name="name"
           placeholder="Nama Lengkap"
           value="{{ old('name') }}"
           class="w-full mb-3 p-2 border rounded"
           required>

    @error('name')
        <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
    @enderror

    <!-- EMAIL -->
    <input type="email"
           name="email"
           placeholder="Email"
           value="{{ old('email') }}"
           class="w-full mb-3 p-2 border rounded"
           required>

    @error('email')
        <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
    @enderror

    <!-- PASSWORD -->
    <input type="password"
           name="password"
           placeholder="Password"
           class="w-full mb-3 p-2 border rounded"
           required>

    @error('password')
        <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
    @enderror

    <!-- KONFIRMASI PASSWORD -->
    <input type="password"
           name="password_confirmation"
           placeholder="Konfirmasi Password"
           class="w-full mb-4 p-2 border rounded"
           required>

    <!-- BUTTON REGISTER -->
    <button class="bg-green-600 hover:bg-green-700 text-white w-full py-2 rounded font-semibold">
        Daftar
    </button>

    <!-- LINK KE LOGIN -->
    <p class="text-center text-sm text-gray-600 mt-4">
        Sudah punya akun?
        <a href="{{ route('admin.login') }}"
           class="text-blue-600 hover:underline font-semibold">
            Login
        </a>
    </p>

</form>

</body>
</html>
