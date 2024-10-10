<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    //
    public function index()
    {
        $alternatifs = Alternatif::with('subKriteria')->get();
        return view('user.alternatif.alternatif', compact('alternatifs'));
    }
}
