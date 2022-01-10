<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = "profile";
    protected $primaryKey = "id";
    protected $guarded = [];

    function delete_image()
    {
        if ($this->foto && file_exists(public_path('image/profile/' . $this->foto)))
            return unlink(public_path('image/profile/' . $this->foto));
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
