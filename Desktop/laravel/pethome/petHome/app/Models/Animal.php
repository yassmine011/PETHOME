<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'animaux';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'age',
        'date_naissance',
        'sex',
        'description',
        'prix',
        'quantite_stock',
        'disponible',
        'photo',
        'categories_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_naissance' => 'date',
        'disponible' => 'boolean',
    ];

    /**
     * Get the categorie that owns the animal.
     */
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categories_id');
    }

    /**
     * Get the avis for the animal.
     */
    public function avis()
    {
        return $this->hasMany(Avis::class, 'animal_id');
    }

    /**
     * Get the commandes for the animal.
     */
    public function commandes()
    {
        return $this->hasMany(Commande::class, 'animaux_id');
    }
}
