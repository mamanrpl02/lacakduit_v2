<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Lacak Duit</title>

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
        <div class="hidden lg:flex items-center justify-center bg-white border-r border-line p-12">

            <div class="max-w-md">

                <div class="flex items-center gap-4">

                    <div
                        class="w-16 h-16 rounded-2xl bg-primary flex items-center justify-center text-white font-bold text-2xl">
                        LD
                    </div>

                    <div>

                        <h1 class="text-3xl font-bold">
                            Lacak Duit
                        </h1>

                        <p class="text-ink-soft mt-1">
                            Catat pemasukan dan pengeluaran setiap hari dengan mudah.
                        </p>

                    </div>

                </div>

                <div class="mt-10 rounded-3xl border border-line bg-slate-50 p-8">

                    <h3 class="text-xl font-semibold">
                        Mulai atur keuanganmu hari ini
                    </h3>

                    <p class="text-ink-soft mt-3 leading-7">

                        Semua transaksi tersimpan rapi, mudah dicari,
                        dan siap menjadi laporan sederhana kapan pun kamu butuhkan.

                    </p>

                    <div class="space-y-4 mt-8">

                        <div class="flex gap-3 items-center">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                                💰
                            </div>
                            <span>Catat pemasukan & pengeluaran</span>
                        </div>

                        <div class="flex gap-3 items-center">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                                📊
                            </div>
                            <span>Laporan keuangan sederhana</span>
                        </div>

                        <div class="flex gap-3 items-center">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                                🔒
                            </div>
                            <span>Data tersimpan dengan aman</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="flex items-center justify-center p-6">

            <div class="w-full max-w-lg">

                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">

                    <div
                        class="w-16 h-16 rounded-2xl bg-primary text-white font-bold text-2xl flex items-center justify-center mx-auto">
                        LD
                    </div>

                    <h1 class="text-2xl font-bold mt-4">
                        Lacak Duit
                    </h1>

                </div>

                <div class="bg-white border border-line rounded-3xl shadow-xl p-8">

                    <div class="mb-8">

                        <h2 class="text-3xl font-bold">
                            Buat Akun Baru
                        </h2>

                        <p class="text-ink-soft mt-2">
                            Daftar gratis dan mulai mencatat transaksi harianmu.
                        </p>

                    </div>

                    <form class="space-y-5">

                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Nama Lengkap
                            </label>

                            <input type="text" placeholder="Masukkan nama lengkap"
                                class="w-full rounded-xl border border-line px-4 py-3 focus:ring-2 focus:ring-primary focus:outline-none">

                        </div>

                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Email
                            </label>

                            <input type="email" placeholder="nama@email.com"
                                class="w-full rounded-xl border border-line px-4 py-3 focus:ring-2 focus:ring-primary focus:outline-none">

                        </div>

                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Password
                            </label>

                            <div class="relative">

                                <input id="password" type="password" placeholder="Minimal 8 karakter"
                                    class="w-full rounded-xl border border-line px-4 py-3 pr-12 focus:ring-2 focus:ring-primary focus:outline-none">

                                <button type="button" onclick="togglePassword('password')"
                                    class="absolute right-4 top-1/2 -translate-y-1/2">

                                    👁️

                                </button>

                            </div>

                        </div>

                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Konfirmasi Password
                            </label>

                            <div class="relative">

                                <input id="confirm" type="password" placeholder="Ulangi password"
                                    class="w-full rounded-xl border border-line px-4 py-3 pr-12 focus:ring-2 focus:ring-primary focus:outline-none">

                                <button type="button" onclick="togglePassword('confirm')"
                                    class="absolute right-4 top-1/2 -translate-y-1/2">

                                    👁️

                                </button>

                            </div>

                        </div>

                        <label class="flex items-start gap-3 text-sm">

                            <input type="checkbox" class="mt-1 rounded text-primary">

                            <span>

                                Saya menyetujui
                                <a href="#" class="text-primary hover:underline">
                                    Syarat & Ketentuan
                                </a>
                                serta
                                <a href="#" class="text-primary hover:underline">
                                    Kebijakan Privasi
                                </a>

                            </span>

                        </label>

                        <button
                            class="w-full py-3 rounded-xl bg-primary text-white font-semibold hover:bg-primary-dark transition">

                            Daftar Sekarang

                        </button>

                    </form>

                    <div class="mt-8 text-center text-sm text-ink-soft">

                        Sudah punya akun?

                        <a href="login.html" class="text-primary font-semibold hover:underline">

                            Masuk

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        function togglePassword(id) {

            const input = document.getElementById(id);

            input.type =
                input.type === "password" ?
                "text" :
                "password";

        }
    </script>

</body>

</html>
