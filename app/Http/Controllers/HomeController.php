<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Buku;

class HomeController extends Controller
{
    public function index(Request $req)
    {
    $bukuterbaru = buku::query();
    $input_kategori = $req->query('kategori');

    if (!is_null($input_kategori)) {
        $bukuterbaru->where('kategori_id', $input_kategori);
    }

    $bukuterbaru = $bukuterbaru->orderBy('created_at', 'desc')->take(12)->get();

    $bukuterpopuler = buku::query();
    if (!is_null($input_kategori)) {
        $bukuterpopuler->where('kategori_id', $input_kategori);
    }

    $bukuterpopuler = $bukuterpopuler->orderBy('jumlah_baca', 'desc')->take(12)->get();
    return view('landing',compact('bukuterbaru','bukuterpopuler'));
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
 