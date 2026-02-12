<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'kategoris' => Kategori::all(),
            'produks'   => Produk::latest()->take(6)->get(), // biar ga berat
        ]);
    }
}
