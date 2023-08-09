<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tittle = 'User';
        $header = 'Data ' . $tittle;
        return view('sekolah.user.user', compact('tittle', 'header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tittle = 'User';
        $header = 'Tambah ' . $tittle;
        return view('sekolah.user.user', compact('tittle', 'header'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tittle = 'User';
        $header = 'Edit ' . $tittle;
        return view('sekolah.user.user', compact('tittle', 'header'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
