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
                + Add Category
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
                            <td class="px-6 py-4"> <img
                                    src="{{ asset('storage/' . ($category->icon ?? 'categories/defaultIcon.png')) }}"
                                    alt="{{ $category->name }}" class="w-10 h-10 object-cover rounded-full"> </td>

                            <td class="px-6 py-4">
                                @php
                                    // Ambil warna dari database atau gunakan default HEX dengan alpha
                                    $bgColor = $category->color ?? '#f3f4f669';

                                    // Cek jika formatnya adalah rgba, ubah menjadi rgb biasa untuk text color (solid)
                                    if (str_starts_with($bgColor, 'rgba')) {
                                        $textColor = str_replace(
                                            'rgba(',
                                            'rgb(',
                                            preg_replace('/,\s*[0-9.]+\)$/', ')', $bgColor),
                                        );
                                    } else {
                                        // Jika formatnya masih HEX bawaan, ambil warna aslinya atau default ke abu-abu gelap
                                        $textColor = str_replace('69', '', $bgColor); // Hapus opacity hex jika ada
                                    }
                                @endphp

                                <span class="px-3 py-1.5 rounded-full font-medium text-sm"
                                    style="background-color: {{ $bgColor }}; color: {{ $textColor }};">
                                    {{ $category->name }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-full {{ $category->type == 'in' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} text-sm">
                                    {{ $category->type == 'in' ? 'In' : 'Out' }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                {{ $category->description }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-2">
                                    <button type="button" onclick="openModalEdit(this)"
                                        data-id="{{ $category->sys_id_r_category }}" data-name="{{ $category->name }}"
                                        data-type="{{ $category->type }}" data-description="{{ $category->description }}"
                                        data-color="{{ $category->color }}" data-colorhex="{{ $category->color_hex }}"
                                        data-opacity="{{ $category->color_opacity }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('categories.destroy', $category->sys_id_r_category) }}"
                                        method="POST" class="d-inline">
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

        <!-- Modal Add-->
        <div id="txModalAdd" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm p-4">
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data"
                class="bg-white w-full max-w-4xl rounded-2xl shadow-2xl flex flex-col max-h-[90vh]">
                @csrf

                <div class="flex items-center justify-between px-6 py-5 border-b border-line shrink-0">
                    <div>
                        <h2 class="text-xl font-semibold">Add Category</h2>
                        <p class="text-sm text-ink-soft">Masukan Kategori Anda</p>
                    </div>

                    <button type="button" onclick="closeModalAdd()"
                        class="w-10 h-10 rounded-full hover:bg-gray-100 flex items-center justify-center">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M6 6L18 18M18 6L6 18" />
                        </svg>
                    </button>
                </div>

                <div class="overflow-y-auto p-6 flex-1 space-y-5">

                    <div class="grid lg:grid-cols-2 gap-5 pb-2">
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Category Name<span class="text-red-500">*</span>
                            </label>
                            <input type="text" maxlength="50" name="name" id="categoryNameInput"
                                oninput="updatePreviewText()" required
                                class="w-full rounded-xl border border-line px-4 py-3 focus:border-green-500 focus:outline-none" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Type<span class="text-red-500">*</span>
                            </label>
                            <select name="type" class="w-full rounded-xl border border-line px-4 py-3">
                                <option value="out">Out</option>
                                <option value="in">In</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2"> DEscription </label>
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

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-2"> Color Category </label>
                            <div class="flex items-center gap-3">
                                <input type="color" id="colorPicker" name="color_hex" value="#22c55e"
                                    class="w-16 h-12 p-1 rounded-xl border border-line bg-white cursor-pointer"
                                    oninput="updateRGBA()" />
                                <span id="colorHexText" class="text-sm font-mono text-gray-500">#22C55E</span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Opacity: <span id="opacityLabel">9%</span>
                            </label>
                            <input type="range" id="opacitySlider" name="color_opacity" min="0" max="100"
                                value="9"
                                class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-primary"
                                oninput="updateRGBA()" />
                        </div>
                    </div>

                    <input type="hidden" id="rgbaOutput" name="color" value="rgba(34, 197, 94, 0.09)">

                    <div class="mt-3">
                        <span class="text-xs text-gray-400 block mb-1">Preview Color:</span>
                        <div id="colorPreviewBox" class="w-fit p-4 rounded-xl text-center font-medium transition-all"
                            style="background-color: rgba(34, 197, 94, 0.09); color: #22c55e;">
                            Category Name
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


        {{-- Modal Edit --}}
        <div id="txModalEdit"
            class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm p-4">
            <form id="editCategoryForm" method="POST" enctype="multipart/form-data"
                class="bg-white w-full max-w-4xl rounded-2xl shadow-2xl flex flex-col max-h-[90vh]">
                @csrf
                @method('PUT')
                <div class="flex items-center justify-between px-6 py-5 border-b border-line shrink-0">
                    <div>
                        <h2 class="text-xl font-semibold">Edit Category</h2>
                        <p class="text-sm text-ink-soft">Masukan Kategori Anda</p>
                    </div>

                    <button type="button" onclick="closeModalEdit()"
                        class="w-10 h-10 rounded-full hover:bg-gray-100 flex items-center justify-center">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M6 6L18 18M18 6L6 18" />
                        </svg>
                    </button>
                </div>

                <div class="overflow-y-auto p-6 flex-1 space-y-5">

                    <div class="grid lg:grid-cols-2 gap-5 pb-2">
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Category Name<span class="text-red-500">*</span>
                            </label>
                            <input type="text" maxlength="50" name="name" id="editName"
                                oninput="updateEditPreviewText()" required
                                class="w-full rounded-xl border border-line px-4 py-3 focus:border-green-500 focus:outline-none" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Type<span class="text-red-500">*</span>
                            </label>
                            <select name="type" id="editType" class="w-full rounded-xl border border-line px-4 py-3">
                                <option value="out">Out</option>
                                <option value="in">In</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2"> DEscription </label>
                        <textarea name="description" id="editDescription" rows="5"
                            class="w-full rounded-xl border border-line px-4 py-3 resize-none"></textarea>
                    </div>

                    <div class="grid lg:grid-cols-2 gap-5 items-center">
                        <div>
                            <label class="block text-sm font-medium mb-2">Icon</label>
                            <input type="file" name="icon" id="editIconInput"
                                class="w-full rounded-xl border border-line px-4 py-3" accept="image/*" />
                        </div>

                        <div class="pt-6">
                            <div id="editNoPreview"
                                class="w-16 h-16 rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center text-xs text-gray-400 bg-gray-50 text-center p-1">
                                Belum ada icon
                            </div>

                            <img src="" alt="Preview Icon" class="w-16 h-16 object-cover rounded-lg hidden"
                                id="editIconPreview">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-2"> Color Category </label>
                            <div class="flex items-center gap-3">
                                <input type="color" oninput="updateEditRGBA()" id="editColorPicker" name="color_hex"
                                    value="#22c55e"
                                    class="w-16 h-12 p-1 rounded-xl border border-line bg-white cursor-pointer" />
                                <span id="editColorHexText" class="text-sm font-mono text-gray-500">#22C55E</span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Opacity: <span id="editOpacityLabel">9%</span>
                            </label>
                            <input type="range" id="editOpacitySlider" name="color_opacity" min="0"
                                max="100" value="9"
                                class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-primary"
                                oninput="updateEditRGBA()" />
                        </div>
                    </div>

                    <input type="hidden" id="editRgbaOutput" name="color" value="rgba(34, 197, 94, 0.09)">

                    <div class="mt-3">
                        <span class="text-xs text-gray-400 block mb-1">Preview Color:</span>
                        <div id="editColorPreviewBox" class="w-fit p-4 rounded-xl text-center font-medium transition-all"
                            style="background-color: rgba(34, 197, 94, 0.09); color: #22c55e;">
                            Category Name
                        </div>
                    </div>

                </div>

                <div
                    class="flex flex-col-reverse sm:flex-row justify-end gap-3 px-6 py-5 border-t border-line shrink-0 bg-white rounded-b-2xl">
                    <button type="button" onclick="closeModalEdit()"
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
        function updateEditPreviewText() {

            console.log({
                name: document.getElementById("editName"),
                picker: document.getElementById("editColorPicker"),
                slider: document.getElementById("editOpacitySlider"),
                preview: document.getElementById("editColorPreviewBox"),
                hexText: document.getElementById("editColorHexText"),
                opacity: document.getElementById("editOpacityLabel"),
            });
            const value = document.getElementById("editName").value;

            document.getElementById("editColorPreviewBox").innerText =
                value || "Category Name";
        }


        function updatePreviewText() {
            // Ambil nilai yang sedang diketik dari input name
            const inputValue = document.getElementById('categoryNameInput').value;
            const previewBox = document.getElementById('colorPreviewBox');

            // Jika input kosong, tampilkan teks default (placeholder) agar tidak blank
            if (inputValue.trim() === "") {
                previewBox.innerText = "Teks Konten Kategori";
            } else {
                previewBox.innerText = inputValue;
            }
        }

        function hexToRgb(hex) {
            hex = hex.replace(/^#/, '');
            let bigInt = parseInt(hex, 16);
            let r = (bigInt >> 16) & 255;
            let g = (bigInt >> 8) & 255;
            let b = bigInt & 255;
            return {
                r,
                g,
                b
            };
        }

        function updateRGBA() {
            const hexColor = document.getElementById('colorPicker').value;
            const opacityValue = document.getElementById('opacitySlider').value;

            // Membagi dengan 100 agar nilai 9 menjadi 0.09
            const alpha = (opacityValue / 100).toFixed(2);

            const rgb = hexToRgb(hexColor);
            const rgbaString = `rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, ${alpha})`;

            document.getElementById('colorHexText').innerText = hexColor.toUpperCase();
            document.getElementById('opacityLabel').innerText = opacityValue + '%';
            document.getElementById('rgbaOutput').value = rgbaString;

            const previewBox = document.getElementById('colorPreviewBox');
            previewBox.style.backgroundColor = rgbaString;
            previewBox.style.color = hexColor;
        }

        function updateEditRGBA() {

            const hexColor = document.getElementById("editColorPicker").value;
            const opacityValue = document.getElementById("editOpacitySlider").value;

            const alpha = (opacityValue / 100).toFixed(2);

            const rgb = hexToRgb(hexColor);

            const rgba = `rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, ${alpha})`;

            document.getElementById("editColorHexText").innerText = hexColor.toUpperCase();
            document.getElementById("editOpacityLabel").innerText = opacityValue + "%";
            document.getElementById("editRgbaOutput").value = rgba;

            const preview = document.getElementById("editColorPreviewBox");
            preview.style.backgroundColor = rgba;
            preview.style.color = hexColor;
        }

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


        function openModalEdit(button) {

            console.log(button.dataset.colorhex);

            document.getElementById("editColorPicker").value = button.dataset.colorhex;

            console.log(document.getElementById("editColorPicker").value);


            const modal = document.getElementById("txModalEdit");

            modal.classList.remove("hidden");
            modal.classList.add("flex");

            document.body.classList.add("overflow-hidden");

            document.getElementById("editName").value = button.dataset.name;
            document.getElementById("editType").value = button.dataset.type;
            document.getElementById("editDescription").value = button.dataset.description;

            document.getElementById("editColorPicker").value = button.dataset.colorhex;
            document.getElementById("editOpacitySlider").value = button.dataset.opacity;
            document.getElementById("editRgbaOutput").value = button.dataset.color;

            document.getElementById("editCategoryForm").action =
                `/categories/${button.dataset.id}`;

            // update preview
            updateEditPreview();
        }

        function closeModalEdit() {
            const modal = document.getElementById("txModalEdit");

            modal.classList.add("hidden");
            modal.classList.remove("flex");

            document.body.classList.remove("overflow-hidden");
        }

        function updateEditPreview() {

            console.log("updateEditPreview jalan");


            const name = document.getElementById("editName").value;
            const hex = document.getElementById("editColorPicker").value;
            const opacity = document.getElementById("editOpacitySlider").value;

            console.log(name, hex, opacity);


            const rgb = hexToRgb(hex);
            const alpha = opacity / 100;

            const rgba = `rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, ${alpha})`;

            document.getElementById("editColorHexText").innerText = hex.toUpperCase();
            document.getElementById("editOpacityLabel").innerText = opacity + "%";

            document.getElementById("editRgbaOutput").value = rgba;

            const preview = document.getElementById("editColorPreviewBox");

            preview.style.backgroundColor = rgba;
            preview.style.color = hex;
            preview.innerText = name || "Category Name";
        }

        document.getElementById("editIconInput").addEventListener("change", function(e) {

            const file = e.target.files[0];

            const preview = document.getElementById("editIconPreview");
            const noPreview = document.getElementById("editNoPreview");

            if (!file) {
                preview.src = "";
                preview.classList.add("hidden");
                noPreview.classList.remove("hidden");
                return;
            }

            const reader = new FileReader();

            reader.onload = function(event) {

                preview.src = event.target.result;

                preview.classList.remove("hidden");
                noPreview.classList.add("hidden");

            };

            reader.readAsDataURL(file);

        });
    </script>
@endsection
