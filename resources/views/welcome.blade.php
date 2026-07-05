<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacak Duit — Kelola uangmu, tanpa drama</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap"
        rel="stylesheet">
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

        .view {
            display: none;
        }

        .view.active {
            display: block;
        }

        .drawer {
            transition: transform .3s ease;
        }

        .modal-backdrop {
            transition: opacity .2s ease;
        }
    </style>
</head>

<body class="antialiased">

    <!-- ============================================================ -->
    <!-- LANDING PAGE VIEW -->
    <!-- ============================================================ -->
    <div id="view-landing" class="view active">

        <!-- NAV -->
        <header class="sticky top-0 z-40 bg-white/90 backdrop-blur border-b border-line">
            <nav class="max-w-6xl mx-auto px-5 sm:px-8 h-16 flex items-center justify-between">
                <a href="#" class="flex items-center gap-2 font-display font-bold text-lg">
                    <span
                        class="w-8 h-8 rounded-lg bg-primary text-white flex items-center justify-center text-sm">Rp</span>
                    Lacak Duit
                </a>
                <div class="hidden md:flex items-center gap-8 text-sm font-medium text-ink-soft">
                    <a href="#fitur" class="hover:text-primary transition-colors">Fitur</a>
                    <a href="#cara-kerja" class="hover:text-primary transition-colors">Cara kerja</a>
                    <a href="#harga" class="hover:text-primary transition-colors">Harga</a>
                    <a href="#testimoni" class="hover:text-primary transition-colors">Testimoni</a>
                </div>
                <div class="hidden md:flex items-center gap-3">
                    <a href="/login"><button
                            class="focus-ring px-4 py-2 text-sm font-semibold text-ink-soft hover:text-primary transition-colors">Masuk</button></a>
                    <a href="/register"><button
                            class="focus-ring px-4 py-2 text-sm font-semibold rounded-full bg-primary text-white hover:bg-primary-dark transition-colors">Coba
                            gratis</button></a>
                </div>
                <button onclick="toggleMobileNav()" class="md:hidden focus-ring p-2 -mr-2" aria-label="Buka menu">
                    <svg id="icon-burger" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </nav>
            <div id="mobile-nav" class="hidden md:hidden border-t border-line bg-white px-5 py-4 space-y-3">
                <a href="#fitur" onclick="toggleMobileNav()" class="block text-sm font-medium text-ink-soft">Fitur</a>
                <a href="#cara-kerja" onclick="toggleMobileNav()" class="block text-sm font-medium text-ink-soft">Cara
                    kerja</a>
                <a href="#harga" onclick="toggleMobileNav()" class="block text-sm font-medium text-ink-soft">Harga</a>
                <a href="#testimoni" onclick="toggleMobileNav()"
                    class="block text-sm font-medium text-ink-soft">Testimoni</a>
                <div class="flex gap-3 pt-2">
                    <a href="/login"
                        class="focus-ring flex-1 px-4 py-2 text-sm font-semibold rounded-full border border-line text-center">
                        Masuk
                    </a>

                    <a href="/register"
                        class="focus-ring flex-1 px-4 py-2 text-sm font-semibold rounded-full bg-primary text-white text-center">
                        Coba Gratis
                    </a>
                </div>
            </div>
        </header>

        <!-- HERO -->
        <section class="bg-soft border-b border-line">
            <div class="max-w-6xl mx-auto px-5 sm:px-8 py-14 md:py-20 grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <span
                        class="inline-flex items-center gap-2 text-xs font-semibold tracking-wide uppercase text-primary bg-mint px-3 py-1 rounded-full">Untuk
                        kamu yang gajian tapi tetap bingung uang ke mana</span>
                    <h1 class="font-display font-extrabold text-4xl sm:text-5xl leading-tight mt-5">
                        Setiap rupiah,<br> tercatat dengan sendirinya.
                    </h1>
                    <p class="text-ink-soft text-lg mt-5 max-w-md">
                        Lacak Duit merapikan transaksimu jadi kategori yang masuk akal, menghitung sisa anggaran secara
                        real-time, dan kasih tahu sebelum dompetmu kaget di akhir bulan.
                    </p>
                    <div class="flex flex-wrap gap-3 mt-8">
                        <button onclick="openLogin()"
                            class="focus-ring px-6 py-3 rounded-full bg-primary text-white font-semibold hover:bg-primary-dark transition-colors">Mulai
                            lacak gratis</button>
                        <a href="#cara-kerja"
                            class="focus-ring px-6 py-3 rounded-full border border-line font-semibold text-ink hover:border-primary hover:text-primary transition-colors">Lihat
                            cara kerja</a>
                    </div>
                    <div class="flex items-center gap-6 mt-8 text-sm text-ink-soft">
                        <div><span class="font-display font-bold text-ink text-lg">42rb+</span> pengguna aktif</div>
                        <div><span class="font-display font-bold text-ink text-lg">Rp1,2T</span> transaksi tercatat
                        </div>
                    </div>
                </div>

                <!-- Signature: living receipt tape -->
                <div class="relative mx-auto w-full max-w-xs">
                    <div class="absolute -inset-4 bg-primary/5 rounded-[2rem] rotate-2"></div>
                    <div
                        class="relative bg-white border border-line rounded-3xl shadow-xl shadow-primary/10 overflow-hidden">
                        <div
                            class="px-5 pt-5 pb-3 border-b border-dashed border-line flex items-center justify-between">
                            <div>
                                <p class="text-xs text-ink-soft">Saldo hari ini</p>
                                <p class="font-mono font-bold text-2xl">Rp3.240.500</p>
                            </div>
                            <span class="text-xs font-semibold text-primary bg-mint px-2 py-1 rounded-full">+12%</span>
                        </div>
                        <div class="tape-wrap h-72 px-5 py-2">
                            <div class="tape-track">
                                <div id="tape-content"></div>
                                <div id="tape-content-dup"></div>
                            </div>
                        </div>
                        <div class="receipt-edge h-3"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FITUR -->
        <section id="fitur" class="max-w-6xl mx-auto px-5 sm:px-8 py-16 md:py-24">
            <div class="max-w-xl mb-12">
                <span class="text-xs font-semibold tracking-wide uppercase text-primary">Fitur</span>
                <h2 class="font-display font-bold text-3xl sm:text-4xl mt-3">Bukan sekadar buku catatan digital</h2>
                <p class="text-ink-soft mt-3">Empat hal yang bikin Lacak Duit terasa ringan dipakai setiap hari.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="card-hover border border-line rounded-2xl p-6 bg-white">
                    <div class="w-11 h-11 rounded-xl bg-mint flex items-center justify-center mb-4">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0E7C3A"
                            stroke-width="2">
                            <path
                                d="M3 10h18M7 15h4M5 6h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
                        </svg>
                    </div>
                    <h3 class="font-display font-semibold text-lg">Catat otomatis</h3>
                    <p class="text-sm text-ink-soft mt-2">Hubungkan e-wallet dan rekening, transaksi masuk sendiri
                        tanpa kamu ketik manual.</p>
                </div>
                <div class="card-hover border border-line rounded-2xl p-6 bg-white">
                    <div class="w-11 h-11 rounded-xl bg-mint flex items-center justify-center mb-4">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0E7C3A"
                            stroke-width="2">
                            <path d="M12 3v18M3 12h18" stroke-linecap="round" />
                            <circle cx="12" cy="12" r="9" />
                        </svg>
                    </div>
                    <h3 class="font-display font-semibold text-lg">Kategori cerdas</h3>
                    <p class="text-sm text-ink-soft mt-2">Sistem belajar kebiasaanmu dan menandai setiap transaksi ke
                        kategori yang tepat.</p>
                </div>
                <div class="card-hover border border-line rounded-2xl p-6 bg-white">
                    <div class="w-11 h-11 rounded-xl bg-mint flex items-center justify-center mb-4">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0E7C3A"
                            stroke-width="2">
                            <rect x="3" y="4" width="18" height="16" rx="2" />
                            <path d="M3 9h18M8 4v-1M16 4v-1" />
                        </svg>
                    </div>
                    <h3 class="font-display font-semibold text-lg">Anggaran bulanan</h3>
                    <p class="text-sm text-ink-soft mt-2">Tetapkan batas per kategori, dapat peringatan sebelum kamu
                        kebablasan belanja.</p>
                </div>
                <div class="card-hover border border-line rounded-2xl p-6 bg-white">
                    <div class="w-11 h-11 rounded-xl bg-mint flex items-center justify-center mb-4">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0E7C3A"
                            stroke-width="2">
                            <path d="M4 19V9M11 19V5M18 19v-7" />
                        </svg>
                    </div>
                    <h3 class="font-display font-semibold text-lg">Laporan jelas</h3>
                    <p class="text-sm text-ink-soft mt-2">Lihat ke mana uangmu pergi tiap bulan lewat grafik yang
                        gampang dibaca.</p>
                </div>
            </div>
        </section>

        <!-- CARA KERJA -->
        <section id="cara-kerja" class="bg-soft border-y border-line">
            <div class="max-w-6xl mx-auto px-5 sm:px-8 py-16 md:py-24">
                <div class="max-w-xl mb-12">
                    <span class="text-xs font-semibold tracking-wide uppercase text-primary">Cara kerja</span>
                    <h2 class="font-display font-bold text-3xl sm:text-4xl mt-3">Tiga langkah, mulai hari ini</h2>
                </div>
                <div class="grid md:grid-cols-3 gap-x-8 sm:ml-7">
                    <div
                        class="relative pl-10 pb-10 md:pb-0  md:bg-none border-l md:border-1-0 border-line2 md:border-none">
                        <span
                            class="absolute left-0 -translate-x-1/2 md:static md:-mb-16 md:mb-0 font-display font-bold text-3xl text-primary/20">01</span>
                        <h3 class="font-display font-semibold text-lg mt-6 md:mt-10">Daftar dalam 1 menit</h3>
                        <p class="text-sm text-ink-soft mt-2">Cukup email dan nama, tanpa formulir panjang.</p>
                    </div>
                    <div
                        class="relative pl-10 pb-10 md:pb-0 md:bg-none border-l md:border-1-0 border-line2 md:border-none">
                        <span
                            class="absolute left-0 -translate-x-1/2 md:static md:-mb-16 md:mb-0 font-display font-bold text-3xl text-primary/20">02</span>
                        <h3 class="font-display font-semibold text-lg mt-6 md:mt-10">Hubungkan sumber uangmu</h3>
                        <p class="text-sm text-ink-soft mt-2">E-wallet, rekening, atau catat manual — bebas pilih.</p>
                    </div>
                    <div class="relative pl-10">
                        <span
                            class="absolute left-0 -translate-x-1/2 md:static md:-mb-16 md:mb-0 font-display font-bold text-3xl text-primary/20">03</span>
                        <h3 class="font-display font-semibold text-lg mt-6 md:mt-10">Pantau dari dashboard</h3>
                        <p class="text-sm text-ink-soft mt-2">Saldo, anggaran, dan laporan ada di satu layar.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- HARGA -->
        <section id="harga" class="max-w-6xl mx-auto px-5 sm:px-8 py-16 md:py-24">
            <div class="max-w-xl mb-12">
                <span class="text-xs font-semibold tracking-wide uppercase text-primary">Harga</span>
                <h2 class="font-display font-bold text-3xl sm:text-4xl mt-3">Mulai gratis, upgrade kalau perlu</h2>
            </div>
            <div class="grid sm:grid-cols-2 gap-6 max-w-3xl">
                <div class="border border-line rounded-2xl p-8 bg-white">
                    <h3 class="font-display font-semibold text-lg">Gratis</h3>
                    <p class="font-display font-bold text-4xl mt-3">Rp0</p>
                    <p class="text-sm text-ink-soft mt-1">selamanya</p>
                    <ul class="mt-6 space-y-3 text-sm text-ink-soft">
                        <li class="flex gap-2"><span class="text-primary">✓</span>Catat transaksi manual tanpa batas
                        </li>
                        <li class="flex gap-2"><span class="text-primary">✓</span>1 anggaran bulanan</li>
                        <li class="flex gap-2"><span class="text-primary">✓</span>Laporan bulan berjalan</li>
                    </ul>
                    <button onclick="openLogin()"
                        class="focus-ring w-full mt-8 px-5 py-3 rounded-full border border-line font-semibold hover:border-primary hover:text-primary transition-colors">Pilih
                        Gratis</button>
                </div>
                <div class="border-2 border-primary rounded-2xl p-8 bg-white relative">
                    <span
                        class="absolute -top-3 left-8 bg-primary text-white text-xs font-semibold px-3 py-1 rounded-full">Paling
                        populer</span>
                    <h3 class="font-display font-semibold text-lg">Pro</h3>
                    <p class="font-display font-bold text-4xl mt-3">Rp29rb<span
                            class="text-base font-medium text-ink-soft">/bulan</span></p>
                    <p class="text-sm text-ink-soft mt-1">ditagih bulanan</p>
                    <ul class="mt-6 space-y-3 text-sm text-ink-soft">
                        <li class="flex gap-2"><span class="text-primary">✓</span>Sinkron otomatis e-wallet & bank
                        </li>
                        <li class="flex gap-2"><span class="text-primary">✓</span>Anggaran per kategori tanpa batas
                        </li>
                        <li class="flex gap-2"><span class="text-primary">✓</span>Riwayat & ekspor laporan penuh</li>
                    </ul>
                    <button onclick="openLogin()"
                        class="focus-ring w-full mt-8 px-5 py-3 rounded-full bg-primary text-white font-semibold hover:bg-primary-dark transition-colors">Pilih
                        Pro</button>
                </div>
            </div>
        </section>

        <!-- TESTIMONI -->
        <section id="testimoni" class="bg-soft border-y border-line">
            <div class="max-w-6xl mx-auto px-5 sm:px-8 py-16 md:py-24">
                <div class="max-w-xl mb-12">
                    <span class="text-xs font-semibold tracking-wide uppercase text-primary">Testimoni</span>
                    <h2 class="font-display font-bold text-3xl sm:text-4xl mt-3">Dipercaya orang yang gajinya juga
                        habis begitu saja</h2>
                </div>
                <div class="grid md:grid-cols-3 gap-5">
                    <div class="bg-white border border-line rounded-2xl p-6">
                        <p class="text-sm text-ink-soft">"Baru dua minggu pakai, saya sadar jajan kopi ternyata makan
                            seperempat gaji. Sekarang ada batasnya."</p>
                        <p class="font-display font-semibold text-sm mt-4">Dinda R. — Karyawan swasta</p>
                    </div>
                    <div class="bg-white border border-line rounded-2xl p-6">
                        <p class="text-sm text-ink-soft">"Sebagai freelancer, pemasukan saya nggak tetap. Lacak Duit
                            bantu saya lihat pola pengeluaran tiap bulan."</p>
                        <p class="font-display font-semibold text-sm mt-4">Bayu S. — Desainer lepas</p>
                    </div>
                    <div class="bg-white border border-line rounded-2xl p-6">
                        <p class="text-sm text-ink-soft">"Notifikasi anggaran hampir habis itu simpel tapi kena banget.
                            Nggak lagi kaget di tanggal tua."</p>
                        <p class="font-display font-semibold text-sm mt-4">Citra W. — Mahasiswa</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="max-w-6xl mx-auto px-5 sm:px-8 py-16 md:py-20">
            <div class="bg-primary-deep rounded-3xl px-8 py-14 text-center text-white">
                <h2 class="font-display font-bold text-3xl sm:text-4xl">Uangmu kerja lebih keras kalau kamu tahu ke
                    mana perginya.</h2>
                <button onclick="openLogin()"
                    class="focus-ring mt-8 px-7 py-3 rounded-full bg-white text-primary-deep font-semibold hover:bg-mint transition-colors">Mulai
                    lacak sekarang, gratis</button>
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="border-t border-line">
            <div
                class="max-w-6xl mx-auto px-5 sm:px-8 py-10 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-ink-soft">
                <div class="flex items-center gap-2 font-display font-bold text-ink">
                    <span
                        class="w-7 h-7 rounded-lg bg-primary text-white flex items-center justify-center text-xs">Rp</span>
                    Lacak Duit
                </div>
                <p>© 2026 Lacak Duit. Semua hak dilindungi.</p>
            </div>
        </footer>
    </div>


    <script>
        /* ---------- Utilities ---------- */
        function formatRp(n) {
            const sign = n < 0 ? '-' : '';
            return sign + 'Rp' + Math.abs(Math.round(n)).toLocaleString('id-ID');
        }

        /* ---------- Landing: mobile nav ---------- */
        function toggleMobileNav() {
            document.getElementById('mobile-nav').classList.toggle('hidden');
        }

        /* ---------- Hero receipt tape ---------- */
        const tapeItems = [{
                name: 'Kopi Kenangan',
                cat: 'Makan & Minum',
                amount: -27000
            },
            {
                name: 'Gaji bulanan',
                cat: 'Pemasukan',
                amount: 4500000
            },
            {
                name: 'Gojek ke kantor',
                cat: 'Transportasi',
                amount: -18000
            },
            {
                name: 'Langganan Netflix',
                cat: 'Hiburan',
                amount: -54000
            },
            {
                name: 'Belanja mingguan',
                cat: 'Belanja',
                amount: -210000
            },
            {
                name: 'Token listrik',
                cat: 'Tagihan',
                amount: -150000
            },
        ];

        function renderTape() {
            const html = tapeItems.map(t => `
    <div class="flex items-center justify-between py-2.5 border-b border-dashed border-line last:border-0">
      <div>
        <p class="text-sm font-medium">${t.name}</p>
        <p class="text-xs text-ink-soft">${t.cat}</p>
      </div>
      <p class="font-mono text-sm font-semibold ${t.amount < 0 ? 'text-ink' : 'text-primary'}">${formatRp(t.amount)}</p>
    </div>`).join('');
            document.getElementById('tape-content').innerHTML = html;
            document.getElementById('tape-content-dup').innerHTML = html;
        }
        renderTape();
    </script>
</body>

</html>
