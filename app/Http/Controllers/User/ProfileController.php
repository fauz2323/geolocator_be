<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('profile.index', compact('user'));
    }

    public function changeProfil(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'success change profile');
    }

    public function changePass(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'success change password');
    }
}
