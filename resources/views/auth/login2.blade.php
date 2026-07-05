<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WAPush - Masuk Akun JB Lu</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-950 text-slate-100 min-h-screen flex items-center justify-center p-4 relative overflow-x-hidden">

    <!-- Background Glow Efek -->
    <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] bg-emerald-500/10 rounded-full blur-[100px] pointer-events-none">
    </div>
    <div
        class="absolute bottom-0 right-0 w-[300px] h-[300px] bg-cyan-500/5 rounded-full blur-[100px] pointer-events-none">
    </div>

    <!-- MAIN CARD LOGIN -->
    <div
        class="w-full max-w-md bg-slate-900 border border-slate-800 rounded-3xl p-6 md:p-8 shadow-2xl relative z-10 overflow-hidden">

        <!-- Efek Glow Internal Card -->
        <div class="absolute -top-10 -right-10 w-32 h-32 bg-emerald-500/10 rounded-full blur-2xl pointer-events-none">
        </div>

        <!-- Logo & Judul Brand -->
        <div class="text-center mb-8">
            <a href="/"
                class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-cyan-400 tracking-tight">
                WA<span class="text-white">PUSH</span>
            </a>
            <p class="text-xs text-slate-500 mt-1.5">Gaskeun masuk, amankan slot push kontak lu! ⚡</p>
        </div>

        <!-- Session Status (Notifikasi Laravel Sukses / Reset Password) -->
        @if (session('status'))
            <div
                class="mb-4 text-emerald-400 font-medium text-sm bg-emerald-500/10 p-3 rounded-xl border border-emerald-500/20">
                {{ session('status') }}
            </div>
        @endif

        <!-- Form Login Laravel -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">
                    Email / Username JB
                </label>
                <input id="email"
                    class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-600 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors"
                    type="email" name="email" value="{{ old('email') }}" placeholder="adminjuro@gmail.com" required
                    autofocus autocomplete="username" />

                <!-- Error Message Email -->
                @if ($errors->get('email'))
                    <div class="text-xs text-rose-400 mt-1.5 flex items-center gap-1">
                        ⚠️ <span>{{ $errors->first('email') }}</span>
                    </div>
                @endif
            </div>

            <!-- Password -->
            <div>
                <div class="flex justify-between items-center mb-2">
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Password
                    </label>

                </div>

                <input id="password"
                    class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-600 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors"
                    type="password" name="password" placeholder="••••••••" required autocomplete="current-password" />
                @if (Route::has('password.request'))
                    <a class="text-xs text-cyan-400 hover:text-cyan-300 hover:underline transition-colors"
                        href="{{ route('password.request') }}">
                        Lupa Sandi?
                    </a>
                @endif
                <!-- Error Message Password -->
                @if ($errors->get('password'))
                    <div class="text-xs text-rose-400 mt-1.5 flex items-center gap-1">
                        ⚠️ <span>{{ $errors->first('password') }}</span>
                    </div>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="block">
                <label for="remember_me" class="inline-flex items-center cursor-pointer select-none">
                    <input id="remember_me" type="checkbox"
                        class="w-4 h-4 rounded bg-slate-950 border-slate-800 text-emerald-500 focus:ring-0 accent-emerald-500 cursor-pointer"
                        name="remember">
                    <span class="ms-2 text-xs text-slate-400 hover:text-slate-300 transition-colors">Ingat akun gua di
                        device ini</span>
                </label>
            </div>

            <!-- Action Button -->
            <div class="pt-2">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 text-slate-950 font-bold py-3.5 rounded-xl transition-all shadow-lg shadow-emerald-500/20 text-center text-sm tracking-wide">
                    Masuk Sekarang ⚡
                </button>
            </div>
        </form>

        <!-- Link Alternatif Register -->
        @if (Route::has('register'))
            <div class="mt-6 pt-4 border-t border-slate-800/60 text-center">
                <p class="text-xs text-slate-500">
                    Belum punya akun?
                    <a href="{{ route('register') }}"
                        class="text-cyan-400 hover:text-cyan-300 font-medium hover:underline ml-1">Daftar Free Trial</a>
                </p>
            </div>
        @endif

    </div>
</body>

</html>
