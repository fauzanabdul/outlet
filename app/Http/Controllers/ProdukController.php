<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\Kategori;

class ProdukController extends Controller
{
    public function index()
    {
        return view('admin.produk.index', [
            'produks' => Produk::latest()->get()
        ]);
    }

   public function create()
{
    return view('admin.produk.create', [
        'kategoris' => Kategori::all()
    ]);
}

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori_id' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $gambar = $request->file('gambar')->store('produk', 'public');

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'kategori_id' => $request->kategori_id,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar
        ]);

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();

        return back()->with('success', 'Produk berhasil dihapus');
    }
}
