<?php

namespace App\Http\Controllers;

use App\Models\Baca;
use Illuminate\Http\Request;
use App\Models\Buku;
use Auth;

class BacaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request)
    {
        $user = auth()->user();
        $buku_id = \Crypt::decryptString($request->buku_id);
        $buku = Buku::findOrFail($buku_id);

        $baca = Baca::updateOrCreate(
            [
                'sesi' => $request->sesi
            ],
            [
                'email' => $user->email,
                'buku_id' => $buku_id,
                'progress' => $request->progress
            ]
        );

        if($baca){
            return response()->json(['message' => 'Successfully saved'], 200);
        }
        return response()->json(['message' => 'Server Error'], 500);

    }

    public function read($id, $slug)
    {
        $user = auth()->user();
        $data['buku'] = Buku::where([['id',$id],['slug',$slug]])->first() ?? abort(404);
        $data['buku']->update(['jumlah_baca' => $data['buku']->jumlah_baca+1]);
        $data['sesi'] = \Str::random(16);
        $data['latestPage'] = 1;
        $data['newReader'] = true;
        $baca = Baca::where('email',$user->email)->where('buku_id',$id)->orderBy('started_at','desc')->first();
        if($baca) {
            $data['latestPage'] = $baca->progress;
            $data['newReader'] = false;
        }
        return view('read', $data);
    }

}
