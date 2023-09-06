<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\baca;
use App\Models\buku;
use App\Models\Koleksi;
use App\Models\user;
use Illuminate\Support\Facades\DB;
use Auth;

class KoleksiController extends Controller
{
    public function index(){
        $koleksi = Koleksi::with('buku')->get();
        return view('koleksi', ['koleksi' => $koleksi]);
        //return view('layouts.main');
        //$koleksi = koleksi::all();
    }

    public function collect(Request $request){
        $email = Auth::user()->email;
        $buku_id = \Crypt::decryptString($request->id);

        $collection = Koleksi::firstOrNew(['email' => $email, 'buku_id' => $buku_id]);

        $collection->save();

        if($collection){
            return response()->json(['' ,'message' => 'collected']);
        }

        return response()->json(['message' => 'failed to save collection']);
    }

    public function uncollect(Request $request)
    {
        $email = Auth::user()->email;
        $buku_id = \Crypt::decryptString($request->id);

        $collection = Koleksi::where('email',$email)->where('buku_id',$buku_id)->delete();

        if($collection){
            return response()->json(['message' => 'uncollected']);
        }

        return response()->json(['message' => 'failed to remove collection']);
    }
}
