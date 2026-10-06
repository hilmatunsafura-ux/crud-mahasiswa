<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Lihat data (+ pencarian + statistik)
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        $mahasiswa = Mahasiswa::query()
            ->when($cari, function ($query, $cari) {
                $query->where(function ($q) use ($cari) {
                    $q->where('nama', 'like', "%{$cari}%")
                      ->orWhere('npm', 'like', "%{$cari}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $stat = [
            'total'     => Mahasiswa::count(),
            'laki'      => Mahasiswa::where('jenis_kelamin', 'L')->count(),
            'perempuan' => Mahasiswa::where('jenis_kelamin', 'P')->count(),
        ];

        return view('mahasiswa.index', compact('mahasiswa', 'cari', 'stat'));
    }

    // Isi data
    public function store(Request $request)
    {
        Mahasiswa::create($this->validasi($request));

        return redirect()->route('mahasiswa.index')
            ->with('sukses', 'Data mahasiswa disimpan');
    }

    // Halaman edit
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // Simpan perubahan
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->update($this->validasi($request, $mahasiswa->id));

        return redirect()->route('mahasiswa.index')
            ->with('sukses', 'Data mahasiswa diperbarui');
    }

    // Hapus data
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('sukses', 'Data mahasiswa dihapus');
    }

    private function validasi(Request $request, $id = null): array
    {
        return $request->validate([
            'nama'          => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'npm'           => 'required|string|max:11|unique:mahasiwa,npm,' . $id,
            'prodi'         => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat'        => 'nullable|string',
        ]);
    }
}