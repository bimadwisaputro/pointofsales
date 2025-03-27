<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "Categories";
        $data['data'] = Categories::get();
        return view('categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['title'] = "Categories";
        // $data['data'] = Categories::get();
        return view('categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Categories::create([
            'name' => $request->name,
        ]);
        return redirect()->to('categories');
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
        $data['edit'] = Categories::find($id);
        return view('categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data['name'] = $request->name;
        Categories::where('id', $id)->update($data);
        // $categories = Categories::find($id);
        // $categories->name = $request->name;
        // $categories->save();
        return redirect()->to('categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Categories::where('id', $id)->delete();
        return redirect()->to('categories');
    }
}
