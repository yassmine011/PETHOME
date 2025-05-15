<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['Categorie' => 'required|string|unique:categories']);
        Categorie::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Categorie created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Categorie = Categorie::find($id);
        return view('categories.show', compact('Categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Categorie = Categorie::find($id);
        return view('categories.edit', compact('Categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Categorie = Categorie::findOrFail($id);
        $request->validate(['Categorie' => 'required|string|unique:categories,Categorie,' . $id]);
        $Categorie->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Categorie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categorie::destroy($id);
        return redirect()->route('categories.index')->with('success', 'Categorie deleted successfully.');
    }
}
