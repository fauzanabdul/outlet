<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /* =======================
     * ADMIN AREA
     * ======================= */

    // Tampilkan semua produk (admin)
    public function index()
    {
        return view('admin.produk.index', [
            'produks' => Produk::with('kategori')->latest()->get()
        ]);
    }

    // Form tambah produk
    public function create()
    {
        return view('admin.produk.create', [
            'kategoris' => Kategori::all()
        ]);
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori_id' => 'required',
            'deskripsi'   => 'required',
            'gambar'      => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $gambar = $request->file('gambar')->store('produk', 'public');

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'kategori_id' => $request->kategori_id,
            'deskripsi'   => $request->deskripsi,
            'gambar'      => $gambar
        ]);

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    // Form edit produk
    public function edit($id)
    {
        return view('admin.produk.edit', [
            'produk'    => Produk::findOrFail($id),
            'kategoris' => Kategori::all()
        ]);
    }

    // Update produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori_id' => 'required',
            'deskripsi'   => 'required',
            'gambar'      => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        $produk = Produk::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $produk->gambar = $request->file('gambar')
                ->store('produk', 'public');
        }

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'kategori_id' => $request->kategori_id,
            'deskripsi'   => $request->deskripsi,
        ]);

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    // Hapus produk
    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();

        return back()->with('success', 'Produk berhasil dihapus');
    }

    /* =======================
     * PUBLIC AREA
     * ======================= */

    // Detail produk (publik)
    public function detail($id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);
        return view('produk.detail', compact('produk'));
    }
}
