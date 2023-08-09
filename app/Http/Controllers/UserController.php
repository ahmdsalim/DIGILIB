<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
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

    public function ownerIndex()
    {
        $data['users'] = User::paginate(25);
        return view('owner.user.user', $data);
    }

    public function ownerCreate()
    {
        return view('owner.user.form-user');
    }

    public function ownerStore(Request $request)
    {
        //
    }

    public function ownerShow(User $user)
    {
        $data['user'] = $user;
        return view('owner.user.show-user', $data);
    }

    public function ownerEdit(User $user)
    {
        $data['user'] = $user;
        return view('owner.user.form-user', $data);
    }

    public function ownerUpdate(Request $request, string $id)
    {
        //
    }

    public function ownerDestroy(string $id)
    {
        //
    }
}
