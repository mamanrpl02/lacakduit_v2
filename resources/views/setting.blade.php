@extends('layouts.app')
@section('content')
  



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
