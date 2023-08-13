<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    
        if (Auth::user()->role === 'owner') {
            $query = User::query();
            $data['search'] = $request->input('search');
            $search = $data['search'];
            if($request->has('search') && !empty($request->input('search'))){
                $query->where(function ($query) use ($search) {
                    $query->where('email', 'like', "%{$search}%")
                        ->orWhere('nama', 'like', "%{$search}%")
                        ->orWhere('role', 'like', "%{$search}%");
                });
            }

            $data['users'] = $query->paginate(25);
            return view('owner.user.user', $data);
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
        return view('owner.user.form-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string|max:128',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|string|in:owner,sekolah,siswa,guru',
            'userable' => 'required_if:role,sekolah,siswa,guru',
            'active' => 'required|in:1,0'
        ]);

        if (!$validator->fails()) {
            $data = $validator->validated();
            $new = [
                'nama' => $data['nama'],
                'uuid' => generateUuid(),
                'email' => $data['email'],
                'password' => $data['password'],
                'role' => $data['role'],
                'active' => $data['active']
            ];

            if(in_array($data['role'], ['sekolah','siswa','guru'])){
                $new['userable_id'] = $data['userable'];
                $new['userable_type'] = getmodelClass($data['role']);
            }

            $saved = User::create($new);

            if(!$saved){
                return to_route('users.index')->with('failed','Gagal');
            }
            return to_route('users.index')->with('success','Berhasil');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
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
    public function edit(User $user)
    {
        $data['user'] = $user;
        return view('owner.user.form-user', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string|max:128',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:8',
            'role' => 'required|string|in:owner,sekolah,siswa,guru',
            'userable' => 'required_if:role,sekolah,siswa,guru',
            'active' => 'required|in:1,0'
        ]);

        if ($validator->passes()) {
            $data = $validator->validated();
            $new = [
                'nama' => $data['nama'],
                'email' => $data['email'],
                'role' => $data['role'],
                'active' => $data['active']
            ];

            !empty($data['password']) ?? $new['password'] = $data['password'];

            if($data['role'] === 'owner' && in_array($user->role, ['sekolah','siswa','guru'])){
                $new['userable_id'] = null;
                $new['userable_type'] = null;
            }elseif($user->role === 'owner' && in_array($data['role'], ['sekolah','siswa','guru'])){
                $new['userable_id'] = $data['userable'];
                $new['userable_type'] = getmodelClass($data['role']);
            }

            $saved = $user->update($new);

            if(!$saved){
                return to_route('users.index')->with('failed','Gagal');
            }
            return to_route('users.index')->with('success','Berhasil');
        } else {
            return redirect()->back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $delete = $user->delete();

        if(!$delete){
            return to_route('users.index')->with('failed','Gagal');
        }
        return to_route('users.index')->with('success','Berhasil');
    }
}
