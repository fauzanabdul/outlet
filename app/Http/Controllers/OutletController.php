<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Tampilkan daftar outlet
     */
    public function index()
    {
        return view('admin.outlet.index');
    }

    /**
     * Tampilkan form tambah outlet
     */
    public function create()
    {
        return view('admin.outlet.create');
    }

    /**
     * Simpan data outlet
     */
    public function store(Request $request)
    {
        // nanti isi kalau outlet sudah ada tabelnya
        return back();
    }

    /**
     * Tampilkan form edit outlet
     */
    public function edit($id)
    {
        return view('admin.outlet.edit');
    }

    /**
     * Update data outlet
     */
    public function update(Request $request, $id)
    {
        // nanti isi
        return back();
    }

    /**
     * Hapus outlet
     */
    public function destroy($id)
    {
        // nanti isi
        return back();
    }
}
