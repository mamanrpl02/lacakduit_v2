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

                    <input type="text" placeholder="Cari transaksi..."
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-line focus:outline-none focus:ring-2 focus:ring-primary" />
                </div>

            </div>
            <button onclick="openModalAdd()"
                class="px-5 py-2.5 rounded-xl bg-primary text-white font-semibold hover:bg-primary-dark transition">
                + Tambah Category
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

                        <th class="px-6 py-4">Name</th>

                        <th class="px-6 py-4">Type</th>

                        <th class="px-6 py-4">Description</th>

                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-line">

                    @foreach ($categories as $category)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $category->icon }}</td>

                            <td class="px-6 py-4">{{ $category->name }}</td>

                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full bg-gray-100 text-sm">
                                    {{ $category->type == 'in' ? 'Pemasukan' : 'Pengeluaran' }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                {{ $category->description }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-2">
                                    <button onclick="openModalAdd()"
                                        class="px-3 py-1.5 rounded-lg border border-line hover:bg-gray-100">
                                        Edit
                                    </button>
                                    <form action="{{ route('categories.destroy', $category->sys_id_r_category) }}"
                                        method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1.5 rounded-lg bg-red-500 text-white hover:bg-red-600">
                                            Hapus
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
                Menampilkan 1-10 dari 150 transaksi
            </p>

            <div class="flex gap-2">
                <button class="px-4 py-2 rounded-lg border border-line hover:bg-gray-100">
                    Sebelumnya
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
                    Berikutnya
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Add-->
    <div id="txModalAdd" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm p-4">
        <div class="bg-white w-full max-w-4xl rounded-2xl shadow-2xl flex flex-col max-h-[90vh]">
            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-5 border-b border-line shrink-0">
                <div>
                    <h2 class="text-xl font-semibold">Add Category</h2>
                    <p class="text-sm text-ink-soft">Masukan Kategori Anda</p>
                </div>

                <button onclick="closeModalAdd()"
                    class="w-10 h-10 rounded-full hover:bg-gray-100 flex items-center justify-center">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 6L18 18M18 6L6 18" />
                    </svg>
                </button>
            </div>
            <form class="space-y-5" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Body (Scroll) -->
                <div class="overflow-y-auto p-6 flex-1">

                    <div class="grid lg:grid-cols-2 gap-5">

                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Category Name*
                            </label>

                            <input type="text" name="name"
                                class="w-full rounded-xl border border-line px-4 py-3 focus:border-green-500 focus:outline-none" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2"> Type*</label>

                            <select name="type" class="w-full rounded-xl border border-line px-4 py-3">
                                <option value="out" value="out">Out</option>
                                <option value="in" value="in">In</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2"> Catatan </label>
                        <textarea name="description" rows="5" class="w-full rounded-xl border border-line px-4 py-3 resize-none"></textarea>
                    </div>

                    <div class="grid lg:grid-cols-2 gap-5 items-center">
                        <!-- Input File -->
                        <input type="file" name="icon" id="iconInput"
                            class="w-full rounded-xl border border-line px-4 py-3" accept="image/*" />

                        <!-- Wadah Preview -->
                        <div>
                            <!-- Tampilan DIV jika belum ada file -->
                            <div id="noPreview"
                                class="w-16 h-16 rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center text-xs text-gray-400 bg-gray-50 text-center p-1">
                                Belum ada icon
                            </div>

                            <!-- Tampilan IMG (Disembunyikan dulu pakai class 'hidden') -->
                            <img src="" alt="Preview Icon" class="w-16 h-16 object-cover rounded-lg hidden"
                                id="iconPreview">
                        </div>
                    </div>

                </div>

                <!-- Footer -->
                <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 px-6 py-5 border-t border-line shrink-0">
                    <button onclick="closeModalAdd()" class="px-5 py-3 rounded-xl border border-line hover:bg-gray-100">
                        Batal
                    </button>

                    <button class="px-5 py-3 rounded-xl bg-primary text-white hover:bg-primary-dark">
                        Simpan Transaksi
                    </button>
                </div>
            </form>

        </div>
    </div>

    <!-- Modal Edit-->
    <div id="txModalEdit" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm p-4">
        <div class="bg-white w-full max-w-4xl rounded-2xl shadow-2xl flex flex-col max-h-[90vh]">
            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-5 border-b border-line shrink-0">
                <div>
                    <h2 class="text-xl font-semibold">Edit Transaksi</h2>
                    <p class="text-sm text-ink-soft">Lengkapi data transaksi.</p>
                </div>

                <button onclick="closeModalAdd()"
                    class="w-10 h-10 rounded-full hover:bg-gray-100 flex items-center justify-center">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 6L18 18M18 6L6 18" />
                    </svg>
                </button>
            </div>

            <!-- Body (Scroll) -->
            <div class="overflow-y-auto p-6 flex-1">
                <form class="space-y-5">
                    <div class="grid lg:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Nama Transaksi
                            </label>

                            <input type="text" class="w-full rounded-xl border border-line px-4 py-3" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2"> Nominal </label>

                            <input type="number" class="w-full rounded-xl border border-line px-4 py-3" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2"> Jenis </label>

                            <select class="w-full rounded-xl border border-line px-4 py-3">
                                <option>Pemasukan</option>
                                <option>Pengeluaran</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2"> Kategori </label>

                            <select class="w-full rounded-xl border border-line px-4 py-3">
                                <option>Makanan</option>
                                <option>Transportasi</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2"> Tanggal </label>

                            <input type="date" class="w-full rounded-xl border border-line px-4 py-3" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Metode Pembayaran
                            </label>

                            <select class="w-full rounded-xl border border-line px-4 py-3">
                                <option>Tunai</option>
                                <option>Transfer</option>
                                <option>E-Wallet</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2"> Catatan </label>

                        <textarea name="description" rows="5" class="w-full rounded-xl border border-line px-4 py-3 resize-none"></textarea>
                    </div>

                    <!-- Contoh field tambahan -->

                    <div class="grid lg:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Referensi
                            </label>

                            <input type="text" class="w-full rounded-xl border border-line px-4 py-3" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2"> Status </label>

                            <select class="w-full rounded-xl border border-line px-4 py-3">
                                <option>Selesai</option>
                                <option>Pending</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 px-6 py-5 border-t border-line shrink-0">
                <button onclick="closeModalEdit()" class="px-5 py-3 rounded-xl border border-line hover:bg-gray-100">
                    Batal
                </button>

                <button class="px-5 py-3 rounded-xl bg-primary text-white hover:bg-primary-dark">
                    Simpan Transaksi
                </button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('iconInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('iconPreview');
            const noPreview = document.getElementById('noPreview');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result; // Masukkan base64 gambar ke src img
                    preview.classList.remove('hidden'); // Tampilkan gambar
                    noPreview.classList.add('hidden'); // Sembunyikan div pengganti
                }

                reader.readAsDataURL(file);
            } else {
                // Jika user membatalkan pilihan file
                preview.src = "";
                preview.classList.add('hidden'); // Sembunyikan gambar
                noPreview.classList.remove('hidden'); // Tampilkan div pengganti
            }
        });


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

        function openModalEdit() {
            const modal = document.getElementById("txModalEdit");

            modal.classList.remove("hidden");
            modal.classList.add("flex");

            document.body.classList.add("overflow-hidden");
        }

        function closeModalEdit() {
            const modal = document.getElementById("txModalEdit");

            modal.classList.add("hidden");
            modal.classList.remove("flex");

            document.body.classList.remove("overflow-hidden");
        }
    </script>
@endsection
