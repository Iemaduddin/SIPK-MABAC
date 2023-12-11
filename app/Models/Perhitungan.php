<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Perhitungan extends Pivot
{
    protected $table = 'kriteria_mahasiswa'; // Specify the table name if it's different from the default

    protected $fillable = [
        'normalisasi', 'tertimbang', 'jarak',
    ];

    // Define the relationships with Kriteria and Mahasiswa
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
