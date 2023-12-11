<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();

        return view('operator.kriteria.index', compact('kriterias'));
    }
    
    public function store(Request $request)
    {
        $kriteria = new Kriteria();
        $kriteria->kode = $request->kode;
        $kriteria->kriteria = $request->kriteria;
        $kriteria->bobot = $request->bobot;
        $kriteria->jenis = $request->jenis;
        $kriteria->save();

        return back();
    }

    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->update($request->all());

        return back();
    }

    public function show($id)
    {
        $kriteria = Kriteria::where('id', $id)->first();
        return view('operator.kriteria.detail', compact('kriteria'));
    }

    public function destroy($id)
    {
        Kriteria::destroy($id);
        return redirect()->route('kriteria.index');
    }
}
