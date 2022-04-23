<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Departemen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengaturan.user.index', [            
            'users' => User::latest()->get(),
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Data User"
        ]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengaturan.user.create', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Data User",
            "departemens" => Departemen::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|min:8',
            'password2' => 'same:password',
            'role' => 'required',
            'departemen_id' => 'required',
            'email' => '',
            'nomor_hp' => 'max:13',
            'status' => 'required'
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/data-user')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $data_user)
    {
        return view('admin.pengaturan.user.edit', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "Data User",
            'users' => $data_user,
            'departemens' => Departemen::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $data_user)
    {
        $validatedData = $request->validate([
            'password' => 'required|min:8',
            'password2' => 'same:password',
            'role' => 'required',
            'departemen_id' => 'required',
            'email' => '',
            'nomor_hp' => 'max:13',
            'status' => 'required'
        ]);

        if ($request->username != $data_user->username) {
            $validatedData['username'] = 'required|unique:users|max:255';
        }
        
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::where('id', $data_user->id)->update([
            'username' => $request->username,
            'password' => $validatedData['password'],
            'role' => $request->role,
            'departemen_id' => $request->departemen_id,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'status' => $request->status,
        ]);

        return redirect('/data-user')->with('success', 'User telah dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $data_user)
    {
        User::where('id', $data_user->id)->delete();

        return redirect('/data-user')->with('success', 'user telah dihapus!');
    }
}
