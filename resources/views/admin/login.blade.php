<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <!-- CARD -->
        <div class="bg-white/90 backdrop-blur-xl rounded-2xl shadow-2xl shadow-slate-900/30 p-8 border border-slate-200/20">
            
            <!-- ANIMATED HEADER -->
            <div class="text-center mb-10">
                <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-2xl font-bold shadow-lg shadow-blue-500/30 animate-pulse-slow">
                    <i class="fas fa-lock"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Admin Login</h1>
                <p class="text-sm text-gray-500 font-medium">Masuk ke dashboard administrasi</p>
            </div>

            <!-- FORM -->
            <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
                @csrf

                <!-- EMAIL -->
                <div class="group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-2 text-blue-500"></i>Alamat Email
                    </label>
                    <div class="relative">
                        <input type="email" name="email" placeholder="admin@example.com"
                            class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 group-hover:border-blue-400"
                            required autocomplete="email" autofocus>
                        <i class="fas fa-user absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- PASSWORD -->
                <div class="group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-key mr-2 text-blue-500"></i>Kata Sandi
                    </label>
                    <div class="relative">
                        <input type="password" name="password" placeholder="••••••••"
                            class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 group-hover:border-blue-400"
                            required autocomplete="current-password">
                        <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <button type="button" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-blue-600" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                

                <!-- ERROR MESSAGES -->
                @error('email')
                    <div class="p-3 bg-red-50 border-l-4 border-red-500 rounded-r-lg animate-shake">
                        <p class="text-red-700 text-sm font-medium flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                        </p>
                    </div>
                @enderror

                @error('password')
                    <div class="p-3 bg-red-50 border-l-4 border-red-500 rounded-r-lg animate-shake">
                        <p class="text-red-700 text-sm font-medium flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                        </p>
                    </div>
                @enderror

                <!-- BUTTON -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-3.5 rounded-xl font-bold text-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 active:translate-y-0">
                   LOGIN
                </button>
            </form>

           
            </div>
        </div>

        

    <!-- CUSTOM STYLES & SCRIPTS -->
    <style>
        @keyframes shake {
            0%, 100% {transform: translateX(0);}
            10%, 30%, 50%, 70%, 90% {transform: translateX(-5px);}
            20%, 40%, 60%, 80% {transform: translateX(5px);}
        }
        .animate-shake {
            animation: shake 0.5s ease-in-out;
        }
        .animate-pulse-slow {
            animation: pulse 3s infinite;
        }
        input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
    </style>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.querySelector('input[name="password"]');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Form validation animation
        document.querySelector('form').addEventListener('submit', function(e) {
            const inputs = this.querySelectorAll('input[required]');
            let isValid = true;
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('border-red-500');
                    setTimeout(() => input.classList.remove('border-red-500'), 1000);
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                this.classList.add('animate-shake');
                setTimeout(() => this.classList.remove('animate-shake'), 500);
            }
        });

        // Auto remove error styling on input
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('border-red-500');
            });
        });
    </script>
</body>
</html>