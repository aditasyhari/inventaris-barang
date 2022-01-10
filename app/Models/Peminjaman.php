<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = "peminjaman";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function peminjaman_barang() {
        return $this->hasMany(PeminjamanBarang::class);
    }
}
