<?php

namespace App\Http\Controllers;

use App\Models\SubKriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    public function index()
    {
        // Mengambil semua sub kriteria dan kriteria
        $subKriterias = SubKriteria::with('kriteria')->get();
        $kriterias = Kriteria::all();

        // Mengirim data ke view
        return view('user.subkriteria.subkriteria', compact('subKriterias', 'kriterias'));
    }

    public function create()
    {
        // Mengambil semua sub kriteria dan kriteria
        $subKriterias = SubKriteria::with('kriteria')->get();
        $kriterias = Kriteria::all(); // Mengambil semua kriteria untuk dropdown

        return view('user.subkriteria.tambah', compact('subKriterias', 'kriterias'));
    }

    public function store(Request $request)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'nama_sub_kriteria' => 'required|string|max:255',
            'bobot_sub_kriteria' => 'required|integer|min:1|max:5',
            'kriteria_id' => 'required|exists:kriterias,id',
        ]);

        // Mengambil kode sub kriteria terakhir
        $lastSubKriteria = SubKriteria::orderBy('kode_sub_kriteria', 'desc')->first();

        // Menentukan kode sub kriteria baru
        if ($lastSubKriteria) {
            $lastKode = (int)substr($lastSubKriteria->kode_sub_kriteria, 3); // Mengambil bagian angka dari kode terakhir
            $newKode = 'SKT' . str_pad($lastKode + 1, 3, '0', STR_PAD_LEFT); // Menghasilkan kode baru
        } else {
            $newKode = 'SKT001'; // Jika belum ada sub kriteria, mulai dari SKT001
        }

        // Tambahkan kode sub kriteria ke validated data
        $validatedData['kode_sub_kriteria'] = $newKode;

        // Cek apakah bobot sudah ada pada sub-kriteria lain untuk kriteria yang sama
        $existingSubKriteria = SubKriteria::where('kriteria_id', $request->kriteria_id)
            ->where('bobot_sub_kriteria', $request->bobot_sub_kriteria)
            ->first();

        if ($existingSubKriteria) {
            return redirect()->back()->withErrors(['bobot_sub_kriteria' => 'Bobot sub kriteria ini sudah digunakan.']);
        }

        // Simpan sub kriteria baru ke database
        $subKriteria = SubKriteria::create($validatedData);

        return redirect()->route('subkriteria.index')->with('success', 'Sub Kriteria berhasil ditambahkan!');
    }

    // Menampilkan form edit sub kriteria
    public function edit($id)
    {
        $subKriteria = SubKriteria::findOrFail($id);
        $kriterias = Kriteria::all(); // Ambil semua kriteria untuk dropdown
        return view('user.subkriteria.edit', compact('subKriteria', 'kriterias'));
    }

    // Memproses update sub kriteria
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kriteria_id' => 'required|exists:kriterias,id',
            'nama_sub_kriteria' => 'required|string|max:255',
            'bobot_sub_kriteria' => 'required|integer|min:1|max:5',
            'kode_sub_kriteria' => 'required|string|max:255',
        ]);

        // Temukan sub kriteria berdasarkan ID
        $subKriteria = SubKriteria::findOrFail($id);

        // Update data sub kriteria
        $subKriteria->kriteria_id = $request->kriteria_id;
        $subKriteria->nama_sub_kriteria = $request->nama_sub_kriteria;
        $subKriteria->bobot_sub_kriteria = $request->bobot_sub_kriteria;
        $subKriteria->kode_sub_kriteria = $request->kode_sub_kriteria;

        // Simpan perubahan
        $subKriteria->save();

        // Redirect dengan pesan sukses
        return redirect('/subkriteria')->with('success', 'Sub Kriteria berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Temukan sub kriteria berdasarkan ID
        $subKriteria = SubKriteria::findOrFail($id);

        // Hapus sub kriteria
        $subKriteria->delete();

        // // Setelah sub kriteria dihapus, kita urutkan ulang kode sub kriteria
        // $this->reorderSubKriteria($subKriteria->kriteria_id);
        $subkriterias = SubKriteria::orderBy('id')->get(); // Ambil semua kriteria yang tersisa

        foreach ($subkriterias as $index => $k) {
            // Mengubah kode subkriteria dengan urutan baru
            $newKode = 'SKT' . str_pad($index + 1, 3, '0', STR_PAD_LEFT); // Membuat kode baru
            $k->kode_sub_kriteria = $newKode; // Mengupdate kode subkriteria
            $k->save(); // Simpan perubahan
        }
        // Redirect kembali dengan pesan sukses
        return redirect('/subkriteria')->with('success', 'Sub Kriteria berhasil dihapus.');
    }

    // // Fungsi untuk mengurutkan ulang kode sub kriteria setelah penghapusan
    // private function reorderSubKriteria($kriteriaId)
    // {
    //     // Ambil semua sub kriteria yang terkait dengan kriteria tersebut, diurutkan berdasarkan kode
    //     $subKriterias = SubKriteria::where('kriteria_id', $kriteriaId)->orderBy('kode_sub_kriteria', 'asc')->get();

    //     // Urutkan ulang kode sub kriteria
    //     $newKode = 1;
    //     foreach ($subKriterias as $subKriteria) {
    //         $subKriteria->kode_sub_kriteria = 'SK' . str_pad($newKode, 3, '0', STR_PAD_LEFT);
    //         $subKriteria->save();
    //         $newKode++;
    //     }
    // }
}
