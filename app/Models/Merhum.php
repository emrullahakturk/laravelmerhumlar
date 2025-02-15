<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Merhum extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad_soyad',
        'dogum_tarihi',
        'olum_tarihi',
        'merhum_gorsel_yolu',
        'mezarlik_gorsel_yolu',
    ];
}
