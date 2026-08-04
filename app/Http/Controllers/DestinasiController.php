<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;

class DestinasiController extends Controller
{


public function index(Request $request)
{
    $keyword = $request->input('cari');
 
    $destinasiList = Destinasi::when($keyword, function ($query) use ($keyword) {
            $query->where('nama', 'like', '%' . $keyword . '%');
        })
        ->latest()
        ->paginate(2);
 
    return view('destinasi', compact('destinasiList', 'keyword'));
}


        public function show($id)
    {
        $destinasi = Destinasi::findOrFail($id);
 
        return view('destinasi-detail', [
            'destinasi' => $destinasi,
        ]);
    }

    public function create()
{
    return view('destinasi-create');
}
 
public function store(Request $request)
{
    $destinasi = Destinasi::create($request->all());
    return redirect()->route('destinasi.detail', $destinasi->id)
        ->with('success', 'Destinasi berhasil ditambahkan!');
}

public function edit($id)
{
    $destinasi = Destinasi::findOrFail($id);
    return view('destinasi-edit', compact('destinasi'));
}
 
public function update(Request $request, $id)
{
    $destinasi = Destinasi::findOrFail($id);
    $destinasi->update($request->all());
    return redirect()->route('destinasi.detail', $destinasi->id)
        ->with('success', 'Destinasi berhasil diperbarui!');
}

public function destroy($id)
{
    $destinasi = Destinasi::findOrFail($id);
    $destinasi->delete();
    return redirect()->route('destinasi')
        ->with('success', 'Destinasi berhasil dihapus!');
}

}


