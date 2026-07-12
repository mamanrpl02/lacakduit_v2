<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Ulang Kata Sandi</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-emerald-50/50 min-h-screen flex items-center justify-center p-4 antialiased font-sans">

    <div
        class="bg-white w-full max-w-md rounded-2xl shadow-xl shadow-emerald-100/40 p-6 sm:p-8 border border-emerald-100/60 transition-all duration-300">

        <!-- Header -->
        <div class="text-center mb-7">
            <div
                class="inline-flex items-center justify-center w-14 h-14 bg-emerald-100 text-emerald-600 rounded-full mb-4">
                <!-- Heroicon: Shield Check -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.286Z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Buat Kata Sandi Baru</h2>
            <p class="text-sm text-gray-500 mt-2">
                Silakan masukkan email Anda dan ketikkan kata sandi baru yang kuat untuk akun Anda.
            </p>
        </div>

        <!-- Form Laravel Reset Password -->
        <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
            @csrf

            <!-- Password Reset Token (Hidden) -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email Addres</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <!-- Heroicon: Envelope -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                    </span>
                    <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}"
                        required autofocus autocomplete="username" placeholder="name@example.com"
                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border @error('email') border-red-400 focus:ring-red-100 focus:border-red-500 @else border-gray-200 focus:border-emerald-500 focus:ring-emerald-100 @enderror rounded-xl text-sm focus:outline-none focus:bg-white focus:ring-4 transition-all duration-200">
                </div>
                <!-- Laravel Error Message for Email -->
                @error('email')
                    <p class="text-xs text-red-500 mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Baru -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">New Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <!-- Heroicon: Lock Closed -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0V10.5m-2.25 0h13.5m-13.5 0a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25M6.75 10.5h10.5" />
                        </svg>
                    </span>
                    <input type="password" id="password" name="password" required autocomplete="new-password"
                        placeholder="Enter a new password."
                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border @error('password') border-red-400 focus:ring-red-100 focus:border-red-500 @else border-gray-200 focus:border-emerald-500 focus:ring-emerald-100 @enderror rounded-xl text-sm focus:outline-none focus:bg-white focus:ring-4 transition-all duration-200">
                </div>
                <!-- Laravel Error Message for Password -->
                @error('password')
                    <p class="text-xs text-rose-400 mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1.5">Confirm
                    Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <!-- Heroicon: Lock Closed (Dua kali penekanan visual aman) -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>
                    </span>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        autocomplete="new-password" placeholder="Enter new password confirmation"
                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border @error('password_confirmation') border-red-400 focus:ring-red-100 focus:border-red-500 @else border-gray-200 focus:border-emerald-500 focus:ring-emerald-100 @enderror rounded-xl text-sm focus:outline-none focus:bg-white focus:ring-4 transition-all duration-200">
                </div>
                @error('password_confirmation')
                    <p class="text-xs text-red-500 mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button type="submit"
                    class="w-full py-2.5 px-4 bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-semibold rounded-xl text-sm shadow-md shadow-emerald-600/10 hover:shadow-emerald-600/20 focus:outline-none focus:ring-4 focus:ring-emerald-200 transition-all duration-200 cursor-pointer text-center block">
                    Reset Password
                </button>
            </div>
        </form>

    </div>

</body>

</html>
