<!-- Topbar -->
<header
    class="sticky top-0 z-20 h-16 bg-white/90 backdrop-blur border-b border-line flex items-center justify-between px-4 sm:px-8">
    <div class="flex items-center gap-3">
        <button onclick="toggleSidebar()" class="focus-ring p-2 -ml-2 lg:hidden" aria-label="Buka menu">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <div>
            <p class="font-display font-semibold" id="dash-greeting">
                Halo, Kamu 👋
            </p>
            <p class="text-xs text-ink-soft">
                Ringkasan keuangan bulan ini
            </p>
        </div>
    </div>
</header>
