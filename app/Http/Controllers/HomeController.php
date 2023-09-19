<?php

namespace App\Http\Controllers;

use App\Models\Baca;
use App\Models\Buku;
use App\Models\Guru;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Koleksi;
use App\Models\Siswa;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $req)
    {
        $bukuterbaru = buku::query();
        $input_kategori = $req->query('kategori');

        if (!is_null($input_kategori)) {
            $bukuterbaru->where('kategori_id', $input_kategori);
        }

        $bukuterbaru = $bukuterbaru
            ->orderBy('created_at', 'desc')
            ->take(12)
            ->get();

        $bukuterpopuler = buku::query();
        if (!is_null($input_kategori)) {
            $bukuterpopuler->where('kategori_id', $input_kategori);
        }

        $bukuterpopuler = $bukuterpopuler
            ->orderBy('jumlah_baca', 'desc')
            ->take(12)
            ->get();
        return view('landing', compact('bukuterbaru', 'bukuterpopuler'));
    }

    public function home()
    {
        $data['total_pembaca'] = User::whereIn('role', ['siswa', 'guru'])
            ->whereHas('baca')
            ->count();
        $data['total_pengguna'] = User::whereIn('role', ['siswa', 'guru'])->count();
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

        $data['avg_waktubaca_perhari'] = $totalDays > 0 ? $totalDuration / 60 / $totalDays : 0;

        $data['total_buku'] = Buku::where('status', 'publish')->count();
        $avgpagesread = Baca::select(DB::raw('AVG((progress-prev_progress)) as avg_pages_read'))->get();
        $data['avg_haldibaca'] = $avgpagesread[0]->avg_pages_read;
        $data['total_buku_dibaca'] = Buku::whereHas('baca')->count();
        return view('home', $data);
    }

    public function homesekolah()
    {
        $user = Auth::user();
        $npsn = $user->userable->npsn;
        $email = $user->email;

        $data['total_pengguna'] = User::whereHas('userable', function ($query) use ($npsn) {
            $query->where('npsn', $npsn);
        })
            ->where('role', ['siswa', 'guru'])
            ->count();

        $data['total_buku'] = Buku::whereHas('user', function ($query) use ($npsn) {
            $query->whereHas('userable', function ($query) use ($npsn) {
                $query->where('npsn', $npsn);
            });
        })
            ->where('status', 'publish')
            ->count();

        $data['total_buku_dibaca'] = Buku::whereHas('user', function ($query) use ($npsn) {
            $query->whereHas('userable', function ($query) use ($npsn) {
                $query->where('npsn', $npsn);
            });
        })
            ->whereHas('baca')
            ->count();

        $averageReadingTimePerDay = Baca::select(DB::raw('DATE(started_at) as reading_date'), DB::raw('SUM(TIMESTAMPDIFF(SECOND, started_at, end_at)) as total_duration'))
            ->whereHas('user', function ($query) use ($npsn) {
                $query->whereHas('userable', function ($query) use ($npsn) {
                    $query->where('npsn', $npsn);
                });
            })
            ->groupBy('reading_date')
            ->get();
        // Menghitung rata-rata waktu baca per hari
        $totalDuration = 0;
        $totalDays = $averageReadingTimePerDay->count();

        foreach ($averageReadingTimePerDay as $readingDay) {
            $totalDuration += $readingDay->total_duration;
        }

        $data['avg_waktubaca_perhari'] = $totalDays > 0 ? $totalDuration / 60 / $totalDays : 0;

        $avgpagesread = Baca::select(DB::raw('AVG((progress-prev_progress)) as avg_pages_read'))
            ->whereHas('user', function ($query) use ($npsn) {
                $query->whereHas('userable', function ($query) use ($npsn) {
                    $query->where('npsn', $npsn);
                });
            })
            ->get();
        $data['avg_haldibaca'] = $avgpagesread[0]->avg_pages_read;

        $data['total_pembaca'] = User::whereIn('role', ['siswa', 'guru'])
            ->whereHas('baca', function ($query) use ($npsn) {
                $query->whereHas('user', function ($query) use ($npsn) {
                    $query->whereHas('userable', function ($query) use ($npsn) {
                        $query->where('npsn', $npsn);
                    });
                });
            })
            ->count();
        
        $data['total_siswa'] = Siswa::where('npsn',$npsn)->count();
        $data['total_guru'] = Guru::where('npsn',$npsn)->count();

        // $data['topPembaca'] = User::whereHas('userable', function ($query) {
        //     $query->where('npsn', auth()->user()->userable->npsn);
        // })
        // ->join('siswas', 'users.id', '=', 'siswas.id') // Sesuaikan dengan nama kolom yang sesuai
        // ->select('users.nama', 'users.email', DB::raw('SUM(bacas.progress) as total_progress'))
        // ->join('bacas', 'bacas.email', '=', 'users.email')
        // ->groupBy('users.nama', 'users.email')
        // ->orderByDesc('total_progress')
        // ->limit(10)
        // ->get();

        $data['topPembaca'] = Baca::whereHas('user', function ($query) {
            $query->whereHas('userable', function ($query) {
                $query->where('npsn', auth()->user()->userable->npsn);
            });
        })
        ->select('email', DB::raw('count(buku_id) as total_buku'))
        ->groupBy('email')
        ->orderByDesc('total_buku')
        ->limit(10)
        ->get();
    
        // $data['topBuku'] = Buku::whereHas('buku', function ($query) {
        //     $query->whereHas('user', function ($query) {
        //         $query->whereHas('userable',function($query){
        //             $query->where('npsn', auth()->user()->userable->npsn);
        //         });
        //     });
        // })
        // ->select('email', DB::raw('count(buku_id) as total_buku'))
        // ->where()
        // ->groupBy('email')
        // ->orderByDesc('total_buku')
        // ->limit(10)
        // ->get();

        $data['topBuku'] = Buku::whereHas('koleksi')
        ->whereHas('user',function($query){
            $query->whereHas('userable',function($query){
                $query->where('npsn', auth()->user()->userable->npsn);
            });
        })
        ->get();
    


        return view('sekolah.home', $data);
    }
}
