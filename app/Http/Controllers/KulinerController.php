<?php

namespace App\Http\Controllers;

use App\Models\Kuliner;

class KulinerController extends Controller
{
    public function index()
    {
        $kuliner = Kuliner::latest()->get();

        return view('kuliner.index', compact('kuliner'));
    }
}