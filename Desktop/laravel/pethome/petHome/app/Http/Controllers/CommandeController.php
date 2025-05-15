<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes = Commande::paginate(10);
        return view('commandes.index', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('commandes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['Commande' => 'required|string|unique:commandes']);
        Commande::create($request->all());
        return redirect()->route('commandes.index')->with('success', 'Commande created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Commande = Commande::find($id);
        return view('commandes.show', compact('Commande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Commande = Commande::find($id);
        return view('commandes.edit', compact('Commande'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Commande = Commande::findOrFail($id);
        $request->validate(['Commande' => 'required|string|unique:commandes,Commande,' . $id]);
        $Commande->update($request->all());
        return redirect()->route('commandes.index')->with('success', 'Commande updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Commande::destroy($id);
        return redirect()->route('commandes.index')->with('success', 'Commande deleted successfully.');
    }
}
