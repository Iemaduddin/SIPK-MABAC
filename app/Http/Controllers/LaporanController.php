<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function penerima()
    {
        $mahasiswas = Mahasiswa::all();
        return view('laporan.laporan_mahasiswa', compact('mahasiswas'));
    }

    public function cetakMahasiswa()
    {
        $mahasiswas = Mahasiswa::all();
        $pdf = PDF::loadView('laporan.cetak_mahasiswa', compact('mahasiswas'))->setPaper('a4', 'landscape');
        return $pdf->stream('laporan_data_mahasiswa.pdf');
    }

    public function beasiswa()
    {
        $kriterias = Kriteria::all();
        $mahasiswas = Mahasiswa::all();
        return view('laporan.laporan_kriteria_beasiswa', compact('mahasiswas', 'kriterias'));
    }

    public function cetakBeasiswa()
    {
        $kriterias = Kriteria::all();
        $mahasiswas = Mahasiswa::all();
        $pdf = PDF::loadView('laporan.cetak_kriteria_beasiswa', compact('mahasiswas', 'kriterias'));
        return $pdf->stream('Laporan_Kriteria_Penerima_Peminjaman.pdf');
    }

    public function hasil()
    {

        $kriterias = Kriteria::all();
        $mahasiswas = Mahasiswa::get()->sortByDesc('hasil');
        return view('laporan.laporan_hasil', compact('mahasiswas', 'kriterias'));
    }

    public function cetakHasil()
    {
        $mahasiswas = Mahasiswa::all();
        $kriterias = Kriteria::all();
        $pdf = PDF::loadView('laporan.cetak_hasil', compact('mahasiswas', 'kriterias'));
        return $pdf->stream('Laporan_Hasil_Pencapaian_Penerima_Peminjaman.pdf');
    }
}
