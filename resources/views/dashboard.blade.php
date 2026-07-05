@extends('layouts.app')
@section('content')
    <!-- Summary cards -->
    <div class="grid sm:grid-cols-3 gap-4">
        <div class="bg-white border border-line rounded-2xl p-5">
            <p class="text-xs text-ink-soft">Total saldo</p>
            <p id="stat-balance" class="font-mono font-bold text-2xl mt-1">
                Rp0
            </p>
        </div>
        <div class="bg-white border border-line rounded-2xl p-5">
            <p class="text-xs text-ink-soft">Pemasukan bulan ini</p>
            <p id="stat-income" class="font-mono font-bold text-2xl mt-1 text-primary">
                Rp0
            </p>
        </div>
        <div class="bg-white border border-line rounded-2xl p-5">
            <p class="text-xs text-ink-soft">Pengeluaran bulan ini</p>
            <p id="stat-expense" class="font-mono font-bold text-2xl mt-1 text-rose-600">
                Rp0
            </p>
        </div>
    </div>

    <div class="grid lg:grid-cols-5 gap-6">
        <!-- Category donut -->
        <div class="lg:col-span-2 bg-white border border-line rounded-2xl p-6">
            <h3 class="font-display font-semibold">
                Pengeluaran per kategori
            </h3>
            <div class="flex items-center gap-6 mt-4">
                <div id="donut" class="w-32 h-32 rounded-full shrink-0"
                    style="background: conic-gradient(var(--line) 0 100%)"></div>
                <div id="donut-legend" class="space-y-2 text-sm flex-1"></div>
            </div>
        </div>

        <!-- Budgets -->
        <div class="lg:col-span-3 bg-white border border-line rounded-2xl p-6">
            <h3 class="font-display font-semibold">Anggaran bulan ini</h3>
            <div id="budget-list" class="mt-4 space-y-4"></div>
        </div>
    </div>

    <!-- Transactions -->
    <div class="bg-white border border-line rounded-2xl p-6">
        <div class="flex items-center justify-between">
            <h3 class="font-display font-semibold">Transaksi terbaru</h3>
            <span class="text-xs text-ink-soft" id="tx-count">0 transaksi</span>
        </div>
        <div id="tx-list" class="mt-4 divide-y divide-line"></div>
    </div>
@endsection
