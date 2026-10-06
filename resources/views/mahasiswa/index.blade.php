@extends('layouts.app')

@section('title', 'Data mahasiswa')

@section('content')
    {{-- Banner --}}
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-pink-200 via-pink-100 to-yellow-100 px-8 py-9 shadow-sm">
        <div class="absolute -right-10 -top-10 w-48 h-48 rounded-full bg-yellow-200/60"></div>
        <div class="absolute right-24 -bottom-12 w-32 h-32 rounded-full bg-pink-300/40"></div>
        <div class="relative">
            <p class="text-sm font-semibold text-pink-600">Halo! 👋</p>
            <h1 class="font-display text-2xl sm:text-3xl font-bold text-pink-900 mt-1">Kelola Data Mahasiswa</h1>
            <p class="text-sm text-pink-800/70 mt-2 max-w-md">Tambah, lihat, edit, dan hapus data mahasiswa dalam satu halaman.</p>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="grid gap-4 sm:grid-cols-3">
        <div class="rounded-2xl bg-white border border-pink-100 p-5 shadow-sm flex items-center gap-4">
            <span class="w-12 h-12 rounded-2xl bg-pink-100 flex items-center justify-center text-2xl">👥</span>
            <div>
                <p class="text-xs text-stone-400">Total mahasiswa</p>
                <p class="font-display text-2xl font-bold text-pink-600">{{ $stat['total'] }}</p>
            </div>
        </div>
        <div class="rounded-2xl bg-white border border-yellow-100 p-5 shadow-sm flex items-center gap-4">
            <span class="w-12 h-12 rounded-2xl bg-yellow-100 flex items-center justify-center text-2xl">👦</span>
            <div>
                <p class="text-xs text-stone-400">Laki-laki</p>
                <p class="font-display text-2xl font-bold text-yellow-700">{{ $stat['laki'] }}</p>
            </div>
        </div>
        <div class="rounded-2xl bg-white border border-pink-100 p-5 shadow-sm flex items-center gap-4">
            <span class="w-12 h-12 rounded-2xl bg-pink-100 flex items-center justify-center text-2xl">👧</span>
            <div>
                <p class="text-xs text-stone-400">Perempuan</p>
                <p class="font-display text-2xl font-bold text-pink-600">{{ $stat['perempuan'] }}</p>
            </div>
        </div>
    </div>

    {{-- Form tambah --}}
    <section class="bg-white rounded-3xl border border-pink-100 shadow-sm overflow-hidden">
        <div class="px-6 py-4 bg-pink-50/70 border-b border-pink-100 flex items-center gap-3">
            <span class="w-9 h-9 rounded-xl bg-pink-200 flex items-center justify-center">✍️</span>
            <div>
                <h2 class="font-display font-bold text-pink-700">Tambah mahasiswa</h2>
                <p class="text-xs text-stone-400">Isi data di bawah, lalu klik simpan.</p>
            </div>
        </div>
        <form method="POST" action="{{ route('mahasiswa.store') }}" class="p-6 space-y-5">
            @csrf
            @include('mahasiswa._form', ['mahasiswa' => null])
            <button type="submit" class="rounded-xl bg-pink-400 hover:bg-pink-500 text-white font-semibold text-sm px-6 py-2.5 shadow-sm transition">
                💾 Simpan data
            </button>
        </form>
    </section>

    {{-- Tabel --}}
    <section class="bg-white rounded-3xl border border-pink-100 shadow-sm overflow-hidden">
        <div class="px-6 py-4 bg-yellow-50/70 border-b border-yellow-100 flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <span class="w-9 h-9 rounded-xl bg-yellow-200 flex items-center justify-center">📋</span>
                <div>
                    <h2 class="font-display font-bold text-yellow-800">Daftar mahasiswa</h2>
                    @if ($cari)
                        <p class="text-xs text-stone-500">
                            Hasil pencarian "{{ $cari }}" ·
                            <a href="{{ route('mahasiswa.index') }}" class="text-pink-500 hover:underline">Hapus pencarian</a>
                        </p>
                    @else
                        <p class="text-xs text-stone-400">Semua data yang sudah tersimpan.</p>
                    @endif
                </div>
            </div>
            <form method="GET" action="{{ route('mahasiswa.index') }}" class="flex gap-2">
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm">🔍</span>
                    <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari nama atau NPM"
                           class="rounded-xl border border-yellow-200 bg-white pl-9 pr-3 py-2 text-sm w-56 placeholder:text-stone-300 focus:outline-none focus:ring-2 focus:ring-yellow-300">
                </div>
                <button class="rounded-xl bg-yellow-300 hover:bg-yellow-400 text-yellow-900 font-semibold text-sm px-4 py-2 transition">Cari</button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm min-w-[760px]">
                <thead>
                    <tr class="text-left text-xs uppercase tracking-wide text-stone-400">
                        <th class="py-3 px-6 font-semibold">Mahasiswa</th>
                        <th class="py-3 px-3 font-semibold">Tanggal lahir</th>
                        <th class="py-3 px-3 font-semibold">Prodi</th>
                        <th class="py-3 px-3 font-semibold">JK</th>
                        <th class="py-3 px-3 font-semibold">Alamat</th>
                        <th class="py-3 px-6 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswa as $m)
                        <tr class="border-t border-pink-50 odd:bg-white even:bg-pink-50/30 hover:bg-yellow-50 transition">
                            <td class="py-3 px-6">
                                <div class="flex items-center gap-3">
                                    <span class="w-10 h-10 rounded-full bg-gradient-to-br from-pink-200 to-yellow-200 text-pink-800 font-bold flex items-center justify-center shrink-0">
                                        {{ strtoupper(mb_substr($m->nama, 0, 1)) }}
                                    </span>
                                    <div>
                                        <p class="font-semibold text-stone-800">{{ $m->nama }}</p>
                                        <p class="text-xs text-stone-400">{{ $m->npm }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-3 whitespace-nowrap">{{ \Carbon\Carbon::parse($m->tanggal_lahir)->format('d M Y') }}</td>
                            <td class="py-3 px-3">
                                <span class="inline-block rounded-full bg-yellow-100 text-yellow-800 px-3 py-0.5 text-xs font-semibold">{{ $m->prodi }}</span>
                            </td>
                            <td class="py-3 px-3">
                                @if ($m->jenis_kelamin === 'L')
                                    <span class="inline-block rounded-full bg-yellow-200 text-yellow-900 px-3 py-0.5 text-xs font-semibold">L</span>
                                @else
                                    <span class="inline-block rounded-full bg-pink-200 text-pink-900 px-3 py-0.5 text-xs font-semibold">P</span>
                                @endif
                            </td>
                            <td class="py-3 px-3 max-w-[180px] truncate text-stone-500">{{ $m->alamat ?: '-' }}</td>
                            <td class="py-3 px-6">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('mahasiswa.edit', $m) }}"
                                       class="rounded-lg bg-yellow-100 hover:bg-yellow-200 text-yellow-900 text-xs font-semibold px-3 py-1.5 transition">✏️ Edit</a>
                                    <form method="POST" action="{{ route('mahasiswa.destroy', $m) }}"
                                          onsubmit="return confirm('Yakin hapus data {{ addslashes($m->nama) }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded-lg bg-rose-50 hover:bg-rose-100 border border-rose-200 text-rose-600 text-xs font-semibold px-3 py-1.5 transition">🗑️ Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-14 text-center">
                                <p class="text-4xl mb-2">{{ $cari ? '🔎' : '🌸' }}</p>
                                <p class="font-semibold text-pink-400">
                                    {{ $cari ? 'Tidak ada hasil untuk pencarian ini' : 'Belum ada data mahasiswa' }}
                                </p>
                                <p class="text-xs text-stone-400 mt-1">
                                    {{ $cari ? 'Coba kata kunci lain.' : 'Isi form di atas untuk menambah mahasiswa pertama.' }}
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($mahasiswa->hasPages())
            <div class="px-6 py-4 border-t border-pink-50">{{ $mahasiswa->links() }}</div>
        @endif
    </section>
@endsection