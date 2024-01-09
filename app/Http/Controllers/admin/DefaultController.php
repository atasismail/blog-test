<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Abone;
use App\Models\Blog;
use App\Models\Category;

class DefaultController extends Controller
{

    public function index()
    {
        $kategori_sayisi = Category::count();
        $blog_sayisi = Blog::count();
        $abone_sayisi = Abone::count();
        return view('admin.components.index', compact('kategori_sayisi', 'blog_sayisi', 'abone_sayisi'));
    }
}
