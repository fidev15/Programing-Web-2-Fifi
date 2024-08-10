<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();

        return view('mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'nim' => 'required|size:10|unique:mahasiswas,nim',
            'alamat' => 'required',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa')
            ->with('success', 'Data Mahasiswa Telah Berhasil Ditambahkan.');

        session()->flash('success', 'Data Mahasiswa baru berhasil ditambahkan!');

        return redirect('/');
    }
    public function show(Mahasiswa $mahasiswa)
    {
        return view('show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'nim' => 'required|size:10|unique:mahasiswas,nim,' . $mahasiswa->id,
            'alamat' => 'required',
        ]);

        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswa')
            ->with('success', 'Data Mahasiswa Telah Berhasil Dirubah.');
    }

    public function delete(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
    
        session()->flash('success', 'Data Mahasiswa berhasil dihapus!');
    
        return redirect('/');
    }
}

