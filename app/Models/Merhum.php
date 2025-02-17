<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class Merhum extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'ad_soyad',
        'dogum_tarihi',
        'olum_tarihi',
        'merhum_gorsel_yolu',
        'mezarlik_gorsel_yolu',
    ];

    protected $casts = [
        'dogum_tarihi' => 'date',
        'olum_tarihi' => 'date',
    ];

    // 📌 Veritabanına direkt kaydedip, sadece görüntülerken d.m.Y formatına çeviriyoruz
    protected function dogumTarihi(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value)->format('d.m.Y') : null
        );
    }

    protected function olumTarihi(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value)->format('d.m.Y') : null
        );
    }
}
