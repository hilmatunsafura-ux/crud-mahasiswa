@extends('layouts.app')

@section('title', 'Edit mahasiswa')

@section('content')
    <a href="{{ route('mahasiswa.index') }}" class="inline-flex items-center gap-1 text-sm font-semibold text-pink-500 hover:underline">
        ← Kembali ke daftar
    </a>

    <section class="bg-white rounded-3xl border border-pink-100 shadow-sm overflow-hidden">
        <div class="px-6 py-4 bg-yellow-50/70 border-b border-yellow-100 flex items-center gap-3">
            <span class="w-10 h-10 rounded-full bg-gradient-to-br from-pink-200 to-yellow-200 text-pink-800 font-bold flex items-center justify-center">
                {{ strtoupper(mb_substr($mahasiswa->nama, 0, 1)) }}
            </span>
            <div>
                <h2 class="font-display font-bold text-yellow-800">Edit data {{ $mahasiswa->nama }}</h2>
                <p class="text-xs text-stone-400">Ubah data di bawah, lalu simpan perubahan.</p>
            </div>
        </div>
        <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa) }}" class="p-6 space-y-5">
            @csrf
            @method('PUT')
            @include('mahasiswa._form')
            <div class="flex gap-2">
                <button type="submit" class="rounded-xl bg-pink-400 hover:bg-pink-500 text-white font-semibold text-sm px-6 py-2.5 shadow-sm transition">
                    💾 Simpan perubahan
                </button>
                <a href="{{ route('mahasiswa.index') }}" class="rounded-xl bg-yellow-200 hover:bg-yellow-300 text-yellow-900 font-semibold text-sm px-6 py-2.5 transition">
                    Batal
                </a>
            </div>
        </form>
    </section>
@endsection