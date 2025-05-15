<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avis = Avis::paginate(10);
        return view('avis.index', compact('avis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('avis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['Avis' => 'required|string|unique:avis']);
        Avis::create($request->all());
        return redirect()->route('avis.index')->with('success', 'Avis created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Avis = Avis::find($id);
        return view('avis.show', compact('Avis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Avis = Avis::find($id);
        return view('avis.edit', compact('Avis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Avis = Avis::findOrFail($id);
        $request->validate(['Avis' => 'required|string|unique:avis,Avis,' . $id]);
        $Avis->update($request->all());
        return redirect()->route('avis.index')->with('success', 'Avis updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Avis::destroy($id);
        return redirect()->route('avis.index')->with('success', 'Avis deleted successfully.');
    }
}
