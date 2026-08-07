<?php

namespace App\Http\Controllers;
use App\Models\Atraksi;
use Illuminate\Http\Request;
use App\Models\Destinasi;
class AtraksiController extends Controller
{
public function index()
{
    $atraksiList = Atraksi::latest()->get();
    return view('atraksi', compact('atraksiList'));
}
 
public function create()
{
    $destinasiList = Destinasi::all();
    return view('atraksi-create', compact('destinasiList'));
}

 
public function store(Request $request)
{
    $validated = $request->validate([
        'destinasi_id' => 'required|exists:destinasi,id',
        'nama' => 'required|min:3',
        'deskripsi' => 'required',
        'kategori' => 'required',
        'harga' => 'required|numeric|min:0',
        'gambar' => 'required',
    ]);
 
    Atraksi::create($validated);
 
    return redirect()->route('atraksi')
        ->with('success', 'Atraksi berhasil ditambahkan!');
}
 
public function edit($id)
{
        $atraksi = Atraksi::findOrFail($id);
    $destinasiList = Destinasi::all();
    return view('atraksi-edit', compact('atraksi', 'destinasiList'));

}
 
public function update(Request $request, $id)
{
    $atraksi = Atraksi::findOrFail($id);
 
    $validated = $request->validate([
        'destinasi_id' => 'required|exists:destinasi,id',
        'nama' => 'required|min:3',
        'deskripsi' => 'required',
        'kategori' => 'required',
        'harga' => 'required|numeric|min:0',
        'gambar' => 'required',
    ]);
 
    $atraksi->update($validated);
 
    return redirect()->route('atraksi')
        ->with('success', 'Atraksi berhasil diperbarui!');
}
 
public function destroy($id)
{
    $atraksi = Atraksi::findOrFail($id);
    $atraksi->delete();
    return redirect()->route('atraksi')
        ->with('success', 'Atraksi berhasil dihapus!');
}

public function show(Atraksi $atraksi)
{
    $relatedAtraksi = Atraksi::where('destinasi_id', $atraksi->destinasi_id)
        ->where('id', '!=', $atraksi->id)
        ->take(3)
        ->get();

    return view('atraksi-detail', compact('atraksi', 'relatedAtraksi'));
}
}
