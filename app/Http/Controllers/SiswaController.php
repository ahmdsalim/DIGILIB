<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Validator;

class SiswaController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
    }

    public function getSiswa()
    {
        $data = Siswa::doesntHave('user')->get();

        return response()->json($data);
    }

    public function getSiswaBySekolah($npsn)
    {
        $data['sekolah'] = Sekolah::where('npsn',$npsn)->first();
        $query = Siswa::query()->where('npsn',$npsn);
        $data['siswas'] = $query->paginate(25);
        $data['search'] = '';
        return view('owner.siswa.siswa',$data);
    }

    public function editSiswa(Siswa $siswa)
    {
        $data['siswa'] = $siswa;

        return view('owner.siswa.edit-siswa',$data);
    }

    public function updateSiswa(Request $request, Siswa $siswa)
    {
        $validator = Validator::make($request->all(), [
            'nisn' => 'required|numeric|unique:siswas,nisn,'.$siswa->id,
            'nama' => 'required|max:120',
            'jk' => 'required|string|in:L,P',
            'telepon' => 'required'
        ]);

        if(!$validator->fails()){
            $data = $validator->validated();
            $saved = $siswa->update([
                'nisn' => $data['nisn'],
                'nama' => $data['nama'],
                'jk' => $data['jk'],
                'telepon' => $data['telepon']
            ]);

            if(!$saved){
                return to_route('owner.siswa.index',$siswa->npsn)->with('failed','Gagal');
            }
            return to_route('owner.siswa.index',$siswa->npsn)->with('success','Berhasil'); 
        }else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function destroySiswa(Siswa $siswa)
    {
        $deleted = $siswa->delete();
        if(!$deleted){
            return redirect()->back()->with('failed','Gagal');
        }
        return redirect()->back()->with('success','Berhasil');
    }
}
