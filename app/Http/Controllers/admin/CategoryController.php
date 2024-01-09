<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::paginate(10);
        return view('admin.components.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.components.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_adi' => 'required',
        ]);



        $islem = Category::create(
            [
                "kategori_adi" => $request->kategori_adi,
            ]
        );

        if ($islem) {
            return redirect(route('category.index'))->with('success', 'Kategori Başarıyla Eklendi');
        } else {
            return back()->with('error', 'Kategori Eklenirken Hata Oldu');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Category::find($id);
        return view('admin.components.category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori_adi' => 'required',
        ]);


        $urunler = Category::Where('id', $id)->update(
            [
                "kategori_adi" => $request->kategori_adi,
            ]
        );


        if ($urunler) {


            return back()->with('success', 'İşlem Başarılı');
        }
        return back()->with('error', 'İşlem Başarısız');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sections = Category::find(intval($id));
        if ($sections->delete()) {
            return back()->with('success', 'Silme İşlem Başarılı');
        } else {
            return back()->with('error', 'Silme İşlem Başarısız');
        }
    }
}
