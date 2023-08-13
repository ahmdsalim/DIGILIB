<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        if (Auth::user()->role === 'owner') {
            $tittle = 'User';
            $data['users'] = User::paginate(25);
            return view('owner.user.user', $data,compact('tittle'));
        } elseif (Auth::user()->role === 'sekolah') {
            $tittle = 'User';
            $header = 'Data '.$tittle;
            return view('sekolah.user.user',compact('tittle','header'));
        } else {
            
        }
        
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
    public function show(User $user)
    {
        $data['user'] = $user;
        return view('owner.user.show-user', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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