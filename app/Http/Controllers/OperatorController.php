<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\Operator;
use App\Models\Subkriteria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

// dependent-dropdown
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class OperatorController extends Controller
{
    public function beasiswa()
    {
        $kriterias = Kriteria::all();
        $mahasiswas = Mahasiswa::all();
        return view('operator.penerima_beasiswa', compact('mahasiswas', 'kriterias'));
    }

    // Verifikasi Berkas
    public function storeVerifikasi(Request $request)
    {

        $mahasiswa = Mahasiswa::findOrFail($request->mahasiswa_id);
        $mahasiswa->update([
            'status_berkas' => $request->status_berkas
        ]);
        toast('Berkas Berhasil Diverifikasi', 'success');
        return redirect()->back();
    }
    public function reupload($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $file = public_path('storage/mahasiswa/beasiswa/' . $mahasiswa->berkas_beasiswa);

        if (File::exists($file)) {
            File::delete($file);
            $mahasiswa->berkas_beasiswa = null;
            $mahasiswa->save();
        }
        return redirect()->back();
    }
    public function reuploadDataPribadi($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $file = public_path('storage/mahasiswa/pribadi/' . $mahasiswa->berkas_pribadi);

        if (File::exists($file)) {
            File::delete($file);
            $mahasiswa->berkas_pribadi = null;
            $mahasiswa->save();
        }
        return redirect()->back();
    }

    public function detail($mahasiswa_id)
    {
        $mahasiswa = Mahasiswa::where('id', $mahasiswa_id)->with('subkriteria')->first();
        $subkriterias = $mahasiswa->subkriteria;
        return view('operator.detail_penerima', compact('mahasiswa', 'subkriterias'));
    }

    public function mahasiswa()
    {
        $mahasiswas = Mahasiswa::all();

        // Ambil data provinsi
        $provinces = Province::pluck('name', 'code');
        return view('operator.list_mahasiswa',  compact('mahasiswas', 'provinces'));
    }

    public function getCity(Request $request)
    {
        // Ambil data kota berdasarkan kode provinsi
        $cities = City::where('province_code', $request->get('code'))->pluck('name', 'code');

        // Kirim data JSON sebagai respons
        return response()->json($cities);
    }

    public function getDistrict(Request $request)
    {
        // Ambil data kecamatan berdasarkan kode kota
        $districts = District::where('city_code', $request->get('code'))->pluck('name', 'code');

        // Kirim data JSON sebagai respons
        return response()->json($districts);
    }

    public function getVillage(Request $request)
    {
        // Ambil data desa berdasarkan kode kecamatan
        $villages = Village::where('district_code', $request->get('code'))->pluck('name', 'code');

        // Kirim data JSON sebagai respons
        return response()->json($villages);
    }

    public function index()
    {
        $operators = Operator::all();
        return view('operator.index', compact('operators'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|unique:operators',
            'username' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);

        $email = Operator::where('email', $request->email)->first();
        $username = User::where('username', $request->username)->first();
        if ($username || $email) {
            if ($validator->fails()) {
                toast('Email atau Username sudah Ada', 'info');
                return back();
            }
        }

        $operator = new Operator();
        $operator->nama = $request->nama;
        $operator->email = $request->email;
        $operator->username = $request->username;
        $operator->password = Hash::make($request->password);
        $operator->role = $request->role;
        $operator->no_hp = $request->no_hp;
        $operator->save();

        $user = new User();
        $user->operator_id = $operator->id;
        $user->username = $operator->username;
        $user->password = Hash::make($request->password);
        $user->role = $operator->role;
        $user->save();

        return back();
    }

    public function update(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'username'
        // ])
        $petugas = Operator::findOrFail($id);
        $username = Operator::where('username', $request->username)->where('id', '!=', $petugas->id)->first();
        if ($username) {
            toast('Username Sudah Ada', 'info');
            return back();
        }
        $petugas->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
        ]);

        $user = User::where('operator_id', $petugas->id)->first();
        $user->update([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        toast('Berhasil Update Data', 'success');
        return back();
    }

    public function destroy($id)
    {
        Operator::destroy($id);
        return redirect()->route('petugas.index');
    }

    public function download($mahasiswa_id)
    {
        $mahasiswa = Mahasiswa::findOrFail($mahasiswa_id);
        $zip = new ZipArchive;
        $fileName = 'storage/mahasiswa/berkas/' . 'Berkas Peminjaman Koperasi' . '_' . $mahasiswa->nama  . '.zip';

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {
            $files = File::allFiles(public_path('storage/mahasiswa/berkas/' . $mahasiswa->nama . '/'));

            foreach ($files as $file => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
            $zip->close();
        }
        return response()->download(public_path($fileName));
    }
    // Filter Data Pertahun
    public function filter(Request $request)
    {
        if ($request->tahun == 'all') {
            // $mahasiswa = Mahasiswa::all();
            return redirect()->route('operator.mahasiswa');
        }

        $mahasiswas = Mahasiswa::whereYear('created_at', $request->tahun)->get();

        return view('operator.list_mahasiswa', compact('mahasiswas'));
    }



    public function hapus()
    {
        $tahun = request()->input('tahun');
        Mahasiswa::whereYear('created_at', $tahun)->delete();

        return redirect()->route('operator.mahasiswa')->with('success', 'Data mahasiswa yang difilter berhasil dihapus.');
    }
}