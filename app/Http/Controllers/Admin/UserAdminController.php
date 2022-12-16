<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user = User::all();
            return DataTables::of($user)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="user-detail/' . Crypt::encrypt($row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Detail</a> ';
                    return $btn;
                })
                ->addColumn('date', function ($row) {
                    $date = $row->created_at->format('d-m-Y');
                    return $date;
                })
                ->rawColumns(['action', 'date'])
                ->make(true);
        }
        return view('admin.user.index');
    }

    public function detail($id)
    {
        $user = User::find(Crypt::decrypt($id));

        return view('admin.user.detail', compact('user'));
    }

    public function changeProfil(Request $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('index-user')->with('success', 'success change profile');
    }

    public function changePass(Request $request, $id)
    {
        $user = User::find($id);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('index-user')->with('success', 'success change password');
    }
}
