<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merhum;

class MerhumController extends Controller
{
    // Tüm merhumları listeleyen fonksiyon
    public function index()
    {
        $merhumlar = Merhum::orderBy('olum_tarihi', 'desc')->paginate(20);
        return view('merhumlarimiz', compact('merhumlar'));
    }

    // Belirli bir merhumun detaylarını gösteren fonksiyon
    public function show($id)
    {
        $merhum = Merhum::findOrFail($id);
        return view('merhum-detay', compact('merhum'));
    }
}
