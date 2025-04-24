<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Level";
        // select * from Roles
        $datas = Roles::get();
        return view('roles.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Roles::create([
            'name' => $request->name,
        ]);
        Alert::success('Berhasil', 'Level berhasil dibuat!');
        return redirect()->to('roles');
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
        $edit = Roles::find($id);
        return view('roles.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Roles::where('id', $id)->update([
        //     'category_name' => $request->category_name,
        // ]);

        // Auth::user()->profile->id;

        $category = Roles::find($id);
        $category->name = $request->name;
        $category->save();
        Alert::success('Berhasil', 'Level berhasil update!');
        return redirect()->to('roles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Roles::where('id', $id)->delete();
        // $category = Roles::find($id);
        // $category->delete();

        Alert::success('Berhasil', 'Level berhasil dihapus!');
        return redirect()->to('roles');
    }
}
