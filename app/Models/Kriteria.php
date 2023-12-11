<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode', 'kriteria', 'jenis', 'bobot', 'min', 'max', 'batasan'
    ];

    public function subkriteria()
    {
        return $this->hasMany(Subkriteria::class);
    }

    public function perhitungan()
    {
        return $this->hasMany(Perhitungan::class);
    }

    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class, 'kriteria_mahasiswa')->withPivot('normalisasi', 'tertimbang', 'jarak');
    }
}
