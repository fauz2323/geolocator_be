<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faskes;
use App\Models\Kategori_faskes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\DataTables;

class FaskesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $kategori = Kategori_faskes::all();
        if ($request->ajax()) {
            $faskes = Faskes::with('kategori', 'user')->get();
            return DataTables::of($faskes)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="faskes-edit/' . Crypt::encrypt($row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Edit</a> | <a href="faskes-delete/' . Crypt::encrypt($row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Delete</a> | <a href="faskes-confirm/' . Crypt::encrypt($row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Confirm</a>';
                    return $btn;
                })
                ->addColumn('date', function ($row) {
                    $date = $row->created_at->format('d-m-Y');
                    return $date;
                })
                ->rawColumns(['action', 'date'])
                ->make(true);
        }
        return view('admin.faskes.index', compact('kategori'));
    }

    public function editView($id)
    {
        $data = Faskes::find(Crypt::decrypt($id));
        $kategori = Kategori_faskes::all();

        return view('admin.faskes.edit', compact('data', 'kategori'));
    }

    public function storeView($id, Request $request)
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

        $faskes = Faskes::find($id);

        $faskes->update($data);

        return back()->with('success', 'success Edit data');
    }

    public function confirm($id)
    {
        $faskes = Faskes::find($id);
        $faskes->verifikasi = 'Terkonfirmasi';
        $faskes->save();

        return redirect()->route('index-faskes')->with('success', 'success verifikasi fasilitas kesehatan');
    }

    public function delete($id)
    {
        $data = Faskes::find(Crypt::decrypt($id));
        $data->delete();
        return redirect()->route('index-faskes')->with('success', 'success delete fasilitan kesehatan');
    }
}
