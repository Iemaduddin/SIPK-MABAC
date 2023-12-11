<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasPribadi extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'surat_permohonan',
        'ktp',
        'kk',
        'kta',
        'npwp',
        'pernyataan_peminjaman',
        'berkas_jaminan',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
