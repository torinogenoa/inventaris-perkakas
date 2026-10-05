<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Perkakas;
use Illuminate\Http\Request;

class PerkakasController extends Controller
{
    public function index()
    {
        $perkakas = Perkakas::all();
        return view('perkakas.index', compact('perkakas'));
    }

    public function create()
    {
        return view('perkakas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah_barang' => 'required|integer',
            'kondisi_barang' => 'required|in:baik,buruk',
        ]);

        Perkakas::create($request->all());
        return redirect()->route('perkakas.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Perkakas $perkaka)
    {
        return view('perkakas.edit', compact('perkaka'));
    }

    public function update(Request $request, Perkakas $perkaka)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah_barang' => 'required|integer',
            'kondisi_barang' => 'required|in:baik,buruk',
        ]);

        $perkaka->update($request->all());
        return redirect()->route('perkakas.index')->with('success', 'Barang berhasil diupdate.');
    }

    public function destroy(Perkakas $perkakas)
    {
        // Cek hak akses tambahan (opsional, karena middleware sudah ada)
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $perkakas->delete();
        return redirect()->route('perkakas.index')->with('success', 'Barang berhasil dihapus.');
    }
}
