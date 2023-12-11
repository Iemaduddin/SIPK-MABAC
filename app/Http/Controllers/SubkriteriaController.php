<?php

namespace App\Http\Controllers;

use App\Models\Subkriteria;
use Illuminate\Http\Request;

class SubkriteriaController extends Controller
{
    public function store(Request $request)
    {
        $subkriteria = new Subkriteria();
        $subkriteria->subkriteria = $request->subkriteria;
        $subkriteria->nilai = $request->nilai;
        $subkriteria->kriteria_id = $request->kriteria_id;
        $subkriteria->save();

        return back();
    }

    public function update(Request $request, $id)
    {
        $subkriteria = Subkriteria::findOrFail($id);
        $subkriteria->update($request->all());

        return back();
    }

    public function destroy($id)
    {
        Subkriteria::destroy($id);
        return back();
    }

}
