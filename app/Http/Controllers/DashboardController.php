<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Outlet;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalKategori' => Kategori::count(),
            'totalProduk'   => Produk::count(),
            'totalOutlet'   => Outlet::count(),
        ]);
    }
}
