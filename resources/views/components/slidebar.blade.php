<aside id="sidebar"
    class="drawer fixed lg:sticky z-40 inset-y-0 lg:inset-y-auto left-0 lg:top-0 lg:self-start w-64 h-screen bg-white border-r border-line -translate-x-full lg:translate-x-0 flex flex-col">
    <div class="h-16 flex items-center gap-2 px-6 font-display font-bold border-b border-line">
        <span class="w-8 h-8 rounded-lg bg-primary text-white flex items-center justify-center text-sm">Rp</span>
        Lacak Duit
    </div>
    <nav class="flex-1 px-4 py-6 space-y-1 text-sm font-medium">
        <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-ink-soft hover:bg-soft {{ request()->routeIs('dashboard') ? 'bg-mint text-green-700 font-semibold' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="8" height="8" rx="1.5" />
                <rect x="13" y="3" width="8" height="8" rx="1.5" />
                <rect x="3" y="13" width="8" height="8" rx="1.5" />
                <rect x="13" y="13" width="8" height="8" rx="1.5" />
            </svg>
            Dashboard
        </a>

        <a href="{{ route('transactions') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-ink-soft hover:bg-soft {{ request()->routeIs('transactions') ? 'bg-mint text-green-700 font-semibold' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <path d="M4 19V9M11 19V5M18 19v-7" />
            </svg>
            Transactions
        </a>

        <a href="{{ route('categories.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-ink-soft hover:bg-soft {{ request()->routeIs('categories.index') ? 'bg-mint text-green-700 font-semibold' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            Categories
        </a>


        <a href="{{ route('users.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-ink-soft hover:bg-soft {{ request()->routeIs('users.index') ? 'bg-mint text-green-700 font-semibold' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            Users
        </a>

        <a href="{{ route('walets.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-ink-soft hover:bg-soft {{ request()->routeIs('walets.index') ? 'bg-mint text-green-700 font-semibold' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            Walet
        </a>


        <a href="{{ route('budgeting') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-ink-soft hover:bg-soft {{ request()->routeIs('budgeting') ? 'bg-mint text-green-700 font-semibold' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <rect x="3" y="4" width="18" height="16" rx="2" />
                <path d="M3 9h18" />
            </svg>
            Anggaran
        </a>


        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-ink-soft hover:bg-soft ">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <circle cx="12" cy="12" r="9" />
                <path d="M12 8v4l3 2" />
            </svg>
            Laporan
        </a>

        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-ink-soft hover:bg-soft ">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <circle cx="12" cy="12" r="3" />
                <path
                    d="M19.4 15a1.6 1.6 0 00.3 1.8l.1.1a2 2 0 11-2.8 2.8l-.1-.1a1.6 1.6 0 00-1.8-.3 1.6 1.6 0 00-1 1.5V21a2 2 0 11-4 0v-.2a1.6 1.6 0 00-1-1.5 1.6 1.6 0 00-1.8.3l-.1.1a2 2 0 112.8-2.8l.1-.1A1.6 1.6 0 007 15.4 1.6 1.6 0 005.4 15H5a2 2 0 110-4h.2a1.6 1.6 0 001.5-1 1.6 1.6 0 00-.3-1.8l-.1-.1a2 2 0 112.8-2.8l.1.1a1.6 1.6 0 001.8.3H11a1.6 1.6 0 001-1.5V3a2 2 0 114 0v.2a1.6 1.6 0 001 1.5 1.6 1.6 0 001.8-.3l.1-.1a2 2 0 112.8 2.8l-.1.1a1.6 1.6 0 00-.3 1.8V9a1.6 1.6 0 001.5 1H21a2 2 0 110 4h-.2a1.6 1.6 0 00-1.5 1z" />
            </svg>
            Pengaturan
        </a>

    </nav>
    <div class="p-4 border-t border-line">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button
                class="focus-ring w-full flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl text-sm font-semibold text-ink-soft hover:bg-soft">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2">
                    <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9" />
                </svg>
                Keluar
            </button>
        </form>
    </div>
</aside>
