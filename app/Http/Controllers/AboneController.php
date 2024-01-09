<?php

namespace App\Http\Controllers;

use App\Models\Abone;
use Illuminate\Http\Request;

class AboneController extends Controller
{
    public function index()
    {
        return view('public.components.abone');
    }
    function aboneol(Request $request)
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
                return redirect(route('abone'))->with('success', 'Takip İşlemi Başarılı');
            } else {
                return back()->with('error', 'Takip İşlemi Başarısız');
            }
        }
    }
}
