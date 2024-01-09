<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    function index()
    {
        $data['blog'] = Blog::with('kategori')->paginate(10);
        $data['category'] = Category::all();

        return view('public.components.index', compact('data'));
    }

    function kategori($id)
    {
        $data['category'] = Category::all();

        // Paginate the 'bloglar' relationship directly
        $kategori = Category::with('bloglar')->where('id', $id)->firstOrFail();
        $data['blog'] = $kategori->bloglar()->paginate(10);

        return view('public.components.index', compact('data'));
    }
}
