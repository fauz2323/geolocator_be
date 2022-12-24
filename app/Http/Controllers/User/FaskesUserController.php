<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class FaskesUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kategori' => 'required',
            'nama_faskes' => 'required',
            'alamat' => 'required',
            'telpon' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'gambar' => 'required',
            'kode_faskes' => 'required',
        ]);

        $data = $request->all();
        $file = $request->file('gambar');
        $fileName = Uuid::uuid4() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $fileName);
        $data['gambar'] = $fileName;
        $data['verifikasi'] = 'Dalam Pengecekan';

        $user = User::find(Auth::user()->id);

        $user->faskes()->create($data);

        return back()->with('success', 'success add data');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'kode_kategori' => 'required',
            'nama_faskes' => 'required',
            'alamat' => 'required',
            'telpon' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'kode_faskes' => 'required',
        ]);

        $data = $request->except('gambar', '_token');

        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $fileName = Uuid::uuid4() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName);
            $data['gambar'] = $fileName;
        }

        $user = User::find(Auth::user()->id);

        $user->faskes()->update($data);

        return back()->with('success', 'success Edit data');
    }
}
