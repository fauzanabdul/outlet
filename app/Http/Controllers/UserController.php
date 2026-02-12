<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Outlet;
use App\Models\Kategori; // ⬅️ TAMBAH INI
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $produks = Produk::latest()->take(6)->get();
        $kategoris = Kategori::all(); // ⬅️ TAMBAH INI

        return view('dashboard', compact('produks', 'kategoris'));
    }

    public function produk()
    {
        $produks = Produk::latest()->get();
        $kategoris = Kategori::all(); // ⬅️ BIAR NAVBAR AMAN

        return view('produk', compact('produks', 'kategoris'));
    }

    public function outlet()
    {
        $outlets = Outlet::all();
        $kategoris = Kategori::all(); // ⬅️ BIAR NAVBAR AMAN

        return view('outlet', compact('outlets', 'kategoris'));
    }
}
