<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Administrator - {{ \App\Models\Setting::get('site_name', 'Alam Kharisma Bersaudara') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-950 flex items-center justify-center min-h-screen relative overflow-hidden">
    <!-- Decorative background -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-brand-primary/10 rounded-full blur-3xl -mr-20 -mt-20"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl -ml-20 -mb-20"></div>

    <div class="w-full max-w-md p-4 relative z-10">
        <!-- Logo -->
        <div class="flex flex-col items-center mb-8 space-y-2">
            <div class="w-12 h-12 rounded-xl bg-brand-accent flex items-center justify-center text-slate-950 font-extrabold text-2xl shadow-lg shadow-brand-accent/20">
                <i class="fa-solid fa-helmet-safety"></i>
            </div>
            <span class="font-extrabold text-xl tracking-tight text-white">
                AKB<span class="text-brand-accent">ADMIN</span>
            </span>
            <p class="text-xs text-slate-400">Portal Keamanan Manajemen Kontraktor</p>
        </div>

        <!-- Login Card -->
        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-8 shadow-2xl space-y-6">
            <h2 class="text-xl font-bold text-white text-center">Masuk ke Dashboard</h2>
            
            <!-- Error Banner -->
            @if($errors->any())
                <div class="p-4 rounded-xl bg-rose-950/50 border border-rose-800 text-rose-200 text-xs space-y-1">
                    @foreach($errors->all() as $err)
                        <p><i class="fa-solid fa-circle-exclamation mr-1.5"></i> {{ $err }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Email Input -->
                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-500">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                               placeholder="admin@alamkharisma.co.id"
                               class="block w-full pl-10 pr-3 py-3 border border-slate-800 rounded-xl bg-slate-950 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-transparent text-sm">
                    </div>
                </div>

                <!-- Password Input -->
                <div class="space-y-1.5">
                    <label for="password" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Kata Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-500">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <input type="password" name="password" id="password" required
                               placeholder="••••••••"
                               class="block w-full pl-10 pr-3 py-3 border border-slate-800 rounded-xl bg-slate-950 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-transparent text-sm">
                    </div>
                </div>

                <!-- Remember me -->
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-brand-accent border-slate-800 rounded bg-slate-950 focus:ring-brand-accent">
                    <label for="remember" class="ml-2 text-xs font-semibold text-slate-400 cursor-pointer">Ingat Perangkat Saya</label>
                </div>

                <!-- Submit -->
                <button type="submit" 
                        class="w-full py-3.5 mt-2 rounded-xl bg-brand-accent hover:bg-brand-accent-hover text-slate-950 font-extrabold text-sm transition-all shadow-md shadow-brand-accent/10 cursor-pointer">
                    Masuk ke Sistem
                </button>
            </form>
        </div>

        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-xs text-slate-500 hover:text-brand-accent transition-colors">
                <i class="fa-solid fa-arrow-left mr-1.5"></i> Kembali ke Website Utama
            </a>
        </div>
    </div>
</body>
</html>
