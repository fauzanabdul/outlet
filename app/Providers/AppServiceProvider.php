<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // ⬅️ INI WAJIB
use App\Models\Kategori;              // ⬅️ DAN INI

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer(['dashboard', 'produk', 'outlet'], function ($view) {
            $view->with('kategoris', Kategori::all());
        });
    }
}
