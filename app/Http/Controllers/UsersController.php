<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "Users";
        $data['data'] = User::with('UserRoles.role')->orderBy('id', 'desc')->paginate(5);
        // return $data;
        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['title'] = "Users";
        // $data['data'] = User::get();
        $data['roles'] = Roles::get();
        return view('users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        UserRoles::create([
            'user_id' => $user->id,
            'role_id' => $request->role_id,
        ]);
        Alert::success('Berhasil', 'User berhasil dibuat!');
        return redirect()->route('users.index');
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
        //
        // $data['edit'] = User::find($id);
        $data['edit'] = User::with('UserRoles')->findOrFail($id);
        $data['roles'] = Roles::get();
        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // $data['name'] = $request->name;
        // $data['email'] = $request->email;
        // $data['password'] = $request->password;
        // User::where('id', $id)->update($data);
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ?? $user->password,
        ]);

        UserRoles::where('user_id', $id)->update([
            'role_id' => $request->role_id,
        ]);
        Alert::success('Berhasil', 'User berhasil diupdate!');
        return redirect()->to('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        User::where('id', $id)->delete();
        Alert::success('Berhasil', 'User berhasil dihapus!');
        return redirect()->to('users');
    }
}
