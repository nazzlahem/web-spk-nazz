<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $data = Kriteria::all();
        return view('user.kriteria.kriteria', compact('data'));
    }

    public function create()
    {
        return view('user.kriteria.tambahkriteria');
    }

    /**
     * Menyimpan data kriteria baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'nama_kriteria' => 'required|string|max:255',
            'bobot_kriteria' => 'required|integer|min:1|max:100',
            'tipe' => 'required|in:benefit,cost',
        ]);

        // Mengambil kode kriteria terakhir
        $lastKriteria = Kriteria::orderBy('kode_kriteria', 'desc')->first();

        // Menentukan kode kriteria baru
        if ($lastKriteria) {
            // Misalnya, jika kode kriteria berbentuk "KRT001", ambil bagian angka terakhir
            $lastKode = (int)substr($lastKriteria->kode_kriteria, 3); // Mengambil bagian angka
            $newKode = 'KRT' . str_pad($lastKode + 1, 3, '0', STR_PAD_LEFT); // Menghasilkan kode baru
        } else {
            $newKode = 'KRT001'; // Jika belum ada data, mulai dari KRT001
        }

        // Menambahkan kode kriteria baru ke validated data
        $validatedData['kode_kriteria'] = $newKode;

        // Simpan data ke dalam database
        $kriteria = Kriteria::create($validatedData);

        if ($kriteria) {
            // Jika data berhasil masuk
            return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan!');
        } else {
            // Jika data gagal masuk
            return redirect()->back()->with('error', 'Gagal menambahkan Kriteria, coba lagi.');
        }
    }

    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('user.kriteria.editkriteria', compact('kriteria'));
    }

    /**
     * Mengupdate data kriteria di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        // Validasi data yang di-update
        $validatedData = $request->validate([
            'nama_kriteria' => 'required|string|max:255',
            'bobot_kriteria' => 'required|integer|min:1|max:100',
            'tipe' => 'required|in:benefit,cost',
        ]);

        // Temukan kriteria berdasarkan ID
        $kriteria = Kriteria::findOrFail($id);

        // Update data kriteria
        $kriteria->update($validatedData);

        // Redirect kembali dengan pesan sukses
        return redirect('/kriteria')->with('success', 'Kriteria berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Temukan kriteria berdasarkan ID
        $kriteria = Kriteria::findOrFail($id);

        // Hapus data
        $kriteria->delete();

        // Mengurutkan kembali kode_kriteria
        $kriterias = Kriteria::orderBy('id')->get(); // Ambil semua kriteria yang tersisa

        foreach ($kriterias as $index => $k) {
            // Mengubah kode kriteria dengan urutan baru
            $newKode = 'KRT' . str_pad($index + 1, 3, '0', STR_PAD_LEFT); // Membuat kode baru
            $k->kode_kriteria = $newKode; // Mengupdate kode kriteria
            $k->save(); // Simpan perubahan
        }

        // Redirect kembali dengan pesan sukses
        return redirect('/kriteria')->with('success', 'Kriteria berhasil dihapus');
    }
}
