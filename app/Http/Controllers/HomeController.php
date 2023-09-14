<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Buku;
use App\Models\Baca;
use App\Models\User;
use DB;

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
        $data['total_pembaca'] = User::whereIn('role', ['siswa','guru'])->whereHas('baca')->count();
        $data['total_pengguna'] = User::whereIn('role', ['siswa','guru'])->count();
        // $avgread = Baca::select(DB::raw('AVG(TIMESTAMPDIFF(SECOND, started_at, end_at)) as avg_duration'))
        //                                ->get();
        // $avgreadinsec = $avgread[0]->avg_duration;
        // $data['avg_waktubaca'] = $avgreadinsec / 60;
        $averageReadingTimePerDay = Baca::select(DB::raw('DATE(started_at) as reading_date'), DB::raw('SUM(TIMESTAMPDIFF(SECOND, started_at, end_at)) as total_duration'))
                                        ->groupBy('reading_date')
                                        ->get();
        // Menghitung rata-rata waktu baca per hari
        $totalDuration = 0;
        $totalDays = $averageReadingTimePerDay->count();

        foreach ($averageReadingTimePerDay as $readingDay) {
            $totalDuration += $readingDay->total_duration;
        }

        $data['avg_waktubaca_perhari'] = $totalDays > 0 ? ($totalDuration / 60 / $totalDays) : 0;

        $data['total_buku'] = Buku::where('status','publish')->count();
        $avgpagesread = Baca::select(DB::raw('AVG((progress-prev_progress)) as avg_pages_read'))
                                       ->get();
        $data['avg_haldibaca'] = $avgpagesread[0]->avg_pages_read;
        $data['total_buku_dibaca'] = Buku::whereHas('baca')->count();
        return view('home', $data);
    }

    public function homesekolah()
    {
        return view('sekolah.home');
    }

}
 