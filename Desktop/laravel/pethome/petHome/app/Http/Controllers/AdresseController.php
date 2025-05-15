<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdresseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adresses = Adresse::paginate(10);
        return view('adresses.index', compact('adresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adresses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['adresse' => 'required|string|unique:adresses']);
        Adresse::create($request->all());
        return redirect()->route('adresses.index')->with('success', 'adresse created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $adresse = Adresse::find($id);
        return view('adresses.show', compact('adresse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $adresse = Adresse::find($id);
        return view('adresses.edit', compact('adresse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $adresse = Adresse::findOrFail($id);
        $request->validate(['adresse' => 'required|string|unique:adresses,adresse,' . $id]);
        $adresse->update($request->all());
        return redirect()->route('adresses.index')->with('success', 'adresse updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Adresse::destroy($id);
        return redirect()->route('adresses.index')->with('success', 'adresse deleted successfully.');
    }
}
