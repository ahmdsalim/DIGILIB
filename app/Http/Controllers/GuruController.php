<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class GuruController extends Controller
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
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        //
    }

    public function getGuru()
    {
        $data = Guru::whereNotExists(function($query) {
            $query->select(1)
                ->from('users')
                ->whereRaw('users.userable_id = gurus.id');
        });

        return response()->json($data);
    }

    public function getGuruBySekolah($npsn)
    {
        $data['sekolah'] = Sekolah::where('npsn',$npsn)->first();
        $query = Guru::query()->where('npsn',$npsn);
        $data['gurus'] = $query->paginate(25);
        $data['search'] = '';
        return view('owner.guru.guru',$data);
    }

    public function editGuru(Guru $guru)
    {
        $data['guru'] = $guru;

        return view('owner.guru.edit-guru',$data);
    }

    public function updateGuru(Request $request, Guru $guru)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|numeric|unique:gurus,nip,'.$guru->id,
            'nama' => 'required|max:120',
            'jk' => 'required|string|in:L,P',
            'telepon' => 'required'
        ]);

        if(!$validator->fails()){
            $data = $validator->validated();
            $saved = $guru->update([
                'nip' => $data['nip'],
                'nama' => $data['nama'],
                'jk' => $data['jk'],
                'telepon' => $data['telepon']
            ]);

            if(!$saved){
                return to_route('owner.guru.index',$guru->npsn)->with('failed','Gagal');
            }
            return to_route('owner.guru.index',$guru->npsn)->with('success','Berhasil'); 
        }else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function destroyGuru(Guru $guru)
    {
        $deleted = $guru->delete();
        if(!$deleted){
            return redirect()->back()->with('failed','Gagal');
        }
        return redirect()->back()->with('success','Berhasil');
    }
}
