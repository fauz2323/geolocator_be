<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori_faskes;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all()
    {
        $data = Kategori_faskes::all();
        return response()->json([
            'data' => $data
        ], 200);
    }
}
