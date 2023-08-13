<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Spatie\PdfToImage\Pdf;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tittle = 'Buku';
        $header = 'Data ' . $tittle;
        $kosong = '';
        $status = '';

        if (Auth::user()->role === 'owner') {
            //jika masuk sebagai owner
            $status = $request->input('status'); // Get the filter parameter

            if ($request->has('search')) {
                if ($status === null || $status === 'publish' || $status === 'rejected' || $status === 'pending') {
                    $data = Buku::where('judul', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('no_isbn', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('penulis', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('penerbit', 'LIKE', '%' . $request->search . '%')
                        ->orderBy('status', 'desc')
                        ->orderBy('judul', 'asc')
                        ->paginate(25);

                    if ($data->isEmpty()) {
                        $kosong = 'Data tidak tersedia';
                    }
                }
            } else {
                $status = $request->input('status'); // Get the filter parameter

                if ($status === null || $status === 'Semua') {
                    $data = Buku::orderBy('status', 'desc')
                        ->orderBy('judul', 'asc') // Mengurutkan berdasarkan judul buku secara ascending
                        ->paginate(25);
                    if ($data->isEmpty()) {
                        $kosong = 'Data tidak tersedia';
                    }
                } else {
                    $publishStatus = $status; //ambil nilai publish true
                    //persyaratan publish nya benar
                    $data = Buku::where('status', $publishStatus)
                        ->orderBy('status', 'desc')
                        ->orderBy('judul', 'asc') // Mengurutkan berdasarkan judul buku secara ascending
                        ->paginate(25);
                    if ($data->isEmpty()) {
                        $kosong = 'Data tidak tersedia';
                    }
                }
            }
        } else {
            //jika masuk sebagai sekolah
            $status = $request->input('status'); // Get the filter parameter

            if ($request->has('search')) {
                if ($status === null || $status === 'publish' || $status === 'rejected' || $status === 'pending') {
                    $data = Buku::where('judul', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('no_isbn', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('penulis', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('penerbit', 'LIKE', '%' . $request->search . '%')
                        ->orderBy('publish', 'desc')
                        ->orderBy('judul', 'asc')
                        ->paginate(25);

                    if ($data->isEmpty()) {
                        $kosong = 'Data tidak tersedia';
                    }
                }
            } else {
                $status = $request->input('status'); // Get the filter parameter

                if ($status === null || $status === 'Semua') {
                    $emailPengguna = Auth::user()->email; //ambil email dari user

                    //persyaratan berdasarakan email
                    $data = Buku::where('email', $emailPengguna)
                        ->orderBy('status', 'desc')
                        ->orderBy('judul', 'asc')
                        ->paginate(25);

                    if ($data->isEmpty()) {
                        $kosong = 'Data tidak tersedia';
                    }
                } else {
                    $emailPengguna = Auth::user()->email; //ambil email dari user
                    $publishStatus = $status; // ambil nilai status true

                    // jika publish dan email nya benar ambil data
                    $data = Buku::where('status', $publishStatus)
                        ->where('email', $emailPengguna)
                        ->orderBy('status', 'desc')
                        ->orderBy('judul', 'asc')
                        ->paginate(25);

                    if ($data->isEmpty()) {
                        $kosong = 'Data tidak tersedia';
                    }
                }
            }
        }

        return view('buku.buku', compact('data', 'tittle', 'header', 'kosong', 'status'));
    }

    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */

    public function request()
    {
        $tittle = 'Buku';
        $header = 'Data ' . $tittle;

        $data = Buku::where('status', 3)->paginate(25);

        return view('buku.request', compact('data', 'tittle', 'header'));
    }

    public function requestUpdate($id)
    {
        $buku = Buku::find($id);

        if ($buku) {
            $action = request('action'); // Ambil nilai dari input dengan name "action"

            if ($action === 'tolak') {
                $buku->status = 2;
            } else {
                $buku->status = 1; // Ubah sesuai kebutuhan jika status harus berbeda
            }

            $buku->save();

            return redirect()
                ->back()
                ->with('success', 'Buku telah diperbarui.');
        }

        return redirect()
            ->back()
            ->with('error', 'Buku tidak ditemukan.');
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

    public function countPages()
    {
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'no_isbn' => 'required|unique:bukus',
                'judul' => 'required|',
                'kategori_id' => 'required|',
                'pengarang' => 'required|',
                'penerbit' => 'required|',
                'tahun_terbit' => 'required|',
                'jumlah_halaman' => 'required|',
                'url_pdf' => 'required|',
            ],
            [
                'no_isb.unique' => 'no isbn ' . $request->kategori . ' sudah digunakan',
                'no_isb.required' => 'no isbn tidak boleh kosong',
                'kategori_id.required' => 'kategori tidak boleh kosong',
                'judul.required' => 'judul tidak boleh kosong',
                'penarang.required' => 'penarang tidak boleh kosong',
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

        // upload slide
        if ($request->hasFile('slide')) {
            // Memeriksa apakah ada file slide yang diunggah
            foreach ($request->file('slide') as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension()); // Menggunakan getgetClientOriginalExtension() untuk mendapatkan ekstensi file
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'img/slide/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $images[] = $image_url;
            }
        }

        // upload thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnail_name = md5(rand(1000, 10000)) . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->move('img/thumbnail-buku/', $thumbnail_name);
            $buku->thumbnail = $thumbnail_name;
        }

        $destination = 'files';

        if ($request->hasFile('url_pdf')) {
            $file = $request->file('url_pdf');
            $extension = $file->getClientOriginalExtension();

            $slug = Buku::all()->first()->slug; // Mengambil slug dari data pertama
            $file_name = $slug . '.' . $extension;

            $file->move($destination, $file_name);
        }

        $upload_file = $file_name;

        $buku->slide = implode('|', $images); // Mengganti $image menjadi $images
        $buku->judul = $request->judul;
        $buku->slug = Str::slug($buku->judul);
        $buku->penulis = $request->pengarang;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->jumlah_halaman = $request->jumlah_halaman;
        $buku->kategori_id = 1;
        $buku->email = Auth::user()->email;
        $buku->url_pdf = $upload_file;
        $buku->no_isbn = $request->no_isbn;
        $buku->save();

        return redirect()
            ->route('buku.index')
            ->with('success', 'Data Telah Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     */

    public function show($slug)
    {
        $tittle = 'Buku';
        $header = 'Detail ' . $tittle;

        $buku = Buku::find($slug);

        return view('buku.detail-buku', compact('tittle', 'header', 'buku'));
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

        return view('buku.edit-buku', compact('tittle', 'header', 'kategori', 'buku'));
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
    public function destroy($id)
    {
        $data = Buku::find($id);
        $data->delete();

        return redirect()
            ->route('buku.index')
            ->with('success', 'Data Telah Berhasil Di Hapus');
    }

    public function showdetail()
    {
        return view('detailbuku');    }
}
