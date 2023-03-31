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
        $data = Faskes::where('verifikasi', '!=', 'Dalam Pengecekan')->get();

        return response()->json([
            'allFaskes' => $data
        ], 200);
    }

    public function coordinate()
    {
        $coordinate = Faskes::select('longitude', 'latitude', 'nama_faskes')->where('verifikasi', '!=', 'Dalam Pengecekan')->get();
        return response()->json([
            'coordinate' => $coordinate
        ], 200);
    }

    public function byCategory(Request $request)
    {
        $data  = Kategori_faskes::find($request->kategory);

        $faskes = Faskes::where([
            ['verifikasi', '!=', 'Dalam Pengecekan'],
            ['id_kategori_faskes', '=', $data->id]
        ])->get();

        return response()->json([
            'dataFaskes' => $faskes
        ], 200);
    }

    public function faskesById($id)
    {
        $data  = Faskes::find($id);

        return response()->json([
            'faskes' => $data
        ], 200);
    }
}
