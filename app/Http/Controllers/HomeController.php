<?php

namespace App\Http\Controllers;

use App\Models\Faskes;
use App\Models\Kategori_faskes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            return view('home');
        } else {
            $kategori = Kategori_faskes::all();
            $data = Faskes::where('kode_user', Auth::user()->id)->first();
            return view('home.user', compact('data', 'kategori'));
        }
    }
}
