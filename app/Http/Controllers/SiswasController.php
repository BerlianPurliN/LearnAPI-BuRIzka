<?php

namespace App\Http\Controllers;

use App\Models\Siswas;
use Illuminate\Http\Request;

class SiswasController extends Controller
{
    public function index()
    {
        // return view('siswas.index', [
        //     'siswas' => Siswas::get(),
        //      // Menggunakan model Siswa
        // ]);
        $siswas = Siswas::get();
        // dd($siswas);
        return json_encode($siswas);
    }

    public function create()
    {
        return view('siswas.create', [
            'classes' => Siswas::get(), // Menggunakan model Siswa
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
        ]);

        // Membuat instance Siswa baru
        $siswa = new Siswas();
        $siswa->name = $request->name;
        $siswa->class = $request->class;

        // Menyimpan data ke database
        $siswa->save();

        session()->flash('success', 'Data Berhasil Ditambahkan.');
        return json_encode($siswa);
        // return redirect()->route('siswas.index');
    }

    public function edit(Siswas $siswa) // Dependency injection model Siswa
    {
        return view('siswas.edit', compact('siswa')); // Menggunakan variabel yang sesuai
    }

    public function update(Request $request, Siswas $siswa)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
        ]);

        // Update data Siswa
        $siswa->name = $request->name;
        $siswa->class = $request->class;

        // Menyimpan perubahan ke database
        $siswa->save();

        session()->flash('success', 'Data Berhasil Diperbarui.');

        return redirect()->route('siswas.index');
    }

    public function destroy(Siswas $siswa) // Dependency injection model Siswa
    {
        $siswa->delete();

        return redirect()->route('siswas.index')->with('success', 'Data Berhasil Dihapus.');
    }
}