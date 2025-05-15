<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paiments = Paiment::paginate(10);
        return view('paiments.index', compact('paiments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paiments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['Paiment' => 'required|string|unique:paiments']);
        Paiment::create($request->all());
        return redirect()->route('paiments.index')->with('success', 'Paiment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Paiment = Paiment::find($id);
        return view('paiments.show', compact('Paiment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Paiment = Paiment::find($id);
        return view('paiments.edit', compact('Paiment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Paiment = Paiment::findOrFail($id);
        $request->validate(['Paiment' => 'required|string|unique:paiments,Paiment,' . $id]);
        $Paiment->update($request->all());
        return redirect()->route('paiments.index')->with('success', 'Paiment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Paiment::destroy($id);
        return redirect()->route('paiments.index')->with('success', 'Paiment deleted successfully.');
    }
}
