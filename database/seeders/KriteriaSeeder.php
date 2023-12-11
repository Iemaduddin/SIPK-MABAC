<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriterias = [
            ['kode' => 'C1', 'kriteria' => 'IPK', 'jenis' => 'benefit', 'bobot' => 0.3],
            ['kode' => 'C2', 'kriteria' => 'Semester', 'jenis' => 'benefit', 'bobot' => 0.2],
            ['kode' => 'C3', 'kriteria' => 'SPP / UKT', 'jenis' => 'benefit', 'bobot' => 0.2],
            ['kode' => 'C4', 'kriteria' => 'Pendapatan Orang Tua', 'jenis' => 'cost', 'bobot' => 0.15],
            ['kode' => 'C5', 'kriteria' => 'Tanggungan Orang Tua', 'jenis' => 'cost', 'bobot' => 0.15],
        ];

        foreach ($kriterias as $kriteria) {
            Kriteria::create($kriteria);
        }
    }
}
