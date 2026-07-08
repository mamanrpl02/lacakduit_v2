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

                    <form id="form-register" onsubmit="handleFormSubmit(event)" class="space-y-5"
                        action="{{ route('register') }}" method="POST">
                        @csrf
                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Nama Lengkap
                            </label>

                            <input type="text" name="name" placeholder="Masukkan nama lengkap"
                                class="w-full rounded-xl border border-line px-4 py-3 focus:ring-2 focus:ring-primary focus:outline-none">

                        </div>

                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Email
                            </label>

                            <input type="email" name="email" placeholder="nama@email.com"
                                class="w-full rounded-xl border border-line px-4 py-3 focus:ring-2 focus:ring-primary focus:outline-none">

                        </div>

                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Password
                            </label>

                            <div class="relative">

                                <input id="password" name="password" type="password" placeholder="Minimal 8 karakter"
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

                                <input id="confirm" name="password_confirmation" type="password"
                                    placeholder="Ulangi password"
                                    class="w-full rounded-xl border border-line px-4 py-3 pr-12 focus:ring-2 focus:ring-primary focus:outline-none">

                                <button type="button" onclick="togglePassword('confirm')"
                                    class="absolute right-4 top-1/2 -translate-y-1/2">

                                    👁️
                                </button>

                            </div>

                        </div>

                        <label class="flex items-start gap-3 text-sm">

                            <input type="checkbox" class="mt-1 rounded text-primary" id="agree-checkbox"
                                onchange="toggleSubmitButton()">

                            <span>

                                Saya menyetujui
                                <a href="javascript:void(0)" onclick="openModal('modal-terms')"
                                    class="text-primary hover:underline">
                                    Syarat & Ketentuan
                                </a>
                                serta
                                <a href="javascript:void(0)" onclick="openModal('modal-privacy')"
                                    class="text-primary hover:underline">
                                    Kebijakan Privasi
                                </a>

                            </span>

                        </label>

                        <button type="submit" id="submit-btn" disabled
                            class="w-full py-3 rounded-xl bg-slate-300 text-slate-500 cursor-not-allowed font-semibold hover:bg-primary-dark transition">

                            Daftar Sekarang

                        </button>

                    </form>

                    <div class="mt-8 text-center text-sm text-ink-soft">

                        Sudah punya akun?

                        <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline">

                            Masuk

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <div id="modal-terms"
        class="fixed inset-0 bg-black/50 z-50 flex justify-center items-end md:items-center p-4 opacity-0 pointer-events-none transition-opacity duration-300">
        <div
            class="bg-white w-full max-w-xl max-h-[85vh] md:max-h-[80vh] rounded-t-2xl md:rounded-2xl flex flex-col shadow-2xl translate-y-10 transition-transform duration-300">
            <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center">
                <h2 class="text-lg font-bold text-slate-800">Syarat & Ketentuan Lacak Duit</h2>
                <button onclick="closeModal('modal-terms')"
                    class="text-2xl text-slate-400 hover:text-slate-600 cursor-pointer">&times;</button>
            </div>
            <div class="px-6 py-4 overflow-y-auto text-sm text-slate-600 space-y-4 leading-relaxed">
                <div>
                    <h3 class="font-semibold text-slate-800 mb-1">1. Penggunaan Layanan</h3>
                    <p>Dengan mengakses Lacak Duit, Anda setuju untuk mencatat data keuangan Anda secara sadar dan
                        bertanggung jawab atas keamanan akun Anda sendiri.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-800 mb-1">2. Akun Pengguna</h3>
                    <p>Pengguna wajib memberikan informasi yang akurat saat pendaftaran. Kami tidak bertanggung jawab
                        atas kehilangan data akibat kelalaian perlindungan kata sandi Anda.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-800 mb-1">3. Batasan Tanggung Jawab</h3>
                    <p>Lacak Duit adalah alat pembantu pencatatan keuangan mandiri. Kami tidak bertanggung jawab atas
                        keputusan finansial atau kerugian materi yang dialami oleh pengguna.</p>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-slate-100 flex justify-end">
                <button onclick="closeModal('modal-terms')"
                    class="w-full md:w-auto bg-emerald-500 hover:bg-emerald-600 text-white font-semibold px-5 py-2.5 rounded-xl transition-colors text-sm cursor-pointer shadow-sm shadow-emerald-200">
                    Saya Mengerti
                </button>
            </div>
        </div>
    </div>

    <div id="modal-privacy"
        class="fixed inset-0 bg-black/50 z-50 flex justify-center items-end md:items-center p-4 opacity-0 pointer-events-none transition-opacity duration-300">
        <div
            class="bg-white w-full max-w-xl max-h-[85vh] md:max-h-[80vh] rounded-t-2xl md:rounded-2xl flex flex-col shadow-2xl translate-y-10 transition-transform duration-300">
            <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center">
                <h2 class="text-lg font-bold text-slate-800">Kebijakan Privasi</h2>
                <button onclick="closeModal('modal-privacy')"
                    class="text-2xl text-slate-400 hover:text-slate-600 cursor-pointer">&times;</button>
            </div>
            <div class="px-6 py-4 overflow-y-auto text-sm text-slate-600 space-y-4 leading-relaxed">
                <div>
                    <h3 class="font-semibold text-slate-800 mb-1">1. Data yang Kami Kumpulkan</h3>
                    <p>Kami mengumpulkan alamat email untuk kebutuhan autentikasi akun. Data transaksi harian yang Anda
                        masukkan murni disimpan untuk keperluan visualisasi laporan keuangan Anda sendiri.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-800 mb-1">2. Keamanan Data</h3>
                    <p>Semua data keuangan Anda di Lacak Duit dienkripsi dengan standar industri modern. Kami
                        berkomitmen untuk tidak pernah menjual data finansial Anda kepada platform iklan mana pun.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-800 mb-1">3. Perubahan Kebijakan</h3>
                    <p>Kebijakan ini dapat berubah sewaktu-waktu, dan notifikasi tertulis akan dikirimkan langsung ke
                        aplikasi jika ada perubahan signifikan yang memengaruhi privasi Anda.</p>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-slate-100 flex justify-end">
                <button onclick="closeModal('modal-privacy')"
                    class="w-full md:w-auto bg-emerald-500 hover:bg-emerald-600 text-white font-semibold px-5 py-2.5 rounded-xl transition-colors text-sm cursor-pointer shadow-sm shadow-emerald-200">
                    Setuju & Lanjutkan
                </button>
            </div>
        </div>
    </div>


    <script>
        function toggleSubmitButton() {
            const checkbox = document.getElementById('agree-checkbox');
            const submitBtn = document.getElementById('submit-btn');

            if (checkbox.checked) {
                // Jika dicentang: Aktifkan tombol & ubah warna jadi hijau
                submitBtn.disabled = false;
                submitBtn.classList.remove('bg-slate-300', 'text-slate-500', 'cursor-not-allowed');
                submitBtn.classList.add('bg-emerald-500', 'text-white', 'hover:bg-emerald-600', 'cursor-pointer',
                    'shadow-sm', 'shadow-emerald-200');
            } else {
                // Jika tidak dicentang: Matikan tombol & ubah warna jadi abu-abu kembali
                submitBtn.disabled = true;
                submitBtn.classList.remove('bg-emerald-500', 'text-white', 'hover:bg-emerald-600', 'cursor-pointer',
                    'shadow-sm', 'shadow-emerald-200');
                submitBtn.classList.add('bg-slate-300', 'text-slate-500', 'cursor-not-allowed');
            }
        }

        // // Fungsi opsional untuk handle ketika form dikirim
        // function handleFormSubmit(event) {
        //     event.preventDefault(); // Mencegah reload halaman bawaan

        //     const checkbox = document.getElementById('agree-checkbox');
        //     if (!checkbox.checked) {
        //         alert("Anda harus menyetujui Syarat & Ketentuan terlebih dahulu!");
        //         return;
        //     }

        //     // Lanjutkan proses submit ke database/SaaS Anda disini
        //     alert("Pendaftaran berhasil! Selamat datang di Lacak Duit.");
        // }

        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                // Ambil container modal (anak pertama dari overlay) untuk efek transisi muncul
                const container = modal.querySelector('div');

                // Tampilkan overlay (latar belakang hitam transparan)
                modal.classList.remove('opacity-0', 'pointer-events-none');
                modal.classList.add('opacity-100', 'pointer-events-auto');

                // Munculkan container modal dengan menghilangkan translasi bawah
                if (container) {
                    container.classList.remove('translate-y-10');
                    container.classList.add('translate-y-0');
                }

                // Kunci scroll layar utama
                document.body.style.overflow = 'hidden';
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                const container = modal.querySelector('div');

                // Sembunyikan overlay
                modal.classList.remove('opacity-100', 'pointer-events-auto');
                modal.classList.add('opacity-0', 'pointer-events-none');

                // Kembalikan efek geser ke bawah saat menutup
                if (container) {
                    container.classList.remove('translate-y-0');
                    container.classList.add('translate-y-10');
                }

                // Aktifkan kembali scroll layar utama
                document.body.style.overflow = 'auto';
            }
        }

        // Otomatis tutup modal jika pengguna mengklik area luar modal (overlay gelap)
        window.onclick = function(event) {
            if (event.target.id && event.target.id.startsWith('modal-')) {
                closeModal(event.target.id);
            }
        }

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
