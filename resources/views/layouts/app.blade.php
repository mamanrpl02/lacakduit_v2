<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --bg: #ffffff;
            --bg-soft: #f3fbf5;
            --primary: #16a34a;
            --primary-dark: #0e7c3a;
            --primary-deep: #073b23;
            --mint: #d9f7e4;
            --ink: #0b1f17;
            --ink-soft: #52685d;
            --line: #dcefe2;
        }

        * {
            -webkit-tap-highlight-color: transparent;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Inter", sans-serif;
            color: var(--ink);
            background: var(--bg);
        }

        .font-display {
            font-family: "Sora", sans-serif;
        }

        .font-mono {
            font-family: "JetBrains Mono", monospace;
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

        /* Receipt tape signature element */
        .tape-wrap {
            position: relative;
            overflow: hidden;
            -webkit-mask-image: linear-gradient(to bottom,
                    transparent 0%,
                    black 8%,
                    black 92%,
                    transparent 100%);
            mask-image: linear-gradient(to bottom,
                    transparent 0%,
                    black 8%,
                    black 92%,
                    transparent 100%);
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
            background-image:
                radial-gradient(circle at 0 6px, transparent 6px, var(--bg) 6.5px),
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
            background-image: repeating-linear-gradient(to bottom,
                    var(--line) 0 6px,
                    transparent 6px 12px);
        }

        .card-hover {
            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
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
            transition: transform 0.3s ease;
        }

        .modal-backdrop {
            transition: opacity 0.2s ease;
        }
    </style>

</head>

<body class="antialiased">

    <div id="view-dashboard" class="bg-soft min-h-screen">
        <div class="flex min-h-screen">
            <!-- Sidebar (desktop) / Drawer (mobile) -->
            @include('components.slidebar')

            <div id="sidebar-backdrop" onclick="toggleSidebar()"
                class="hidden fixed inset-0 bg-black/30 z-30 lg:hidden"></div>

            <!-- Main -->
            <div class="flex-1 min-w-0">
                <!-- Topbar -->
                @include('components.topbar')
                {{-- main content after login --}}
                <main class="px-4 sm:px-8 py-6 max-w-7xl mx-auto space-y-6">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <script>
        /* ---------- Utilities ---------- */
        function formatRp(n) {
            const sign = n < 0 ? "-" : "";
            return sign + "Rp" + Math.abs(Math.round(n)).toLocaleString("id-ID");
        }
        /* ---------- Dashboard sidebar (mobile) ---------- */
        function toggleSidebar() {
            const sb = document.getElementById("sidebar");
            const bd = document.getElementById("sidebar-backdrop");
            sb.classList.toggle("-translate-x-full");
            bd.classList.toggle("hidden");
        }
    </script>
</body>

</html>
