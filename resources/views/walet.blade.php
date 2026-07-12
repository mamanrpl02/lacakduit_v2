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

                    <input type="text" placeholder="Search categories..."
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-line focus:outline-none focus:ring-2 focus:ring-primary" />
                </div>

            </div>
            <button onclick="openModalAdd()"
                class="px-5 py-2.5 rounded-xl bg-primary text-white font-semibold hover:bg-primary-dark transition">
                + Add Walet
            </button>
        </div>

    </div>

    <!-- Table -->
    <div class="bg-white border border-line rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="text-left text-sm text-gray-600">
                        <th class="px-6 py-4">Icon</th>

                        <th class="px-6 py-4">Walet Name</th>

                        <th class="px-6 py-4">Description</th>

                        <th class="px-6 py-4 text-center">Acation</th>
                    </tr>
                </thead>

                <tbody class="">

                    @foreach ($walets as $walet)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4"> <img
                                    src="{{ asset('storage/' . ($walet->icon ?? 'walets/defaultIcon.png')) }}"
                                    alt="{{ $walet->name }}" class="w-10 h-10 object-cover rounded-full"> </td>

                            <td class="px-6 py-4">
                                {{ $walet->name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $walet->description }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-2">
                                    <button type="button" onclick="openModalEdit(this)"
                                        data-id="{{ $walet->sys_id_r_walet }}" data-name="{{ $walet->name }}"
                                        data-type="{{ $walet->type }}" data-description="{{ $walet->description }}"
                                        data-color="{{ $walet->color }}" data-colorhex="{{ $walet->color_hex }}"
                                        data-opacity="{{ $walet->color_opacity }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('walets.destroy', $walet->sys_id_r_walets) }}" method="POST"
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
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 p-5 border-t border-line">
            <p class="text-sm text-gray-500">
                Menampilkan {{ $walets->firstItem() }}-{{ $walets->lastItem() }} dari {{ $walets->total() }} transaksi
            </p>


            <div class="flex gap-2">

                <!-- Looping Nomor Halaman dengan Penjagaan Maksimal 4 Halaman -->
                @php
                    // 1. Tentukan berapa banyak tombol nomor halaman yang ingin ditampilkan
                    $limit = 4;

                    // 2. Hitung halaman awal (start) agar halaman aktif berada di tengah/proporsional
                    $start = max(1, $walets->currentPage() - floor(($limit - 1) / 2));

                    // 3. Hitung halaman akhir (end) berdasarkan halaman awal + limit
                    $end = min($walets->lastPage(), $start + $limit - 1);

                    // 4. Koreksi ulang halaman awal jika halaman akhir sudah mentok di batas total page
                    $start = max(1, $end - $limit + 1);
                @endphp
                @if ($start > 1)
                    <a href="{{ $walets->url(1) }}">
                        <button class="px-4 py-2 rounded-lg border border-line hover:bg-gray-100">&laquo; First</button>
                    </a>
                    <span class="px-2 text-gray-400">...</span>
                @endif

                @foreach ($walets->getUrlRange($start, $end) as $page => $url)
                    @if ($page == $walets->currentPage())
                        <!-- Tampilan untuk Halaman yang Sedang Aktif -->
                        <button class="px-4 py-2 rounded-lg border border-line bg-primary text-white">
                            <span class="active" style="font-weight: bold; margin: 0 5px;">{{ $page }}</span>
                        </button>
                    @else
                        <!-- Tampilan untuk Halaman Lainnya -->
                        <a href="{{ $url }}">
                            <button class="px-4 py-2 rounded-lg border border-line hover:bg-gray-100">
                                {{ $page }}
                            </button>
                        </a>
                    @endif
                @endforeach

                <!-- Tombol ke Halaman Terakhir (Hanya muncul jika halaman akhir belum mentok) -->
                @if ($end < $walets->lastPage())
                    <span class="px-2 text-gray-400">...</span>
                    <a href="{{ $walets->url($walets->lastPage()) }}">
                        <button class="px-4 py-2 rounded-lg border border-line hover:bg-gray-100">Last &raquo;</button>
                    </a>
                @endif
            </div>
        </div>

        <!-- Modal Add-->
        <div id="txModalAdd" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm p-4">
            <form action="{{ route('walets.store') }}" method="POST" enctype="multipart/form-data"
                class="bg-white w-full max-w-4xl rounded-2xl shadow-2xl flex flex-col max-h-[90vh]">
                @csrf

                <div class="flex items-center justify-between px-6 py-5 border-b border-line shrink-0">
                    <div>
                        <h2 class="text-xl font-semibold">Add Walet</h2>
                        <p class="text-sm text-ink-soft">Masukan Walet Anda</p>
                    </div>

                    <button type="button" onclick="closeModalAdd()"
                        class="w-10 h-10 rounded-full hover:bg-gray-100 flex items-center justify-center">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M6 6L18 18M18 6L6 18" />
                        </svg>
                    </button>
                </div>

                <div class="overflow-y-auto p-6 flex-1 space-y-5">

                    <div>
                        <label class="block text-sm font-medium mb-2">
                            Walet Name<span class="text-red-500">*</span>
                        </label>
                        <input type="text" maxlength="50" name="name" id="waletNameInput" required
                            class="w-full rounded-xl border border-line px-4 py-3 focus:border-green-500 focus:outline-none" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2"> Description </label>
                        <textarea name="description" rows="5" class="w-full rounded-xl border border-line px-4 py-3 resize-none"></textarea>
                    </div>

                    <div class="grid lg:grid-cols-2 gap-5 items-center">
                        <div>
                            <label class="block text-sm font-medium mb-2">Icon</label>
                            <input type="file" name="icon" id="iconInput"
                                class="w-full rounded-xl border border-line px-4 py-3" accept="image/*" />
                        </div>

                        <div class="pt-6">
                            <div id="noPreview"
                                class="w-16 h-16 rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center text-xs text-gray-400 bg-gray-50 text-center p-1">
                                Belum ada icon
                            </div>

                            <img src="" alt="Preview Icon" class="w-16 h-16 object-cover rounded-lg hidden"
                                id="iconPreview">
                        </div>
                    </div>

                </div>

                <div
                    class="flex flex-col-reverse sm:flex-row justify-end gap-3 px-6 py-5 border-t border-line shrink-0 bg-white rounded-b-2xl">
                    <button type="button" onclick="closeModalAdd()"
                        class="px-5 py-3 rounded-xl border border-line hover:bg-gray-100 transition-colors">
                        Batal
                    </button>

                    <button type="submit"
                        class="px-5 py-3 rounded-xl bg-primary text-white hover:bg-primary-dark transition-colors">
                        Simpan Transaksi
                    </button>
                </div>
            </form>
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
    </script>
@endsection
