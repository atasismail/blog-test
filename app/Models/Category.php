<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        "kategori_adi",

    ];
    public function bloglar()
    {
        return $this->hasMany(Blog::class,  'kategori_id', 'id');
    }
}
