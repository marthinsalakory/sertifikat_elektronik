<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DasborController extends Controller
{
    public function index()
    {
        return redirect()->route('sertifikat.data');
        return view('dasbor');
    }
}
