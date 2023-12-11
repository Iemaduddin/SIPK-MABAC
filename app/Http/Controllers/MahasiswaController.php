<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\Perhitungan;
use App\Models\Subkriteria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\BerkasPribadi;
use Illuminate\Support\Facades\Storage;

// dependent-dropdown
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class MahasiswaController extends Controller
{
    // UPDATE PROFILE ATAU BIODATA MAHASISWA
    public function store(Request $request, $mahasiswa_id)
    {
        $mahasiswa = Mahasiswa::where('id', $mahasiswa_id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nik' => 'required|unique:mahasiswas',
            'email' => 'required|unique:mahasiswas',
            'username' => 'required|unique:mahasiswas',
            'password' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'village' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'surat_permohonan' => 'required|file|mimes:pdf',
            'ktp' => 'required|file|mimes:pdf',
            'kk' => 'required|file|mimes:pdf',
            'kta' => 'required|file|mimes:pdf',
            'npwp' => 'file|mimes:pdf',
            'pernyataan_peminjaman' => 'required|file|mimes:pdf',
            'berkas_jaminan' => 'file',
        ]);
        $provinceName = Province::where('code', $request->province)->pluck('name')->first();
        $cityName = City::where('code', $request->city)->pluck('name')->first();
        $districtName = District::where('code', $request->district)->pluck('name')->first();
        $villageName = Village::where('code', $request->village)->pluck('name')->first();

        $username = Mahasiswa::where('username', $request->username)->where('id', '!=', $mahasiswa_id)->first();
        $nik = Mahasiswa::where('nik', $request->nik)->where('id', '!=', $mahasiswa_id)->first();
        $email = Mahasiswa::where('email', $request->email)->where('id', '!=', $mahasiswa_id)->first();

        if ($nik || $email || $username) {
            if ($validator->fails()) {
                toast('Email atau Username atau NIK sudah ada', 'info');
                return back();
            }
        }
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $file = $request->file('foto');
            // Ambil nama mahasiswa atau informasi unik lainnya yang dapat digunakan sebagai nama folder
            $mahasiswaName = Mahasiswa::where('id', $mahasiswa_id)->pluck('nama')->first();

            $fileName = time() . '.' . $mahasiswaName . $file->getClientOriginalName();
            // Buat folder jika belum ada
            $folderPath = 'mahasiswa/foto/' . $mahasiswaName;

            // Simpan file dalam folder yang sesuai
            $file->storeAs($folderPath, $fileName, 'public');

            // Simpan nama file foto ke dalam database
            $mahasiswa->update(['foto' => $folderPath . '/' . $fileName]);
        }

        if ($request->hasFile('surat_permohonan')) {
            $request->validate([
                'surat_permohonan' => 'file|mimes:pdf',
            ]);

            $file = $request->file('surat_permohonan');
            // Ambil nama mahasiswa atau informasi unik lainnya yang dapat digunakan sebagai nama folder
            $mahasiswaName = Mahasiswa::where('id', $mahasiswa_id)->pluck('nama')->first();
            $fileName = time() . '.' . $mahasiswaName . '.' . $file->getClientOriginalName();
            // Buat folder jika belum ada
            $folderPath = 'mahasiswa/berkas/' . $mahasiswaName . '/surat_permohonan/';

            // Simpan file dalam folder yang sesuai
            $file->storeAs($folderPath, $fileName, 'public');

            // Simpan nama file foto ke dalam database
            $mahasiswa->update(['surat_permohonan' => $folderPath . '/' . $fileName]);
        }
        if ($request->hasFile('ktp')) {
            $request->validate([
                'ktp' => 'file|mimes:pdf,jpeg,png,jpg,gif,svg',
            ]);

            $file = $request->file('ktp');

            // Ambil nama mahasiswa atau informasi unik lainnya yang dapat digunakan sebagai nama folder
            $mahasiswaName = Mahasiswa::where('id', $mahasiswa_id)->pluck('nama')->first();
            $fileName = time() . '.' . $mahasiswaName . '.' . $file->getClientOriginalName();
            // Buat folder jika belum ada
            $folderPath = 'mahasiswa/berkas/' . $mahasiswaName . '/ktp/';

            // Simpan file dalam folder yang sesuai
            $file->storeAs($folderPath, $fileName, 'public');

            // Simpan nama file foto ke dalam database
            $mahasiswa->update(['ktp' => $folderPath . '/' . $fileName]);
        }
        if ($request->hasFile('kk')) {
            $request->validate([
                'kk' => 'file|mimes:pdf,jpeg,png,jpg,gif,svg',
            ]);

            $file = $request->file('kk');
            // Ambil nama mahasiswa atau informasi unik lainnya yang dapat digunakan sebagai nama folder
            $mahasiswaName = Mahasiswa::where('id', $mahasiswa_id)->pluck('nama')->first();
            $fileName = time() . '.' . $mahasiswaName . '.'  . $file->getClientOriginalName();
            // Buat folder jika belum ada
            $folderPath = 'mahasiswa/berkas/' . $mahasiswaName . '/kk/';

            // Simpan file dalam folder yang sesuai
            $file->storeAs($folderPath, $fileName, 'public');

            // Simpan nama file foto ke dalam database
            $mahasiswa->update(['kk' => $folderPath . '/' . $fileName]);
        }
        if ($request->hasFile('kta')) {
            $request->validate([
                'kta' => 'file|mimes:pdf,jpeg,png,jpg,gif,svg',
            ]);

            $file = $request->file('kta');
            // Ambil nama mahasiswa atau informasi unik lainnya yang dapat digunakan sebagai nama folder
            $mahasiswaName = Mahasiswa::where('id', $mahasiswa_id)->pluck('nama')->first();
            $fileName = time() . '.' . $mahasiswaName . '.' . $file->getClientOriginalName();
            // Buat folder jika belum ada
            $folderPath = 'mahasiswa/berkas/' . $mahasiswaName . '/kta/';

            // Simpan file dalam folder yang sesuai
            $file->storeAs($folderPath, $fileName, 'public');

            // Simpan nama file foto ke dalam database
            $mahasiswa->update(['kta' => $folderPath . '/' . $fileName]);
        }
        if ($request->hasFile('npwp')) {
            $request->validate([
                'npwp' => 'file|mimes:pdf,jpeg,png,jpg,gif,svg',
            ]);

            $file = $request->file('npwp');

            // Ambil nama mahasiswa atau informasi unik lainnya yang dapat digunakan sebagai nama folder
            $mahasiswaName = Mahasiswa::where('id', $mahasiswa_id)->pluck('nama')->first();
            $fileName = time() . '.' . $mahasiswaName . '.'  . $file->getClientOriginalName();
            // Buat folder jika belum ada
            $folderPath = 'mahasiswa/berkas/' . $mahasiswaName . '/npwp/';

            // Simpan file dalam folder yang sesuai
            $file->storeAs($folderPath, $fileName, 'public');

            // Simpan nama file foto ke dalam database
            $mahasiswa->update(['npwp' => $folderPath . '/' . $fileName]);
        }
        if ($request->hasFile('pernyataan_peminjaman')) {
            $request->validate([
                'pernyataan_peminjaman' => 'file|mimes:pdf',
            ]);

            $file = $request->file('pernyataan_peminjaman');
            // Ambil nama mahasiswa atau informasi unik lainnya yang dapat digunakan sebagai nama folder
            $mahasiswaName = Mahasiswa::where('id', $mahasiswa_id)->pluck('nama')->first();
            $fileName = time() . '.' . $mahasiswaName . '.'  . $file->getClientOriginalName();
            // Buat folder jika belum ada
            $folderPath = 'mahasiswa/berkas/' . $mahasiswaName . '/pernyataan_peminjaman/';

            // Simpan file dalam folder yang sesuai
            $file->storeAs($folderPath, $fileName, 'public');

            // Simpan nama file foto ke dalam database
            $mahasiswa->update(['pernyataan_peminjaman' => $folderPath . '/' . $fileName]);
        }
        if ($request->hasFile('berkas_jaminan')) {
            $request->validate([
                'berkas_jaminan' => 'file|mimes:pdf',
            ]);

            $file = $request->file('berkas_jaminan');

            // Ambil nama mahasiswa atau informasi unik lainnya yang dapat digunakan sebagai nama folder
            $mahasiswaName = Mahasiswa::where('id', $mahasiswa_id)->pluck('nama')->first();
            $fileName = time() . '.' . $mahasiswaName . '.' . $file->getClientOriginalName();
            // Buat folder jika belum ada
            $folderPath = 'mahasiswa/berkas/' . $mahasiswaName . '/berkas_jaminan/';

            // Simpan file dalam folder yang sesuai
            $file->storeAs($folderPath, $fileName, 'public');

            // Simpan nama file foto ke dalam database
            $mahasiswa->update(['berkas_jaminan' => $folderPath . '/' . $fileName]);
        }

        if ($request->password != null) {
            $mahasiswa->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'email' => $request->email,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'username' => $request->username,
                'password' => $request->password,
                'jk' => $request->jk,
                'about' => $request->about,
                'province' => $provinceName,
                'city' => $cityName,
                'district' => $districtName,
                'village' => $villageName,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
            ]);

            $user = User::where('mahasiswa_id', $mahasiswa_id)->first();
            $user->update([
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
        } else {
            $mahasiswa->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'email' => $request->email,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'username' => $request->username,
                'password' => $request->password,
                'jk' => $request->jk,
                'about' => $request->about,
                'province' => $provinceName,
                'city' => $cityName,
                'district' => $districtName,
                'village' => $villageName,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
            ]);
            $user = User::where('mahasiswa_id', $mahasiswa_id)->first();
            $user->update([
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
        }

        toast('Berhasil Update Biodata', 'success');
        return redirect()->back();
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => $request->nama,
            'nik' => $request->nik,
            'email' => $request->email,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'about' => $request->about,
            'jk' => $request->jk,
            'foto' => $request->foto,
            'province' => $request->province,
            'city' => $request->city,
            'district' => $request->district,
            'village' => $request->village,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        $email = Mahasiswa::where('email', $request->email)->first();
        $username = User::where('username', $request->username)->first();
        if ($username || $email) {
            if ($validator->fails()) {
                toast('Email atau Username sudah Ada', 'info');
                return back();
            }
        }
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $file = $request->file('foto');
            $fileName = time() . '.' . $file->getClientOriginalName();
            $file->storeAs('mahasiswa/foto', $fileName, 'public');
            // Folder yang sesuai dengan nama mahasiswa
            $folderName = strtolower(str_replace(' ', '_', $request->nama));
            $file->storeAs("mahasiswa/foto/{$folderName}", $fileName, 'public');
        }

        $alternatif = new Mahasiswa();
        $alternatif->nama = $request->nama;
        $alternatif->nik = $request->nik;
        $alternatif->email = $request->email;
        $alternatif->tempat_lahir = $request->tempat_lahir;
        $alternatif->tanggal_lahir = $request->tanggal_lahir;
        $alternatif->jk = $request->jk;
        $alternatif->foto = "{$folderName}/{$fileName}";
        $alternatif->province = Province::where('code', $request->province)->value('name');
        $alternatif->city = City::where('code', $request->city)->value('name');
        $alternatif->district = District::where('code', $request->district)->value('name');
        $alternatif->village = Village::where('code', $request->village)->value('name');
        $alternatif->alamat = $request->alamat;
        $alternatif->no_hp = $request->no_hp;
        $alternatif->username = $request->username;
        $alternatif->password = $request->password;
        $alternatif->about = $request->about;
        $alternatif->save();
        $alternatif->role = 'mahasiswa';

        $user = new User();
        $user->mahasiswa_id = $alternatif->id;
        $user->username = $alternatif->username;
        $user->password = Hash::make($request->password);
        $user->role = $alternatif->role;
        $user->save();

        toast('Berhasil Menambahkan Data', 'success');
        return back();
    }

    public function mahasiswa()
    {
        // Ambil data kriteria
        $kriterias = Kriteria::all();

        // Ambil data mahasiswa
        $mahasiswa = Mahasiswa::where('username', auth()->user()->username)->first();

        // Ambil data provinsi
        $provinces = Province::pluck('name', 'code');

        // Kirim data ke tampilan
        return view('mahasiswa.update_biodata', compact('mahasiswa', 'kriterias', 'provinces'));
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
    public function beasiswa()
    {
        $kriterias = Kriteria::all();
        $mahasiswa = Mahasiswa::where('username', auth()->user()->username)->first();
        return view('mahasiswa.kriteria_beasiswa', compact('mahasiswa', 'kriterias'));
    }

    public function storeBeasiswa(Request $request)
    {
        $mahasiswa = Mahasiswa::where('id', auth()->user()->mahasiswa_id)->first();
        $mahasiswa->subkriteria()->attach($request->subkriteria_id);
        return redirect()->back();
    }

    public function updateBeasiswa(Request $request)
    {
        $mahasiswa = Mahasiswa::find(auth()->user()->mahasiswa_id);
        $mahasiswa->subkriteria()->detach($request->subkriteria_id);
        $mahasiswa->subkriteria()->sync($request->subkriteria_id);
        return redirect()->back();
    }

    public function destroyBeasiswa(Request $request)
    {
        $mahasiswa = Mahasiswa::find(auth()->user()->mahasiswa_id);
        $mahasiswa->subkriteria()->detach($request->subkriteria_id);
        return redirect()->back();
    }

    public function hapus($id)
    {
        Mahasiswa::destroy($id);

        toast('Berhasil Menghapus Data', 'danger');
        return redirect()->route('operator.mahasiswa');
    }

    // fungsi untuk melihat hasil dari perhitungan
    public function hasil()
    {
        $kriterias = Kriteria::all();
        // $mahasiswas = Mahasiswa::all();
        $mahasiswa = Mahasiswa::findOrFail(auth()->user()->mahasiswa_id);
        return view('mahasiswa.hasil', compact('mahasiswa', 'kriterias'));
    }

    // public function storeBerkas(Request $request, $mahasiswa_id)
    // {
    //     $mahasiswa = Mahasiswa::find($mahasiswa_id);
    //     $id_mahasiswa = $mahasiswa->id;

    //     $this->validate($request, [
    //         'surat_permohonan' => 'required|file|mimes:pdf',
    //         'ktp' => 'required|file|mimes:pdf',
    //         'kk' => 'required|file|mimes:pdf',
    //         'kta' => 'required|file|mimes:pdf',
    //         'npwp' => 'file|mimes:pdf',
    //         'pernyataan_peminjaman' => 'required|file|mimes:pdf',
    //         'berkas_jaminan' => 'file',
    //     ]);

    //     // Ambil nama mahasiswa atau informasi unik lainnya yang dapat digunakan sebagai nama folder
    //     $mahasiswaName = Mahasiswa::where('id', $mahasiswa_id)->pluck('nama')->first();
    //     // Jika ingin menghindari spasi dalam nama folder, ganti dengan karakter lain, misalnya garis bawah (_)
    //     $mahasiswaFolder = str_replace(' ', '_', $mahasiswaName);
    //     // Buat folder jika belum ada
    //     $folderPath = 'mahasiswa/berkas/' . $mahasiswaFolder;


    //     // Surat Permohonan
    //     $surat_permohonan = $request->file('surat_permohonan');
    //     $surat_permohonanName = time() . '.' . $surat_permohonan->getClientOriginalName();
    //     // Simpan file dalam folder yang sesuai
    //     $surat_permohonan->storeAs($folderPath, $surat_permohonanName, 'public');


    //     // KTP
    //     $ktp = $request->file('ktp');
    //     $ktpName = time() . '.' . $ktp->getClientOriginalName();
    //     // Simpan file dalam folder yang sesuai
    //     $ktp->storeAs($folderPath, $ktpName, 'public');

    //     // KK
    //     $kk = $request->file('kk');
    //     $kkName = time() . '.' . $kk->getClientOriginalName();
    //     // Simpan file dalam folder yang sesuai
    //     $kk->storeAs($folderPath, $kkName, 'public');

    //     // KTA
    //     $kta = $request->file('kta');
    //     $ktaName = time() . '.' . $kta->getClientOriginalName();
    //     // Simpan file dalam folder yang sesuai
    //     $kta->storeAs($folderPath, $ktaName, 'public');

    //     // NPWP
    //     $npwp = $request->file('npwp');
    //     $npwpName = time() . '.' . $npwp->getClientOriginalName();
    //     // Simpan file dalam folder yang sesuai
    //     $npwp->storeAs($folderPath, $npwpName, 'public');

    //     // Surat Pernyataan Peminjaman
    //     $pernyataan_peminjaman = $request->file('pernyataan_peminjaman');
    //     $pernyataan_peminjamanName = time() . '.' . $pernyataan_peminjaman->getClientOriginalName();
    //     // Simpan file dalam folder yang sesuai
    //     $pernyataan_peminjaman->storeAs($folderPath, $pernyataan_peminjamanName, 'public');

    //     // Berkas Jaminan   
    //     $berkas_jaminan = $request->file('berkas_jaminan');
    //     $berkas_jaminanName = time() . '.' . $berkas_jaminan->getClientOriginalName();
    //     // Simpan file dalam folder yang sesuai
    //     $berkas_jaminan->storeAs($folderPath, $berkas_jaminanName, 'public');


    //     Mahasiswa::where('id', auth()->user()->mahasiswa_id)->update([
    //         'mahasiswa_id' => $id_mahasiswa,
    //         'surat_permohonan' => $folderPath . '/' . $surat_permohonan,
    //         'ktp' => $folderPath . '/' . $ktp,
    //         'kk' => $folderPath . '/' . $kk,
    //         'kta' => $folderPath . '/' . $kta,
    //         'npwp' => $folderPath . '/' . $npwp,
    //         'pernyataan_peminjaman' => $folderPath . '/' . $pernyataan_peminjaman,
    //         'berkas_jaminan' => $folderPath . '/' . $berkas_jaminan,
    //     ]);

    //     toast('Berhasil Menambahkan Data', 'success');
    //     return back();
    // }
}
