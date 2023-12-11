<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'kriteria_id', 'subkriteria', 'nilai'
    ];
    

    public function kriteria() 
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class, 'mahasiswa_subkriteria');
    }
}
