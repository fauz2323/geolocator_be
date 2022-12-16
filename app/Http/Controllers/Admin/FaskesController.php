<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaskesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        # code...
    }

    public function confirm($id)
    {
        # code...
    }

    public function reject($id)
    {
        # code...
    }
}
