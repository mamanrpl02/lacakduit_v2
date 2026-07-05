<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masuk - DompetKu</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --bg: #FFFFFF;
            --bg-soft: #F3FBF5;
            --primary: #16A34A;
            --primary-dark: #0E7C3A;
            --primary-deep: #073B23;
            --mint: #D9F7E4;
            --ink: #0B1F17;
            --ink-soft: #52685D;
            --line: #DCEFE2;
            --line2: #a0c6af;
        }

        * {
            -webkit-tap-highlight-color: transparent;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--ink);
            background: var(--bg);
        }

        .font-display {
            font-family: 'Sora', sans-serif;
        }

        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }

        .bg-soft {
            background: var(--bg-soft);
        }

        .text-ink {
            color: var(--ink);
        }

        .text-ink-soft {
            color: var(--ink-soft);
        }

        .text-primary {
            color: var(--primary);
        }

        .bg-primary {
            background: var(--primary);
        }

        .bg-primary-dark {
            background: var(--primary-dark);
        }

        .bg-primary-deep {
            background: var(--primary-deep);
        }

        .bg-mint {
            background: var(--mint);
        }

        .border-line {
            border-color: var(--line);
        }

        .border-line2 {
            border-color: var(--line2);
        }

        /* Receipt tape signature element */
        .tape-wrap {
            position: relative;
            overflow: hidden;
            -webkit-mask-image: linear-gradient(to bottom, transparent 0%, black 8%, black 92%, transparent 100%);
            mask-image: linear-gradient(to bottom, transparent 0%, black 8%, black 92%, transparent 100%);
        }

        .tape-track {
            animation: tape-scroll 16s linear infinite;
        }

        .tape-wrap:hover .tape-track {
            animation-play-state: paused;
        }

        @keyframes tape-scroll {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-50%);
            }
        }

        .receipt-edge {
            background-image: radial-gradient(circle at 0 6px, transparent 6px, var(--bg) 6.5px),
                radial-gradient(circle at 100% 6px, transparent 6px, var(--bg) 6.5px);
            background-size: 100% 12px;
            background-repeat: repeat-y;
        }

        @media (prefers-reduced-motion: reduce) {
            .tape-track {
                animation: none;
            }

            html {
                scroll-behavior: auto;
            }
        }

        .step-line {
            background-image: repeating-linear-gradient(to bottom, var(--line) 0 6px, transparent 6px 12px);
        }

        .card-hover {
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -18px rgba(7, 59, 35, 0.25);
        }

        .focus-ring:focus-visible {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--line);
            border-radius: 8px;
        }

        .drawer {
            transition: transform .3s ease;
        }

        .modal-backdrop {
            transition: opacity .2s ease;
        }
    </style>
</head>

<body class="min-h-screen bg-slate-50">
    <div class="min-h-screen grid lg:grid-cols-2">
        <!-- LEFT -->
        <div class="hidden lg:flex items-center justify-center p-12 bg-white border-r border-line">
            <div class="max-w-md">
                <div class="flex items-center gap-4">
                    <div
                        class="w-16 h-16 rounded-2xl bg-primary text-white flex items-center justify-center text-2xl font-bold shadow-lg">
                        D
                    </div>

                    <div>
                        <h1 class="text-3xl font-bold">Lacak Duit</h1>

                        <p class="text-ink-soft mt-1">
                            Catat setiap pemasukan dan pengeluaran dalam hitungan detik.
                        </p>
                    </div>
                </div>

                <div class="mt-10 rounded-3xl border border-line bg-green-50 p-8">
                    <h3 class="text-xl font-semibold">
                        Pantau uang harian, kontrol pengeluaran, dan ketahui ke mana
                        uangmu pergi.
                    </h3>

                    <p class="text-ink-soft mt-3 leading-7">
                        Catat pemasukan, pengeluaran, pantau saldo, dan lihat laporan
                        keuangan kapan saja.
                    </p>

                    <div class="mt-8 space-y-4">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-xl bg-green-100 text-primary flex items-center justify-center">
                                ✓
                            </div>
                            <span>Kelola transaksi dengan mudah</span>
                        </div>

                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-xl bg-green-100 text-primary flex items-center justify-center">
                                ✓
                            </div>
                            <span>Laporan otomatis setiap bulan</span>
                        </div>

                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-xl bg-green-100 text-primary flex items-center justify-center">
                                ✓
                            </div>
                            <span>Dashboard modern & responsif</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="flex items-center justify-center p-6">
            <div class="w-full max-w-md">
                <!-- Mobile Logo -->

                <div class="lg:hidden text-center mb-8">
                    <div
                        class="w-16 h-16 rounded-2xl bg-primary text-white flex items-center justify-center text-2xl font-bold mx-auto">
                        D
                    </div>

                    <h1 class="text-2xl font-bold mt-4">Lacak Duit</h1>
                </div>

                <div class="bg-white rounded-3xl border border-line shadow-xl p-8">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold">Selamat Datang 👋</h2>

                        <p class="text-ink-soft mt-2">
                            Masuk untuk mulai mencatat transaksi harianmu.
                        </p>
                    </div>
                    <!-- Form Login Laravel -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium mb-2"> Email </label>

                            <input type="email" name="email" autofocus value="{{ old('email') }}"
                                placeholder="Masukkan email"
                                class="w-full rounded-xl border border-line px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary" />

                            <!-- Error Message Email -->
                            @if ($errors->get('email'))
                                <div class="text-xs text-rose-400 mt-1.5 flex items-center gap-1">
                                    ⚠️ <span>{{ $errors->first('email') }}</span>
                                </div>
                            @endif
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2"> Password </label>

                            <div class="relative">
                                <input id="password" name="password" type="password" placeholder="••••••••"
                                    class="w-full rounded-xl border border-line px-4 py-3 pr-14 focus:outline-none focus:ring-2 focus:ring-primary" />

                                <button type="button" onclick="togglePassword()"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500">
                                    👁
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <label class="flex items-center gap-2 text-sm">
                                <input type="checkbox" class="rounded border-line text-primary focus:ring-primary" />

                                Ingat saya
                            </label>
                            @if (Route::has('password.request'))
                                <a href="#" class="text-sm text-primary hover:underline">
                                    Lupa Password?
                                </a>
                            @endif
                        </div>

                        @if ($errors->get('password'))
                            <div class="text-xs text-rose-400 mt-1.5 flex items-center gap-1">
                                ⚠️ <span> sasd{{ $errors->first('password') }}</span>
                            </div>
                        @endif

                        <button
                            class="w-full rounded-xl bg-primary py-3 text-white font-semibold hover:bg-primary-dark transition">
                            Masuk
                        </button>
                    </form>

                    <div class="relative my-8">
                        <div class="border-t border-line"></div>

                        <span class="absolute left-1/2 -translate-x-1/2 -top-3 bg-white px-3 text-sm text-ink-soft">
                            atau
                        </span>
                    </div>

                    <button class="w-full rounded-xl border border-line py-3 hover:bg-slate-50 transition font-medium">
                        Masuk dengan Google
                    </button>
                    <!-- Link Alternatif Register -->
                    @if (Route::has('register'))
                        <p class="text-center text-sm text-ink-soft mt-8">
                            Belum punya akun?

                            <a href="#" class="text-primary font-semibold hover:underline">
                                Daftar
                            </a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById("password");

            input.type = input.type === "password" ? "text" : "password";
        }
    </script>
</body>

<script>
    function togglePassword() {
        const input = document.getElementById("password");

        input.type = input.type === "password" ? "text" : "password";
    }
</script>
</body>

</html>
