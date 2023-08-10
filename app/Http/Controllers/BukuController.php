<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tittle = 'Buku';
        $header = 'Data ' . $tittle;
        $data = Buku::paginate(25);
        return view('buku.buku', compact('data', 'tittle', 'header'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function request()
    {
        $tittle = 'Buku';
        $header = 'Data ' . $tittle;
        $data = Buku::where('publish', 0)->paginate(25);
        return view('buku.request', compact('data', 'tittle', 'header'));
    }

    public function requestUpdate($id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return redirect()
                ->back()
                ->with('error', 'Buku tidak ditemukan.');
        }

        $buku->publish = 1;
        $buku->save();

        return redirect()
            ->back()
            ->with('success', 'Buku telah dipublish, silakan cek.');
    }

    public function create()
    {
        $tittle = 'Buku';
        $header = 'Tambah ' . $tittle;
        $kategori = Kategori::all();
        return view('buku.tambah-buku', compact('tittle', 'header', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make(
            $request->all(),
            [
                'no_isb' => 'required|unique:bukus',
                'judul' => 'required|',
                'kategori_id' => 'required|',
                'penulis' => 'required|',
                'penerbit' => 'required|',
                'tahun_terbit' => 'required|',
                'jumlah_halaman' => 'required|',
                'url_pdf' => 'required|',
                'no_isbn' => 'required|',
                
            ],
            [
                'no_isb.unique' => 'no isbn ' . $request->kategori . ' sudah digunakan',
                'no_isb.required' => 'no isbn tidak boleh kosong',
                'kategori.id.required' => 'kategori tidak boleh kosong',
                'judul.required' => 'judul tidak boleh kosong',
                'penulis.required' => 'penulis tidak boleh kosong',
                'penerbit.required' => 'penerbit tidak boleh kosong',
                'tahun_terbit.required' => 'tahun_terbit tidak boleh kosong',
                'jumlah_halaman.required' => 'jumlah_halaman tidak boleh kosong',
                'no_isbn.required' => 'no_isbn tidak boleh kosong',
                'url_pdf.required' => 'url_pdf tidak boleh kosong',
            ],
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $buku = new Buku();
        $images = []; // Mengganti $slide menjadi $images

        if ($request->hasFile('slide')) {
            // Memeriksa apakah ada file slide yang diunggah
            foreach ($request->file('slide') as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension()); // Menggunakan getgetClientOriginalExtension() untuk mendapatkan ekstensi file
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'public/img/slide/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $images[] = $image_url;
            }
        }

        if ($request->hasFile('thumbnail')) {
            $thumbnail_name = md5(rand(1000, 10000)) . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->move('thumbnail-buku/', $thumbnail_name);
            $buku->thumbnail = $thumbnail_name;
        }

        $buku->slide = implode('|', $images); // Mengganti $image menjadi $images
        $buku->judul = $request->judul;
        $buku->slug = '123';
        $buku->penulis = $request->pengarang;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->jumlah_halaman = $request->jumlah_halaman;
        $buku->kategori_id = 1;
        $buku->email = Auth::user()->email;
        $buku->jumlah_baca = 20;
        $buku->url_pdf = $request->url_pdf;
        $buku->no_isbn = $request->no_isbn;
        $buku->save();

        return redirect()
            ->route('buku.index')
            ->with('success', 'Data Telah Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tittle = 'Buku';
        $header = 'Edit ' . $tittle;
        $buku = Buku::find($id);
        $kategori = Kategori::all();
        return view('buku.edit-buku', compact('tittle', 'header', 'kategori','buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                
                'judul' => 'required|',
                'kategori_id' => 'required|',
                'penulis' => 'required|',
                'penerbit' => 'required|',
                'tahun_terbit' => 'required|',
                'jumlah_halaman' => 'required|',
                'url_pdf' => 'required|',
                'no_isbn' => 'required|',
                
            ],
            [
                'no_isb.unique' => 'no isbn ' . $request->kategori . ' sudah digunakan',
                'no_isb.required' => 'no isbn tidak boleh kosong',
                'kategori.id.required' => 'kategori tidak boleh kosong',
                'judul.required' => 'judul tidak boleh kosong',
                'penulis.required' => 'penulis tidak boleh kosong',
                'penerbit.required' => 'penerbit tidak boleh kosong',
                'tahun_terbit.required' => 'tahun_terbit tidak boleh kosong',
                'jumlah_halaman.required' => 'jumlah_halaman tidak boleh kosong',
                'no_isbn.required' => 'no_isbn tidak boleh kosong',
                'url_pdf.required' => 'url_pdf tidak boleh kosong',
            ],
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Buku::find($id);
        $data->update($request->all());
        return redirect()
            ->route('buku.index')
            ->with('success', 'Data Telah Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        //
    }
}
