<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

<form method="POST" action="{{ route('admin.login') }}" class="bg-white p-6 rounded w-96">
    @csrf
    <h2 class="text-xl font-bold mb-4 text-center">Login Admin</h2>

    <input type="email" name="email" placeholder="Email"
           class="w-full mb-3 p-2 border rounded" required>

    <input type="password" name="password" placeholder="Password"
           class="w-full mb-3 p-2 border rounded" required>

    @error('email')
        <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
    @enderror

    <button class="bg-blue-600 hover:bg-blue-700 text-white w-full py-2 rounded">
        Login
    </button>

    <!-- LINK REGISTER -->
    <p class="text-center text-sm text-gray-600 mt-4">
        Belum punya akun?
        <a href="{{ route('admin.register') }}"
           class="text-blue-600 hover:underline font-semibold">
            Daftar
        </a>
    </p>
</form>

</body>
</html>
