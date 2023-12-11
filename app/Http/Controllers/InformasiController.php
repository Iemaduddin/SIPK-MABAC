<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InformasiController extends Controller
{
    public function index()
    {
        $informasis = Informasi::all();
        return view('operator.informasi.index', compact('informasis'));
    }
    public function jurnal()
    {
        return view('operator.informasi.jurnal');
    }
    public function excel()
    {
        return view('operator.informasi.excel');
    }

    public function create()
    {
        return view('operator.informasi.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        $informasi  = new Informasi();
        $informasi->judul = htmlspecialchars($validate['judul']);
        $informasi->deskripsi = $validate['deskripsi'];
        $informasi->save();
        toast('Informasi Berhasil Ditambahkan', 'success');
        return redirect()->route('informasi.index');
    }

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('operator.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);
        $validate = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        $informasi->update([
            'judul' => $validate['judul'],
            'deskripsi' => $validate['deskripsi'],
        ]);

        return redirect()->route('informasi.index')->with('success', 'berhasil ubah data');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();
        return back();
    }
}
