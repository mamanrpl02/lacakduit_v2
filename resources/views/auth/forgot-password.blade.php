<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-emerald-50/50 min-h-screen flex items-center justify-center p-4 antialiased font-sans">

    <div
        class="bg-white w-full max-w-md rounded-2xl shadow-xl shadow-emerald-100/40 p-6 sm:p-8 border border-emerald-100/60 transition-all duration-300">

        <!-- Icon & Header -->
        <div class="text-center mb-7">
            <div
                class="inline-flex items-center justify-center w-14 h-14 bg-emerald-100 text-emerald-600 rounded-full mb-4">
                <!-- Heroicon: Key -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Lupa Kata Sandi?</h2>
            <p class="text-sm text-gray-500 mt-2 px-2">
                Jangan khawatir! Masukkan email Anda di bawah ini dan kami akan mengirimkan instruksi untuk mengatur
                ulang kata sandi Anda.
            </p>
        </div>

        <!-- Form / State Container -->
        <div id="form-container">
            <form class="space-y-5" method="POST" action="{{ route('password.email') }}">
                @csrf
                <!-- Input Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Alamat Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <!-- Heroicon: Envelope -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </span>
                        <input type="email" id="email" name="email" required placeholder="name@example.com"
                            class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-100 transition-all duration-200">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-2.5 px-4 bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-semibold rounded-xl text-sm shadow-md shadow-emerald-600/10 hover:shadow-emerald-600/20 focus:outline-none focus:ring-4 focus:ring-emerald-200 transition-all duration-200 cursor-pointer">
                    Kirim Link Reset
                </button>
            </form>
            @if ($errors->get('email'))
                <span class="text-xs text-rose-400 ">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <!-- Footer / Kembali ke Login -->
        <div class="mt-8 pt-5 border-t border-gray-100 text-center">
            <a href="{{ route('login') }}"
                class="inline-flex items-center gap-1.5 text-sm font-medium text-emerald-600 hover:text-emerald-700 transition-colors duration-200 group">
                <!-- Heroicon: Arrow Left -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor"
                    class="w-4 h-4 transform group-hover:-translate-x-0.5 transition-transform duration-200">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7M3 12h18" />
                </svg>
                Kembali ke halaman masuk
            </a>
        </div>

    </div>

</body>

</html>
