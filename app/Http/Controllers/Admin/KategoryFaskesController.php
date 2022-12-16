<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori_faskes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class KategoryFaskesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user = Kategori_faskes::all();
            return DataTables::of($user)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="kategori-edit/' . Crypt::encrypt($row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Edit</a> | <a href="kategory-delete/' . Crypt::encrypt($row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Delete</a> ';
                    return $btn;
                })
                ->addColumn('date', function ($row) {
                    $date = $row->created_at->format('d-m-Y');
                    return $date;
                })
                ->rawColumns(['action', 'date'])
                ->make(true);
        }
        return view('admin.kategori.index');
    }

    public function editView($id)
    {
        $data = Kategori_faskes::find(Crypt::decrypt($id));

        return view('admin.kategori.edit', compact('data'));
    }

    public function storeView($id, Request $request)
    {
        $data = Kategori_faskes::find($id);
        $data->update($request->all());
        return redirect()->route('index-kategory')->with('success', 'success edit kategori');
    }

    public function store(Request $request)
    {
        $data = Kategori_faskes::create($request->all());

        return redirect()->route('index-kategory')->with('success', 'success add kategori');
    }

    public function delete($id)
    {
        $data = Kategori_faskes::find(Crypt::decrypt($id));
        $data->delete();
        return redirect()->route('index-kategory')->with('success', 'success delete kategori');
    }
}
