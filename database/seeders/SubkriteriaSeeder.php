<?php

namespace Database\Seeders;

use App\Models\Subkriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subkriterias = [
            ['kriteria_id' => 1, 'subkriteria' => '2,75 - 2,99', 'nilai' => 0.2],
            ['kriteria_id' => 1, 'subkriteria' => '3,00 - 3,30', 'nilai' => 0.5],
            ['kriteria_id' => 1, 'subkriteria' => '3,31 - 3,70', 'nilai' => 0.8],
            ['kriteria_id' => 1, 'subkriteria' => '> 3,70', 'nilai' => 1.0],
            ['kriteria_id' => 2, 'subkriteria' => 'Semester 1', 'nilai' => 0.3],
            ['kriteria_id' => 2, 'subkriteria' => 'Semester 2', 'nilai' => 0.4],
            ['kriteria_id' => 2, 'subkriteria' => 'Semester 3', 'nilai' => 0.5],
            ['kriteria_id' => 2, 'subkriteria' => 'Semester 4', 'nilai' => 0.6],
            ['kriteria_id' => 2, 'subkriteria' => 'Semester 5', 'nilai' => 0.7],
            ['kriteria_id' => 2, 'subkriteria' => 'Semester 6', 'nilai' => 0.8],
            ['kriteria_id' => 2, 'subkriteria' => 'Semester 7', 'nilai' => 0.9],
            ['kriteria_id' => 2, 'subkriteria' => 'Semester 8', 'nilai' => 1.0],
            ['kriteria_id' => 3, 'subkriteria' => '< 1 Jt', 'nilai' => 0.2],
            ['kriteria_id' => 3, 'subkriteria' => '1 Jt - 1,5 Jt', 'nilai' => 0.4],
            ['kriteria_id' => 3, 'subkriteria' => '1,6 Jt - 2 Jt', 'nilai' => 0.6],
            ['kriteria_id' => 3, 'subkriteria' => '2,1 Jt - 2,5 Jt', 'nilai' => 0.8],
            ['kriteria_id' => 3, 'subkriteria' => '> 2,5 Jt', 'nilai' => 1.0],
            ['kriteria_id' => 4, 'subkriteria' => '> 2,5 Jt', 'nilai' => 0.2],
            ['kriteria_id' => 4, 'subkriteria' => '2,1 Jt - 2,5 Jt', 'nilai' => 0.4],
            ['kriteria_id' => 4, 'subkriteria' => '1,6 Jt - 2 Jt', 'nilai' => 0.6],
            ['kriteria_id' => 4, 'subkriteria' => '1 Jt - 1,5 Jt', 'nilai' => 0.8],
            ['kriteria_id' => 4, 'subkriteria' => '< 1 Jt', 'nilai' => 1.0],
            ['kriteria_id' => 5, 'subkriteria' => '1 Orang', 'nilai' => 0.2],
            ['kriteria_id' => 5, 'subkriteria' => '2 Orang', 'nilai' => 0.4],
            ['kriteria_id' => 5, 'subkriteria' => '3 Orang', 'nilai' => 0.6],
            ['kriteria_id' => 5, 'subkriteria' => '4 Orang', 'nilai' => 0.8],
            ['kriteria_id' => 5, 'subkriteria' => '5 Orang', 'nilai' => 1.0],
        ];

        foreach ($subkriterias as $subkriteria) {
            Subkriteria::create($subkriteria);
        }
    }
}
