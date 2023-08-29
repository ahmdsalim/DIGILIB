<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\baca;
use App\Models\buku;
use App\Models\koleksi;
use App\Models\user;
use Illuminate\Support\Facades\DB;
use Auth;

class KoleksiController extends Controller
{
public function index(){
    $koleksi = koleksi::with('buku')->get();
    return view('koleksi', ['koleksi' => $koleksi]);
    //return view('layouts.main');
    //$koleksi = koleksi::all();
}
public function create(Koleksi $buku){
        $user = Auth::user();

    if ($buku->isLikedBy($user)) {
        $buku->likes()->where('user_id', $user->id)->delete();
    } else {
        $buku->likes()->create(['user_id' => $user->id]);
    }
    return back();    
    }

public function store (Request $request)
{
$koleksi = koleksi::create($request->all());
return redirect('/koleksi');
}
public function destroy($id){
    $koleksi = koleksi::findOrFail($id);
    $koleksi->destroy();
return redirect('/koleksi');
}
}
