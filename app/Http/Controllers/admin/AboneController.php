<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Abone;
use Illuminate\Http\Request;

class AboneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Abone::paginate(10);
        return view('admin.components.abone.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.components.abone.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        if (Abone::where('email', $request->email)->first()) {
            return back()->with('error', "Daha önceden takip yapılmış");
        } else {
            $islem = Abone::create(
                [
                    "email" => $request->email,
                ]
            );
            if ($islem) {
                return redirect(route('takip.index'))->with('success', 'Başarıyla Eklendi');
            } else {
                return back()->with('error', 'Ekleme İşlemi Başarısız');
            }
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
        $data = Abone::find($id);
        return view('admin.components.abone.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'email' => 'required',
        ]);


        $urunler = Abone::Where('id', $id)->update(
            [
                "email" => $request->email,
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
        $sections = Abone::find(intval($id));
        if ($sections->delete()) {
            return back()->with('success', 'Silme İşlem Başarılı');
        } else {
            return back()->with('error', 'Silme İşlem Başarısız');
        }
    }
}
