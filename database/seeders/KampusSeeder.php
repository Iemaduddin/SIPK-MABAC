<?php

namespace Database\Seeders;

use App\Models\Kampus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //     IAIN Sultan Amai Gorontalo
        // - Politeknik Kesehatan Kementerian Kesehatan Gorontalo (POLKESGO)
        // - Universitas Negeri Gorontalo
        // - Universitas Bina Mandiri Gorontalo
        // - Universitas Bina Taruna Gorontalo
        // - Universitas Gorontalo
        // - Universitas Ichsan Gorontalo
        // - Universitas Nahdlatul Ulama Gorontalo
        // - Universitas Pohuwato
        // - Universitas Muhammadiyah Gorontalo
        // - Politeknik Gorontalo
        // - Akademi Komputer Mall Cendikia Gorontalo
        // - STMIK Ichsan Gorontalo
        // - STIE Ichsan Gorontalo
        // - STIE Bina Taruna Gorontalo
        // - STIA Bina Taruna Gorontalo
        $kampus = [
            [
                'kampus' => "IAIN Sultan Amai Gorontalo"
            ],
            [
                'kampus' => "Politeknik Kesehatan Kementerian Kesehatan Gorontalo (POLKESGO)"
            ],
            [
                'kampus' => "Universitas Negeri Gorontalo"
            ],
            [
                'kampus' => "Universitas Bina Mandiri Gorontalo"
            ],
            [
                'kampus' => "Universitas Bina Taruna Gorontalo"
            ],
            [
                'kampus' => "Universitas Gorontalo"
            ],
            [
                'kampus' => "Universitas Ichsan Gorontalo"
            ],
            [
                'kampus' => "Universitas Nahdlatul Ulama Gorontalo"
            ],
            [
                'kampus' => "Universitas Pohuwato"
            ],
            [
                'kampus' => "Universitas Muhammadiyah Gorontalo"
            ],
            [
                'kampus' => "Politeknik Gorontalo"
            ],
            [
                'kampus' => "Akademi Komputer Mall Cendikia Gorontalo"
            ],
            [
                'kampus' => "STMIK Ichsan Gorontalo"
            ],
            [
                'kampus' => "STIE Ichsan Gorontalo"
            ],
            [
                'kampus' => "STIE Bina Taruna Gorontalo"
            ],
            [
                'kampus' => "STIA Bina Taruna Gorontalo"
            ],
        ];

        foreach ($kampus as $data) {
            Kampus::create($data);
        }
    }
}
