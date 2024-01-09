<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        "blog_resmi",
        "kategori_id",
        "blog_baslik",
        "blog_icerik",

    ];
    public function kategori()
    {
        return $this->hasOne(Category::class, 'id', 'kategori_id');
    }
}
