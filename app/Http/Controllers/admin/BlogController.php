<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Abone;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Blog::with('kategori')->paginate(10);

        return view('admin.components.blog.index ', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::all();
        return view('admin.components.blog.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $email = Abone::all();
        $request->validate([
            'blog_resmi' => 'required|image|mimes:jpg,jpeg,png,webp|max:4000',
            'kategori_id' => 'required',
            'blog_baslik' => 'required',
            'blog_icerik' => 'required',
        ]);



        $resim = uniqid() . '.' . $request->blog_resmi->getClientOriginalExtension();
        $request->blog_resmi->move(public_path('cdn/images/'), $resim);



        $islem = Blog::create(
            [
                "kategori_id" => $request->kategori_id,
                'blog_resmi' => $resim,
                'blog_baslik' => $request->blog_baslik,
                'blog_icerik' => $request->blog_icerik,

            ]
        );

        if ($islem) {
            if (count($email) > 0) {
                foreach ($email as $mail) {
                    sendEmail($mail->email, [
                        'blog_resmi' => $resim,
                        'blog_baslik' => $request->blog_baslik,
                        'blog_icerik' => $request->blog_icerik,
                    ]);
                }
            }

            return redirect(route('blog.index'))->with('success', 'Blog Ekleme Başarılı');
        } else {
            return back()->with('error', 'Blog Eklenirken Hata Oldu');
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
        $data['kategori'] = Category::all();
        $data['blog'] = Blog::find($id);
        return view('admin.components.blog.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori_id' => 'required',
            'blog_baslik' => 'required',
            'blog_icerik' => 'required',
        ]);


        if ($request->hasFile('blog_resmi')) {
            $request->validate([
                'blog_resmi' => 'image|mimes:jpg,jpeg,png,svg,webp|max:4000',
            ]);


            $resim = dosyayukle($request->urun_resmi, '/cdn/images/');
            $path = public_path('cdn/images/' . $request->old_file);
            if (file_exists($path)) {
                @unlink($path);
            }

            $urunler = Blog::Where('id', $id)->update(
                [
                    "kategori_id" => $request->kategori_id,
                    'blog_resmi' => $resim,
                    'blog_baslik' => $request->blog_baslik,
                    'blog_icerik' => $request->blog_icerik,
                ]
            );


            if ($urunler) {


                return back()->with('success', 'İşlem Başarılı');
            }
            return back()->with('error', 'İşlem Başarısız');
        } else {
            $urunler = Blog::Where('id', $id)->update(
                [
                    "kategori_id" => $request->kategori_id,
                    'blog_baslik' => $request->blog_baslik,
                    'blog_icerik' => $request->blog_icerik,
                ]
            );

            if ($urunler) {
                return back()->with('success', 'İşlem Başarılı');
            }
            return back()->with('error', 'İşlem Başarısız');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sections = Blog::find(intval($id));
        if ($sections->delete()) {

            $path = 'cdn/images/' . $sections->blog_resmi;
            if (file_exists(public_path($path))) {
                @unlink(public_path($path));
            }
            return back()->with('success', 'Silme İşlem Başarılı');
        } else {
            return back()->with('error', 'Silme İşlem Başarısız');
        }
    }
}
