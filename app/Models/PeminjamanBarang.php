<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBarang extends Model
{
    use HasFactory;
    protected $table = "peminjaman_barang";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function peminjaman() {
        return $this->belongsTo(Peminjaman::class);
    }

    public function barang() {
        return $this->belongsTo(Barang::class);
    }
}
