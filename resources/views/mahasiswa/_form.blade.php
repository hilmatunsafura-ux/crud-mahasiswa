@php
    $input = 'w-full rounded-xl border border-pink-200 bg-pink-50/40 px-4 py-2.5 text-sm placeholder:text-stone-300 transition focus:outline-none focus:bg-white focus:ring-2 focus:ring-pink-300 focus:border-pink-300';
    $label = 'block text-sm font-semibold text-stone-600 mb-1.5';
    $jk = old('jenis_kelamin', $mahasiswa->jenis_kelamin ?? '');
@endphp

<div class="grid gap-5 md:grid-cols-3">
    <div>
        <label class="{{ $label }}" for="npm">NPM</label>
        <input id="npm" name="npm" type="text" maxlength="11" class="{{ $input }}"
               value="{{ old('npm', $mahasiswa->npm ?? '') }}" placeholder="24010001">
        @error('npm') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="{{ $label }}" for="nama">Nama lengkap</label>
        <input id="nama" name="nama" type="text" class="{{ $input }}"
               value="{{ old('nama', $mahasiswa->nama ?? '') }}" placeholder="Intan Maulizahra">
        @error('nama') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="{{ $label }}" for="tanggal_lahir">Tanggal lahir</label>
        <input id="tanggal_lahir" name="tanggal_lahir" type="date" class="{{ $input }}"
               value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir ?? '') }}">
        @error('tanggal_lahir') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="md:col-span-2">
        <label class="{{ $label }}" for="prodi">Program studi</label>
        <input id="prodi" name="prodi" type="text" class="{{ $input }}"
               value="{{ old('prodi', $mahasiswa->prodi ?? '') }}" placeholder="Informatika">
        @error('prodi') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <span class="{{ $label }}">Jenis kelamin</span>
        <div class="flex gap-2">
            <label class="flex-1 cursor-pointer">
                <input type="radio" name="jenis_kelamin" value="L" class="peer sr-only" @checked($jk === 'L')>
                <span class="block text-center rounded-xl border border-pink-200 bg-pink-50/40 px-3 py-2.5 text-sm transition peer-checked:bg-yellow-200 peer-checked:border-yellow-300 peer-checked:text-yellow-900 peer-checked:font-semibold peer-focus-visible:ring-2 peer-focus-visible:ring-pink-300">Laki-laki</span>
            </label>
            <label class="flex-1 cursor-pointer">
                <input type="radio" name="jenis_kelamin" value="P" class="peer sr-only" @checked($jk === 'P')>
                <span class="block text-center rounded-xl border border-pink-200 bg-pink-50/40 px-3 py-2.5 text-sm transition peer-checked:bg-pink-200 peer-checked:border-pink-300 peer-checked:text-pink-900 peer-checked:font-semibold peer-focus-visible:ring-2 peer-focus-visible:ring-pink-300">Perempuan</span>
            </label>
        </div>
        @error('jenis_kelamin') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="md:col-span-3">
        <label class="{{ $label }}" for="alamat">Alamat <span class="font-normal text-stone-400">(opsional)</span></label>
        <textarea id="alamat" name="alamat" rows="2" class="{{ $input }}"
                  placeholder="Jl. Contoh No. 1">{{ old('alamat', $mahasiswa->alamat ?? '') }}</textarea>
        @error('alamat') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
</div>