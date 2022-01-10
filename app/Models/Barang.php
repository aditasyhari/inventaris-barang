<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barang";
    protected $primaryKey = "id";
    protected $guarded = [];

    function delete_image()
    {
        if ($this->foto && file_exists(public_path('image/barang/' . $this->foto)))
            return unlink(public_path('image/barang/' . $this->foto));
    }

    public function peminjaman_barang() {
        return $this->hasMany(PeminjamanBarang::class);
    }
}
