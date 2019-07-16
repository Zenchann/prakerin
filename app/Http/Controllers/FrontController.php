<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\Kategori;
use App\Tag;

class FrontController extends Controller
{
    public function singleblog(Artikel $artikel)
    {
        return view('single-blog');
    }

    public function blogkategori(Kategori $kategori)
    {
        return view('category');
    }

    public function blogtag(Tag $tag)
    {
        return view('category');
    }
}
