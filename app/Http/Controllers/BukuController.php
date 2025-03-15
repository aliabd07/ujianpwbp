<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    // Menampilkan semua data buku
    public function index()
    {
        $buku = Buku::all(); // Mengambil semua data buku
        return view('buku.index', compact('buku'));
    }

    // Menampilkan form tambah buku
    public function create()
    {
        return view('buku.create');
    }

    // Menyimpan data buku ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'jenis_buku' => 'required',
            'tahun_terbit' => 'required|digits:4',
            'sampul' => 'image|mimes:jpeg,png,jpg|max:2048' // Maks 2MB
        ]);

        $fileName = null;
        if ($request->hasFile('sampul')) {
            $file = $request->file('sampul');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/sampul', $fileName);
        }

        Buku::create([
            'judul_buku' => $request->judul_buku,
            'pengarang' => $request->pengarang,
            'jenis_buku' => $request->jenis_buku,
            'tahun_terbit' => $request->tahun_terbit,
            'sampul' => $fileName
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }
}
