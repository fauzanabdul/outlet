<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function index()
    {
        $outlets = Outlet::paginate(10);
        return view('admin.outlet.index', compact('outlets'));
    }

    public function create()
    {
        return view('admin.outlet.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar'      => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'nama_outlet' => 'required',
            'alamat'      => 'required',
            'no_telp'     => 'required',
            'link_maps'   => 'nullable|url', // 👈 tambahan
        ]);


        $gambar = $request->file('gambar');
        $namaGambar = time().'_'.$gambar->getClientOriginalName();
        $gambar->move(public_path('uploads/outlet'), $namaGambar);

        Outlet::create([
        'gambar'      => $namaGambar,
        'nama_outlet' => $request->nama_outlet,
        'alamat'      => $request->alamat,
        'no_telp'     => $request->no_telp,
        'link_maps'   => $request->link_maps, // 👈 tambahan
    ]);

        return redirect()->route('admin.outlet.index')
            ->with('success', 'Outlet berhasil ditambahkan');
    }

    // ================== EDIT ==================
    public function edit($id)
    {
        $outlet = Outlet::findOrFail($id);
        return view('admin.outlet.edit', compact('outlet'));
    }

    // ================== UPDATE ==================
    public function update(Request $request, $id)
    {
        $outlet = Outlet::findOrFail($id);

       $request->validate([
        'nama_outlet' => 'required',
        'alamat'      => 'required',
        'no_telp'     => 'required',
        'link_maps'   => 'nullable|url', // 👈 tambahan
        'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);


        if ($request->hasFile('gambar')) {
            if ($outlet->gambar && file_exists(public_path('uploads/outlet/'.$outlet->gambar))) {
                unlink(public_path('uploads/outlet/'.$outlet->gambar));
            }

            $gambar = $request->file('gambar');
            $namaGambar = time().'_'.$gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/outlet'), $namaGambar);

            $outlet->gambar = $namaGambar;
        }

       $outlet->update([
            'nama_outlet' => $request->nama_outlet,
            'alamat'      => $request->alamat,
            'no_telp'     => $request->no_telp,
            'link_maps'   => $request->link_maps, // 👈 tambahan
        ]);


        return redirect()->route('admin.outlet.index')
            ->with('success', 'Outlet berhasil diupdate');
    }

    // ================== DELETE ==================
    public function destroy(Outlet $outlet)
    {
        if ($outlet->gambar && file_exists(public_path('uploads/outlet/'.$outlet->gambar))) {
            unlink(public_path('uploads/outlet/'.$outlet->gambar));
        }

        $outlet->delete();

        return redirect()->route('admin.outlet.index')
            ->with('success', 'Outlet berhasil dihapus');
    }
}
