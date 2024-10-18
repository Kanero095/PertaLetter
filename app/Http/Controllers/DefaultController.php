<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function suratmasuk()
    {
        return view('surat-masuk');
    }

    public function suratkeluar()
    {
        return view('surat-keluar');
    }
}
