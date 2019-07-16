<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;

class FrontController extends Controller
{
    public function singleblog(Artikel $artikel)
    {
        return view('single-blog', compact('artikel'));
    }
}
