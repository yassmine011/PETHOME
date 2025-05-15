<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Categorie;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animaux = Animal::with('categorie')->get();
        return view('animaux.index', compact('animaux'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('animaux.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'age' => 'required|numeric',
            'date_naissance' => 'required|date',
            'sex' => 'required|string|in:male,femelle',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'quantite_stock' => 'required|numeric',
            'disponible' => 'sometimes|boolean',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories_id' => 'required|exists:categories,id',
        ]);

        $data = $request->all();

        // Traitement de l'image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/animaux'), $imageName);
            $data['photo'] = $imageName;
        }

        Animal::create($data);

        return redirect()->route('animaux.index')
            ->with('success', 'Animal créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        $animal->load(['categorie', 'avis']);
        return view('animaux.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        $categories = Categorie::all();
        return view('animaux.edit', compact('animal', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'nom' => 'sometimes|string|max:255',
            'age' => 'sometimes|numeric',
            'date_naissance' => 'sometimes|date',
            'sex' => 'sometimes|string|in:male,femelle',
            'description' => 'sometimes|string',
            'prix' => 'sometimes|numeric',
            'quantite_stock' => 'sometimes|numeric',
            'disponible' => 'sometimes|boolean',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories_id' => 'sometimes|exists:categories,id',
        ]);

        $data = $request->all();

        // Traitement de l'image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/animaux'), $imageName);
            $data['photo'] = $imageName;
        }

        $animal->update($data);

        return redirect()->route('animaux.index')
            ->with('success', 'Animal mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('animaux.index')
            ->with('success', 'Animal supprimé avec succès.');
    }

    /**
     * Get animals by category.
     */
    public function getByCategory(Categorie $categorie)
    {
        $animaux = Animal::where('categories_id', $categorie->id)->get();
        return view('animaux.by_category', compact('animaux', 'categorie'));
    }

    /**
     * Search animals by name.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        $animaux = Animal::where('nom', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get();

        return view('animaux.search', compact('animaux', 'query'));
    }
}
