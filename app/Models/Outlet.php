<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $fillable = [
    'gambar',
    'nama_outlet',
    'alamat',
    'no_telp',
    'link_maps',
];

}
