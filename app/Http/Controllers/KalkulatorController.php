<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function segitiga(Request $request)
    {
        $hasil = null;

        if ($request->filled(['alas', 'tinggi'])) {
            $hasil = 0.5 * $request->alas * $request->tinggi;
        }

        return view('segitiga', ['hasil' => $hasil]);
    }
}