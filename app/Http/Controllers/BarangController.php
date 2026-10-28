<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();

        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barangs',
            'nama_barang' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'jumlah' => 'required|integer',
            'kondisi' => 'required',
            'keterangan' => 'nullable',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index');
    }

    public function show(string $id)
    {
        $barang = Barang::findOrFail($id);

        return view('barang.show', compact('barang'));
    }

    public function edit(string $id)
    {
        $barang = Barang::findOrFail($id);

        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, string $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'jumlah' => 'required|integer',
            'kondisi' => 'required',
            'keterangan' => 'nullable',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index');
    }

    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index');
    }
}
