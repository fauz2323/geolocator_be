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
            'data' => $data
        ], 200);
    }

    public function byCategory(Request $request)
    {
        $data  = Kategori_faskes::find($request->kategory);

        $faskes = $data->faskes->get();

        return response()->json([
            'data' => $faskes
        ], 200);
    }
}
