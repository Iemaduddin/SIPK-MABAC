<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\Perhitungan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class MabacController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        $mahasiswas = Mahasiswa::all();
        // Mahasiswa pada tahun ini
        //$mahasiswas = Mahasiswa::where('status_berkas', 'diterima')->whereYear('created_at', Carbon::now()->year)->get()->sortByDesc('hasil');

        //dd($mahasiswas, $kriterias);


        // melakukan perulangan untuk mendapatkan data per pegawainya
        foreach ($mahasiswas as $mahasiswa) {
            // melakukan perulangan untuk mendapatkan data per kriteria untuk mencari nilai minimal dan maksimal
            foreach ($kriterias as $kriteria) {
                // Nilai Minimal Dari Setiap kriteria yang dimiliki oleh mahasiswa
                $mininmal = DB::table('subkriterias')
                    ->join('mahasiswa_subkriteria', 'subkriterias.id', '=', 'mahasiswa_subkriteria.subkriteria_id')
                    ->join('kriterias', 'subkriterias.kriteria_id', '=', 'kriterias.id')
                    ->where('kriterias.id', $kriteria->id)
                    ->min('subkriterias.nilai');
                // Nilai Maksimal Dari Setiap kriteria yang dimiliki oleh mahasiswa
                $maksimal = DB::table('subkriterias')
                    ->join('mahasiswa_subkriteria', 'subkriterias.id', '=', 'mahasiswa_subkriteria.subkriteria_id')
                    ->join('kriterias', 'subkriterias.kriteria_id', '=', 'kriterias.id')
                    ->where('kriterias.id', $kriteria->id)
                    ->max('subkriterias.nilai');

                // Update table kriteria untuk menambahkan data minimal dan maksimal kedalam tabel kriteria
                Kriteria::where('id', $kriteria->id)->update([
                    'min' => $mininmal,
                    'max' => $maksimal,
                ]);
            }


            foreach ($mahasiswa->subkriteria as $subkriteria) {
                $mahasiswa->kriteria()->detach($subkriteria->kriteria->id);
                if ($subkriteria->kriteria->jenis == 'benefit') {
                    $mahasiswa->kriteria()->attach($subkriteria->kriteria->id, [
                        'normalisasi' => ($subkriteria->nilai - $subkriteria->kriteria->min) / ($subkriteria->kriteria->max - $subkriteria->kriteria->min),
                        'tertimbang' => ($subkriteria->kriteria->bobot * (($subkriteria->nilai - $subkriteria->kriteria->min) / ($subkriteria->kriteria->max - $subkriteria->kriteria->min))) + $subkriteria->kriteria->bobot,
                        // 'jarak' => $subkriteria->nilai + 10,
                    ]);
                    // dd($mahasiswa->pivot->normalisasi);
                } else {
                    $mahasiswa->kriteria()->attach($subkriteria->kriteria->id, [
                        'normalisasi' => ($subkriteria->nilai - $subkriteria->kriteria->max) / ($subkriteria->kriteria->min - $subkriteria->kriteria->max),
                        'tertimbang' => ($subkriteria->kriteria->bobot * (($subkriteria->nilai - $subkriteria->kriteria->max) / ($subkriteria->kriteria->min - $subkriteria->kriteria->max))) + $subkriteria->kriteria->bobot,
                        // 'jarak' => $subkriteria->nilai + 10,
                    ]);
                }
            }
        }

        // dd(pow(0.001458, 0.2));
        // 0.27086413543423

        // melakukan perhitungan perkiraan batasan
        foreach ($kriterias as $kriteria) {
            $batasan = 1;
            foreach ($kriteria->mahasiswa as $data) {
                // melakukan perhitungan berulang pada setiap kriteria
                $batasan *= $data->pivot->tertimbang;
                $pangkat = 1 / count($mahasiswas);
            }
            Kriteria::where('id', $kriteria->id)->update([
                'batasan' => pow($batasan, $pangkat),
            ]);
        }

        // melakukan perhitungan jarak dari daerah perbatasan
        foreach ($kriterias as $kriteria) {
            foreach ($kriteria->mahasiswa as $mahasiswa) {
                $mahasiswa->kriteria()->updateExistingPivot($kriteria->id, [
                    'jarak' => ($mahasiswa->pivot->tertimbang - $kriteria->batasan),
                ]);
            }
        }

        // menghitungn seluruh nilai setiap pegawai
        foreach ($mahasiswas as $mahasiswa) {
            $hasil = 0;
            foreach ($mahasiswa->kriteria as $kriteria) {
                $hasil += $kriteria->pivot->jarak;
                Mahasiswa::where('id', $mahasiswa->id)->update([
                    'hasil' => $hasil,
                ]);
            }
        }

        // Update Status Kelayakan
        $mahasiswas = $mahasiswas->sortByDesc('hasil')->values()->all();


        $count = 0;
        foreach ($mahasiswas as $mahasiswa) {
            if ($count < 11 && $mahasiswa->status_berkas == 'lulus') {
                $mahasiswa->status_kelayakan = 'layak';
            } else {
                $mahasiswa->status_kelayakan = 'tidak layak';
            }

            $mahasiswa->save();

            $count++;
        }

        return view('operator.hitung.index', compact('mahasiswas', 'kriterias'));
    }
}
