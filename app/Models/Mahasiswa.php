<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'nik', 'email', 'tempat_lahir', 'tanggal_lahir', 'jk',
        'foto', 'province', 'city', 'district', 'village', 'alamat', 'no_hp', 'username', 'password', 'about',
        'status_berkas', 'status_kelayakan', 'hasil'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function subkriteria()
    {
        return $this->belongsToMany(Subkriteria::class, 'mahasiswa_subkriteria');
    }

    public function kriteria()
    {
        return $this->belongsToMany(Kriteria::class, 'kriteria_mahasiswa')->withPivot('normalisasi', 'tertimbang', 'jarak');
    }

    public function berkas()
    {
        return $this->hasOne(BerkasPribadi::class);
    }
}
