<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faskes;
use App\Models\Kategori_faskes;
use Illuminate\Http\Request;

class FaskesController extends Controller
{
    public function all()
    {
        $data = Faskes::all();

        return response()->json([
            'allFaskes' => $data
        ], 200);
    }

    public function byCategory(Request $request)
    {
        $data  = Kategori_faskes::find($request->kategory);

        $faskes = $data->faskes->get();

        return response()->json([
            'dataFaskes' => $faskes
        ], 200);
    }

    public function faskesById(Request $request)
    {
        $data  = Faskes::find($request->faskes);

        return response()->json([
            'faskes' => $data
        ], 200);
    }
}
