<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Outlet;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $produks = Produk::latest()->take(6)->get();

        return view('dashboard', compact('produks'));
    }


    public function produk()
    {
        $produks = Produk::latest()->get();
        return view('produk', compact('produks'));
    }

    public function outlet()
{
    $outlets = Outlet::paginate(10);
    return view('outlet', compact('outlets'));
}
}
