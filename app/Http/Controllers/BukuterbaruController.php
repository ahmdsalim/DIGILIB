<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuterbaruController extends Controller
{
    public function index()
    {
        $data = Buku::all(); // Gantilah 'Data' dengan model Anda dan ambil semua data dari model

        return view('lihatsemuabukuterbaru', compact('data'));
    }
}