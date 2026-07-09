@extends('layouts.app')
@section('content')
    <!-- Toolbar -->
    <div class="bg-white border border-line rounded-2xl p-5">
        <div class="flex flex-col lg:flex-row gap-4 justify-between">
            <div class="flex flex-col sm:flex-row gap-3 flex-1">
                <!-- Search -->
                <div class="relative flex-1">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" width="18" height="18"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="8" cy="8" r="6"></circle>
                        <path d="M13 13l4 4"></path>
                    </svg>

                    <input type="text" id="search-input" placeholder="Search Users..."
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-line focus:outline-none focus:ring-2 focus:ring-primary" />
                </div>

            </div>
        </div>

    </div>

    <!-- Table -->
    <div class="bg-white border border-line rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="text-left text-sm text-gray-600">
                        <th class="px-6 py-4">Profile</th>

                        <th class="px-6 py-4">Name</th>

                        <th class="px-6 py-4">Email</th>

                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-line">

                    @forelse  ($users as $key => $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4"> </td>

                            <td class="px-6 py-4">
                                {{ $user->name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-2">
                                    <form action="{{ route('users.destroy', $user->sys_id_r_user) }}" method="POST"
                                        class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1.5 rounded-lg bg-red-500 text-white hover:bg-red-600">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <td class="px-6 py-4">
                            Not Found
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 p-5 border-t border-line">
            <p class="text-sm text-gray-500">
                Menampilkan 1-10 dari 150 Users
            </p>

            <div class="flex gap-2">
                <button class="px-4 py-2 rounded-lg border border-line hover:bg-gray-100">
                    Prev
                </button>

                <button class="px-4 py-2 rounded-lg bg-primary text-white">
                    1
                </button>

                <button class="px-4 py-2 rounded-lg border border-line hover:bg-gray-100">
                    2
                </button>

                <button class="px-4 py-2 rounded-lg border border-line hover:bg-gray-100">
                    3
                </button>

                <button class="px-4 py-2 rounded-lg border border-line hover:bg-gray-100">
                    Next
                </button>
            </div>
        </div>

    </div>



    <script>
        /* ---------- Dashboard sidebar (mobile) ---------- */
        function toggleSidebar() {
            const sb = document.getElementById("sidebar");
            const bd = document.getElementById("sidebar-backdrop");
            sb.classList.toggle("-translate-x-full");
            bd.classList.toggle("hidden");
        }

        function openModalAdd() {
            const modal = document.getElementById("txModalAdd");

            modal.classList.remove("hidden");
            modal.classList.add("flex");

            document.body.classList.add("overflow-hidden");
        }

        function closeModalAdd() {
            const modal = document.getElementById("txModalAdd");

            modal.classList.add("hidden");
            modal.classList.remove("flex");

            document.body.classList.remove("overflow-hidden");
        }

        let timeout = null;

        document.getElementById('search-input').addEventListener('keyup', function(e) {
            let query = e.target.value;

            // Bersihkan timeout sebelumnya jika user masih mengetik
            clearTimeout(timeout);

            // Hanya cari jika panjang karakter minimal 3 huruf
            if (query.length >= 3 || query.length === 0) {
                // Beri jeda 500ms setelah user selesai mengetik baru kirim request
                timeout = setTimeout(function() {
                    fetch(`{{ route('users.index') }}?search=${query}`, {
                            headers: {
                                "X-Requested-With": "XMLHttpRequest"
                            }
                        })
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById('search-results').innerHTML = html;
                        });
                }, 500);
            }
        });
    </script>
@endsection
