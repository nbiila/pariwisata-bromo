<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
  public function index()
{
    $kategoriList = Kategori::all();
    return view('kategori', compact('kategoriList'));
}
 
public function create()
{
    $kategoriList = Kategori::all();
    return view('kategori-create', compact('kategoriList'));
}
 
public function store(Request $request)
{
    $validated = $request->validate([
        'nama_kategori' => 'required|min:3|unique:kategori,nama_kategori',
    ]);
 
    Kategori::create($validated);
 
    return redirect()->route('kategori')->with('success', 'Kategori berhasil ditambahkan!');
}
 
public function edit($id)
{
    $kategori = Kategori::findOrFail($id);
    return view('kategori-edit', compact('kategori'));
}
 
public function update(Request $request, $id)
{
    $kategori = Kategori::findOrFail($id);
 
    $validated = $request->validate([
        'nama_kategori' => 'required|min:3|unique:kategori,nama_kategori,' . $id,
    ]);
 
    $kategori->update($validated);
 
    return redirect()->route('kategori')->with('success', 'Kategori berhasil diperbarui!');
}
 
public function destroy($id)
{
    $kategori = Kategori::findOrFail($id);
    $kategori->delete();
 
    return redirect()->route('kategori')->with('success', 'Kategori berhasil dihapus!');
}

}
