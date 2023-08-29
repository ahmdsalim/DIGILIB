<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Buku;

class HomeController extends Controller
{
    public function index(Request $req)
    {
    $query = buku::query();
    $input_kategori = $req->query('kategori');        
    $kategori = kategori::all();

    if(!is_null($input_kategori)){
        $query->where('kategori_id',$input_kategori);
    }

    $buku = $query->get();
    return view('landing',compact('buku','kategori'));
    }

    public function home()
    {
        return view('home');
    }

    public function homesekolah()
    {
        return view('sekolah.home');
    }

}
