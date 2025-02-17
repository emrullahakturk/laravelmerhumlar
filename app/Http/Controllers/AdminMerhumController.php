<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merhum;
use Illuminate\Support\Facades\Storage;


class AdminMerhumController extends Controller
{
    /**
     * Tüm merhumları listeleme
     */
    public function index()
    {
        $merhumlar = Merhum::all();
        return view('admin.merhumlar.index', compact('merhumlar'));
    }

    /**
     * Yeni merhum oluşturma sayfası
     */
    public function create()
    {
        return view('admin.merhumlar.create');
    }

    /**
     * Yeni merhum kaydetme işlemi
     */
    public function store(Request $request)
{
    $request->validate([
        'ad_soyad' => 'required|string|max:255',
        'dogum_tarihi' => 'nullable|date',
        'olum_tarihi' => 'required|date',
        'merhum_gorsel_yolu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'mezarlik_gorsel_yolu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $merhum = new Merhum($request->except(['merhum_gorsel_yolu', 'mezarlik_gorsel_yolu']));

    if ($request->hasFile('merhum_gorsel_yolu')) {
        $merhum->merhum_gorsel_yolu = $request->file('merhum_gorsel_yolu')->store('merhumlar', 'public');
    }

    if ($request->hasFile('mezarlik_gorsel_yolu')) {
        $merhum->mezarlik_gorsel_yolu = $request->file('mezarlik_gorsel_yolu')->store('mezarliklar', 'public');
    }

    $merhum->save();
    return redirect()->route('admin.merhumlar.index')->with('success', 'Merhum başarıyla eklendi.');
}


    /**
     * Merhum güncelleme sayfası
     */
    public function edit($id)
    {
        $merhum = Merhum::findOrFail($id);
        return view('admin.merhumlar.edit', compact('merhum'));
    }

    /**
     * Merhum güncelleme işlemi
     */
    public function update(Request $request, $id)
{
    $merhum = Merhum::findOrFail($id);

    $request->validate([
        'ad_soyad' => 'required|string|max:255',
        'dogum_tarihi' => 'nullable|date',
        'olum_tarihi' => 'required|date',
        'merhum_gorsel_yolu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'mezarlik_gorsel_yolu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $merhum->update($request->except(['merhum_gorsel_yolu', 'mezarlik_gorsel_yolu']));

    if ($request->hasFile('merhum_gorsel_yolu')) {
        if ($merhum->merhum_gorsel_yolu && Storage::disk('public')->exists($merhum->merhum_gorsel_yolu)) {
            Storage::disk('public')->delete($merhum->merhum_gorsel_yolu);
        }
        $merhum->merhum_gorsel_yolu = $request->file('merhum_gorsel_yolu')->store('merhumlar', 'public');
    }

    if ($request->hasFile('mezarlik_gorsel_yolu')) {
        if ($merhum->mezarlik_gorsel_yolu && Storage::disk('public')->exists($merhum->mezarlik_gorsel_yolu)) {
            Storage::disk('public')->delete($merhum->mezarlik_gorsel_yolu);
        }
        $merhum->mezarlik_gorsel_yolu = $request->file('mezarlik_gorsel_yolu')->store('mezarliklar', 'public');
    }

    $merhum->save();
    return redirect()->route('admin.merhumlar.index')->with('success', 'Merhum başarıyla güncellendi.');
}


    /**
     * Merhum silme işlemi
     */
    public function destroy($id)
    {
        $merhum = Merhum::findOrFail($id);

        // **1️⃣ Merhum Görselini Sil**
    if ($merhum->merhum_gorsel_yolu && Storage::disk('public')->exists($merhum->merhum_gorsel_yolu)) {
        Storage::disk('public')->delete($merhum->merhum_gorsel_yolu);
    }

    // **2️⃣ Mezar Taşı Görselini Sil**
    if ($merhum->mezarlik_gorsel_yolu && Storage::disk('public')->exists($merhum->mezarlik_gorsel_yolu)) {
        Storage::disk('public')->delete($merhum->mezarlik_gorsel_yolu);
    }
        $merhum->delete();

        return redirect()->route('admin.merhumlar.index')->with('success', 'Merhum başarıyla silindi.');
    }
}
